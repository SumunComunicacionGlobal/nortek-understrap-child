<?php
/**
 * Theme basic setup.
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

// Set the content width based on the theme's design and stylesheet.
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

add_action( 'after_setup_theme', 'smn_setup' );
function smn_setup() {

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'understrap' ),
		'megamenu' => __( 'Mega Menu columna 1', 'understrap' ),
		'megamenu-column-2' => __( 'Mega Menu columna 2', 'understrap' ),
        'legal' => __( 'Páginas legales', 'smn-admin' ),
        // 'account'  => __( 'Páginas de usuario', 'smn-admin' ),
        // 'movil'  => __( 'Menú móvil', 'smn-admin' ),
	) );

}

function understrap_all_excerpts_get_more_link( $post_excerpt ) {
	if ( ! is_admin() ) {
        if ( !$post_excerpt ) {
		    $post_excerpt = $post_excerpt . ' [...]';
        }
        // $post_excerpt .= '<p><a class="btn btn-secondary understrap-read-more-link" href="' . esc_url( get_permalink( get_the_ID() ) ) . '">' . __( 'Read More...', 'understrap' ) . '</a></p>';
        $post_excerpt .= '<div class="wp-block-buttons d-flex justify-content-end">';
            $post_excerpt .= '<div class="wp-block-button is-style-arrow-link">';
                // $post_excerpt .= '<a class="wp-block-button__link" href="' . esc_url( get_permalink( get_the_ID() ) ) . '">';
                $post_excerpt .= '<span class="wp-block-button__link">';
                    $post_excerpt .= __( 'Read More...', 'understrap' );
                // $post_excerpt .= '</a>';
                $post_excerpt .= '</span>';
                    $post_excerpt .= '</div>';
        $post_excerpt .= '</div>';
        }
	return $post_excerpt;
}

add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );
function custom_excerpt_length( $length ) {
    
    if ( 'post' == get_post_type() ) {
        return 0;
    }

    return $length;
}

add_filter( 'get_the_archive_title', 'prefix_category_title' );
function prefix_category_title( $title ) {
    if ( is_tax() || is_category() || is_tag() ) {
        $title = single_term_title( '', false );
    } elseif ( is_post_type_archive() ) {
        $title = post_type_archive_title( '', false );
    }
    return $title;
}

add_action( 'pre_get_posts', 'smn_pre_get_posts' );
function smn_pre_get_posts($query) {
    if (!$query->is_main_query() || is_admin() ) return;

    if (is_search()) {
        $query->set('posts_per_page', 30);
    }

    // if ( is_page_template( 'page-templates/product-archive.php' ) ) {
    //     $query->is_archive = true;
    //     $query->is_post_type_archive = true;
    //     $query->query['post_type'] = 'product';
    //     $query->set( 'post_type', 'product' );
    // }

    // if ( current_user_can( 'manage_options' ) ) :
    //     echo '<pre>';
    //         print_r ( $query );
    //     echo '</pre>';
    // endif;

}