<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

define( 'PRODUCTS_PAGE_ID', 42 );
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