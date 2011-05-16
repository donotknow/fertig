<?php
/**
 * @package WordPress
 * @subpackage fertig
 */

get_header(); ?>

		<div id="content">

			<?php the_post(); ?>

			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> role="article">
				<?php edit_post_link( __( 'Edit', 'fertig' ), '<span class="edit-link">', '</span>' ); ?>

				<header class="entry-header">
					<h1 class="entry-title"><?php the_title(); ?></h1>
				</header><!-- .entry-header -->

				<div class="entry-content">
					<?php the_content(); ?>
					<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'fertig' ), 'after' => '</div>' ) ); ?>
				</div><!-- .entry-content -->
			</article><!-- #post-<?php the_ID(); ?> -->

			<?php comments_template( '', true ); ?>

		</div><!-- #content -->

<?php get_footer(); ?>