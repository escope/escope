<?php
/**
 * The Template for displaying all single posts.
 *
 * @package WordPress
 * @subpackage eScope
 * @since eScope 1.0
 */

get_header(); ?>
<?php get_sidebar("left"); ?> 

<div id="middle" style="padding-top:20px;">

	<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
    <div class="post">
		<h1><?php the_title(); ?></h1>
		<div class="postMeta">
			<span class="authorMeta"><a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>"><?php the_author(); ?></a></span> |
			<span class="dateMeta"><?php the_time('F j, Y'); ?></span> |
			<span class="categoryMeta"><?php the_category(', '); ?></span> |
			<span class="commentsMeta">Коментари: <?php comments_popup_link( '0', '1', '%', '', ''); ?></span>
		</div>
		
		<div class="text">
			<?php the_content(); ?>
		</div>
		
		<?php
			$posttags = get_the_tags();
			if ($posttags) {
		?>
		
		<div class="tags postBox">
			<b>Етикети:</b>
			<?php echo get_the_tag_list('', ', ', ''); ?>
		</div>
		
		<?php } ?>
		
		
		<div class="share postBox">
			<b>Сподели:</b>
			<div class="cleaner"></div>
			<a href="#" class="facebook"></a>
			<a href="#" class="twitter"></a>
			<a href="#" class="digg"></a>
			<a href="#" class="stumble"></a>
			<a href="#" class="deliscious"></a>
			<a href="#" class="linked"></a>
			<a href="#" class="mail"></a>
		</div>
		
		<?php comments_template( '', true ); ?>
		
		
	</div><!-- /.post -->
	<?php endwhile; // end of the loop. ?>

</div>
	
<?php get_sidebar("right"); ?>
<?php get_footer(); ?>
