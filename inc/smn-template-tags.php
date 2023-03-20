<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function understrap_posted_on() {

    $time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
    if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
        $time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time>';
    }
    $time_string = sprintf( $time_string,
        esc_attr( get_the_date( 'c' ) ),
        esc_html( get_the_date() )
    );
    echo $time_string; // WPCS: XSS OK.

}



/**
 * Prints HTML with meta information for the categories, tags and comments.
 */
function understrap_entry_footer() {
	// Hide category and tag text for pages.
	if ( 'post' === get_post_type() ) {
		/* translators: used between list items, there is a space after the comma */
		$categories_list = get_the_category_list( esc_html__( ', ', 'understrap' ) );
		if ( $categories_list && understrap_categorized_blog() ) {
			/* translators: %s: Categories of current post */
			printf( '<span class="cat-links">' . esc_html__( 'Posted in %s', 'understrap' ) . '</span>', $categories_list ); // WPCS: XSS OK.
		}
		/* translators: used between list items, there is a space after the comma */
		$tags_list = get_the_tag_list( '', esc_html__( ', ', 'understrap' ) );
		if ( $tags_list ) {
			/* translators: %s: Tags of current post */
			printf( '<span class="tags-links">' . esc_html__( 'Tagged %s', 'understrap' ) . '</span>', $tags_list ); // WPCS: XSS OK.
		}
	}
	// if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
	// 	echo '<span class="comments-link">';
	// 	comments_popup_link( esc_html__( 'Leave a comment', 'understrap' ), esc_html__( '1 Comment', 'understrap' ), esc_html__( '% Comments', 'understrap' ) );
	// 	echo '</span>';
	// }
	edit_post_link(
		sprintf(
			/* translators: %s: Name of current post */
			esc_html__( 'Edit %s', 'understrap' ),
			the_title( '<span class="screen-reader-text">"', '"</span>', false )
		),
		'<span class="edit-link">',
		'</span>'
	);
}

function smn_breadcrumb() {

	if ( is_front_page() ) return false;

	if(function_exists('bcn_display')) {
		echo '<div class="breadcrumb" typeof="BreadcrumbList" vocab="https://schema.org/">';
			echo '<div class="breadcrumb-inner">';
				bcn_display();
			echo '</div>';
		echo '</div>';
	} elseif ( function_exists( 'rank_math_the_breadcrumbs') ) {
		echo '<div class="breadcrumb">';
			echo '<div class="breadcrumb-inner">';
				rank_math_the_breadcrumbs(); 
			echo '</div>';
		echo '</div>';
		} elseif ( function_exists('yoast_breadcrumb') ) {
		yoast_breadcrumb( '<div id="breadcrumbs" class="breadcrumb"><div class="breadcrumb-inner">','</div></div>' );
	  }

}

function smn_subterms_collapse( $term ) {
	
	if ( !$term ) return false;

	$subterms = get_terms( array( 
		'taxonomy' 		=> 'product_cat', 
		'parent' 		=> $term->term_id, 
		'hide_empty' 	=> false,
	) );

	if ( !$subterms ) {
		$subterms = array( $term );
	}

	foreach( $subterms as $term )  {

		$args = array(
			'post_type'			=> 'product',
			'posts_per_page'	=> -1,
			'add_row'			=> true,
			'tax_query'			=> array( array(
									'taxonomy'			=> 'product_cat',
									'terms'				=> array( $term->term_id ),
									'include_children'	=> false,
									)),
			// 'ignore_row'		=> true,
		);

		$q = new WP_Query( $args );

		if ( $q->have_posts() ) { ?>

			<h3 class="btn btn-primary btn-block btn-collapse collapsed" data-toggle="collapse" href="#<?php echo $term->slug; ?>-details" aria-expanded="false" aria-controls="<?php echo $term->slug; ?>">
				<?php echo $term->name; ?>
			</h3>

			<div class="collapse" id="<?php echo $term->slug; ?>-details">

			<div class="py-2">

				<?php 
					//$col_class = false;
					//if ( !is_tax() ) $col_class = 'col-sm-6 col-lg-3 mb-3'; 
				?>

				<?php while ( $q->have_posts() ) { $q->the_post(); ?>

					<?php //if ( $col_class ) echo '<div class="' . $col_class . '">'; ?>

						<div class="<?php echo PRODUCT_COLUMNS_CLASS; ?>">

							<?php get_template_part( 'loop-templates/content', 'product' ); ?>

						</div>

					<?php //if ( $col_class ) echo '</div>'; ?>

				<?php } ?>

			</div>

			</div>

		<?php }

		wp_reset_postdata();

	}

}

function smn_subterms_buttons( $term ) {

	if ( !$term ) return false;

	$subterms = get_terms( array( 
		'taxonomy' 		=> 'product_cat', 
		'parent' 		=> $term->term_id, 
		'hide_empty' 	=> false,
	) );

	if ( $subterms ) { ?>

		<div class="subterms-buttons py-2">

		<?php foreach( $subterms as $term )  { ?>

				<a class="btn btn-sm btn-outline-primary mr-1 mb-1" href="<?php echo get_term_link( $term ); ?>" title="<?php echo $term->name; ?>">
					<?php echo $term->name; ?>
				</a>

			<?php
			wp_reset_postdata();

		} ?>

		</div>

	<?php }

}