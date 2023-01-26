<?php

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$image_id = false;
$title = '';
$description = '';
$bg_class = 'has-primary-background-color has-background-dim-100';

if ( is_singular() ) {
	$image_id = get_post_thumbnail_id( get_the_ID() );
	$title = get_the_title();
	if ( $image_id ) {
		$bg_class = 'has-primary-100-background-color has-background-dim-80';
	}
} elseif ( is_archive() ) {
	$image_id = get_term_meta( get_queried_object_id(), 'thumbnail_id', true );
	$title = get_the_archive_title();
	if( is_tax( 'product_cat' ) ) {
		$description = false;
	} elseif( is_tax() ) {
		$description = term_description();
	} else {
		$description = get_the_archive_description();
	}
} elseif ( is_home() ) {
	$page_id = get_option( 'page_for_posts' );
	$title = get_the_title( $page_id );
}
?>

<header class="wp-block-cover alignfull is-style-image-header">

	<span aria-hidden="true" class="wp-block-cover__background has-background-dim <?php echo $bg_class; ?>"></span>

	<?php echo wp_get_attachment_image( $image_id, 'large', false, array('class' => 'wp-block-cover__image-background') ); ?>

	<div class="wp-block-cover__inner-container">

		<?php if ( is_singular( 'post' ) ) { ?>

			<div class="entry-meta text-white">

				<?php understrap_posted_on(); ?>

			</div><!-- .entry-meta -->

		<?php } ?>

		<h1 class="entry-title"><?php echo $title; ?></h1>

		<?php if ( $description) { ?>
			
			<div class="lead"><?php echo $description; ?></div>
		
		<?php } ?>

	</div>

</header>

<?php smn_breadcrumb(); ?>

