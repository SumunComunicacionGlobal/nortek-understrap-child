<?php

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;


$posts_ids = false;
$terms_ids = false;

if ( is_singular() ) {
	$posts_ids = get_post_meta( get_the_ID(), 'related_posts', true );
	$terms_ids = get_post_meta( get_the_ID(), 'related_terms', true );
} elseif( is_tax() ) {

	$related_terms_text = get_field( 'related_terms_text', get_queried_object() );

	if ( $related_terms_text ) { ?>

		<div class="related-terms-text"><?php echo $related_terms_text; ?></div>

	<?php }

	$posts_ids = get_term_meta( get_queried_object_id(), 'related_posts', true );
	$terms_ids = get_term_meta( get_queried_object_id(), 'related_terms', true );
}

if ( $terms_ids ) {

	$args = array(
		'include'		=> $terms_ids,
		'hide_empty'	=> false,
	);

	$terms = get_terms( $args );

	if ( $terms ) { ?>

		<div class="slick-carousel slick-spaced-carousel">

		<?php foreach( $terms as $term ) {

			nortek_term_template_part( $term );

		} ?>

		</div>

	<?php }
}

if ( $posts_ids ) {

	$args = array(
		'post_type'			=> 'any',
		'post__in'			=> $posts_ids,
		'orderby'			=> 'post__in',
		'order'				=> 'ASC',
		'ignore_row'		=> true,
	);

	$q = new WP_Query($args);

	if ( $q->have_posts() ) { ?>

		<div class="wrapper hfeed related-posts">

			<div class="slick-carousel slick-spaced-carousel">

				<?php while ( $q->have_posts() ) { $q->the_post();

					get_template_part( 'loop-templates/content', get_post_type() );

				} ?>

			</div>

		</div>

	<?php }

	wp_reset_postdata();
}