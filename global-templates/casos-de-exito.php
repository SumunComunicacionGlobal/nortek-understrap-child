<?php

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$container = get_theme_mod( 'understrap_container_type' );
$post_type = 'case-study';

$args = array(
	'post_type'			=> $post_type,
	'posts_per_page'	=> 1
);

$q = new WP_Query($args);

if ( $q->have_posts() ) { ?>

	<div class="wrapper" id="wrapper-case-studies">

		<div class="<?php echo esc_attr( $container ); ?>" tabindex="-1">

			<div class="row">

				<?php while ( $q->have_posts() ) { $q->the_post();

					get_template_part( 'loop-templates/content', $post_type );

				} ?>

			</div>

		</div>

	</div>

	<div class="wp-block-buttons">
		<div class="wp-block-button is-style-arrow">
			<a class="wp-block-button__link" href="<?php echo get_post_type_archive_link( $post_type ); ?>"><?php echo get_post_type_object( $post_type )->labels->name; ?></a>
		</div>
	</div>

<?php }

wp_reset_postdata();
