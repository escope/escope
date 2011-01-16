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
	
if (is_home() || is_author()){
	
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
				<?php foreach($mostCommented as $key=>$post){ 
					setup_postdata($post);
				?>
				<li <?php if($key == 9){ echo 'class="last"'; } ?>>
					<p><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></p>
					<span class="date"><?php the_time("j.m.Y"); ?></span>
				</li>
				<?php } ?>
			</ul>
		</div>
	</div><!-- /#left -->
	
<?php } elseif (is_single()){ ?>
	
	
	<?php
		$p = get_post(get_query_var('p'));
		$args = array(
			'numberposts'     => 10,
			'orderby'         => 'post_date',
			'order'           => 'DESC',
			'post_type'       => 'post',
			'exclude'         => $p->ID,
			'author'     	  => $p->post_author,
			'post_status'     => 'publish' );
		
		$sameA = get_posts( $args );
	?>
	
	
	<div id="left">
		<div class="mostComm">
			<div class="leftTtl sameauthor">От същия автор</div>
			<?php if(count($sameA) > 0){ ?>
			<ul>
				<?php foreach($sameA as $key=>$post){ 
					setup_postdata($post);
				?>
				<li <?php if($key == 9){ echo 'class="last"'; } ?>>
					<p><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></p>
					<span class="date"><?php the_time("j.m.Y"); ?></span>
				</li>
				<?php } ?>
				
				<?php if(count($sameA) > 5){ ?>
				<li class="see_all">
					<a href="<?php echo get_author_posts_url($p->post_author); ?> ">Вижте всички</a>
				</li>
				<?php } ?>
			</ul>
			<?php } else { ?>
				<i>Този автор няма други публикации освен тази, която е активна в момента...</i>
			<?php } ?>
		</div>
	</div><!-- /#left -->

<?php } ?>