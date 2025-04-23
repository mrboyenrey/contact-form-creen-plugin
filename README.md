# Contact Form CREEN Plugin

## Description
The Contact Form CREEN Plugin is a WordPress plugin that provides a simple contact form with Cloudflare Turnstile integration for spam protection. The form submissions are emailed to a specified Gmail address. The plugin also includes a settings dashboard for securely managing your Cloudflare Turnstile API keys and automation features.

## Features
- Simple contact form with fields for name, email, and message.
- Cloudflare Turnstile integration for spam protection.
- Email notifications for form submissions.
- Success message display after form submission.
- Admin dashboard for securely managing Cloudflare Turnstile API keys.
- Automation toggle to enable or disable confirmation emails to users.
- Customizable confirmation email subject and body.
- Enhanced security and usability improvements.

## Installation
1. Download the plugin files and upload them to the `/wp-content/plugins/contact-form-creen-plugin` directory, or install the plugin through the WordPress plugins screen directly.
2. Activate the plugin through the 'Plugins' screen in WordPress.

## Usage
1. Use the `[mmcf_contact_form]` shortcode to display the contact form on any page or post.
2. Configure your Cloudflare Turnstile API keys and automation settings in the plugin settings dashboard.

## Configuration
1. Navigate to **Dashboard > CREEN Settings** in the WordPress admin panel.
2. Enter your Cloudflare Turnstile **Site Key** and **Secret Key** in the "General" tab and save the changes.
3. In the "Automation" tab, enable or disable confirmation emails and customize the email subject and body.

## Shortcode
Use the following shortcode to display the contact form:
```
[mmcf_contact_form]
```

## Admin Dashboard
The plugin includes an admin dashboard for managing settings:
1. Go to **Dashboard > CREEN Settings**.
2. Use the "General" tab to configure Cloudflare Turnstile API keys.
3. Use the "Automation" tab to enable or disable confirmation emails and customize the email content.

## Support
For support, please contact [support@creensolutions.com](mailto:support@creensolutions.com).

## Changelog
### Version 1.1
- Added a tabbed settings interface.
- Introduced an automation toggle to enable or disable confirmation emails.
- Added customizable email subject and body for confirmation emails.
- Improved security and usability.

### Version 1.0
- Initial release of the Contact Form CREEN Plugin.
