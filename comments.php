<?php
/**
 * @package WordPress
 * @subpackage fertig
 */

if ( ! function_exists( 'fertig_comment' ) ) :
/**
 * Template for comments and pingbacks.
 *
 * To override this walker in a child theme without modifying the comments template
 * simply create your own fertig_comment(), and that function will be used instead.
 *
 * Used as a callback by wp_list_comments() for displaying the comments.
 *
 * @since HandcraftedWP 0.4
 */
function fertig_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case '' :
	?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
		<article id="comment-<?php comment_ID(); ?>" class="comment" role="article">
			<?php comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
			<?php edit_comment_link( __( 'Edit', 'fertig' ), ' ' ); ?>

			<footer class="selfclear">
				<div class="comment-author vcard">
					<?php echo get_avatar( $comment, 40 ); ?>
					<?php printf( __( '%s', 'fertig' ), sprintf( '<cite class="fn">%s</cite>', get_comment_author_link() ) ); ?>
				</div><!-- .comment-author .vcard -->
				<?php if ( $comment->comment_approved == '0' ) : ?>
					<em><?php _e( 'Your comment is awaiting moderation.', 'fertig' ); ?></em>
					<br />
				<?php endif; ?>

				<div class="comment-meta commentmetadata">
					<a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>"><time pubdate datetime="<?php comment_time( 'c' ); ?>">
					<?php
						/* translators: 1: date, 2: time */
						printf( __( '<span>On</span> %1$s <span>at</span> %2$s', 'fertig' ), get_comment_date(),  get_comment_time() ); ?>
					</time></a>
				</div><!-- .comment-meta .commentmetadata -->
			</footer>

			<div class="comment-body"><?php comment_text(); ?></div>

		</article><!-- #comment-##  -->

	<?php
			break;
		case 'pingback'  :
		case 'trackback' :
	?>
	<li class="post pingback">
		<p><?php _e( 'Pingback:', 'fertig' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( __('(Edit)', 'fertig'), ' ' ); ?></p>
	<?php
			break;
	endswitch;
}
endif; // ends check for fertig_comment()

?>

<div id="comments">

		<?php if ( post_password_required() ) : ?>
		<div class="responses">
			<div class="nopassword"><?php _e( 'This post is password protected. Enter the password to view any comments.', 'fertig' ); ?></div>
		</div></div><!-- .responses#comments -->
		<?php return;
			endif;
		?>

		<?php // You can start editing here -- including this comment! ?>

	<?php if ( have_comments() ) : ?>
		<div class="responses">
			<h2 id="comments-title">
				<?php
				    printf( _n( 'One Response to %2$s', '%1$s Responses to %2$s', get_comments_number(), 'fertig' ),
				        number_format_i18n( get_comments_number() ), '<em>' . get_the_title() . '</em>' );
				?>
			</h2>

		<ol class="commentlist">
			<?php wp_list_comments( array( 'callback' => 'fertig_comment' ) ); ?>
		</ol>

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
		<nav id="comment-nav-below" role="article">
			<h1 class="section-heading"><?php _e( 'Comment navigation', 'fertig' ); ?></h1>
			<div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'fertig' ) ); ?></div>
			<div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'fertig' ) ); ?></div>
		</nav>
		<?php endif; // check for comment navigation ?>

		</div><!-- .responses -->

	<?php endif; ?>

	<?php comment_form(); ?>

</div><!-- #comments -->
