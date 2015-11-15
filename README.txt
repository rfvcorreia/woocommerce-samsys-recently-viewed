=== WooCommerce Recently Viewed Products from all visitors by Samsys ===
Contributors: ricardocorreia, samsys
Donate link: http://samsys.pt/
Tags: woocommerce, recently viewed, all visitors, widget
Requires at least: 3.5.1
Tested up to: 4.3.1
Stable tag: 2.0.0
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Adds a widget with WooCommerce recently viewed products from all website visitors  

== Description ==

This plugin allows you to add a new widget to your sidebar in WooCommerce powered websites showing the recently viewed products from all visitors.

== Installation ==

= Using The WordPress Dashboard =

1. Navigate to the 'Add New' in the plugins dashboard
2. Search for 'WooCommerce Recently Viewed Products from all visitor by Samsys'
3. Click 'Install Now'
4. Activate the plugin on the Plugin dashboard

= Uploading in WordPress Dashboard =

1. Navigate to the 'Add New' in the plugins dashboard
2. Navigate to the 'Upload' area
3. Select `Samsys-WC-Recently-viewed-widget.zip` from your computer
4. Click 'Install Now'
5. Activate the plugin in the Plugin dashboard

= Using FTP =

1. Download 'Samsys-WC-Recently-viewed-widget.zip'
2. Extract the 'woocommerce-samsys-recently-viewed' directory to your computer
3. Upload the 'woocommerce-samsys-recently-viewed' directory to the '/wp-content/plugins/' directory
4. Activate the plugin in the Plugin dashboard


== Frequently Asked Questions ==

= How are the products views saved? =

Each time a visitor accessess a product single page the date of the access is registered in a meta field in UNIX timestamp, allowing the widget to show the last viewed products from any visitor.

== Screenshots ==

1. Widget panel and options
2. Front-end widget using default WooCommerce Recently Viewed Products template

== Changelog ==

= 2.0 =
* Plugin extends WC Widget instead of WP widget 
* Plugin uses WooCommerce Recently Viewed Products widget template (if no dedicated template is created)
* Option to exclude views from administrators and shop managers
* Correction of php notices and usage of deprecated functions

= 1.0 =
* Initial plugin version

== Upgrade Notice ==

= 2.0 =
Plugin extends WC Widget instead of WP widget, Plugin uses WooCommerce Recently Viewed Products widget template (if no dedicated template is created), Option to exclude views from administrators and shop managers, Correction of php notices and usage of deprecated functions

= 1.0 =
