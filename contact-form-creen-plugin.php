<?php
/*
Plugin Name: Contact Form CREEN Plugin
Plugin URI: http://www.creensolutions.com
Description: A creen manual contact form that emails submissions to Gmail | Turnstile Included
Version: 1.0
Author: Boien Reyes
*/

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

/**
 * Shortcode to display the contact form along with a success message if applicable.
 */
function mmcf_contact_form_shortcode() {

    // Check for a success query parameter and output a success message if present.
    $success_message = '';
    if ( isset( $_GET['mmcf_sent'] ) && $_GET['mmcf_sent'] == 1 ) {
        $success_message = '<p class="mmcf-success" style="color: green;">Your message was sent successfully!</p>';
    }

    // Create a nonce field to secure form submissions.
    $nonce_field = wp_nonce_field( 'mmcf_contact_form_action', 'mmcf_contact_nonce', true, false );

    // Cloudflare Turnstile widget code.
    // Replace "YOUR_SITE_KEY" with your actual Cloudflare Turnstile site key.
    $turnstile_widget = '
    <div class="cf-turnstile" data-sitekey="0x4AAAAAAA_mFViv8lOkmWlU"></div>
    <script src="https://challenges.cloudflare.com/turnstile/v0/api.js" async defer></script>
    ';

    // Build the form.
    $form = '
    ' . $success_message . '
    <form action="' . esc_url( admin_url( 'admin-post.php' ) ) . '" method="POST">
        ' . $nonce_field . '
        <!-- The action value determines which hook we use to process this form -->
        <input type="hidden" name="action" value="mmcf_send_form_data" />

        <label for="mmcf_name">Name:</label>
        <input type="text" id="mmcf_name" name="mmcf_name" required />

        <label for="mmcf_email">Email:</label>
        <input type="email" id="mmcf_email" name="mmcf_email" required />

        <label for="mmcf_message">Message:</label>
        <textarea id="mmcf_message" name="mmcf_message" rows="5" required></textarea>

        ' . $turnstile_widget . '

        <button type="submit">Send</button>
    </form>
    ';

    return $form;
}
add_shortcode( 'mmcf_contact_form', 'mmcf_contact_form_shortcode' );

/**
 * Process the form submission.
 */
function mmcf_process_form_submission() {

    // Check nonce for security.
    if ( ! isset( $_POST['mmcf_contact_nonce'] ) ||
         ! wp_verify_nonce( $_POST['mmcf_contact_nonce'], 'mmcf_contact_form_action' ) ) {
        wp_die( 'Security check failed.' );
    }

    // Verify the Turnstile response.
    if ( ! isset( $_POST['cf-turnstile-response'] ) || empty( $_POST['cf-turnstile-response'] ) ) {
        wp_die( 'Turnstile verification failed. Please try again.' );
    }

    $turnstile_response = sanitize_text_field( $_POST['cf-turnstile-response'] );

    // Replace "YOUR_SECRET_KEY" with your actual Cloudflare Turnstile secret key.
    $secret_key = '0x4AAAAAAA_mFblADlP5rpUV2CrSupZ_yfg';

    // Make a POST request to Cloudflare Turnstile verification API.
    $verify_response = wp_remote_post( 'https://challenges.cloudflare.com/turnstile/v0/siteverify', array(
        'body' => array(
            'secret'   => $secret_key,
            'response' => $turnstile_response,
            'remoteip' => $_SERVER['REMOTE_ADDR'],
        ),
    ) );

    if ( is_wp_error( $verify_response ) ) {
        wp_die( 'Turnstile verification request failed.' );
    }

    $response_body = wp_remote_retrieve_body( $verify_response );
    $result       = json_decode( $response_body, true );

    if ( ! $result || ! isset( $result['success'] ) || ! $result['success'] ) {
        wp_die( 'Turnstile verification failed. Please try again.' );
    }

    // Sanitize and retrieve form fields.
    $name    = sanitize_text_field( $_POST['mmcf_name'] );
    $email   = sanitize_email( $_POST['mmcf_email'] );
    $message = sanitize_textarea_field( $_POST['mmcf_message'] );

    // Prepare the email.
    $to      = 'support@creensolutions.com'; // Replace with your Gmail address.
    $subject = 'New Contact Form Submission from ' . $name;
    $body    = "Name: $name\nEmail: $email\n\nMessage:\n$message";
    $headers = array( 'Content-Type: text/plain; charset=UTF-8' );

    // Send the email.
    wp_mail( $to, $subject, $body, $headers );

    // Redirect back to the referring page with a success parameter.
    $redirect_url = add_query_arg( 'mmcf_sent', '1', wp_get_referer() );
    wp_safe_redirect( $redirect_url );
    exit;
}
add_action( 'admin_post_nopriv_mmcf_send_form_data', 'mmcf_process_form_submission' );
add_action( 'admin_post_mmcf_send_form_data', 'mmcf_process_form_submission' );