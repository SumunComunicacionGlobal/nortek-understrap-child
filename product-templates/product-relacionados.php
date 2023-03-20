<?php

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$posts_ids = false;

if ( is_singular() ) {
	$posts_ids = get_post_meta( get_the_ID(), 'related_products', true );
} elseif( is_tax() ) {
	$posts_ids = get_term_meta( get_queried_object_id(), 'related_products', true );
}

if ( $posts_ids ) {

	$args = array(
		'post_type'			=> 'product',
		'post__in'			=> $posts_ids,
		'orderby'			=> 'post__in',
		'order'				=> 'ASC',
	);

} else {

	$args = array(
		'post_type'			=> 'product',
		'orderby'			=> 'menu_order',
		'order'				=> 'ASC',
		'post__not_in'		=> array( get_the_ID() ),
	);

	$post_terms = wp_get_object_terms( get_the_ID(), 'product_cat', array( 'fields' => 'ids' ) );

	if ( $post_terms ) {
		$args['tax_query'] = array( array(
			'taxonomy'		=> 'product_cat',
			'terms'			=> $post_terms
		));
	}

}

	$q = new WP_Query($args);

	if ( $q->have_posts() ) { 
		
		$texto_otros_productos = get_field( 'related_products_text' );
		?>

		<div class="is-layout-flex wp-block-columns is-style-gapless-border">
			
			<div class="is-layout-flow wp-block-column">
			
				<h2 class="h1 has-primary-color has-text-color my-0"><?php echo __( 'Otros productos', 'nortek' ); ?></h2>
			
			</div>

			<div class="is-layout-flow wp-block-column">
				
				<?php echo wpautop( $texto_otros_productos ); ?>
			
			</div>

		</div>

		<div class="hfeed related-products slick-spaced-carousel">

			<?php while ( $q->have_posts() ) { $q->the_post();

				get_template_part( 'loop-templates/content', 'product' );

			} ?>

		</div>

	<?php }

	wp_reset_postdata();
