<?php
/**
 * @package WordPress
 * @subpackage fertig
 */

get_header(); ?>

		<section id="content" role="region">

			<?php the_post(); ?>

			<header class="page-header">
				<h1 class="page-title author"><?php printf( __( 'Author Archives: <span class="vcard">%s</span>', 'fertig' ), "<a class='url fn n' href='" . get_author_posts_url( get_the_author_meta( 'ID' ) ) . "' title='" . esc_attr( get_the_author() ) . "' rel='me'>" . get_the_author() . "</a>" ); ?></h1>
			</header>

			<?php rewind_posts(); ?>

			<?php get_template_part( 'loop', 'author' ); ?>

		</section><!-- #content -->

<?php get_footer(); ?>