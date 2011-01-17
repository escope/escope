<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content
 * after.  Calls sidebar-footer.php for bottom widgets.
 *
 * @package WordPress
 * @subpackage eScope
 * @since eScope 1.0
 */
?>

<div id="footer">
				<a href="<?php bloginfo('url'); ?>" class="logo"></a>
				<span class="copy">© 2011 Всички права запазени</span>
				<ul id="authors">
					<li>
						<a href="#" style="background-image:url(images/galio.gif);"><span></span></a>
						<p class="name"><strong>Галин Кючуков</strong></p>
						<p>Създател</p>
						<p>Редактор</p>
						<p>Тех. поддръжка</p>
					</li>
					<li>
						<a href="#" style="background-image:url(images/ppenev.gif);"><span></span></a>
						<p class="name"><strong>Преслав Пенев</strong></p>
						<p>Създател</p>
						<p>Гл. Редактор</p>
					</li>
				</ul>	
			</div><!-- /#footer -->
			
			<div class="cleaner"></div>
		</div><!-- /#center -->
		<script type="text/javascript" src="<?php bloginfo( 'template_url' ); ?>/js/escope.js"></script>
		<?php if (is_single()){
				$haveCode = get_post_meta($post->ID, 'code', true);
				if($haveCode){
		?>
			<script type="text/javascript" src="<?php bloginfo( 'template_url' ); ?>/js/code/shCore.js"></script>
			<script type="text/javascript" src="<?php bloginfo( 'template_url' ); ?>/js/code/shBrushPlain.js"></script>
			<script type="text/javascript" src="<?php bloginfo( 'template_url' ); ?>/js/code/shBrushXml.js"></script>
			<script type="text/javascript" src="<?php bloginfo( 'template_url' ); ?>/js/code/shBrushCss.js"></script>
			<script type="text/javascript" src="<?php bloginfo( 'template_url' ); ?>/js/code/shBrushJScript.js"></script>
			<script type="text/javascript" src="<?php bloginfo( 'template_url' ); ?>/js/code/shBrushJScript.js"></script>
			<script type="text/javascript" src="<?php bloginfo( 'template_url' ); ?>/js/code/code.js"></script>
		<?php 
				}
			}
		?>
  </body>
</html>