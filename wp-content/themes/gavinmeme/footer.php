<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package GavinMeMe
 */

?>

</div><!-- #content -->

<footer id="colophon" class="site-footer">

    <div class="back-to-head">
        <a href="#top" class="back-link">
            <span>▲</span>
        </a>
    </div>
    <div class="site-info">
        <a class="footer-title" href="<?php echo esc_url( __( 'http://localhost:8080/gavin/', 'gavinmeme' ) ); ?>"><?php
			/* translators: %s: CMS name, i.e. WordPress. */
			printf( 'GAVIN' );
			?></a>

		<div class="footer-content">
            <span class="copy-right">&nbsp;COPYRIGHT &copy; 2017</span>
			<?php
			/* translators: 1: Theme name, 2: Theme author. */
			printf( esc_html__( '%1$s. THEME BY %2$s.', 'gavinmeme' ), '&nbsp;<a class="footer-link-main" href="http://localhost:8080/gavin/">GAVIN</a>', '&nbsp;<a class="footer-author" href="http://localhost:8080/gavin/author/ducviet/">' . get_the_author(). '</a>' );
			?>
			<?php
			wp_nav_menu( array(
				'theme_location' => 'menu-footer',
				'menu_id'        => 'footer-menu',
			) );
			?>
        </div>
    </div><!-- .site-info -->
</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
