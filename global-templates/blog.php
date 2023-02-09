<?php

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$container = get_theme_mod( 'understrap_container_type' );

$args = array(
	'posts_per_page'	=> 3
);

$q = new WP_Query($args);

if ( $q->have_posts() ) { 
	$page_for_posts_id = get_option( 'page_for_posts' );
	?>

	<div class="hfeed blog-block" id="wrapper-blog">

		<div class="row">

			<?php while ( $q->have_posts() ) { $q->the_post(); ?>

				<div class="col-sm-6 col-lg-4 stretch-linked-block">

					<?php get_template_part( 'loop-templates/content', 'card' ); ?>

				</div>
				
			<?php  } ?>

		</div>

	</div>

<?php }

wp_reset_postdata();
