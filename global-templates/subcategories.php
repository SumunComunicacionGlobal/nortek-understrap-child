<?php

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if ( is_tax() ) {

	$current_term = get_queried_object();

	$terms = get_terms( array( 
		'taxonomy' 		=> $current_term->taxonomy, 
		'parent' 		=> $current_term->term_id, 
		'hide_empty' 	=> false,
	) );

} else {

	$terms = get_terms( array( 
		'taxonomy' 		=> 'product_cat', 
		'parent' 		=> 0, 
		'hide_empty' 	=> false,
	) );

}

if ( $terms ) { ?>

	<div class="wrapper">

		<?php foreach ( $terms as $key => $term ) { ?>

			<div class="subcategory mb-3 pb-3 pb-lg-0" id="<?php echo $term->slug; ?>">

				<div class="position-relative">

					<div class="row subcategory-row">

						<div class="col-md-6 col-lg-4 mb-2 mb-lg-0 pr-0 subcategory-archive-image-column">

							<div class="subcategory-archive-image-wrapper">

								<?php $thumbnail_id = get_term_meta( $term->term_id, 'thumbnail_id', true );

								if ( $thumbnail_id ) {

									echo wp_get_attachment_image( $thumbnail_id, 'medium_large', false, array( 'class' => 'subcategory-archive-image has-icon-image' ) );

								} else {

									// echo '<div class="subcategory-archive-image has-not-image has-primary-60-background-color h-100 w-100"></div>';

									$thumbnail_id = smn_get_first_product_image_id( $term->term_id );
									if ( $thumbnail_id) {
										echo wp_get_attachment_image( $thumbnail_id, 'medium_large', false, array( 'class' => 'subcategory-archive-image has-product-image h-100 w-100' ) );
									} else {
										echo '<div class="subcategory-archive-image has-not-image has-primary-60-background-color h-100 w-100"></div>';
									}
								}
								?>

							</div>

						</div>

						<div class="col-md-6 col-lg-3 position-static">

							<h2><a class="stretched-link" href="<?php echo get_term_link( $term ); ?>" title="<?php echo $term->name; ?>"><?php echo $term->name; ?></a></h2>

						</div>

						<div class="col-lg-5">

							<div class="archive-term-description">

								<?php echo term_description( $term->term_id ); ?>

							</div>

							<div class="wp-block-buttons d-flex justify-content-end mb-2">
								<div class="wp-block-button is-style-arrow-link">
									<span class="wp-block-button__link"><?php echo __( 'Read more' ); ?></span>
								</div>
							</div>

						</div>

					</div>

				</div>

				<?php // smn_subterms_buttons( $term ); ?>

				<?php // smn_subterms_collapse( $term ); ?>

			</div>

		<?php } ?>

	</div>

<?php } ?>