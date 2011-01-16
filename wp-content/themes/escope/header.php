<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage eScope
 * @since eScope 1.0
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<title><?php
	/*
	 * Print the <title> tag based on what is being viewed.
	 */
	global $page, $paged;

	wp_title( '|', true, 'right' );

	// Add the blog name.
	bloginfo( 'name' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		echo " | $site_description";

	// Add a page number if necessary:
	if ( $paged >= 2 || $page >= 2 )
		echo ' | ' . sprintf( __( 'Page %s', 'twentyten' ), max( $paged, $page ) );

	?></title>
<?php if(is_single()){
		$mk = get_post_meta($post->ID, 'keywords', true);
		$md = get_post_meta($post->ID, 'description', true);
?>
	<?php if($mk){ ?>
		<meta content="<?php echo $mk; ?>" name="keywords" />
	<?php } ?>
	
	<?php if($md){ ?>
		<meta content="<?php echo $md; ?>" name="description" />
	<?php } ?>
	
<?php } ?>

<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<script type="text/javascript" src="http://code.jquery.com/jquery-1.4.4.min.js"></script>
<?php
	/* We add some JavaScript to pages with the comment form
	 * to support sites with threaded comments (when in use).
	 */
	if ( is_singular() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );

	/* Always have wp_head() just before the closing </head>
	 * tag of your theme, or you will break many plugins, which
	 * generally use this hook to add elements to <head> such
	 * as styles, scripts, and meta tags.
	 */
	wp_head();
?>
</head>

<body <?php body_class(); ?>>

<div id="center">
			<div id="header">
				<a href="<?php bloginfo('url'); ?>" class="logo"></a>
				
				<form action="<?php echo home_url( '/' ); ?>" role="search" method="get" id="searchform">
					<input type="text" name="s" id="s" value="Търсене за ..." title="Търсене за ..." class="fld" />
					<input type="submit" value="Търси" class="btn" id="searchsubmit" />
				</form>
				
			</div><!-- /#header -->