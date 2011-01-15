<?php
/**
 * The Sidebar containing the primary and secondary widget areas.
 *
 * @package WordPress
 * @subpackage eSope
 * @since eScope 1.0
 */
?>

<?php 
	
if (is_home()){
	
	$args = array(
    'numberposts'     => 10,
    'offset'          => 0,
    'orderby'         => 'comment_count',
    'order'           => 'DESC',
    'post_type'       => 'post',
    'post_status'     => 'publish' ); 

	$mostCommented = get_posts($args); 
	
?>

   <div id="left">
		<div class="mostComm">
			<div class="leftTtl">Най - коментирани</div>
			<ul>
				<?php foreach($mostCommented as $post){ 
					setup_postdata($post);
				?>
				<li>
					<p><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></p>
					<span class="date"><?php the_time("j.m.Y"); ?></span>
				</li>
				<?php } ?>
				<li class="see_all">
					<a href="#">Вижте всички</a>
				</li>
			</ul>
		</div>
	</div><!-- /#left -->
	
<?php } ?>