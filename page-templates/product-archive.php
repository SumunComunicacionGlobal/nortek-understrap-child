<?php
/**
 * Template Name: Archivo de Productos
 *
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();
$container = get_theme_mod( 'understrap_container_type' );

if ( is_front_page() ) {
	get_template_part( 'global-templates/hero' );
}
?>

<div class="wrapper" id="full-width-page-wrapper">

	<div class="<?php echo esc_attr( $container ); ?>" id="content">

		<div class="row">

			<div class="col-md-12 content-area" id="primary">

				<main class="site-main" id="main" role="main">

					<?php
					while ( have_posts() ) {
						the_post(); ?>

						<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

							<div class="entry-content">

								<?php if ( !is_front_page() ) get_template_part( 'global-templates/image-header' ); ?>

								<?php get_template_part( 'product-templates/product-cat-description' ); ?>

								<?php get_template_part( 'product-templates/product-tabla-contenidos' ); ?>

								<?php
								the_content();
								understrap_link_pages();
								?>

							</div><!-- .entry-content -->

							<footer class="entry-footer">

								<?php understrap_edit_post_link(); ?>

							</footer><!-- .entry-footer -->

						</article><!-- #post-## -->

					<?php } ?>

				</main><!-- #main -->

			</div><!-- #primary -->

		</div><!-- .row end -->

	</div><!-- #content -->

</div><!-- #full-width-page-wrapper -->

<?php
get_footer();
