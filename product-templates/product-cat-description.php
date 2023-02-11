<?php

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if ( is_page_template( 'page-templates/product-archive.php' ) ) {
	$description = wpautop( $post->post_excerpt );
} else {
	$description = term_description();
}

if ( !$description ) return false;

$pdf = get_term_meta( get_queried_object_id(), 'pdf', true );

if ( $pdf ) {
	$description .= '<p><a class="btn btn-outline-primary mr-2 mb-2" href="'. wp_get_attachment_url( $pdf ).'">'. __( 'Hoja de datos', 'nortek' ) .'</a></p>';
}

?>

<div class="wp-block-group alignfull rich-term-description">

	<div class="wp-block-group__inner-container">

		<div class="row align-items-center">

			<div class="col-md-6 mb-3 mb-md-0">

				<?php echo $description; ?>
			
			</div>

			<div class="col-md-6">

				<?php smn_reusable_block( 391 ); ?>

			</div>
			
		</div>		

	</div>		

</div>