<?php
/**
 * @package WordPress
 * @subpackage fertig
 */

get_header(); ?>

		<div id="content">

			<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> role="article">
					<?php edit_post_link( __( 'Edit', 'fertig' ), '<span class="edit-link">', '</span>' ); ?>

					<header class="entry-header">
						<h1 class="entry-title"><?php the_title(); ?></h1>
					</header><!-- .entry-header -->

					<div class="entry-content">
						<?php the_content(); ?>
						<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'fertig' ), 'after' => '</div>' ) ); ?>
					</div><!-- .entry-content -->

					<footer class="entry-meta">
						<?php if ( have_comments() || $post->comment_status == 'open' ) : ?><div class="bar">
							<?php comments_popup_link( __( 'Leave a comment', 'fertig' ), __( '1 Comment', 'fertig' ), __( '% Comments', 'fertig' ) ); ?>
						</div><?php endif; ?>

						<ul>
							<li>
								<h6><?php _e( 'In', 'fertig' ); ?></h6>
								<?php the_category( ', ' ); ?>
							</li>
							<?php the_tags( '<li><h6>' . __( 'Tagged', 'fertig' ) . '</h6>', ', ', ' </li>' ); ?>
							<li class="author-date">
								<h6><?php _e( 'By', 'fertig' ); ?></h6>
								<?php
									printf( __( '<span class="author vcard"><a class="url fn n" href="%1$s" title="%2$s">%3$s</a></span>', 'fertig' ),
										get_author_posts_url( get_the_author_meta( 'ID' ) ),
										sprintf( esc_attr__( 'View all posts by %s', 'fertig' ), get_the_author() ),
										get_the_author()
									);
								?>
								<h6><?php _e( 'On', 'fertig' ); ?></h6>
								<?php
									printf( __( '<a href="%1$s" rel="bookmark"><time class="entry-date" datetime="%2$s" pubdate>%3$s</time></a>', 'fertig' ),
										get_permalink(),
										get_the_date( 'c' ),
										get_the_date()
									);
								?>
							</li>
						</ul>
					</footer><!-- #entry-meta -->

				</article><!-- #post-<?php the_ID(); ?> -->

				<?php if (posts_nav_link () ) : ?>
					<nav id="post-nav" role="article"><ul>
						<li class="first"><?php previous_post_link( '%link', '' . _x( '', 'Previous post link', 'fertig' ) . '◀' ); ?></li>
						<li class="last"><?php next_post_link( '%link', '▶' . _x( '', 'Next post link', 'fertig' ) . '' ); ?></li>
					</ul></nav><!-- #post-nav -->
				<?php endif; ?>

				<?php comments_template( '', true ); ?>

			<?php endwhile; // end of the loop. ?>

		</div><!-- #content -->

<?php get_footer(); ?>