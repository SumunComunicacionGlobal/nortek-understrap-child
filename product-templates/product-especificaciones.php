<?php

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$field_name = 'product_specification';
$content = get_field( $field_name );

if ( !$content ) return false;

// $label = get_field_object( $field_name )['label'];
$label = __( 'Especificaciones', 'nortek' );

?>

<div class="wrapper" id="specification">

	<h2><?php echo $label; ?></h2>

	<?php echo $content; ?>

</div>