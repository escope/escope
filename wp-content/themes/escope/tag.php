<?php
/**
 * The template for displaying Tag Archive pages.
 *
 * @package WordPress
 * @subpackage eScope
 * @since eScope 1.0
 */

get_header(); ?>
<?php get_sidebar("left"); ?> 

<?php 
	$tag = get_term_by('name', $tag, 'post_tag'); 
?>

		<div id="middle" style="padding-top:20px;">

			<div class="caTitle">
				<h1 class="page-title"><?php
					printf( __( 'Архив за етикет: %s', 'twentyten' ), '<strong>' . single_tag_title( '', false ) . '</strong>' );
				?></h1>
				<p><?php echo $tag->count; ?> статии</p>
			</div>

<?php
/* Run the loop for the tag archive to output the posts
 * If you want to overload this in a child theme then include a file
 * called loop-tag.php and that will be used instead.
 */
 get_template_part( 'loop', 'tag' );
?>

		</div><!-- #middle -->

<?php get_sidebar("right"); ?>
<?php get_footer(); ?>
