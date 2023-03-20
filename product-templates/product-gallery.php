<?php

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$field_name = 'product_gallery';
$gallery = get_post_meta( get_the_ID(), 'product_gallery', true );

if ( !$gallery) {

	the_post_thumbnail( 'medium_large' );

} else {

	$featured = get_post_thumbnail_id( get_the_ID() );

	if ( !in_array( $featured, $gallery ) ) {
		$gallery = array_merge( array($featured), $gallery );
	}
	?>

	<div class="slick-slider slick-product-gallery">

		<?php foreach ( $gallery as $image_id ) { ?>

			<div class="gallery-slide">

				<?php echo wp_get_attachment_image( $image_id, 'medium_large' ); ?>

			</div>

		<?php } ?>

	</div>

<?php } ?>