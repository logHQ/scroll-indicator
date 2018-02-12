=== Plugin Name ===
Contributors: logHQ
Tags: scroll indicator, reading, length, progress, reading time, scroll, scroll progress, reading progress, read time estimate
Requires at least: 3.8
Tested up to: 4.9.4
Stable tag: 1
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Scroll Indicator shows scroll bar with progress that is synchronized with page scroll.

== Description ==

Scroll Indicator is simple light weight plugin that syncs with page scroll and shows it in a progress bar.

You can also place the time commitment label anywhere you want via the [scrollindicator-time] shortcode.

== Installation ==

1. Upload the plugin files to the `/wp-content/plugins/worth-the-read` directory, or install the plugin through the WordPress plugins screen directly.
2. Activate the plugin through the 'Plugins' screen in WordPress
3. Use the Scroll Indicator screen to configure the plugin
4. Enable the plugin by selecting at least one option for "Display On" in the plugin settings screen, such as Posts or Pages


== Frequently Asked Questions ==

= Why isn't the progress bar showing up? =

Make sure you enabled it in the Scroll Indicator settings page and that you're actually viewing a single post or page on your site (not your archive page, for instance). The bar won't display unless you have actually scrolled down into your main content. So if you have stuff going on at the top of your page above your post content (sliders, content panels, ads, etc.) the progress bar will remain hidden until it becomes relevant.

If the height of your post content is less than the height of the visible page, the progress bar will not display since the user already knows how much content there is. 

The functionality is javascript-based, so if you have a javascript error caused by something else like another plugin or your theme, it could affect the display of the progress bar.

= How much control do I have over the look and feel of the progress bar? =

You can control the foreground color, background color, transparency, width, offset, and placement of the progress bar. You can also separately control the background color of the comments portion (if enabled).

= How does it work? =

WordPress action hooks are used to insert small html tags above and below your post/page content and comments. jQuery is used to target those tags and use them to calculate distances on window scroll, and then the actual progress bar is animated accordingly.

= Why do you say it's "unobtrusive"? =

The plugin is as minimally distracting visually as it can be while still being easy to find. It auto-mutes any time the user does not need to visually reference it. Technically speaking, the html tags added to the DOM and corresponding CSS are very minimal and will not have any affect on the rest of the page DOM or any other plugins or your theme.

== Changelog ==

= 1.0 =
* Initial release

== Upgrade Notice ==

There are no upgrade notices at this time.
