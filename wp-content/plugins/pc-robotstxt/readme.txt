=== PC Robots.txt ===
Contributors: petercoughlin
Donate link: http://petercoughlin.com/donate/
Tags: robots, robots.txt, robot, virtual, seo
Requires at least: 2.5
Tested up to: 3.0.1
Stable tag: trunk

PC Robots.txt automatically creates a virtual robots.txt file for your blog. Your robots.txt file can be easily edited from the plugin settings page.

== Description ==

PC Robots.txt is an easy (i.e. automated) solution to creating and managing a robots.txt file for your blog. Instead of mucking about with FTP, files, permissions ..etc, just upload and activate the plugin and you're done.

By default, the PC Robots.txt plugin has a bunch of spam-bots disallowed, the Google bots specifically allowed, and a few of the standard WordPress folders and files disallowed. If you want to change what appears in your robots.txt file, you can easily edit the contents from the plugin settings page under Settings, PC Robots.txt in your blog administration.

If the plugin detects an existing XML sitemap file, a reference to it will be automatically added to your robots.txt file.

For more information, to offer feedback, to ask questions or to submit bugs please visit http://petercoughlin.com/robotstxt-wordpress-plugin/

== Installation ==

The easiest way to install the plugin is from the Plugins, Add New page in your blog admin area.

If you click the click the Search menu link and type in something like "robots.txt" hopefully you will see PC Robots.txt in the list. Click the "Details" link and you should see a link or button to install the latest version of the plugin.

Alternatively, you could download the zip file for this plugin to your computer, and then go to Plugins, Add New, Upload, and browse to the plugin zip file you downloaded then click the Install Now button.

Once you have the plugin installed and activated, you'll see a new PC Robots.txt menu link under the Settings menu. Click that menu link to see the plugin settings page. From there you can edit the contents of your robots.txt file.

== Frequently Asked Questions ==

= Will it conflict with any existing robots.txt file? =

If a physical robots.txt file exists on your blog, WordPress won't process any request for one, so there will be no conflict.

= I notice there's a line in the robots.txt file which says Googlebot Disallow: - won't that block the Googlebot from my site? =

No. That's the correct syntax for allowing a bot. Because there's nothing after the Disallow: bit, it's actually saying don't disallow the Googlebot anything, or in other words, allow it everything.

== Changelog ==

= 1.3 =
* Now uses do_robots hook and checks for is_robots() in plugin action.

= 1.2 =
* Added support for existing sitemap.xml.gz file.

= 1.1 =
* Added link to settings page, option to delete settings.

= 1.0 =
* Initial release.
