<?php
/*
Plugin Name: Save My pre
Plugin URI: http://xplus3.net/2008/03/06/save-my-pre/
Description: Stops the WP WYSIWYG editor from "cleaning" pre elements
Version: 1.1
Author: Jonathan Brinley
Author URI: http://xplus3.net/
*/
?>
<?php
if ( !class_exists("PreservePre") ) {
	class PreservePre {
		function PreservePre() { //constructor
			
		}
		
		function safe_autop($output) {
			if ( $output == '' ) {
				return $output;
			}
			
			if ( strpos($output, "<pre") === false ) {
				// no <pre> in this chunk
				return wpautop($output);
			} elseif ( strpos($output, "<pre") === 0 ) {
				// <pre> at the start of this chunk
				$parts = explode("</pre>", $output, 2);
				$parts[0] .= "</pre>";
				return $parts[0] . $this->safe_autop($parts[1]);
				// don't process the <pre>, send everything after </pre> through this filter again
			} else {
				// <pre> in this chunk, but not at the start
				$parts = explode("<pre", $output, 2);
				$parts[1] = "<pre" . $parts[1];
				return $this->safe_autop($parts[0]) . $this->safe_autop($parts[1]);
				// send the separate chunks back through this filter. $parts[0] shouldn't have a <pre>, so should be caught by first case next time through. $parts[1] should be caught by second case.
			}
			
			return $output; // if somehow we've gotten here (should be impossible), give $output back
		}

		function preformat_intercept($text) {
			// Taken from wp_richedit_pre()
			
			// Filtering a blank results in an annoying <br />\n
			if ( empty($text) ) return apply_filters('richedit_pre', '');
			
			$output = $text;
			$output = convert_chars($output);
			
			// Don't call this line
			// $output = wpautop($output);
			
			// Added to prevent formatting of <pre>s
			$output = $this->safe_autop($output);
			
			// Back to wp_richedit_pre()
			
			// These must be double-escaped or planets will collide.
			$output = str_replace('&lt;', '&amp;lt;', $output);
			$output = str_replace('&gt;', '&amp;gt;', $output);
			
			return apply_filters('richedit_pre', $output);
		}
		
		function fix_javascript() {
			if ( function_exists('wp_enqueue_script') ) {
				wp_enqueue_script('save_pre_from_js', get_bloginfo('wpurl') . '/wp-content/plugins/save-my-pre/save-pre.js');
			}
		}
		
	}
} //End Class DoNotPublish

if ( class_exists("PreservePre") ) {
	$pre_preservative = new PreservePre();
}

if ( isset($pre_preservative) ) {
	//Actions
	add_action('wp_print_scripts', array(&$pre_preservative, 'fix_javascript') );
	//Filters
	remove_filter('the_editor_content', 'wp_richedit_pre');
	add_filter( 'the_editor_content', array(&$pre_preservative, 'preformat_intercept') );
}
?>