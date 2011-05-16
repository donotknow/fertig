<?php
/**
 * @package WordPress
 * @subpackage fertig
 */

get_header(); ?>

		<div id="content">

			<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

				<?php echo posts_nav_link(); ?>
				<?php if (posts_nav_link() ) : ?>
					<nav id="nav-above" role="article">
						<h1 class="section-heading"><?php _e( 'Post navigation', 'fertig' ); ?></h1>
						<div class="nav-previous"><?php previous_post_link( '%link', '<span class="meta-nav">' . _x( '&larr;', 'Previous post link', 'fertig' ) . '</span> %title' ); ?></div>
						<div class="nav-next"><?php next_post_link( '%link', '%title <span class="meta-nav">' . _x( '&rarr;', 'Next post link', 'fertig' ) . '</span>' ); ?></div>
					</nav><!-- #nav-above -->
				<?php endif; ?>

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
						<div class="comment">
							<?php
								printf( __( '<a href="%1$s" title="Permalink to %2$s" rel="bookmark">%2$s</a> § ', 'fertig' ),
									get_permalink(),
									the_title_attribute( 'echo=0' )
								);
								comments_popup_link( __( 'Leave a comment', 'fertig' ), __( '1 Comment', 'fertig' ), __( '% Comments', 'fertig' ) );
							?>
						</div>
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
					<nav id="nav-below" role="article">
						<h1 class="section-heading"><?php _e( 'Post navigation', 'fertig' ); ?></h1>
						<div class="nav-previous"><?php previous_post_link( '%link', '<span class="meta-nav">' . _x( '&larr;', 'Previous post link', 'fertig' ) . '</span> %title' ); ?></div>
						<div class="nav-next"><?php next_post_link( '%link', '%title <span class="meta-nav">' . _x( '&rarr;', 'Next post link', 'fertig' ) . '</span>' ); ?></div>
					</nav><!-- #nav-below -->
				<?php endif; ?>

				<?php comments_template( '', true ); ?>

			<?php endwhile; // end of the loop. ?>

		</div><!-- #content -->

<?php get_footer(); ?>