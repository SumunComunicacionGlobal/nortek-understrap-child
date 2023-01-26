<?php

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$field_name = 'product_croquis';
$images = get_field( $field_name );

if ( !$images ) return false;

$label = get_field_object( $field_name )['label'];

?>

<div class="col-lg-6">

	<div class="wrapper" id="sketch">

		<h2><?php echo $label; ?></h2>

		<div class="slick-slider">

			<?php foreach ( $images as $image_id ) { ?>

				<div class="croquis-slide">

					<?php echo wp_get_attachment_image( $image_id, 'medium_large' ); ?>

				</div>

			<?php } ?>

		</div>

	</div>

</div>