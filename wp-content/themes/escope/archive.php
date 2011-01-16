<?php
/**
 * The template for displaying Archive pages.
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage eScope
 * @since eScope 1.0
 */

get_header(); ?>

<?php get_sidebar("left"); ?> 


		<div id="middle" style="padding-top:20px;">

<?php
	/* Queue the first post, that way we know
	 * what date we're dealing with (if that is the case).
	 *
	 * We reset this later so we can run the loop
	 * properly with a call to rewind_posts().
	 */
	if ( have_posts() )
		the_post();
?>

<div class="caTitle">
			<h1 class="page-title">
<?php if ( is_day() ) : ?>
				<?php printf( __( 'Архив за деня: <strong>%s</strong>', 'twentyten' ), get_the_date() ); ?>
<?php elseif ( is_month() ) : ?>
				<?php printf( __( 'Месецен архив: <strong>%s</strong>', 'twentyten' ), get_the_date('F Y') ); ?>
<?php elseif ( is_year() ) : ?>
				<?php printf( __( 'Годишен архив: <strong>%s</strong>', 'twentyten' ), get_the_date('Y') ); ?>
<?php else : ?>
				<?php _e( 'Целия архив', 'twentyten' ); ?>
<?php endif; ?>
			</h1>
</div>


<?php
	/* Since we called the_post() above, we need to
	 * rewind the loop back to the beginning that way
	 * we can run the loop properly, in full.
	 */
	rewind_posts();

	/* Run the loop for the archives page to output the posts.
	 * If you want to overload this in a child theme then include a file
	 * called loop-archives.php and that will be used instead.
	 */
	 get_template_part( 'loop', 'archive' );
?>

		</div><!-- #middle -->

<?php get_sidebar("right"); ?>
<?php get_footer(); ?>
