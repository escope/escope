<?php
/**
 * The template for displaying Search Results pages.
 *
 * @package WordPress
 * @subpackage eScope
 * @since eScope 1.0
 */

get_header(); ?>
<?php get_sidebar("left"); ?> 

<?php

global $wp_query;
$total_results = $wp_query->found_posts;

?>

		<div id="middle" style="padding-top:20px;">

<?php if ( have_posts() ) : ?>
			<div class="caTitle">
				<h1 class="page-title"><?php printf( __( 'Резултати за: %s', 'twentyten' ), '<strong>' . get_search_query() . '</strong>' ); ?></h1>
				<p><?php echo $total_results; ?> статии</p>
			</div>	
				<?php
				/* Run the loop for the search to output the results.
				 * If you want to overload this in a child theme then include a file
				 * called loop-search.php and that will be used instead.
				 */
				 get_template_part( 'loop', 'search' );
				?>
<?php else : ?>
				<div id="post-0" class="post no-results not-found">
					<div class="caTitle">
						<h1 class="entry-title"><?php _e( '0 Резултата', 'twentyten' ); ?></h1>
							<p><?php _e( 'Търсиш нещо , което го няма тук. Пробвай в магазина отсреща ;)', 'twentyten' ); ?></p>
					</div>
				</div><!-- #post-0 -->
<?php endif; ?>

		</div><!-- #middle -->

<?php get_sidebar("right"); ?>
<?php get_footer(); ?>
