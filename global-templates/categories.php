<?php

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$terms = get_terms( array( 
	'taxonomy' 		=> 'product_cat', 
	'parent' 		=> 0, 
	'hide_empty' 	=> false,
) );

if ( $terms ) { ?>

	<div class="categories">

		<div class="row">

			<?php foreach ( $terms as $key => $term ) { ?>

				<div class="category col-6 col-sm-4 col-md-3 col-lg-2 col-xl mb-2" id="<?php echo $term->slug; ?>">

						<?php $thumbnail_id = get_term_meta( $term->term_id, 'thumbnail_id', true );

						if ( !$thumbnail_id ) {
							$thumbnail_id = smn_get_first_product_image_id( $term->term_id );
						}

						if ( $thumbnail_id ) {

							echo wp_get_attachment_image( $thumbnail_id, 'medium_large', false, array( 'class' => '' ) );
					
						} else {
							
							echo '<div class="has-not-image"></div>';
							
						}
						?>

					<p class="category-title"><a class="stretched-link" href="<?php echo get_term_link( $term ); ?>" title="<?php echo $term->name; ?>"><?php echo $term->name; ?></a></p>

				</div>

			<?php } ?>

		</div>

	</div>

<?php } ?>