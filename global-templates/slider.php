<?php

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$args = array(
	'post_type'			=> 'slide',
	'posts_per_page'	=> -1,
	'order'				=> 'menu_order',
	'order'				=> 'ASC',
);

$q = new WP_Query($args);

if ( $q->have_posts() ) { ?>

	<div class="slick-slider slider-home">

		<?php while ( $q->have_posts() ) { $q->the_post();

			get_template_part( 'loop-templates/content', 'slide-home' );

		} ?>

	</div>

<?php }

wp_reset_postdata();
