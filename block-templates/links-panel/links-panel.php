<?php

/**
 * Links panel Template.
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
$class_name = 'links-panel-block row no-gutters';
if ( ! empty( $block['className'] ) ) {
    $class_name .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
    $class_name .= ' align' . $block['align'];
}


// Load values and assign defaults.
$post_ids             = get_field( 'post_ids' ) ?: false;

if ( $post_ids ) {

	$args = array(
		'post_type'				=> 'any',
		'post__in'				=> $post_ids,
		'orderby'				=> 'post__in',
	);

	$q = new WP_Query( $args );

	if ( $q->have_posts() ) { ?>

		<div <?php echo $anchor; ?>class="<?php echo esc_attr( $class_name ); ?>">

			<?php while ( $q->have_posts() ) { $q->the_post();

				global $post;
			
				if ( $q->current_post == 0 ) { 
					$featured_style = '';
					if ( has_post_thumbnail() ) {
						$bg_url = get_the_post_thumbnail_url( $post->ID, 'medium' );
						$featured_style = 'style="background-image: url('. $bg_url .');"';
					}
					?>

					<div class="col-md-6">

						<div class="links-panel-link links-panel-featured-link has-arrow" <?php echo $featured_style; ?>>

				<?php } elseif ( $q->current_post == 1) { ?>
					
						<div class="col-md-6">

							<div class="links-panel-link has-arrow">

				<?php } else { ?>

						<div class="links-panel-link has-arrow">

				<?php } ?>

					<?php
					the_title(
						sprintf( '<p><a class="stretched-link links-panel-link-title" href="%s" rel="bookmark">', esc_url( get_permalink() ) ),
						'</a></p>'
					);
					?>

					<?php if ( $post->post_excerpt ) { ?>

						<div class="links-panel-link-excerpt">

							<?php echo wpautop( $post->post_excerpt ); ?>

						</div>

					<?php } ?>


				</div>

				<?php if ( $q->current_post == 0 || $q->current_post == $q->found_posts - 1 ) { ?>

					</div>

				<?php } ?>

			<?php } ?>

		</div>
	
	<?php }

	wp_reset_postdata();

}