# Contact Form CREEN Plugin

## Description
The Contact Form CREEN Plugin is a WordPress plugin that provides a simple contact form with Cloudflare Turnstile integration for spam protection. The form submissions are emailed to a specified Gmail address.

## Features
- Simple contact form with fields for name, email, and message.
- Cloudflare Turnstile integration for spam protection.
- Email notifications for form submissions.
- Success message display after form submission.

## Installation
1. Download the plugin files and upload them to the `/wp-content/plugins/contact-form-creen-plugin` directory, or install the plugin through the WordPress plugins screen directly.
2. Activate the plugin through the 'Plugins' screen in WordPress.

## Usage
1. Use the `[mmcf_contact_form]` shortcode to display the contact form on any page or post.
2. Ensure you have set your Cloudflare Turnstile site key and secret key in the plugin code.

## Configuration
- Replace `YOUR_SITE_KEY` in the `$turnstile_widget` variable with your actual Cloudflare Turnstile site key.
- Replace `YOUR_SECRET_KEY` in the `$secret_key` variable with your actual Cloudflare Turnstile secret key.
- Update the `$to` variable in the `mmcf_process_form_submission` function with your Gmail address to receive form submissions.

## Shortcode
Use the following shortcode to display the contact form:
```
[mmcf_contact_form]
```

## Support
For support, please contact [support@creensolutions.com](mailto:support@creensolutions.com).

## Changelog
### Version 1.0
- Initial release of the Contact Form CREEN Plugin.
