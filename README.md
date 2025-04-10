# Contact Form CREEN Plugin

## Description
The Contact Form CREEN Plugin is a WordPress plugin that provides a simple contact form with Cloudflare Turnstile integration for spam protection. The form submissions are emailed to a specified Gmail address. The plugin also includes a settings dashboard for securely managing your Cloudflare Turnstile API keys.

## Features
- Simple contact form with fields for name, email, and message.
- Cloudflare Turnstile integration for spam protection.
- Email notifications for form submissions.
- Success message display after form submission.
- Admin dashboard for securely managing Cloudflare Turnstile API keys.

## Installation
1. Download the plugin files and upload them to the `/wp-content/plugins/contact-form-creen-plugin` directory, or install the plugin through the WordPress plugins screen directly.
2. Activate the plugin through the 'Plugins' screen in WordPress.

## Usage
1. Use the `[mmcf_contact_form]` shortcode to display the contact form on any page or post.
2. Configure your Cloudflare Turnstile API keys in the plugin settings dashboard.

## Configuration
1. Navigate to **Dashboard > CREEN Settings** in the WordPress admin panel.
2. Enter your Cloudflare Turnstile **Site Key** and **Secret Key** in the provided fields and save the changes.
3. The plugin will automatically use these keys for Turnstile validation.

## Shortcode
Use the following shortcode to display the contact form:
```
[mmcf_contact_form]
```

## Admin Dashboard
The plugin includes an admin dashboard for managing API keys:
1. Go to **Dashboard > CREEN Settings**.
2. Enter your Cloudflare Turnstile **Site Key** and **Secret Key**.
3. Save the changes to securely store the keys.

## Support
For support, please contact [support@creensolutions.com](mailto:support@creensolutions.com).
Developer in Charge [mrboyenrey@gmail.com](mailto:mrboyenrey@gmail.com).

## Changelog
### Version 1.1
- Added admin dashboard for managing Cloudflare Turnstile API keys.
- Improved email validation using `is_email()`.

### Version 1.0
- Initial release of the Contact Form CREEN Plugin.
