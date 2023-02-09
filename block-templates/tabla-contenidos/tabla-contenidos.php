<?php

/**
 * Tabla de Contenidos Template.
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
$class_name = 'toc-block gutenberg-toc-block navbar navbar-light navbar-expand-md justify-content-center text-center p-0 p-lg-2';

if ( ! empty( $block['className'] ) ) {
    $class_name .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
    $class_name .= ' align' . $block['align'];
}

global $post;
$current_post_id = $post->ID;

$posts_ids = get_field( 'toc_posts_ids' ) ?: false;
if (($key = array_search($current_post_id, $posts_ids)) !== false) {
    unset($posts_ids[$key]);
}

$args = false;

if ( $posts_ids ) {

	$args = array(
		'post_type'				=> 'any',
		'post__in'				=> $posts_ids,
		'orderby'				=> 'post__in',
	);
		
} elseif( 0 < $post->post_parent ) {

	$args = array(
		'post_type'				=> $post->post_type,
		'post_parent'			=> $post->post_parent,
		'orderby'				=> 'menu_order',
		'post__not_in'			=> $current_post_id,
	);

}

if ( !$args ) return false;

$q = new WP_Query( $args );

if ( $q->have_posts() ) { 

	$title = get_field( 'toc_title' ) ?: false;
	?>

	<div <?php echo $anchor; ?>class="<?php echo esc_attr( $class_name ); ?>">

		<div class="row align-items-center w-100">
	
			<div class="col-lg-5">
			
				<p class="h4 text-primary text-center d-none d-md-block mt-2"><?php echo $title; ?> </p>
				<button class="navbar-toggler mb-2 text-center w-100" type="button" data-toggle="collapse" data-target="#toc-collapse" aria-controls="toc-collapse" aria-expanded="false" aria-label="<?php esc_attr_e( 'Toggle navigation', 'understrap' ); ?>">
					<span class="h4 text-primary d-md-none"><?php echo $title; ?> </span>
					<span class="navbar-toggler-icon"></span>
				</button>

			</div>

			<div class="col-lg-7">

				<div class="collapse navbar-collapse" id="toc-collapse">

					<div class="toc-links">

						<?php while ( $q->have_posts() ) { $q->the_post(); ?>
					
							<a class="btn btn-primary d-block" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>

						<?php } ?>

						<?php  if( $q->found_posts % 2 != 0) { ?>

							<div class="toc-link-item"></div>

						<?php } ?>

					</div>

				</div>

			</div>

		</div>

	</div>

<?php }

wp_reset_postdata();