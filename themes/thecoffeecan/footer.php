<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package The_Coffee_Can
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer">
		<div class="site-info">
			<div>
				<h1>Address</h1>
				<p>
					28 Michaelangelo Drive
					<br>
					Redlynch QLD
				</p>
			</div>
			<div>
				<h1>Connect with us</h1>
				<?php if ( function_exists('cn_social_icon') ) echo cn_social_icon(); ?>
			</div>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
