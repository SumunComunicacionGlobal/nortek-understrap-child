<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$container = get_theme_mod( 'understrap_container_type' );
?>

<?php get_template_part( 'sidebar-templates/sidebar', 'prefooter' ); ?>

<?php get_template_part( 'sidebar-templates/sidebar', 'footerfull' ); ?>

<div class="wrapper" id="wrapper-footer">

	<div class="<?php echo esc_attr( $container ); ?>">

		<div class="row align-items-center">

			<div class="col-md-3 col-xl-2">

				<footer class="site-footer" id="colophon">

					<div class="site-info">

						<?php understrap_site_info(); ?>

					</div><!-- .site-info -->

				</footer><!-- #colophon -->

			</div><!--col end -->

			<div class="col-md-9 col-xl-10">

				<nav id="legal-nav" class="navbar navbar-expand navbar-light" aria-labelledby="legal-nav-label">

					<p id="legal-nav-label" class="screen-reader-text">
						<?php esc_html_e( 'Legal Navigation', 'understrap' ); ?>
					</p>

					<?php wp_nav_menu( array(
						'theme_location'		  => 'legal',
						'container_class' => 'collapse navbar-collapse navbar-light',
						'container_id'    => 'navbarLegal',
						'menu_class'      => 'navbar-nav mx-auto mr-md-0 flex-wrap justify-content-center justify-content-md-end',
						'fallback_cb'     => '',
						'menu_id'         => 'legal-menu',
						'depth'           => 1,
						'walker'          => new Understrap_WP_Bootstrap_Navwalker(),
					) ); ?>

				</nav>

			</div><!--col end -->

		</div><!-- row end -->

	</div><!-- container end -->

</div><!-- wrapper end -->

</div><!-- #page we need this extra closing tag here -->

<?php wp_footer(); ?>

</body>

</html>

