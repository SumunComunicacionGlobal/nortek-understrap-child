<?php
// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$post_type = 'case-study';
$class_name = 'links-panel-block row no-gutters';

$args = array(
	'post_type'				=> $post_type,
	'posts_per_page'		=> 5,
);

$q = new WP_Query( $args );

if ( $q->have_posts() ) { ?>

	<div class="<?php echo esc_attr( $class_name ); ?>">

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