<?php
/**
 * @package WordPress
 * @subpackage fertig
 */

get_header(); ?>

		<section id="content" role="region">

			<header class="page-header">
				<h1 class="page-title">
					<?php if ( is_day() ) : ?>
						<?php printf( __( 'Daily Archives: <span>%s</span>', 'fertig' ), get_the_date() ); ?>
					<?php elseif ( is_month() ) : ?>
						<?php printf( __( 'Monthly Archives: <span>%s</span>', 'fertig' ), get_the_date( 'F Y' ) ); ?>
					<?php elseif ( is_year() ) : ?>
						<?php printf( __( 'Yearly Archives: <span>%s</span>', 'fertig' ), get_the_date( 'Y' ) ); ?>
					<?php elseif ( is_post_type_archive() ) : ?>
						<?php post_type_archive_title(); ?>
					<?php else : ?>
						<?php _e( 'Blog Archives', 'fertig' ); ?>
					<?php endif; ?>
				</h1>
			</header>

			<?php rewind_posts(); ?>

			<?php get_template_part( 'loop', 'archive' ); ?>

		</section><!-- #content -->

<?php get_footer(); ?>