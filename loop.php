<?php
/**
 * @package WordPress
 * @subpackage fertig
 */
?>

<?php /* Start the Loop */ ?>
<?php while ( have_posts() ) : the_post(); ?>

	<?php get_template_part('summary', get_post_type( $post ) ); ?>

<?php endwhile; ?>

<?php /* Display navigation to next/previous pages when applicable */ ?>
<?php if (  $wp_query->max_num_pages > 1 ) : ?>
	<nav id="post-nav" role="article"><ul>
		<li class="first"><?php next_posts_link( __( '◀', 'fertig' ) ); ?></li>
		<li class="last"><?php previous_posts_link( __( '▶', 'fertig' ) ); ?></li>
	</ul></nav><!-- #post-nav -->
<?php endif; ?>
