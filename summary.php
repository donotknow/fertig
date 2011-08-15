<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> role="article">
	<?php edit_post_link( __( 'Edit', 'fertig' ), '<span class="edit-link">', '</span>' ); ?>

	<header class="entry-header">
		<h1 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'fertig' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h1>
	</header><!-- .entry-header -->

	<?php if ( is_archive() || is_search() ) : // Only display Excerpts for archives & search ?>
	<div class="entry-summary">
		<?php the_excerpt(); ?>
	</div><!-- .entry-summary -->
	<?php else : ?>
	<div class="entry-content">
		<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'fertig' ) ); ?>
		<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'fertig' ), 'after' => '</div>' ) ); ?>
	</div><!-- .entry-content -->
	<?php endif; ?>

	<footer class="entry-meta">
		<?php if ( have_comments() || $post->comment_status == 'open' ) : ?><div class="bar selfclear bar-comment"><div class="comment">
			<?php comments_popup_link( __( 'Leave a comment', 'fertig' ), __( '1 Comment', 'fertig' ), __( '% Comments', 'fertig' ) ); ?>
		</div></div><?php endif; ?>
		<ul>
			<?php if (get_the_category()) : ?><li>
				<h6><?php _e( 'In', 'fertig' ); ?></h6>
				<?php the_category( ', ' ); ?>
			</li><?php endif; ?>
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

<?php comments_template( '', true ); ?>
