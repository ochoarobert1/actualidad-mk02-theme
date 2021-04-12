<?php
// Register Custom Post Type
function opinion_custom_post_type()
{

	$labels = array(
		'name'                  => _x('Opiniones', 'Post Type General Name', 'actualidad'),
		'singular_name'         => _x('Opinión', 'Post Type Singular Name', 'actualidad'),
		'menu_name'             => __('Opinión', 'actualidad'),
		'name_admin_bar'        => __('Opinión', 'actualidad'),
		'archives'              => __('Archivos de Opinión', 'actualidad'),
		'attributes'            => __('Atributos de Opinión', 'actualidad'),
		'parent_item_colon'     => __('Opinión Padre:', 'actualidad'),
		'all_items'             => __('Todos las Opiniones', 'actualidad'),
		'add_new_item'          => __('Agregar Nueva Opinión', 'actualidad'),
		'add_new'               => __('Agregar Nueva', 'actualidad'),
		'new_item'              => __('Nueva Opinión', 'actualidad'),
		'edit_item'             => __('Editar Opinión', 'actualidad'),
		'update_item'           => __('Actualizar Opinión', 'actualidad'),
		'view_item'             => __('Ver Opinión', 'actualidad'),
		'view_items'            => __('Ver Opiniones', 'actualidad'),
		'search_items'          => __('Buscar Opinión', 'actualidad'),
		'not_found'             => __('No hay resultados', 'actualidad'),
		'not_found_in_trash'    => __('No hay resultados en Papelera', 'actualidad'),
		'featured_image'        => __('Imagen Destacada', 'actualidad'),
		'set_featured_image'    => __('Colocar Imagen Destacada', 'actualidad'),
		'remove_featured_image' => __('Remover Imagen Destacada', 'actualidad'),
		'use_featured_image'    => __('Usar como Imagen Destacada', 'actualidad'),
		'insert_into_item'      => __('Insertar en Opinión', 'actualidad'),
		'uploaded_to_this_item' => __('Cargado a esta Opinión', 'actualidad'),
		'items_list'            => __('Listado de Opiniones', 'actualidad'),
		'items_list_navigation' => __('Navegación del Listado de Opiniones', 'actualidad'),
		'filter_items_list'     => __('Filtro del Listado de Opiniones', 'actualidad'),
	);
	$args = array(
		'label'                 => __('Opinión', 'actualidad'),
		'description'           => __('Opiniones dentro del Sitio', 'actualidad'),
		'labels'                => $labels,
		'supports'              => array('title', 'editor', 'thumbnail'),
		'taxonomies'            => array('category', 'post_tag'),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-testimonial',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'post',
		'show_in_rest'          => false,
	);
	register_post_type('opinion', $args);
}
add_action('init', 'opinion_custom_post_type', 0);

// Register Custom Post Type
function podcast_custom_post_type()
{

	$labels = array(
		'name'                  => _x('Podcasts', 'Post Type General Name', 'actualidad'),
		'singular_name'         => _x('Podcast', 'Post Type Singular Name', 'actualidad'),
		'menu_name'             => __('Podcasts', 'actualidad'),
		'name_admin_bar'        => __('Podcasts', 'actualidad'),
		'archives'              => __('Archivos de Podcasts', 'actualidad'),
		'attributes'            => __('Atributos de Podcasts', 'actualidad'),
		'parent_item_colon'     => __('Podcast Padre:', 'actualidad'),
		'all_items'             => __('Todos los Podcasts', 'actualidad'),
		'add_new_item'          => __('Agregar Nuevo Podcast', 'actualidad'),
		'add_new'               => __('Agregar Nuevo', 'actualidad'),
		'new_item'              => __('Nuevo Podcast', 'actualidad'),
		'edit_item'             => __('Editar Podcast', 'actualidad'),
		'update_item'           => __('Actualizar Podcast', 'actualidad'),
		'view_item'             => __('Ver Podcast', 'actualidad'),
		'view_items'            => __('Ver Podcasts', 'actualidad'),
		'search_items'          => __('Buscar Podcast', 'actualidad'),
		'not_found'             => __('No hay resultados', 'actualidad'),
		'not_found_in_trash'    => __('No hay resultados en Papelera', 'actualidad'),
		'featured_image'        => __('Imagen Destacada', 'actualidad'),
		'set_featured_image'    => __('Colocar Imagen Destacada', 'actualidad'),
		'remove_featured_image' => __('Remover Imagen Destacada', 'actualidad'),
		'use_featured_image'    => __('Usar como Imagen Destacada', 'actualidad'),
		'insert_into_item'      => __('Insertar en Podcast', 'actualidad'),
		'uploaded_to_this_item' => __('Cargado a esta Podcast', 'actualidad'),
		'items_list'            => __('Listado de Podcasts', 'actualidad'),
		'items_list_navigation' => __('Navegación del Listado de Podcasts', 'actualidad'),
		'filter_items_list'     => __('Filtro del Listado de Podcasts', 'actualidad'),
	);
	$args = array(
		'label'                 => __('Podcast', 'actualidad'),
		'description'           => __('Podcasts dentro del Sitio', 'actualidad'),
		'labels'                => $labels,
		'supports'              => array('title', 'editor', 'thumbnail'),
		'taxonomies'            => array('series', 'post_tag'),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-megaphone',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'post',
		'show_in_rest'          => false,
	);
	register_post_type('podcast', $args);
}
add_action('init', 'podcast_custom_post_type', 0);
// Register Custom Post Type
function programacion_custom_post_type()
{

	$labels = array(
		'name'                  => _x('Programas', 'Post Type General Name', 'actualidad'),
		'singular_name'         => _x('Programa', 'Post Type Singular Name', 'actualidad'),
		'menu_name'             => __('Programas', 'actualidad'),
		'name_admin_bar'        => __('Programas', 'actualidad'),
		'archives'              => __('Archivos de Programas', 'actualidad'),
		'attributes'            => __('Atributos de Programas', 'actualidad'),
		'parent_item_colon'     => __('Programa Padre:', 'actualidad'),
		'all_items'             => __('Todos los Programas', 'actualidad'),
		'add_new_item'          => __('Agregar Nuevo Programa', 'actualidad'),
		'add_new'               => __('Agregar Nuevo', 'actualidad'),
		'new_item'              => __('Nuevo Programa', 'actualidad'),
		'edit_item'             => __('Editar Programa', 'actualidad'),
		'update_item'           => __('Actualizar Programa', 'actualidad'),
		'view_item'             => __('Ver Programa', 'actualidad'),
		'view_items'            => __('Ver Programas', 'actualidad'),
		'search_items'          => __('Buscar Programa', 'actualidad'),
		'not_found'             => __('No hay resultados', 'actualidad'),
		'not_found_in_trash'    => __('No hay resultados en Papelera', 'actualidad'),
		'featured_image'        => __('Imagen del Programa', 'actualidad'),
		'set_featured_image'    => __('Colocar Imagen del Programa', 'actualidad'),
		'remove_featured_image' => __('Remover Imagen del Programa', 'actualidad'),
		'use_featured_image'    => __('Usar como Imagen del Programa', 'actualidad'),
		'insert_into_item'      => __('Insertar en Programa', 'actualidad'),
		'uploaded_to_this_item' => __('Cargado a esta Programa', 'actualidad'),
		'items_list'            => __('Listado de Programas', 'actualidad'),
		'items_list_navigation' => __('Navegación del Listado de Programas', 'actualidad'),
		'filter_items_list'     => __('Filtro del Listado de Programas', 'actualidad'),
	);
	$args = array(
		'label'                 => __('Programa', 'actualidad'),
		'description'           => __('Programas dentro del Sitio', 'actualidad'),
		'labels'                => $labels,
		'supports'              => array('title', 'editor', 'thumbnail'),
		'taxonomies'            => array('tipo_programa', 'post_tag'),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-embed-video',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'post',
		'show_in_rest'          => false,
	);
	register_post_type('programacion', $args);
}
add_action('init', 'programacion_custom_post_type', 0);

// Register Custom Post Type
function talentos_custom_post_type() {

	$labels = array(
		'name'                  => _x( 'Talentos', 'Post Type General Name', 'actualidad' ),
		'singular_name'         => _x( 'Talento', 'Post Type Singular Name', 'actualidad' ),
		'menu_name'             => __( 'Talentos', 'actualidad' ),
		'name_admin_bar'        => __( 'Talentos', 'actualidad' ),
		'archives'              => __( 'Archivos de Talentos', 'actualidad' ),
		'attributes'            => __( 'Atributos de Talentos', 'actualidad' ),
		'parent_item_colon'     => __( 'Talento Padre:', 'actualidad' ),
		'all_items'             => __( 'Todos los Talentos', 'actualidad' ),
		'add_new_item'          => __( 'Agregar Nuevo Talento', 'actualidad' ),
		'add_new'               => __( 'Agregar Nuevo', 'actualidad' ),
		'new_item'              => __( 'Nuevo Talento', 'actualidad' ),
		'edit_item'             => __( 'Editar Talento', 'actualidad' ),
		'update_item'           => __( 'Actualizar Talento', 'actualidad' ),
		'view_item'             => __( 'Ver Talento', 'actualidad' ),
		'view_items'            => __( 'Ver Talentos', 'actualidad' ),
		'search_items'          => __( 'Buscar Talento', 'actualidad' ),
		'not_found'             => __( 'No hay resultados', 'actualidad' ),
		'not_found_in_trash'    => __( 'No hay resultados en Papelera', 'actualidad' ),
		'featured_image'        => __( 'Imagen del Talento', 'actualidad' ),
		'set_featured_image'    => __( 'Colocar Imagen del Talento', 'actualidad' ),
		'remove_featured_image' => __( 'Remover Imagen del Talento', 'actualidad' ),
		'use_featured_image'    => __( 'Usar como Imagen del Talento', 'actualidad' ),
		'insert_into_item'      => __( 'Insertar en Talento', 'actualidad' ),
		'uploaded_to_this_item' => __( 'Cargado a esta Talento', 'actualidad' ),
		'items_list'            => __( 'Listado de Talentos', 'actualidad' ),
		'items_list_navigation' => __( 'Navegación del Listado de Talentos', 'actualidad' ),
		'filter_items_list'     => __( 'Filtro del Listado de Talentos', 'actualidad' ),
	);
	$args = array(
		'label'                 => __( 'Talento', 'actualidad' ),
		'description'           => __( 'Talentos dentro del Sitio', 'actualidad' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-groups',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'post',
		'show_in_rest'          => false,
	);
	register_post_type( 'talentos', $args );

}
add_action( 'init', 'talentos_custom_post_type', 0 );


// Register Custom Taxonomy
function series_custom_taxonomy() {

	$labels = array(
		'name'                       => _x( 'Series de Podcast', 'Taxonomy General Name', 'actualidad' ),
		'singular_name'              => _x( 'Serie de Podcast', 'Taxonomy Singular Name', 'actualidad' ),
		'menu_name'                  => __( 'Series de Podcast', 'actualidad' ),
		'all_items'                  => __( 'Todas las Series', 'actualidad' ),
		'parent_item'                => __( 'Serie Padre', 'actualidad' ),
		'parent_item_colon'          => __( 'Serie Padre:', 'actualidad' ),
		'new_item_name'              => __( 'Nuevo Serie', 'actualidad' ),
		'add_new_item'               => __( 'Agregar Serie', 'actualidad' ),
		'edit_item'                  => __( 'Editar Serie', 'actualidad' ),
		'update_item'                => __( 'Actualizar Serie', 'actualidad' ),
		'view_item'                  => __( 'Ver Serie', 'actualidad' ),
		'separate_items_with_commas' => __( 'Separar series por comas', 'actualidad' ),
		'add_or_remove_items'        => __( 'Agregar o Remover Series', 'actualidad' ),
		'choose_from_most_used'      => __( 'Escoger de los más usados', 'actualidad' ),
		'popular_items'              => __( 'Series Populares', 'actualidad' ),
		'search_items'               => __( 'Buscar Serie', 'actualidad' ),
		'not_found'                  => __( 'No hay resultados', 'actualidad' ),
		'no_terms'                   => __( 'No hay Series', 'actualidad' ),
		'items_list'                 => __( 'Listado de Series', 'actualidad' ),
		'items_list_navigation'      => __( 'Navegacion del Listado de Series', 'actualidad' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
		'show_in_rest'               => false,
	);
	register_taxonomy( 'series', array( 'podcast' ), $args );

}
add_action( 'init', 'series_custom_taxonomy', 0 );

// Register Custom Taxonomy
function tipo_programas_custom_taxonomy() {

	$labels = array(
		'name'                       => _x( 'Tipos de Programa', 'Taxonomy General Name', 'actualidad' ),
		'singular_name'              => _x( 'Tipo de Programa', 'Taxonomy Singular Name', 'actualidad' ),
		'menu_name'                  => __( 'Tipos de Programa', 'actualidad' ),
		'all_items'                  => __( 'Todos los Tipos', 'actualidad' ),
		'parent_item'                => __( 'Tipo Padre', 'actualidad' ),
		'parent_item_colon'          => __( 'Tipo Padre:', 'actualidad' ),
		'new_item_name'              => __( 'Nuevo Tipo', 'actualidad' ),
		'add_new_item'               => __( 'Agregar Tipo', 'actualidad' ),
		'edit_item'                  => __( 'Editar Tipo', 'actualidad' ),
		'update_item'                => __( 'Actualizar Tipo', 'actualidad' ),
		'view_item'                  => __( 'Ver Tipo', 'actualidad' ),
		'separate_items_with_commas' => __( 'Separar tipos por comas', 'actualidad' ),
		'add_or_remove_items'        => __( 'Agregar o Remover Tipos', 'actualidad' ),
		'choose_from_most_used'      => __( 'Escoger de los más usados', 'actualidad' ),
		'popular_items'              => __( 'Tipos Populares', 'actualidad' ),
		'search_items'               => __( 'Buscar Tipo', 'actualidad' ),
		'not_found'                  => __( 'No hay resultados', 'actualidad' ),
		'no_terms'                   => __( 'No hay Tipos', 'actualidad' ),
		'items_list'                 => __( 'Listado de Tipos', 'actualidad' ),
		'items_list_navigation'      => __( 'Navegacion del Listado de Tipos', 'actualidad' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
		'show_in_rest'               => false,
	);
	register_taxonomy( 'tipo_programa', array( 'programacion' ), $args );

}
add_action( 'init', 'tipo_programas_custom_taxonomy', 0 );

// Register Custom Post Type
function custom_post_type() {

	$labels = array(
		'name'                  => _x( 'Noticias', 'Post Type General Name', 'text_domain' ),
		'singular_name'         => _x( 'Noticia', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'             => __( 'Noticias', 'text_domain' ),
		'name_admin_bar'        => __( 'Noticias', 'text_domain' ),
		'archives'              => __( 'Item Archives', 'text_domain' ),
		'attributes'            => __( 'Item Attributes', 'text_domain' ),
		'parent_item_colon'     => __( 'Parent Item:', 'text_domain' ),
		'all_items'             => __( 'All Items', 'text_domain' ),
		'add_new_item'          => __( 'Add New Item', 'text_domain' ),
		'add_new'               => __( 'Add New', 'text_domain' ),
		'new_item'              => __( 'New Item', 'text_domain' ),
		'edit_item'             => __( 'Edit Item', 'text_domain' ),
		'update_item'           => __( 'Update Item', 'text_domain' ),
		'view_item'             => __( 'View Item', 'text_domain' ),
		'view_items'            => __( 'View Items', 'text_domain' ),
		'search_items'          => __( 'Search Item', 'text_domain' ),
		'not_found'             => __( 'Not found', 'text_domain' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
		'featured_image'        => __( 'Featured Image', 'text_domain' ),
		'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
		'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
		'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
		'insert_into_item'      => __( 'Insert into item', 'text_domain' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'text_domain' ),
		'items_list'            => __( 'Items list', 'text_domain' ),
		'items_list_navigation' => __( 'Items list navigation', 'text_domain' ),
		'filter_items_list'     => __( 'Filter items list', 'text_domain' ),
	);
	$args = array(
		'label'                 => __( 'Noticia', 'text_domain' ),
		'description'           => __( 'Post Type Description', 'text_domain' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail', 'comments', 'custom-fields', 'post-formats' ),
		'taxonomies'            => array( 'category', 'post_tag' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'post',
	);
	register_post_type( 'noticias', $args );

}
add_action( 'init', 'custom_post_type', 0 );