<?php
/**
 * The template used to display Tag Archive pages
 *
 * @package WordPress
 * @subpackage fertig
 */

get_header(); ?>

		<section id="content" role="region">

			<?php the_post(); ?>

			<header class="page-header">
				<h1 class="page-title"><?php
					printf( __( 'Tag Archives: %s', 'fertig' ), '<span>' . single_tag_title( '', false ) . '</span>' );
				?></h1>
			</header>

			<?php rewind_posts(); ?>

			<?php get_template_part( 'loop', 'tag' ); ?>

		</section><!-- #content -->

<?php get_footer(); ?>