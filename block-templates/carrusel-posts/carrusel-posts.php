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
$class_name = 'carrusel-posts-block';
if ( ! empty( $block['className'] ) ) {
    $class_name .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
    $class_name .= ' align' . $block['align'];
}

// Load values and assign defaults.
$related_posts_ids             = get_field( 'related_posts' ) ?: false;

?>

<div <?php echo $anchor; ?>class="<?php echo esc_attr( $class_name ); ?>">

	<?php if ( $related_posts_ids ) {

		$args = array(
			'post_type'				=> 'any',
			'post__in'				=> $related_posts_ids,
			'orderby'				=> 'post__in',
			'ignore_row'			=> true,
		);

		$q = new WP_Query( $args );

		if ( $q->have_posts() ) { ?>

			<div class="slick-carousel slick-spaced-carousel slick-carrusel-posts">
			
				<?php while ( $q->have_posts() ) { $q->the_post();
				
					get_template_part( 'loop-templates/content', 'carrusel-post' );

				} ?>

			</div>
		
		<?php }

		wp_reset_postdata();

	}
	?>

</div>