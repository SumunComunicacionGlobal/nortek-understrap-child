<?php

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$field_name = 'product_order_info';
$content = get_field( $field_name );
?>

<div class="col-12">

	<?php if ( $content ) {

		// $label = get_field_object( $field_name )['label'];
		$label = __( 'Información para el pedido', 'nortek' );
		?>

		<div class="wrapper" id="order-info">

			<h2><?php echo $label; ?></h2>

			<?php echo $content; ?>

		</div>

	<?php }

	$field_name = 'product_accesories';
	$content = get_field( $field_name );

	if ( $content ) {

		// $label = get_field_object( $field_name )['label'];
		$label = __( 'Accesorios', 'nortek' );
		?>

		<div class="wrapper" id="accesories">

			<h2><?php echo $label; ?></h2>

			<?php echo $content; ?>

		</div>

	<?php } ?>

</div>