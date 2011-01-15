<?php
/**
 * The Sidebar containing the primary and secondary widget areas.
 *
 * @package WordPress
 * @subpackage eScope
 * @since eScope 1.0
 */
?>

<?php
	$args = array(
			'type'                     => 'post',
			'parent'                   => 0,
			'orderby'                  => 'name',
			'order'                    => 'ASC',
			'hide_empty'               => 0,
			'hierarchical'             => 0,
			'taxonomy'                 => 'category',
			'pad_counts'               => false );
			
	$categories = get_categories($args);
	
?>

<div id="right">
				<a href="<?php bloginfo('rss2_url'); ?>" class="rss"></a>
				<a href="#" class="fb"></a>
				
				<div id="nav">
					<h3 class="rightTtl">Категории</h3>
					<ul class="mainLevel">
						<?php foreach($categories as $category){  ?>
						<li class="mainLi"><a href="<?php echo get_category_link( $category->term_id ); ?>"><?php echo $category->cat_name; ?></a></li>
						
						<?php
							$args = array(
									'type'                     => 'post',
									'parent'                   => $category->term_id,
									'orderby'                  => 'name',
									'order'                    => 'ASC',
									'hide_empty'               => 0,
									'hierarchical'             => 0,
									'taxonomy'                 => 'category',
									'pad_counts'               => false );
									
							$subcategories = get_categories($args);
							if(count($subcategories)>0){
						?>
						
								<ul class="downLevel">
									<?php foreach($subcategories as $subcategory){  ?>
										<li class="downLi"><a href="<?php echo get_category_link( $subcategory->term_id ); ?>"><?php echo $subcategory->cat_name; ?></a></li>
									<?php } ?>
								</ul>
						
							<?php } ?>
						
						<?php } ?>
						
					</ul>
				</div><!-- /#nav -->
				
				<?php
					$args = array(
							'type'            => 'monthly',
							'limit'           => 12,
							'format'          => 'html',
							'show_post_count' => false,
							'echo'            => 1 );
				?>
				
				<div id="archieve">
					<h3 class="rightTtl">Архив</h3>
					<ul>
						<?php wp_get_archives($args); ?>
					</ul>
				</div><!-- /#archieve -->
				
				<?php
						$args = array(
						'orderby'          => 'name',
						'order'            => 'ASC',
						'limit'            => -1,
						'hide_invisible'   => 1,
						'show_updated'     => 0,
						'echo'             => 1,
						'categorize'       => 0,
						'title_li'         => 0,
						'title_before'     => '<h2>',
						'title_after'      => '</h2>',
						'category_orderby' => 'name',
						'category_order'   => 'ASC',
						'class'            => 'linkcat',
						'category_before'  => '<li id=%id class=%class>',
						'category_after'   => '</li>' );
				?>
				
				<div id="blogroll">
					<h3 class="rightTtl">Връзки</h3>
					<ul>
						<?php wp_list_bookmarks($args); ?>
					</ul>
				</div><!-- /#blogroll -->
				
			</div><!-- /#right -->