<?php

/**
 * Related Posts Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during backend preview render.
 * @param   int $post_id The post ID the block is rendering content against.
 *          This is either the post ID currently being displayed inside a query loop,
 *          or the post ID of the post hosting this block.
 * @param   array $context The context provided to the block by the post or it's parent block.
 */

// Support custom "anchor" values.
$anchor = '';
if ( ! empty( $block['anchor'] ) ) {
    $anchor = 'id="' . esc_attr( $block['anchor'] ) . '" ';
}

// Create class attribute allowing for custom "className" and "align" values.
$class_name = 'related-posts-block';
if ( ! empty( $block['className'] ) ) {
    $class_name .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
    $class_name .= ' align' . $block['align'];
}

// Load values and assign defaults.
$related_posts_ids             = get_field( 'related_posts' ) ?: false;
$related_terms_ids             = get_field( 'related_terms' ) ?: false;

$related_posts_title = sprintf( __( 'Instalaciones de %s', 'nortek' ) ,get_the_title() );
$related_terms_title = sprintf( __( 'Componentes de %s', 'nortek' ) ,get_the_title() );

?>

<div <?php echo $anchor; ?>class="<?php echo esc_attr( $class_name ); ?>">

	<?php if ( $related_posts_ids ) {

		$args = array(
			'post_type'				=> 'any',
			'post__in'				=> $related_posts_ids,
			'orderby'				=> 'post__in',
		);

		$q = new WP_Query( $args );

		if ( $q->have_posts() ) { ?>

			<div class="wrapper alignfull border-bottom">

				<div class="container">
			
					<h2 class="mb-3"><?php echo $related_posts_title; ?></h2>

					<?php while ( $q->have_posts() ) { $q->the_post();
					
						get_template_part( 'loop-templates/content', 'case-study' );

					} ?>

				</div>

			</div>
		
		<?php }

		wp_reset_postdata();

	}

	if ( $related_terms_ids ) {

		$args = array(
			'include'			=> $related_terms_ids,	
		);

		$terms = get_terms( $args );

		if ( $terms ) { ?>

			<div class="wrapper bg-light alignfull border-bottom">

				<div class="container">

					<h2 class="mb-3"><?php echo $related_terms_title; ?></h2>

					<div class="slick-carousel slick-spaced-carousel">

						<?php foreach( $terms as $term ) { ?>

							<?php nortek_term_template_part( $term ); ?>

						<?php } ?>

					</div>

				</div>

			</div>

		<?php }

	}

	?>

</div>