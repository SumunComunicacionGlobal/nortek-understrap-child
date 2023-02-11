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

							<?php $thumbnail_id = get_term_meta( $term->term_id, 'thumbnail_id', true );
							if ( $thumbnail_id ) {
								echo wp_get_attachment_image( $thumbnail_id, 'medium_large', false, array( 'class' => 'subcategory-archive-image' ) );
							} else {
								echo '<div class="subcategory-archive-image has-not-image has-primary-60-background-color h-100"></div>';
							}
							?>

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

				<?php
					$subterms = get_terms( array( 
						'taxonomy' 		=> 'product_cat', 
						'parent' 		=> $term->term_id, 
						'hide_empty' 	=> false,
					) );

					if ( !$subterms ) {
						$subterms = array( $term );
					}

					foreach( $subterms as $term )  {

						$args = array(
							'post_type'			=> 'product',
							'posts_per_page'	=> -1,
							'add_row'			=> true,
							'tax_query'			=> array( array(
													'taxonomy'			=> 'product_cat',
													'terms'				=> array( $term->term_id ),
													'include_children'	=> false,
													)),
							// 'ignore_row'		=> true,
						);

						$q = new WP_Query( $args );

						if ( $q->have_posts() ) { ?>

							<h3 class="btn btn-primary btn-block btn-collapse collapsed" data-toggle="collapse" href="#<?php echo $term->slug; ?>-details" aria-expanded="false" aria-controls="<?php echo $term->slug; ?>">
								<?php echo $term->name; ?>
							</h3>

							<div class="collapse" id="<?php echo $term->slug; ?>-details">

							<div class="py-2">

								<?php 
									//$col_class = false;
									//if ( !is_tax() ) $col_class = 'col-sm-6 col-lg-3 mb-3'; 
								?>

								<?php while ( $q->have_posts() ) { $q->the_post(); ?>

									<?php //if ( $col_class ) echo '<div class="' . $col_class . '">'; ?>

										<div class="<?php echo PRODUCT_COLUMNS_CLASS; ?>">

											<?php get_template_part( 'loop-templates/content', 'product' ); ?>

										</div>

									<?php //if ( $col_class ) echo '</div>'; ?>

								<?php } ?>

							</div>

							</div>

						<?php }

						wp_reset_postdata();

					}

				?>

			</div>

		<?php } ?>

	</div>

<?php } ?>