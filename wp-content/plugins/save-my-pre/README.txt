=== Save My &lt;pre> ===
Contributors: jbrinley
Donate link: 
Tags: wysiwyg, Formatting, editor, TinyMCE
Requires at least: 2.3
Tested up to: 2.3.3
Stable tag: 1.1

Stops the WordPress WYSIWYG editor from "cleaning" &lt;pre> elements

== Description ==

Save My &lt;pre> intercepts calls to the <code>wpautop</code> function that reformats text for the WYSIWYG editor. This plugin prevents text inside &lt;pre> tags from being sent to the function, while passing all other text through.

== Installation ==
1. Upload the 'save-my-pre' folder to the 'wp-content/plugins/' directory
1. Activate the plugin through the 'Plugins' menu in WordPress