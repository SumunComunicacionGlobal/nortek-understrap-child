<?php
/**
 * Header Navbar (bootstrap4)
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$navbar_class = 'navbar-dark';

if ( is_page() ) {
	$navbar_bg = get_post_meta( get_the_ID(), 'navbar_bg', true );

	switch ($navbar_bg) {
		case 'navbar-light':
			$navbar_class = 'bg-light navbar-light';
			break;
		
		default:
			$navbar_class = 'navbar-dark';
		break;
	}
}  elseif( is_search() || is_404() || is_singular( 'product' ) ) {
	$navbar_class = 'bg-primary navbar-dark';	
}
?>

<nav id="main-nav" class="navbar navbar-expand-lg <?php echo $navbar_class; ?>" aria-labelledby="main-nav-label">

	<p id="main-nav-label" class="screen-reader-text">
		<?php esc_html_e( 'Main Navigation', 'understrap' ); ?>
	</p>



		<!-- Your site title as branding in the menu -->
		<?php if ( file_exists( get_stylesheet_directory() . '/img/logo-dark.svg' ) && file_exists( get_stylesheet_directory() . '/img/logo-light.svg' ) ) { ?>
			
			<a class="navbar-brand" rel="home" href="<?php echo esc_url( home_url( '/' ) ); ?>" itemprop="url">
				<img class="logo-dark" src="<?php echo get_stylesheet_directory_uri(); ?>/img/logo-dark.svg" alt="<?php bloginfo( 'name' ); ?>" />
				<img class="logo-light" src="<?php echo get_stylesheet_directory_uri(); ?>/img/logo-light.svg" alt="<?php bloginfo( 'name' ); ?>" />
			</a>

		<?php } elseif( file_exists( get_stylesheet_directory() . '/img/logo-nortek-fluids-technology-blanco.svg' ) ) { ?>
			
			<a class="navbar-brand" rel="home" href="<?php echo esc_url( home_url( '/' ) ); ?>" itemprop="url">
				<img class="logo-dark" src="<?php echo get_stylesheet_directory_uri(); ?>/img/logo-nortek-fluids-technology-blanco.svg" width="196" height="69" alt="<?php bloginfo( 'name' ); ?>" />
			</a>

		<?php } elseif ( ! has_custom_logo() ) { ?>
			
			<?php if ( is_front_page() && is_home() ) : ?>

				<h1 class="navbar-brand mb-0"><a rel="home" href="<?php echo esc_url( home_url( '/' ) ); ?>" itemprop="url"><?php bloginfo( 'name' ); ?></a></h1>

			<?php else : ?>

				<a class="navbar-brand" rel="home" href="<?php echo esc_url( home_url( '/' ) ); ?>" itemprop="url"><?php bloginfo( 'name' ); ?></a>

			<?php endif; ?>

		<?php
		} else {
			the_custom_logo();
		}
		?>
		<!-- end custom logo -->

		<button class="navbar-toggler" type="button" data-toggle="modal" data-target="#modal-menu" aria-label="<?php esc_attr_e( 'Toggle navigation', 'understrap' ); ?>">
			<span class="navbar-toggler-icon navbar-animated-toggler">
				<span class="slot slot-1"></span>
				<span class="slot slot-2"></span>
			</span>
		</button>

		<!-- The WordPress Menu goes here -->
		<?php
		wp_nav_menu(
			array(
				'theme_location'  => 'primary',
				'container_class' => 'collapse navbar-collapse',
				// 'container_id'    => 'navbarNavDropdown',
				'menu_class'      => 'navbar-nav ml-auto mt-1 mt-lg-0',
				'fallback_cb'     => '',
				'menu_id'         => 'desktop-menu',
				// 'depth'           => 2,
				// 'walker'          => new Understrap_WP_Bootstrap_Navwalker(),
			)
		);
		?>

</nav><!-- .site-navigation -->
