<?php
/**
 * The template for displaying Author Archive pages.
 *
 * @package WordPress
 * @subpackage eScope
 * @since eScope 1.0
 */

get_header(); ?>

<?php get_sidebar("left"); ?> 

		<div id="middle" style="padding-top:20px;">

<?php
	/* Queue the first post, that way we know who
	 * the author is when we try to get their name,
	 * URL, description, avatar, etc.
	 *
	 * We reset this later so we can run the loop
	 * properly with a call to rewind_posts().
	 */
	if ( have_posts() )
		the_post();
?>
				<div class="caTitle">
				<h1 class="page-title author"><?php printf( __( 'Всички от автор: %s', 'twentyten' ), '<strong>' . get_the_author() . '</strong>' ); ?></h1>
				<p><?php echo count_user_posts(get_the_author_meta( 'ID' )); ?> статии</p>
				</div>
				
<?php
// If a user has filled out their description, show a bio on their entries.
if ( get_the_author_meta( 'description' ) ) : ?>
					<div id="entry-author-info">
						<div id="author-avatar">
							<?php echo get_avatar( get_the_author_meta( 'user_email' ), apply_filters( 'twentyten_author_bio_avatar_size', 60 ) ); ?>
						</div><!-- #author-avatar -->
						<div id="author-description">
							<h2><?php printf( __( 'About %s', 'twentyten' ), get_the_author() ); ?></h2>
							<?php the_author_meta( 'description' ); ?>
						</div><!-- #author-description	-->
					</div><!-- #entry-author-info -->
<?php endif; ?>

<?php
	/* Since we called the_post() above, we need to
	 * rewind the loop back to the beginning that way
	 * we can run the loop properly, in full.
	 */
	rewind_posts();

	/* Run the loop for the author archive page to output the authors posts
	 * If you want to overload this in a child theme then include a file
	 * called loop-author.php and that will be used instead.
	 */
	 get_template_part( 'loop', 'author' );
?>

		</div><!-- #middle -->

<?php get_sidebar("right"); ?>
<?php get_footer(); ?>
