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
			<a href="javascript:;" rel="nofollow" class="facebook" onclick="javascript: return fbs_click();" target="_blank"></a>
			<a href="javascript:;" onclick="javascript: return tw_click('Shearing eScope.eu article link: ');" class="twitter" rel="nofollow"></a>
			<a href="javascript:;" onclick="javascript: return sv_click();" class="svejo" rel="nofollow"></a>
			<a href="javascript:;" onclick="javascript: return digg_click();" class="digg" rel="nofollow"></a>
			<a href="javascript:;" class="stumble" onclick="javascript: return st_click();" rel="nofollow"></a>
			<a href="javascript:;" onclick="javascript: return de_click();" class="deliscious" rel="nofollow"></a>
			<a href="javascript:;" onclick="javascript: return li_click();" class="linked" rel="nofollow"></a>
			<a href="#" class="mail" rel="nofollow"></a>
		</div>
		
		<?php comments_template( '', true ); ?>
		
		
	</div><!-- /.post -->
	<?php endwhile; // end of the loop. ?>

</div>
	
<?php get_sidebar("right"); ?>
<?php get_footer(); ?>
