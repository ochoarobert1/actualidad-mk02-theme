<?php

/* --------------------------------------------------------------
    ENQUEUE AND REGISTER CSS
-------------------------------------------------------------- */

require_once('includes/wp_enqueue_styles.php');

/* --------------------------------------------------------------
    ENQUEUE AND REGISTER JS
-------------------------------------------------------------- */

if (!is_admin()) add_action('wp_enqueue_scripts', 'actualidad_jquery_enqueue');
function actualidad_jquery_enqueue()
{
    wp_deregister_script('jquery');
    wp_deregister_script('jquery-migrate');
    if ($_SERVER['REMOTE_ADDR'] == '::1') {
        /*- JQUERY ON LOCAL  -*/
        wp_register_script('jquery', get_template_directory_uri() . '/js/jquery.min.js', false, '3.5.1', false);
        /*- JQUERY MIGRATE ON LOCAL  -*/
        wp_register_script('jquery-migrate', get_template_directory_uri() . '/js/jquery-migrate.min.js',  array('jquery'), '3.1.0', false);
    } else {
        /*- JQUERY ON WEB  -*/
        wp_register_script('jquery', 'https://code.jquery.com/jquery-3.5.1.min.js', false, '3.5.1', false);
        /*- JQUERY MIGRATE ON WEB  -*/
        wp_register_script('jquery-migrate', 'https://code.jquery.com/jquery-migrate-3.3.1.js', array('jquery'), '3.3.1', true);
    }
    wp_enqueue_script('jquery');
    wp_enqueue_script('jquery-migrate');
}

/* NOW ALL THE JS FILES */

require_once('includes/wp_enqueue_scripts.php');

/* --------------------------------------------------------------
    ADD CUSTOM WALKER BOOTSTRAP
-------------------------------------------------------------- */

add_action('after_setup_theme', 'actualidad_register_navwalker');
function actualidad_register_navwalker()
{
    require_once('includes/class-wp-bootstrap-navwalker.php');
}

/* --------------------------------------------------------------
    ADD CUSTOM WORDPRESS FUNCTIONS
-------------------------------------------------------------- */

require_once('includes/wp_custom_functions.php');

/* --------------------------------------------------------------
    ADD REQUIRED WORDPRESS PLUGINS
-------------------------------------------------------------- */

require_once('includes/class-tgm-plugin-activation.php');
require_once('includes/class-required-plugins.php');

/* --------------------------------------------------------------
    ADD CUSTOM WOOCOMMERCE OVERRIDES
-------------------------------------------------------------- */
if (class_exists('WooCommerce')) {
    require_once('includes/wp_woocommerce_functions.php');
}

/* --------------------------------------------------------------
    ADD JETPACK COMPATIBILITY
-------------------------------------------------------------- */
if (defined('JETPACK__VERSION')) {
    require_once('includes/wp_jetpack_functions.php');
}

/* --------------------------------------------------------------
    ADD NAV MENUS LOCATIONS
-------------------------------------------------------------- */

register_nav_menus(array(
    'top_menu' => __('Top Header - Principal', 'actualidad'),
    'header_menu' => __('Menu Header - Principal', 'actualidad'),
    'footer_menu' => __('Menu Footer - Principal', 'actualidad')
));

/* --------------------------------------------------------------
    ADD DYNAMIC SIDEBAR SUPPORT
-------------------------------------------------------------- */

add_action('widgets_init', 'actualidad_widgets_init');

function actualidad_widgets_init()
{
    register_sidebar(array(
        'name' => __('Sidebar Principal', 'actualidad'),
        'id' => 'main_sidebar',
        'description' => __('Estos widgets seran vistos en las entradas y páginas del sitio', 'actualidad'),
        'before_widget' => '<li id="%1$s" class="widget %2$s">',
        'after_widget'  => '</li>',
        'before_title'  => '<h2 class="widgettitle">',
        'after_title'   => '</h2>',
    ));

    register_sidebars(5, array(
        'name'          => __('Pie de Página %d', 'actualidad'),
        'id'            => 'sidebar_footer',
        'description'   => __('Estos widgets seran vistos en el pie de página del sitio', 'actualidad'),
        'before_widget' => '<li id="%1$s" class="widget %2$s">',
        'after_widget'  => '</li>',
        'before_title'  => '<h2 class="widgettitle">',
        'after_title'   => '</h2>'
    ));

    //    register_sidebar( array(
    //        'name' => __( 'Sidebar de la Tienda', 'actualidad' ),
    //        'id' => 'shop_sidebar',
    //        'description' => __( 'Estos widgets seran vistos en Tienda y Categorias de Producto', 'actualidad' ),
    //        'before_widget' => '<li id='%1$s' class='widget %2$s'>',
    //        'after_widget'  => '</li>',
    //        'before_title'  => '<h2 class='widgettitle'>',
    //        'after_title'   => '</h2>',
    //    ) );
}



/* --------------------------------------------------------------
    ADD CUSTOM METABOX
-------------------------------------------------------------- */

require_once('includes/wp_custom_metabox.php');

/* --------------------------------------------------------------
    ADD CUSTOM POST TYPE
-------------------------------------------------------------- */

require_once('includes/wp_custom_post_type.php');

/* --------------------------------------------------------------
    ADD CUSTOM THEME CONTROLS
-------------------------------------------------------------- */

require_once('includes/wp_custom_theme_control.php');

/* --------------------------------------------------------------
    ADD CUSTOM WPBAKERY OVERRIDES
-------------------------------------------------------------- */

require_once('includes/class-wpbakery-functions.php');
require_once('includes/wpbakery-shortcodes/class-main-news-bar.php');
require_once('includes/wpbakery-shortcodes/class-main-title-bar.php');
require_once('includes/wpbakery-shortcodes/class-main-dest-news.php');
require_once('includes/wpbakery-shortcodes/class-news-item.php');
require_once('includes/wpbakery-shortcodes/class-entrevistas-item.php');
require_once('includes/wpbakery-shortcodes/class-news-item-vertical.php');
require_once('includes/wpbakery-shortcodes/class-vertical-slider.php');
require_once('includes/wpbakery-shortcodes/class-podcast-slider.php');
require_once('includes/wpbakery-shortcodes/class-horizontal-news.php');
require_once('includes/wpbakery-shortcodes/class-horizontal-news-fourth.php');

/* --------------------------------------------------------------
    ADD CUSTOM IMAGE SIZE
-------------------------------------------------------------- */
if (function_exists('add_theme_support')) {
    add_theme_support('post-thumbnails');
    set_post_thumbnail_size(9999, 400, true);
}
if (function_exists('add_image_size')) {
    add_image_size('avatar', 100, 100, true);
    add_image_size('small_thumb', 65, 43, array('center', 'center'));
    add_image_size('horizontal_news', 380, 220, array('center', 'center'));
    add_image_size('blog_img', 390, 250, array('center', 'center'));
    add_image_size('single_img', 800, 400, array('center', 'center'));
}


add_action('after_setup_theme', 'posted_id_callback');

function posted_id_callback()
{
    global $posted_id;
    $posted_id = array();
}


//Limitar con la funcion get_the_excerpt
function excerpt($limit)
{
    $excerpt = explode(' ', get_the_excerpt(), $limit);
    if (count($excerpt) >= $limit) {
        array_pop($excerpt);
        $excerpt = implode(" ", $excerpt) . '...';
    } else {
        $excerpt = implode(" ", $excerpt);
    }
    $excerpt = preg_replace('`[[^]]*]`', '', $excerpt);
    return $excerpt;
}


if(function_exists("register_field_group"))
{
	register_field_group(array (
		'id' => 'acf_banner-footer',
		'title' => 'Banner Footer',
		'fields' => array (
			array (
				'key' => 'field_568d8aa7f27a8',
				'label' => 'Banner ID',
				'name' => 'banner-home',
				'type' => 'number',
				'default_value' => 1,
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'min' => '',
				'max' => '',
				'step' => '',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'page_type',
					'operator' => '==',
					'value' => 'front_page',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'side',
			'layout' => 'default',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
	register_field_group(array (
		'id' => 'acf_banners-listado',
		'title' => 'Banners Listado',
		'fields' => array (
			array (
				'key' => 'field_568d91f89a19b',
				'label' => 'ID Banners',
				'name' => 'banners-listado',
				'type' => 'text',
				'instructions' => 'Ingresa el los IDs de los banners a mostrar en el listado de home, separado por coma (,)',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'page_type',
					'operator' => '==',
					'value' => 'front_page',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'side',
			'layout' => 'default',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
	register_field_group(array (
		'id' => 'acf_bases-legales',
		'title' => 'Bases Legales',
		'fields' => array (
			array (
				'key' => 'field_568d6152573c2',
				'label' => 'Bases Legales',
				'name' => 'bases-concurso',
				'type' => 'file',
				'save_format' => 'object',
				'library' => 'all',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'concursos',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'side',
			'layout' => 'default',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
	register_field_group(array (
		'id' => 'acf_descripcion-horario',
		'title' => 'Descripción Horario',
		'fields' => array (
			array (
				'key' => 'field_56798f6975407',
				'label' => 'descripción',
				'name' => 'descripcion-horario',
				'type' => 'text',
				'required' => 1,
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'none',
				'maxlength' => '',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'programacion',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'side',
			'layout' => 'default',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
	register_field_group(array (
		'id' => 'acf_destacar',
		'title' => 'Destacar',
		'fields' => array (
			array (
				'key' => 'field_56819653e7dc2',
				'label' => 'Destacada Home',
				'name' => 'noticia-destacada',
				'type' => 'true_false',
				'message' => 'Marcar como destacada en el Home',
				'default_value' => 0,
			),
			array (
				'key' => 'field_5697dba26a572',
				'label' => 'Breaking News',
				'name' => 'noticia-breaking-news',
				'type' => 'true_false',
				'message' => 'Marcar como Breaking News',
				'default_value' => 0,
			),
			array (
				'key' => 'field_56ec5534aae8f',
				'label' => 'Marcar como Video',
				'name' => 'noticia_video',
				'type' => 'true_false',
				'message' => 'Marcar esta noticia para aparecer en secciones de Video',
				'default_value' => 0,
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'noticias',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'post',
					'order_no' => 0,
					'group_no' => 1,
				),
			),
		),
		'options' => array (
			'position' => 'side',
			'layout' => 'default',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
	register_field_group(array (
		'id' => 'acf_horario-fin',
		'title' => 'Horario Fin',
		'fields' => array (
			array (
				'key' => 'field_567832fb96be0',
				'label' => 'Hora',
				'name' => 'hora-fin',
				'type' => 'select',
				'required' => 1,
				'choices' => array (
					0 => 0,
					1 => 1,
					2 => 2,
					3 => 3,
					4 => 4,
					5 => 5,
					6 => 6,
					7 => 7,
					8 => 8,
					9 => 9,
					10 => 10,
					11 => 11,
					12 => 12,
					13 => 13,
					14 => 14,
					15 => 15,
					16 => 16,
					17 => 17,
					18 => 18,
					19 => 19,
					20 => 20,
					21 => 21,
					22 => 22,
					23 => 23,
					24 => 24,
				),
				'default_value' => 0,
				'allow_null' => 0,
				'multiple' => 0,
			),
			array (
				'key' => 'field_567833628311f',
				'label' => 'Minuto',
				'name' => 'minuto-fin',
				'type' => 'select',
				'required' => 1,
				'choices' => array (
					0 => 0,
					1 => 1,
					2 => 2,
					3 => 3,
					4 => 4,
					5 => 5,
					6 => 6,
					7 => 7,
					8 => 8,
					9 => 9,
					10 => 10,
					11 => 11,
					12 => 12,
					13 => 13,
					14 => 14,
					15 => 15,
					16 => 16,
					17 => 17,
					18 => 18,
					19 => 19,
					20 => 20,
					21 => 21,
					22 => 22,
					23 => 23,
					24 => 24,
					25 => 25,
					26 => 26,
					27 => 27,
					28 => 28,
					29 => 29,
					30 => 30,
					31 => 31,
					32 => 32,
					33 => 33,
					34 => 34,
					35 => 35,
					36 => 36,
					37 => 37,
					38 => 38,
					39 => 39,
					40 => 40,
					41 => 41,
					42 => 42,
					43 => 43,
					44 => 44,
					45 => 45,
					46 => 46,
					47 => 47,
					48 => 48,
					49 => 49,
					50 => 50,
					51 => 51,
					52 => 52,
					53 => 53,
					54 => 54,
					55 => 55,
					56 => 56,
					57 => 57,
					58 => 58,
					59 => 59,
					60 => 60,
				),
				'default_value' => 0,
				'allow_null' => 0,
				'multiple' => 0,
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'programacion',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'side',
			'layout' => 'default',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
	register_field_group(array (
		'id' => 'acf_horario-inicio',
		'title' => 'Horario Inicio',
		'fields' => array (
			array (
				'key' => 'field_567332171f16f',
				'label' => 'Dias',
				'name' => 'dia-inicio',
				'type' => 'select',
				'choices' => array (
					'Lunes' => 'Lunes',
					'Martes' => 'Martes',
					'Miércoles' => 'Miércoles',
					'Jueves' => 'Jueves',
					'Viernes' => 'Viernes',
					'Sábado' => 'Sábado',
					'Domingo' => 'Domingo',
				),
				'default_value' => 'Lunes',
				'allow_null' => 0,
				'multiple' => 1,
			),
			array (
				'key' => 'field_56732f334df6b',
				'label' => 'Hora',
				'name' => 'hora-inicio',
				'type' => 'select',
				'required' => 1,
				'choices' => array (
					0 => 0,
					1 => 1,
					2 => 2,
					3 => 3,
					4 => 4,
					5 => 5,
					6 => 6,
					7 => 7,
					8 => 8,
					9 => 9,
					10 => 10,
					11 => 11,
					12 => 12,
					13 => 13,
					14 => 14,
					15 => 15,
					16 => 16,
					17 => 17,
					18 => 18,
					19 => 19,
					20 => 20,
					21 => 21,
					22 => 22,
					23 => 23,
					24 => 24,
				),
				'default_value' => 0,
				'allow_null' => 0,
				'multiple' => 0,
			),
			array (
				'key' => 'field_567330134df6c',
				'label' => 'Minuto',
				'name' => 'minuto-inicio',
				'type' => 'select',
				'required' => 1,
				'choices' => array (
					0 => 0,
					1 => 1,
					2 => 2,
					3 => 3,
					4 => 4,
					5 => 5,
					6 => 6,
					7 => 7,
					8 => 8,
					9 => 9,
					10 => 10,
					11 => 11,
					12 => 12,
					13 => 13,
					14 => 14,
					15 => 15,
					16 => 16,
					17 => 17,
					18 => 18,
					19 => 19,
					20 => 20,
					21 => 21,
					22 => 22,
					23 => 23,
					24 => 24,
					25 => 25,
					26 => 26,
					27 => 27,
					28 => 28,
					29 => 29,
					30 => 30,
					31 => 31,
					32 => 32,
					33 => 33,
					34 => 34,
					35 => 35,
					36 => 36,
					37 => 37,
					38 => 38,
					39 => 39,
					40 => 40,
					41 => 41,
					42 => 42,
					43 => 43,
					44 => 44,
					45 => 45,
					46 => 46,
					47 => 47,
					48 => 48,
					49 => 49,
					50 => 50,
					51 => 51,
					52 => 52,
					53 => 53,
					54 => 54,
					55 => 55,
					56 => 56,
					57 => 57,
					58 => 58,
					59 => 59,
					60 => 60,
				),
				'default_value' => 0,
				'allow_null' => 0,
				'multiple' => 0,
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'programacion',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'side',
			'layout' => 'default',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
	register_field_group(array (
		'id' => 'acf_presentador',
		'title' => 'Presentador',
		'fields' => array (
			array (
				'key' => 'field_568d50cbe588e',
				'label' => 'presentador',
				'name' => 'presentador-programa',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'programacion',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'acf_after_title',
			'layout' => 'default',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
	register_field_group(array (
		'id' => 'acf_sinopsis',
		'title' => 'Sinopsis',
		'fields' => array (
			array (
				'key' => 'field_567c0e1c2a1f7',
				'label' => 'sinopsis',
				'name' => 'sinopsis-noticia',
				'type' => 'wysiwyg',
				'default_value' => '',
				'toolbar' => 'full',
				'media_upload' => 'no',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'noticias',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'economia',
					'order_no' => 0,
					'group_no' => 1,
				),
			),
		),
		'options' => array (
			'position' => 'acf_after_title',
			'layout' => 'default',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
	register_field_group(array (
		'id' => 'acf_widget-en-vivo',
		'title' => 'Widget en Vivo',
		'fields' => array (
			array (
				'key' => 'field_5696d1d38670e',
				'label' => 'Imagen Presentador',
				'name' => 'en-vivo-imagen-presentador',
				'type' => 'image',
				'required' => 1,
				'save_format' => 'url',
				'preview_size' => 'thumbnail',
				'library' => 'all',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'programacion',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'acf_after_title',
			'layout' => 'default',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
}
