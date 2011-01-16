<?php
/**
 * The template for displaying Category Archive pages.
 *
 * @package WordPress
 * @subpackage eScope
 * @since eScope 1.0
 */

get_header(); ?>

<?php get_sidebar("left"); ?> 

		<div id="middle" style="padding-top:20px;">
				
				<?php $category = get_category(get_query_var('cat')); ?>
				
				<?php $args = array(
					'numberposts'     => -1,
					'category'        => $category->cat_ID,
					'post_type'       => 'post',
					'post_status'     => 'publish' ); ?>
					
					<?php 
						$posts = get_posts($args);
						$posts_count = count($posts);
					?> 
				
				<div class="caTitle">
					<h1 class="page-title"><?php
						printf( __( 'Категория: %s', 'twentyten' ), '<strong>' . single_cat_title( '', false ) . '</strong>' );
					?></h1>
					<p><?php echo $posts_count; ?> статии</p>
				</div>
				<?php
					$category_description = category_description();
					if ( ! empty( $category_description ) )
						echo '<div class="archive-meta">' . $category_description . '</div>';

				/* Run the loop for the category page to output the posts.
				 * If you want to overload this in a child theme then include a file
				 * called loop-category.php and that will be used instead.
				 */
				get_template_part( 'loop', 'category' );
				?>

		</div><!-- #middle -->

<?php get_sidebar("right"); ?>
<?php get_footer(); ?>
