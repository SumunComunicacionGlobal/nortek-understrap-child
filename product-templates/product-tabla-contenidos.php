<?php

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$sections = array();
$title = false;

$class_name = 'toc-block navbar navbar-light navbar-expand-md justify-content-center text-center p-0 p-lg-2';

if ( is_tax() || is_page_template( 'page-templates/product-archive.php' ) ) {

	$title = __( 'Seleccione tipo de producto', 'nortek' );

	if ( is_tax() ) {

		$term = get_queried_object();

		$children = get_terms( array(
			'taxonomy'			=> $term->taxonomy,
			'parent'			=> $term->term_id,
			'hide_empty'		=> false,
		) );

	} else {

		$children = get_terms( array(
			'taxonomy'			=> 'product_cat',
			'parent'			=> 0,
			'hide_empty'		=> false,
		) );

	}

	foreach( $children as $child ) {
		$sections[$child->slug] = $child->name;
	}

} elseif ( is_singular() ) {

	global $post;

	$title = __( 'Ficha de producto', 'nortek' );

	$funcionamiento = $post->post_content;
	$specification = get_field( 'product_specification' );
	$croquis = get_field( 'product_croquis' );
	$order_info = get_field( 'product_order_info' );
	$accesories = get_field( 'product_accesories' );
	$files_3d = get_field( 'product_files_3d' );
	$files_pdf = get_field( 'product_files_pdf' );

	if ( $funcionamiento ) $sections['description'] = __( 'Descripción', 'nortek' );
	if ( $specification ) $sections['specification'] = __( 'Especificaciones', 'nortek' );
	if ( $croquis ) $sections['sketch'] = __( 'Plano dimensional', 'nortek' );
	if ( $order_info ) $sections['order-info'] = __( 'Información de pedido', 'nortek' );
	if ( $accesories ) $sections['accesories'] = __( 'Accesorios', 'nortek' );
	if ( $files_3d || $files_pdf ) $sections['downloads'] = __( 'Descargas', 'nortek' );

}

if ( !$sections ) return false;

?>

<div class="<?php echo esc_attr( $class_name ); ?>">

	<div class="row align-items-center w-100">

		<div class="col-lg-5">

				<p class="h4 text-primary text-center d-none d-md-block mt-2"><?php echo $title; ?> </p>
				<button class="navbar-toggler mb-2 text-center w-100" type="button" data-toggle="collapse" data-target="#toc-collapse" aria-controls="toc-collapse" aria-expanded="false" aria-label="<?php esc_attr_e( 'Toggle navigation', 'understrap' ); ?>">
					<span class="h4 text-primary d-md-none"><?php echo $title; ?> </span>
					<span class="navbar-toggler-icon"></span>
				</button>

		</div>

		<div class="col-lg-7">

			<div class="collapse navbar-collapse" id="toc-collapse">
				
				<div class="toc-links">

					<?php foreach( $sections as $section_id => $section_title ) { ?>
				
						<a class="btn btn-primary d-block" href="#<?php echo $section_id; ?>"><?php echo $section_title; ?></a>

					<?php } ?>

					<?php  if( count( $sections ) % 2 != 0) { ?>

						<div class="toc-link-item"></div>

					<?php } ?>

				</div>

			</div>

		</div>

	</div>

</div>