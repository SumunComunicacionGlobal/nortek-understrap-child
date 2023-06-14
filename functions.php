<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

define( 'PRODUCTS_PAGE_ID', apply_filters( 'wpml_object_id', 42, 'page' ) );
define( 'PRODUCT_COLUMNS_CLASS', 'col-sm-6 col-lg-3 mb-3' );

// UnderStrap's includes directory.
$understrap_inc_dir = 'inc';

// Array of files to include.
$understrap_includes = array(
    // '/smn-dummy-content.php',
    '/smn-seo.php',
    '/smn-widgets.php',
    '/smn-post-types.php',
    '/smn-setup.php',
    '/smn-hooks.php',
    '/smn-customizer.php',
    '/smn-template-tags.php',
    '/smn-shortcodes.php',
    '/smn-blocks.php',
);

// Load WooCommerce functions if WooCommerce is activated.
if ( class_exists( 'WooCommerce' ) ) {
    $understrap_includes[] = '/smn-woocommerce.php';
}

if (!class_exists('ACF')) {
    $understrap_includes[] = '/smn-acf.php';
}

if ( function_exists( 'gdpr_cookie_is_accepted' ) ) {
    $understrap_includes[] = '/smn-moove-gdpr-cookies.php';
}

// Include files.
foreach ( $understrap_includes as $file ) {
    require_once get_theme_file_path( $understrap_inc_dir . $file );
}

// add_action( 'wp_enqueue_scripts', 'understrap_remove_animation_plugin_scripts', 20 );
function understrap_remove_animation_plugin_scripts() {
    wp_dequeue_style( 'edsanimate-animo-css' );
    wp_deregister_style( 'edsanimate-animo-css' );
}

function understrap_remove_scripts() {
    wp_dequeue_style( 'understrap-styles' );
    wp_deregister_style( 'understrap-styles' );

    wp_dequeue_script( 'understrap-scripts' );
    wp_deregister_script( 'understrap-scripts' );

    // Removes the parent themes stylesheet and scripts from inc/enqueue.php
}
add_action( 'wp_enqueue_scripts', 'understrap_remove_scripts', 20 );

add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
function theme_enqueue_styles() {

    // echo '<link rel="preconnect" href="https://fonts.googleapis.com">';
    // echo '<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>';
    // echo '<link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:ital,wght@0,300;0,400;0,700;1,400&display=swap" rel="stylesheet">';

    wp_enqueue_style( 'slick', get_stylesheet_directory_uri() . '/js/slick/slick.css' );
    wp_enqueue_style( 'slick-theme', get_stylesheet_directory_uri() . '/js/slick/slick-theme.css' );

	// Get the theme data
	$the_theme = wp_get_theme();
    wp_enqueue_style( 'smn-styles', get_stylesheet_directory_uri() . '/css/child-theme.min.css', array(), $the_theme->get( 'Version' ) );
    wp_enqueue_script( 'jquery');

    // wp_enqueue_script( 'sticky-sidebar', get_stylesheet_directory_uri() . '/js/jquery.sticky-sidebar.min.js', array(), false, true );
    wp_enqueue_script( 'slick', get_stylesheet_directory_uri() . '/js/slick/slick.min.js', null, null, true );

    wp_enqueue_script( 'smn-scripts', get_stylesheet_directory_uri() . '/js/child-theme.min.js', array(), $the_theme->get( 'Version' ), true );
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}

function add_child_theme_textdomain() {
    load_child_theme_textdomain( 'understrap-child', get_stylesheet_directory() . '/languages' );
    load_child_theme_textdomain( 'nortek', get_stylesheet_directory() . '/languages' );
    load_child_theme_textdomain( 'smn', get_stylesheet_directory() . '/languages' );
}
add_action( 'after_setup_theme', 'add_child_theme_textdomain' );

function nortek_serie() {
    echo nortek_get_serie();
}

function nortek_get_serie() {

    $serie = get_field( 'product_serie' );

    if ( $serie ) {

        $serie = '<span class="product-serie-value">' .$serie . '</span>';

        $r = '<p class="product-serie">' . sprintf( __( 'Serie %s', 'nortek' ) , $serie ) . '</p>';
    
        return $r;
    }

    return '<p class="product-serie invisible">-</p>';
}

function nortek_term_template_part( $term = false ) { 
    
    if ( !$term ) return false;
    ?>

    <?php $img_id = get_term_meta( $term->term_id, 'thumbnail_id', true ); ?>

    <div class="card subcategory position-relative stretch-linked-block">

        <?php if ( $img_id ) echo wp_get_attachment_image( $img_id, 'medium', false, array( 'class' => 'card-img-top' ) ); ?>

        <div class="card-body">

            <p class="h5 card-title"><a class="stretched-link" href="<?php echo get_term_link( $term ); ?>" title="<?php echo $term->name; ?>"><?php echo $term->name; ?></a></p>
            
        </div>

        <div class="wp-block-buttons d-flex justify-content-end">
            <div class="wp-block-button is-style-arrow-link">
                <span class="wp-block-button__link"><?php echo __( 'Read more' ); ?></span>
            </div>
        </div>

    </div>

<?php }

function smn_get_product_files_list() {

    $product_serie = get_post_meta( get_the_ID(), 'product_serie', true );
    $label_color = 'lightblue';
    if ( !$product_serie ) $label_color = 'red';
    echo '<p>';
        echo '<span style="background-color:'.$label_color.';padding:4px 6px;border-radius:3px;">';
            echo '<b>'.__( 'Serie', 'nortek' ).':</b>';
            if ( $product_serie ) {
                echo $product_serie;
            } else {
                echo '<span class="dashicons dashicons-warning" style="color:white;"></span> <span style="color:white;">' . __( 'Vacío', 'nortek' ) . '</span>';
            }
        echo '</span>';
    echo '</p>';

    $repeater_fields = array(
        'product_files_pdf',
        'product_files_3d'
    );

    echo '<div style="padding: 4px 6px; border:1px solid lightgray; border-radius: 4px;margin-bottom:.5rem;">';
    echo '<div><b>'. __( 'Ficheros PDF y 3D', 'nortek').'</b></div>';
    echo '<ul style="line-height:1;margin-top:4px;">';

    foreach ( $repeater_fields as $rf ) {

        if ( have_rows( $rf )) {

            while ( have_rows( $rf ) ) { the_row();

                $file_id = get_sub_field( 'product_file');
                if ( $file_id ) {
                    $file_url = wp_get_attachment_url( $file_id );
                    echo '<li><a href="'.wp_get_attachment_url( $file_id ).'" target="_blank" style="font-size:11px;">'. basename($file_url) .'</a></li>';
                } else {
                    echo '<span class="dashicons dashicons-warning" style="color:red;"></span> <span style="color:lightgray;">' . __( 'Vacíos', 'nortek' ) . '</span>';
                }
            }

        }

    }
    
    echo '</ul>';
    echo '</div>';
    
    $related_products_text = get_post_meta( get_the_ID(), 'related_products_text', true );
    $related_products = get_post_meta( get_the_ID(), 'related_products', true );

    if ( $related_products_text || $related_products ) {
        echo '<div style="padding: 4px 6px; border:1px solid lightgray; border-radius: 4px;margin-bottom:.5rem;">';
        echo '<div><b>'. __( 'Productos relacionados', 'nortek').'</b></div>';
    
        if ( $related_products_text ) {
            echo '<div style="font-size:12px;">'.$related_products_text.'</div>';
        }
        if ( $related_products ) {
            echo '<ul style="line-height:1;margin-top:4px;">';
            foreach ( $related_products as $p_id ) {
                echo '<li><a href="'.get_the_permalink( $p_id ).'" target="_blank" style="font-size:11px;">'. get_the_title($p_id) .'</a></li>';
            }
            echo '</ul>';
        }

        echo '</div>';
    }

}

function smn_get_first_product_image_id( $term_id = false ) {

    if ( !$term_id ) $term_id = get_queried_object_id();
    if ( !$term_id ) return false;

    $args = array(
        'post_type'         => 'product',
        'posts_per_page'    => 1,
        'orderby'           => 'menu_order',
        'order'             => 'asc',
        'fields'            => 'ids',
        'tax_query'         => array( array(
                                    'taxonomy'      => 'product_cat',
                                    'terms'         => array( $term_id )
                                ) ),
    );

    $first_post_q = new WP_Query($args);

    if ( $first_post_q->have_posts() ) {
        
        $first_post_id = $first_post_q->posts[0];
        return get_post_thumbnail_id( $first_post_id );

    }

    return false;

}