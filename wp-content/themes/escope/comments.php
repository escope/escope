<?php
/**
 * The template for displaying Comments.
 *
 * The area of the page that contains both current comments
 * and the comment form.  The actual display of comments is
 * handled by a callback to twentyten_comment which is
 * located in the functions.php file.
 *
 * @package WordPress
 * @subpackage eScope
 * @since eScope 1.0
 */
?>

<div class="comments">

	<?php if ( post_password_required() ) : ?>
				<p class="nopassword"><?php _e( 'This post is password protected. Enter the password to view any comments.', 'twentyten' ); ?></p>
			</div><!-- #comments -->
	<?php
			/* Stop the rest of comments.php from being processed,
			 * but don't kill the script entirely -- we still have
			 * to fully load the template.
			 */
			return;
		endif;
	?>

	<h3>Коментари за <strong><?php the_title(); ?></strong></h3>
	
	<?php if ( have_comments() ) : ?>
	<p class="comments_count">
		<?php
			printf( _n( '1 коментар', '%1$s коментара', get_comments_number(), 'twentyten' ),
			number_format_i18n( get_comments_number() ), '<em>' . get_the_title() . '</em>' );
		?>
	</p>
	
	<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
		<div class="navigation">
			<div class="nav-previous"><?php previous_comments_link( __( '<span class="meta-nav">«</span> По - стари', 'twentyten' ) ); ?></div>
			<div class="nav-next"><?php next_comments_link( __( 'По - нови <span class="meta-nav">»</span>', 'twentyten' ) ); ?></div>
		</div> <!-- .navigation -->
	<?php endif; // check for comment navigation ?>
	
	<?php 
		$defaults = array(
		'order' => 'DESC',
		'post_id' => get_the_ID(),
		'status' => 'approve'
		); 
	?>
	
	<?php $comments = get_comments($defaults); ?> 
	
	<?php foreach($comments as $comment){ ?>
	
		<div class="comment">
			<div class="commenTitle">
				<?php if($comment->comment_author_url) { ?>
					<a href="<?php echo $comment->comment_author_url; ?>" class="name"><?php echo $comment->comment_author; ?></a>
				<?php } else { ?>
					<h5 class="name"><?php echo $comment->comment_author; ?></h5>
				<?php } ?>
				<span class="date"><?php echo $comment->comment_date; ?></span>
			</div>
			<?php echo $comment->comment_content; ?>
		</div>
	
	<?php } ?>
		
		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
			<div class="navigation">
				<div class="nav-previous"><?php previous_comments_link( __( '<span class="meta-nav">«</span> По - стари', 'twentyten' ) ); ?></div>
				<div class="nav-next"><?php next_comments_link( __( 'По - нови <span class="meta-nav">»</span>', 'twentyten' ) ); ?></div>
			</div> <!-- .navigation -->
		<?php endif; // check for comment navigation ?>
		
		<?php else : // or, if we don't have comments:

		/* If there are no comments and comments are closed,
		 * let's leave a little note, shall we?
		 */
		if ( ! comments_open() ){
	?>
		
		<p class="nocomments"><?php _e( 'Comments are closed.', 'twentyten' ); ?></p>
	<?php } else { // end ! comments_open() ?>
		<p class="comments_count">0 коментара</p>
	<?php } ?>
	
	<?php endif; // end have_comments() ?>
	
	
	
	<?php
$fields =  array(
	'author' => '<label for="author">' . __( 'Име' ) . '</label> ' . ( $req ? '' : '' ) .
	            '<input id="author" name="author" class="fld" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" ' . $aria_req . ' />',
	'email'  => '<label for="email">' . __( 'Email' ) . '</label> ' . ( $req ? '' : '' ) .
	            '<input id="email" name="email" class="fld" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" ' . $aria_req . ' />',
	'url'    => '<label for="url">' . __( 'Website' ) . '</label>' .
	            '<input id="url" name="url" class="fld" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) . '" />',
); ?>
	
	
	<?php $defaults = array(
	'fields'               => apply_filters('comment_form_default_fields', $fields ),
	'comment_field'        => '<label for="comment">' . _x( 'Коментар', 'noun' ) . '</label><textarea id="comment" name="comment" cols="45" rows="8" aria-required="true"></textarea> <div class="cleaner"></div>',
	'must_log_in'          => '<p class="must-log-in">' .  sprintf( __( 'You must be <a href="%s">logged in</a> to post a comment.' ), wp_login_url( apply_filters( 'the_permalink', get_permalink( $post_id ) ) ) ) . '</p>',
	'logged_in_as'         => '<p class="logged-in-as">' . sprintf( __( 'Logged in as <a href="%1$s">%2$s</a>. <a href="%3$s" title="Log out of this account">Log out?</a>' ), admin_url( 'profile.php' ), $user_identity, wp_logout_url( apply_filters( 'the_permalink', get_permalink( $post_id ) ) ) ) . '</p>',
	'comment_notes_before' => '<p class="comment-notes">' . __( 'Email адреса няма да бъде видим никъде в сайта.' ) . ( $req ? $required_text : '' ) . '</p>',
	'comment_notes_after'  => '<p class="form-allowed-tags">' . sprintf( __( 'Разрешени <abbr title="HyperText Markup Language">HTML</abbr> тагове и свойства: %s' ), ' <code>' . allowed_tags() . '</code>' ) . '</p>',
	'id_form'              => 'commentform',
	'id_submit'            => 'submit',
	'title_reply'          => '',
	'title_reply_to'       => '',
	'cancel_reply_link'    => __( 'Cancel reply' ),
	'label_submit'         => __( 'Публикувай' )
);
?>



	
	
	
	<div class="cFormTitle">
		Напиши коментар
	</div>
	<?php comment_form($defaults); ?>
	
</div><!-- /.comments -->