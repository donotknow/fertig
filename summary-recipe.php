<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> role="article">
	<?php $info = recipe_info(); ?>

	<?php edit_post_link( __( 'Edit', 'fertig' ), '<span class="edit-link">', '</span>' ); ?>

	<header class="entry-header">
		<h1 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'fertig' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h1>
	</header><!-- .entry-header -->

	<div class="entry-summary">
		<?php the_excerpt(); ?>
	</div><!-- .entry-summary -->

	<footer class="entry-meta">
		<ul>
			<?php if ($info['yield']) : ?><li class="yield">
				<h6><?php _e( 'Yields', 'fertig' ); ?></h6>
				<?php print_r($info['yield']); ?>  servings
			</li><?php endif; ?>

			<?php if ($info['preptime']) : ?><li class="preptime">
				<h6><?php _e( 'Prep time', 'fertig' ); ?></h6>
				<?php print_r($info['preptime']); ?>
			</li><?php endif; ?>

			<?php if ($info['cooktime']) : ?><li class="cooktime">
				<h6><?php _e( 'Cook time', 'fertig' ); ?></h6>
				<?php print_r($info['cooktime']); ?>
			</li><?php endif; ?>

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
					printf( __( '<a href="%1$s" rel="bookmark"><time class="entry-date published" datetime="%2$s" pubdate>%3$s</time></a>', 'fertig' ),
						get_permalink(),
						get_the_date( 'c' ),
						get_the_date()
					);
				?>
			</li>
		</ul>

		<div class="bar selfclear">

			<?php if ( have_comments() || $post->comment_status == 'open' ) : ?><div class="comment">
				<?php comments_popup_link( __( 'Leave a comment', 'fertig' ), __( '1 Comment', 'fertig' ), __( '% Comments', 'fertig' ) ); ?>
			</div><?php endif; ?>

			<?php if ($info['url']) : ?><div class="source">
				<h6>From</h6>
				<?php echo $info['url']; ?>
			</div><?php endif; ?>

		</div><!-- .bar-->

		<?php print_r($info['rating']); ?>

		<ul>
			<?php the_terms( $post->ID, 'meal', '<li><h6>Meal type</h6>', ', ', ' </li>' ); ?>
			<?php the_terms( $post->ID, 'diet', '<li><h6>Diet Type</h6>', ', ', ' </li>' ); ?>
			<?php the_terms( $post->ID, 'culinary', '<li><h6>Culinary Tradition</h6>', ', ', ' </li>' ); ?>
			<?php the_terms( $post->ID, 'ingredients', '<li><h6>Major Ingredients</h6>', ', ', ' </li>' ); ?>
		</ul>
	</footer><!-- #entry-meta -->
</article><!-- #post-<?php the_ID(); ?> -->

<?php comments_template( '', true ); ?>
