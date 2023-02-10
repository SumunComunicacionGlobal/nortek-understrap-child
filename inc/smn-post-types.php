<?php 

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

add_post_type_support( 'page', 'excerpt' );
// add_action( 'init', 'smn_settings', 1000 );
// function smn_settings() {  
    // register_taxonomy_for_object_type('category', 'page');  
// }


if ( ! function_exists('custom_post_type_slide') ) {

// Register Custom Post Type
function custom_post_type_slide() {

	$labels = array(
		'name'                  => _x( 'Slides', 'Post Type General Name', 'smn' ),
		'singular_name'         => _x( 'Slide', 'Post Type Singular Name', 'smn' ),
		'menu_name'             => __( 'Slides', 'smn-admin' ),
		'name_admin_bar'        => __( 'Slides', 'smn-admin' ),
		'add_new'               => __( 'Añadir nueva Slide', 'smn-admin' ),
		'new_item'              => __( 'Nueva Slide', 'smn-admin' ),
		'edit_item'             => __( 'Editar Slide', 'smn-admin' ),
		'update_item'           => __( 'Actualizar Slide', 'smn-admin' ),
		'view_item'             => __( 'Ver Slide', 'smn-admin' ),
		'view_items'            => __( 'Ver Slide', 'smn-admin' ),
	);
	$args = array(
		'label'                 => __( 'Slides', 'smn' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail', 'excerpt', 'custom-fields', 'revisions', 'page-attributes' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 3,
		'menu_icon'             => 'dashicons-slides',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => false,
		'can_export'            => true,
		'has_archive'           => false,
		'exclude_from_search'   => true,
		'publicly_queryable'    => true,
		'capability_type'       => 'post',
		'show_in_rest' 			=> true,
		'taxonomies'			=> array(),
	);
	register_post_type( 'slide', $args );

}
add_action( 'init', 'custom_post_type_slide', 0 );

}

if ( ! function_exists('custom_post_type_timeline_item') ) {

	// Register Custom Post Type
	function custom_post_type_timeline_item() {
	
		$labels = array(
			'name'                  => _x( 'Elementos de Timeline', 'Post Type General Name', 'smn' ),
			'singular_name'         => _x( 'Elemento de Timeline', 'Post Type Singular Name', 'smn' ),
			'menu_name'             => __( 'Elementos de Timeline', 'smn-admin' ),
			'name_admin_bar'        => __( 'Elementos de Timeline', 'smn-admin' ),
			'add_new'               => __( 'Añadir nuevo Elemento de Timeline', 'smn-admin' ),
			'new_item'              => __( 'Nuevo Elemento de Timeline', 'smn-admin' ),
			'edit_item'             => __( 'Editar Elemento de Timeline', 'smn-admin' ),
			'update_item'           => __( 'Actualizar Elemento de Timeline', 'smn-admin' ),
			'view_item'             => __( 'Ver Elemento de Timeline', 'smn-admin' ),
			'view_items'            => __( 'Ver Elementos de Timeline', 'smn-admin' ),
		);
		$args = array(
			'label'                 => __( 'Elementos de Timeline', 'smn' ),
			'labels'                => $labels,
			'supports'              => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'custom-fields', 'page-attributes' ),
			'hierarchical'          => false,
			'public'                => true,
			'show_ui'               => true,
			'show_in_menu'          => true,
			'menu_position'         => 5,
			'menu_icon'             => 'dashicons-editor-ul',
			'show_in_admin_bar'     => false,
			'show_in_nav_menus'     => false,
			'can_export'            => true,
			'has_archive'           => false,
			'exclude_from_search'   => true,
			'publicly_queryable'    => true,
			'capability_type'       => 'post',
			'taxonomies'			=> array( 'timeline' ),
		);
		// register_post_type( 'timeline-item', $args );
	
	}
	add_action( 'init', 'custom_post_type_timeline_item', 0 );
	
}


if ( ! function_exists('custom_post_type_team') ) {

// Register Custom Post Type
function custom_post_type_team() {

	$labels = array(
		'name'                  => _x( 'Miembros del equipo', 'Post Type General Name', 'smn' ),
		'singular_name'         => _x( 'Miembro del equipo', 'Post Type Singular Name', 'smn' ),
		'menu_name'             => __( 'Miembro del equipo', 'smn-admin' ),
		'name_admin_bar'        => __( 'Miembros del equipo', 'smn-admin' ),
		'add_new'               => __( 'Añadir nuevo Miembro del equipo', 'smn-admin' ),
		'new_item'              => __( 'Nuevo Miembro del equipo', 'smn-admin' ),
		'edit_item'             => __( 'Editar Miembro del equipo', 'smn-admin' ),
		'update_item'           => __( 'Actualizar Miembro del equipo', 'smn-admin' ),
		'view_item'             => __( 'Ver Miembro del equipo', 'smn-admin' ),
		'view_items'            => __( 'Ver Miembro del equipo', 'smn-admin' ),
		'featured_image'		=> __( 'Foto', 'smn-admin' ),
		'set_featured_image'	=> __( 'Establecer Foto', 'smn-admin' ),
		'remove_featured_image'	=> __( 'Quitar Foto', 'smn-admin' ),
		'use_featured_image'	=> __( 'Usar como Foto', 'smn-admin' ),
	);
	$args = array(
		'label'                 => __( 'Team members', 'smn' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'trackbacks', 'custom-fields', 'comments', 'revisions', 'page-attributes' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-id',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'post',
		'taxonomies'			=> array(),
	);
	register_post_type( 'team', $args );

}
// add_action( 'init', 'custom_post_type_team', 0 );

}

if ( ! function_exists('custom_post_type_producto') ) {

// Register Custom Post Type
function custom_post_type_producto() {

	$labels = array(
		'name'                  => _x( 'Productos', 'Post Type General Name', 'smn' ),
		'singular_name'         => _x( 'Producto', 'Post Type Singular Name', 'smn' ),
		'menu_name'             => __( 'Productos', 'smn-admin' ),
		'name_admin_bar'        => __( 'Producto', 'smn-admin' ),
		'add_new'               => __( 'Añadir nuevo Producto', 'smn-admin' ),
		'new_item'              => __( 'Nuevo Producto', 'smn-admin' ),
		'edit_item'             => __( 'Editar Producto', 'smn-admin' ),
		'update_item'           => __( 'Actualizar Producto', 'smn-admin' ),
		'view_item'             => __( 'Ver Producto', 'smn-admin' ),
		'view_items'            => __( 'Ver Productos', 'smn-admin' ),
		// 'featured_image'		=> __( 'Foto de perfil', 'smn-admin' ),
		// 'set_featured_image'	=> __( 'Establecer Foto de perfil', 'smn-admin' ),
		// 'remove_featured_image'	=> __( 'Quitar Foto de perfil', 'smn-admin' ),
		// 'use_featured_image'	=> __( 'Usar como Foto de perfil', 'smn-admin' ),
	);
	$args = array(
		'label'                 => __( 'Productos', 'smn' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'trackbacks', 'custom-fields', 'comments', 'revisions', 'page-attributes' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 23,
		'menu_icon'             => 'dashicons-open-folder',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => __('productos','smn' ),
		// 'has_archive'           => false,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'post',
		'taxonomies'			=> array('sector', 'product_cat', 'product_tag'),
		'show_in_rest'			=> true,
		'rewrite'				=> array(
									'slug'			=> __('productos', 'smn' ),
									'with_front'	=> false,
								),
);
	register_post_type( 'product', $args );

}
add_action( 'init', 'custom_post_type_producto', 0 );

}

if ( ! function_exists('custom_post_type_caso_de_exito') ) {

// Register Custom Post Type
function custom_post_type_caso_de_exito() {

	$labels = array(
		'name'                  => _x( 'Casos de éxito', 'Post Type General Name', 'smn' ),
		'singular_name'         => _x( 'Caso de éxito', 'Post Type Singular Name', 'smn' ),
		'menu_name'             => __( 'Casos de éxito', 'smn-admin' ),
		'name_admin_bar'        => __( 'Caso de éxito', 'smn-admin' ),
		'add_new'               => __( 'Añadir nuevo Caso de éxito', 'smn-admin' ),
		'new_item'              => __( 'Nuevo Caso de éxito', 'smn-admin' ),
		'edit_item'             => __( 'Editar Caso de éxito', 'smn-admin' ),
		'update_item'           => __( 'Actualizar Caso de éxito', 'smn-admin' ),
		'view_item'             => __( 'Ver Caso de éxito', 'smn-admin' ),
		'view_items'            => __( 'Ver Casos de éxito', 'smn-admin' ),
		// 'featured_image'		=> __( 'Foto de perfil', 'smn-admin' ),
		// 'set_featured_image'	=> __( 'Establecer Foto de perfil', 'smn-admin' ),
		// 'remove_featured_image'	=> __( 'Quitar Foto de perfil', 'smn-admin' ),
		// 'use_featured_image'	=> __( 'Usar como Foto de perfil', 'smn-admin' ),
	);
	$args = array(
		'label'                 => __( 'Casos de éxito', 'smn' ),
		'labels'                => $labels,
		'description'			=> __( 'Descubre cómo importantes empresas como Repsol, Hyundai Steel o ArcelorMittal, han alcanzado los objetivos marcados en sus plantas de producción, gracias a nuestras soluciones específicamente diseñadas y fabricadas para cada uno de ellos.', 'nortek' ),
		'supports'              => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'trackbacks', 'custom-fields', 'comments', 'revisions', 'page-attributes' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 23,
		'menu_icon'             => 'dashicons-format-quote',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'post',
		'taxonomies'			=> array(''),
		'show_in_rest'			=> true,
		'rewrite'				=> array(
										'slug'			=> __('casos-de-exito', 'smn' ),
										'with_front'	=> false,
									),
	);
	register_post_type( 'case-study', $args );

}
add_action( 'init', 'custom_post_type_caso_de_exito', 0 );

}

if ( ! function_exists('cpt_content_fragment_function') ) {

	// Register Custom Post Type
	function cpt_content_fragment_function() {

		$labels = array(
			'name'                => _x( 'Fragmentos', 'Post Type General Name', 'smn-admin' ),
			'singular_name'       => _x( 'Fragmento', 'Post Type Singular Name', 'smn-admin' ),
			'menu_name'           => __( 'Fragmentos de contenido reutilizables', 'smn-admin' ),
			'name_admin_bar'      => __( 'Fragmento', 'smn-admin' ),
			'parent_item_colon'   => __( 'Fragmento superior:', 'smn-admin' ),
			'all_items'           => __( 'Todos los Fragmentos de contenido', 'smn-admin' ),
			'add_new_item'        => __( 'Añadir nuevo Fragmento', 'smn-admin' ),
			'add_new'             => __( 'Añadir nuevo', 'smn-admin' ),
			'new_item'            => __( 'Nuevo Fragmento', 'smn-admin' ),
			'edit_item'           => __( 'Editar Fragmento', 'smn-admin' ),
			'update_item'         => __( 'Actualizar Fragmento', 'smn-admin' ),
			'view_item'           => __( 'Ver Fragmento', 'smn-admin' ),
			'search_items'        => __( 'Buscar Fragmento', 'smn-admin' ),
			'not_found'           => __( 'No se han encontrado Fragmentos', 'smn-admin' ),
			'not_found_in_trash'  => __( 'No se han encontrado Fragmentos en la papelera', 'smn-admin' ),
		);
		$args = array(
			'label'               => __( 'Fragmentos de contenido', 'smn-admin' ),
			'labels'              => $labels,
			'supports'            => array( 'title', 'editor', 'author' ),
			'hierarchical'        => false,
			'public'              => true,
			'show_ui'             => true,
			'show_in_menu'        => true,
			'menu_position'       => 5,
			'menu_icon'           => 'dashicons-editor-insertmore',
			'show_in_admin_bar'   => false,
			'show_in_nav_menus'   => false,
			'can_export'          => true,
			'has_archive'         => false,
			'exclude_from_search' => true,
			'publicly_queryable'  => true,
			'capability_type'     => 'post',
			'show_in_rest'			=> true,
		);

		register_post_type( 'content_fragment', $args );

	}

	// Hook into the 'init' action
	// add_action( 'init', 'cpt_content_fragment_function', 0 );

}

if ( ! function_exists( 'product_cat_function' ) ) {

	// Register Custom Taxonomy
	function product_cat_function() {

		$labels = array(
			'name'                       => _x( 'Familias de Producto', 'Taxonomy General Name', 'smn-admin' ),
			'singular_name'              => _x( 'Familia de Producto', 'Taxonomy Singular Name', 'smn-admin' ),
			'menu_name'                  => __( 'Familias de Producto', 'smn-admin' ),
			'all_items'                  => __( 'Todas las Familias de Producto', 'smn-admin' ),
			'parent_item'                => __( 'Familia de Producto superior', 'smn-admin' ),
			'parent_item_colon'          => __( 'Familia de Producto superior:', 'smn-admin' ),
			'new_item_name'              => __( 'Nueva Familia de Producto', 'smn-admin' ),
			'add_new_item'               => __( 'Añadir Nueva Familia de Producto', 'smn-admin' ),
			'edit_item'                  => __( 'Editar Familia de Producto', 'smn-admin' ),
			'update_item'                => __( 'Actualizar Familia de Producto', 'smn-admin' ),
			'view_item'                  => __( 'Ver Familia de Producto', 'smn-admin' ),
			'separate_items_with_commas' => __( 'Separar Familia de Producto con comas', 'smn-admin' ),
			'add_or_remove_items'        => __( 'Añadir o eliminar Familia de Producto', 'smn-admin' ),
			'choose_from_most_used'      => __( 'Elegir de entre las más usadas', 'smn-admin' ),
			'popular_items'              => __( 'Familias de Producto populares', 'smn-admin' ),
			'search_items'               => __( 'Buscar Familias de Producto', 'smn-admin' ),
			'not_found'                  => __( 'No encontrada', 'smn-admin' ),
		);
		$args = array(
			'labels'                     => $labels,
			'hierarchical'               => true,
			'public'                     => true,
			'show_ui'                    => true,
			'show_admin_column'          => true,
			'show_in_nav_menus'          => true,
			'show_tagcloud'              => true,
			'show_in_rest'				 => true,
			'rewrite'					 => array(
											'slug'			=> __( 'sistemas-de-lubricacion', 'smn-admin' ),
											'with_front'	=> false,
											'hierarchical'	=> false,
										 ),
		);

		register_taxonomy( 'product_cat', array( 'product' ), $args );

	}
	// Hook into the 'init' action
	add_action( 'init', 'product_cat_function', 0 );

}

if ( ! function_exists( 'product_tag_function' ) ) {

	// Register Custom Taxonomy
	function product_tag_function() {

		$labels = array(
			'name'                       => _x( 'Etiquetas de Producto', 'Taxonomy General Name', 'smn-admin' ),
			'singular_name'              => _x( 'Etiqueta de Producto', 'Taxonomy Singular Name', 'smn-admin' ),
			'menu_name'                  => __( 'Etiquetas de Producto', 'smn-admin' ),
			'all_items'                  => __( 'Todas las Etiquetas de Producto', 'smn-admin' ),
			'parent_item'                => __( 'Etiqueta de Producto superior', 'smn-admin' ),
			'parent_item_colon'          => __( 'Etiqueta de Producto superior:', 'smn-admin' ),
			'new_item_name'              => __( 'Nueva Etiqueta de Producto', 'smn-admin' ),
			'add_new_item'               => __( 'Añadir Nueva Etiqueta de Producto', 'smn-admin' ),
			'edit_item'                  => __( 'Editar Etiqueta de Producto', 'smn-admin' ),
			'update_item'                => __( 'Actualizar Etiqueta de Producto', 'smn-admin' ),
			'view_item'                  => __( 'Ver Etiqueta de Producto', 'smn-admin' ),
			'separate_items_with_commas' => __( 'Separar Etiqueta de Producto con comas', 'smn-admin' ),
			'add_or_remove_items'        => __( 'Añadir o eliminar Etiqueta de Producto', 'smn-admin' ),
			'choose_from_most_used'      => __( 'Elegir de entre las más usadas', 'smn-admin' ),
			'popular_items'              => __( 'Etiquetas de Producto populares', 'smn-admin' ),
			'search_items'               => __( 'Buscar Etiquetas de Producto', 'smn-admin' ),
			'not_found'                  => __( 'No encontrada', 'smn-admin' ),
		);
		$args = array(
			'labels'                     => $labels,
			'hierarchical'               => true,
			'public'                     => true,
			'show_ui'                    => true,
			'show_admin_column'          => true,
			'show_in_nav_menus'          => true,
			'show_tagcloud'              => true,
			'show_in_rest'				 => true,
			'rewrite'					 => array(
											'slug'			=> __( 'etiqueta-producto', 'smn-admin' ),
											'with_front'	=> true,
											'hierarchical'	=> false,
										 ),
		);

		register_taxonomy( 'product_tag', array( 'product' ), $args );

	}
	// Hook into the 'init' action
	// add_action( 'init', 'product_tag_function', 0 );

}

if ( ! function_exists( 'custom_taxonomy_sector' ) ) {

// Register Custom Taxonomy
function custom_taxonomy_sector() {

	$labels = array(
		'name'                       => _x( 'Sectores', 'Taxonomy General Name', 'smn' ),
		'singular_name'              => _x( 'Sector', 'Taxonomy Singular Name', 'smn' ),
		'menu_name'                  => __( 'Sectores', 'smn-admin' ),
		'all_items'                  => __( 'Todos los Sectores', 'smn-admin' ),
		'parent_item'                => __( 'Sector superior', 'smn-admin' ),
		'parent_item_colon'          => __( 'Sector superior:', 'smn-admin' ),
		'new_item_name'              => __( 'Nombre del nuevo Sector', 'smn-admin' ),
		'add_new_item'               => __( 'Añadir nuevo Sector', 'smn-admin' ),
		'edit_item'                  => __( 'Editar Sector', 'smn-admin' ),
		'update_item'                => __( 'Actualizar Sector', 'smn-admin' ),
		'view_item'                  => __( 'Ver Sector', 'smn-admin' ),
		'separate_items_with_commas' => __( 'Separar Sectores con comas', 'smn-admin' ),
		'add_or_remove_items'        => __( 'Añadir o quitar Sectores', 'smn-admin' ),
		'choose_from_most_used'      => __( 'Elegir de entre los más usados', 'smn-admin' ),
		'popular_items'              => __( 'Sectores populares', 'smn-admin' ),
		'search_items'               => __( 'Buscar Sectores', 'smn-admin' ),
		'not_found'                  => __( 'No encontrado', 'smn-admin' ),
		'no_terms'                   => __( 'No hay Sectores', 'smn-admin' ),
		'items_list'                 => __( 'Lista de Sectores', 'smn-admin' ),
		'items_list_navigation'      => __( 'Navegación de la lista de Sectores', 'smn-admin' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
		'show_in_rest'               => true,
	);
	// register_taxonomy( 'sector', array( 'product' ), $args );

}
add_action( 'init', 'custom_taxonomy_sector', 10 );

}

if ( ! function_exists( 'timeline_taxonomy_function' ) ) {

	// Register Custom Taxonomy
	function timeline_taxonomy_function() {

		$labels = array(
			'name'                       => _x( 'Timelines', 'Taxonomy General Name', 'smn-admin' ),
			'singular_name'              => _x( 'Timeline', 'Taxonomy Singular Name', 'smn-admin' ),
			'menu_name'                  => __( 'Timelines', 'smn-admin' ),
			'all_items'                  => __( 'Todas las Timelines', 'smn-admin' ),
			'parent_item'                => __( 'Timeline superior', 'smn-admin' ),
			'parent_item_colon'          => __( 'Timeline superior:', 'smn-admin' ),
			'new_item_name'              => __( 'Nueva Timeline', 'smn-admin' ),
			'add_new_item'               => __( 'Añadir Nueva Timeline', 'smn-admin' ),
			'edit_item'                  => __( 'Editar Timeline', 'smn-admin' ),
			'update_item'                => __( 'Actualizar Timeline', 'smn-admin' ),
			'view_item'                  => __( 'Ver Timeline', 'smn-admin' ),
			'separate_items_with_commas' => __( 'Separar Timelines con comas', 'smn-admin' ),
			'add_or_remove_items'        => __( 'Añadir o eliminar Timelines', 'smn-admin' ),
			'choose_from_most_used'      => __( 'Elegir de entre las más usadas', 'smn-admin' ),
			'popular_items'              => __( 'Timelines populares', 'smn-admin' ),
			'search_items'               => __( 'Buscar Timelines', 'smn-admin' ),
			'not_found'                  => __( 'No encontrada', 'smn-admin' ),
		);
		$args = array(
			'labels'                     => $labels,
			'hierarchical'               => true,
			'public'                     => true,
			'show_ui'                    => true,
			'show_admin_column'          => true,
			'show_in_nav_menus'          => false,
			'show_tagcloud'              => false,
			'show_in_rest'				 => true,
		);

		// register_taxonomy( 'timeline', array( 'timeline-item' ), $args );

	}
	// Hook into the 'init' action
	add_action( 'init', 'timeline_taxonomy_function', 0 );

}

function wpb_change_title_text( $title ){
     $screen = get_current_screen();
  
     if  ( 'portfolio_page' == $screen->post_type ) {
          $title = 'Título del proyecto';
     } elseif  ( 'slide' == $screen->post_type ) {
          $title = 'Título de la slide';
     } elseif  ( 'team' == $screen->post_type ) {
          $title = 'Nombre y apellidos';
     } elseif  ( 'product' == $screen->post_type ) {
          $title = 'Nombre del producto';
     }
  
     return $title;
}
add_filter( 'enter_title_here', 'wpb_change_title_text' );

// ADD NEW COLUMN
add_filter('manage_posts_columns', 'smn_columns_head');
add_filter('manage_pages_columns', 'smn_columns_head');
add_action('manage_posts_custom_column', 'smn_columns_content', 10, 2);
add_action('manage_pages_custom_column', 'smn_columns_content', 10, 2);
function smn_columns_head($defaults) {
	// $defaults = array('featured_image' => 'Imagen') + $defaults;
    $defaults['featured_image'] = 'Imagen';
    $defaults['extracto'] = 'Resumen';

    return $defaults;
}
 
// SHOW THE FEATURED IMAGE
function smn_columns_content($column_name, $post_ID) {
    if ($column_name == 'featured_image') {
    	echo '<div style="height:100px;">' . get_the_post_thumbnail( $post_ID, array(80,80) ) . '</div>';

    }
    if ($column_name == 'extracto') {
    	$post = get_post($post_ID);
    	echo $post->post_excerpt;
    }
}

add_filter( 'post_type_archive_link', 'custom_page_archive_link', 100, 2 );
function custom_page_archive_link( $link, $post_type ) {

	if ( !is_post_type_archive( 'product' ) ) return $link;

	$page_id = 79;
	$link = get_permalink( $page_id );

	return $link;


}

?>