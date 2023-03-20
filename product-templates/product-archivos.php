<?php

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$field_names = array( 
	'product_files_3d'		=> __( 'Ficheros 3D', 'nortek' ),
	'product_files_pdf'		=> __( 'Ficheros PFD', 'nortek' ),
);
?>

<div id="downloads"></div>

<?php foreach ( $field_names as $field_name => $label ) {

	if ( have_rows( $field_name ) ) {
		?>

		<div class="col-lg-6">

			<div class="wrapper" id="<?php echo $field_name; ?>">

				<h2><?php echo $label; ?></h2>

				<ul class="list-group list-group-flush">

					<?php while ( have_rows( $field_name ) ) { the_row(); 
						
						$file_id = get_sub_field( 'product_file' );
						?>

						<li class="list-group-item p-0">
							<a class="btn btn-block btn-link btn-download" href="<?php echo wp_get_attachment_url( $file_id ); ?>" target="_blank"><?php echo get_the_title( $file_id ); ?></a>
						</li>

					<?php } ?>

				</ul>

			</div>

		</div>

	<?php } 
	
} ?>