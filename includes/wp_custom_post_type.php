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
		'supports'              => array('title', 'editor'),
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
		'supports'              => array('title', 'editor'),
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
		'supports'              => array('title', 'editor'),
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
		'supports'              => array( 'title', 'editor' ),
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