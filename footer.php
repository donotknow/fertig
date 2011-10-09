<?php
/**
 * @package WordPress
 * @subpackage fertig
 */
?>

	</div><!-- #main  -->

	<div id="footer" class="widget-area selfclear">

		<?php if (!dynamic_sidebar( 'footer-widgets' )) : ?>
			<aside id="categories" class="widget" role="complementary">
				<h2 class="widget-title"><?php _e( 'Categories', 'fertig' ); ?></h2>
				<ul>
					<?php wp_list_categories( array( 'title_li' => '' ) ); ?> 
				</ul>
			</aside>

			<aside id="archives" class="widget" role="complementary">
				<h2 class="widget-title"><?php _e( 'Archives', 'fertig' ); ?></h2>
				<ul>
					<?php wp_get_archives( array( 'type' => 'monthly' ) ); ?>
				</ul>
			</aside>

			<aside id="meta" class="widget" role="complementary">
				<h2 class="widget-title"><?php _e( 'Meta', 'fertig' ); ?></h2>
				<ul>
					<?php wp_register(); ?>
					<aside role="complementary"><?php wp_loginout(); ?></aside>
					<?php wp_meta(); ?>
				</ul>
			</aside>
		<?php endif; // end sidebar widget area ?>

	</div><!-- #footer .widget-area -->

	<footer id="colophon" role="contentinfo" class="selfclear">
		<div id="site-generator">
			<p class="generator"><?php _e( 'Proudly powered by ', 'fertig' ); ?><a rel="generator" href="http://wordpress.org/" title="<?php esc_attr_e( 'A Semantic Personal Publishing Platform', 'fertig' ); ?>"><?php _e( 'WordPress', 'fertig' ); ?></a>.</p>
			<p class="license">Content licensed under <span class="cc-icons">c</span> <a rel="license" href="http://creativecommons.org/licenses/by-sa/3.0/">Creative Commons Attribution Share Alike</a>, unless otherwise noted.</p>
		</div>
	</footer><!-- #colophon -->

</div><!-- #page -->

<!-- Grab Google CDN's jQuery. Fall back to local if necessary -->
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
<script>!window.jQuery && document.write(unescape('%3Cscript src="//ajax.aspnetcdn.com/ajax/jQuery/jquery-1.6.2.min.js"%3E%3C/script%3E'))</script>
<script>!window.jQuery && document.write(unescape('%3Cscript src="//code.jquery.com/jquery-1.6.2.min.js"%3E%3C/script%3E'))</script>

<?php wp_footer(); ?>

</body>
</html>
