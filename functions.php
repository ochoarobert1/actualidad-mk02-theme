<?php

/* --------------------------------------------------------------
    ENQUEUE AND REGISTER CSS
-------------------------------------------------------------- */

require_once('includes/wp_enqueue_styles.php');

/* --------------------------------------------------------------
    ENQUEUE AND REGISTER JS
-------------------------------------------------------------- */

if (!is_admin()) {
    add_action('wp_enqueue_scripts', 'actualidad_jquery_enqueue');
}
function actualidad_jquery_enqueue()
{
    wp_deregister_script('jquery');
    wp_deregister_script('jquery-migrate');
    if ($_SERVER['REMOTE_ADDR'] == '::1') {
        /*- JQUERY ON LOCAL  -*/
        wp_register_script('jquery', get_template_directory_uri() . '/js/jquery.min.js', false, '3.5.1', false);
        /*- JQUERY MIGRATE ON LOCAL  -*/
        wp_register_script('jquery-migrate', get_template_directory_uri() . '/js/jquery-migrate.min.js', array('jquery'), '3.1.0', false);
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
require_once('includes/wpbakery-shortcodes/class-news-item-vertical.php');
require_once('includes/wpbakery-shortcodes/class-vertical-slider.php');
require_once('includes/wpbakery-shortcodes/class-podcast-slider.php');
require_once('includes/wpbakery-shortcodes/class-horizontal-news.php');
require_once('includes/wpbakery-shortcodes/class-horizontal-news-fourth.php');
require_once('includes/wpbakery-shortcodes/class-current-show.php');

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
    add_image_size('horizontal_news', 380, 243, array('center', 'center'));
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

/* --------------------------------------------------------------
    ADD CUSTOM THEME CONTROLS
-------------------------------------------------------------- */

require_once('includes/wp_trash_code.php');

function get_current_video($position)
{
    // init curl object
    $ch = curl_init();

    // define options
    $optArray = array(
        CURLOPT_URL => 'https://ott.streann.com/web/services/public/webplayer/category/5b5b62b62cdcc2211e5f7472/reseller/56bb41cce4b01db401d1b040',
        CURLOPT_RETURNTRANSFER => true
    );

    // apply those options
    curl_setopt_array($ch, $optArray);

    // execute request and get response
    $result = curl_exec($ch);

    curl_close($ch);

    $result = json_decode($result);

    $video = $result[$position];

    return $video;
}


function get_all_first_programs()
{
    $arr_response = array();
    $arr_urls = array(
        'https://ott.streann.com/web/services/public/webplayer/category/5d6407b32cdcadcc43a5ad92/reseller/56bb41cce4b01db401d1b040',
        'https://ott.streann.com/web/services/public/webplayer/category/5b5b62b62cdcc2211e5f7472/reseller/56bb41cce4b01db401d1b040',
        'https://ott.streann.com/web/services/public/webplayer/category/5b5b68932cdcc2211e5f747b/reseller/56bb41cce4b01db401d1b040',
        'https://ott.streann.com/web/services/public/webplayer/category/5b5b73222cdcc2211e5f748b/reseller/56bb41cce4b01db401d1b040',
        'https://ott.streann.com/web/services/public/webplayer/category/5b5b74682cdc93c09b48022d/reseller/56bb41cce4b01db401d1b040',
        'https://ott.streann.com/web/services/public/webplayer/category/5b5b79d62cdcc2211e5f749b/reseller/56bb41cce4b01db401d1b040',
        'https://ott.streann.com/web/services/public/webplayer/category/5b5b7c542cdc93c09b480244/reseller/56bb41cce4b01db401d1b040'
    );

    foreach ($arr_urls as $item) {
        // init curl object
        $ch = curl_init();

        // define options
        $optArray = array(
    CURLOPT_URL => $item,
    CURLOPT_RETURNTRANSFER => true
);

        // apply those options
        curl_setopt_array($ch, $optArray);

        // execute request and get response
        $result = curl_exec($ch);

        curl_close($ch);

        $result = json_decode($result);

        $arr_response[] = $result[0];
    }
    

    return $arr_response;
}

function get_all_programs()
{
    $arr_response = array();
    $arr_urls = array(
        'https://ott.streann.com/web/services/public/webplayer/category/5d6407b32cdcadcc43a5ad92/reseller/56bb41cce4b01db401d1b040',
        'https://ott.streann.com/web/services/public/webplayer/category/5b5b62b62cdcc2211e5f7472/reseller/56bb41cce4b01db401d1b040',
        'https://ott.streann.com/web/services/public/webplayer/category/5b5b68932cdcc2211e5f747b/reseller/56bb41cce4b01db401d1b040',
        'https://ott.streann.com/web/services/public/webplayer/category/5b5b73222cdcc2211e5f748b/reseller/56bb41cce4b01db401d1b040',
        'https://ott.streann.com/web/services/public/webplayer/category/5b5b74682cdc93c09b48022d/reseller/56bb41cce4b01db401d1b040',
        'https://ott.streann.com/web/services/public/webplayer/category/5b5b79d62cdcc2211e5f749b/reseller/56bb41cce4b01db401d1b040',
        'https://ott.streann.com/web/services/public/webplayer/category/5b5b7c542cdc93c09b480244/reseller/56bb41cce4b01db401d1b040'
    );

    foreach ($arr_urls as $item) {
        // init curl object
        $ch = curl_init();

        // define options
        $optArray = array(
    CURLOPT_URL => $item,
    CURLOPT_RETURNTRANSFER => true
);

        // apply those options
        curl_setopt_array($ch, $optArray);

        // execute request and get response
        $result = curl_exec($ch);

        curl_close($ch);

        $result = json_decode($result);

        $arr_response[] = $result;
    }
    

    return $arr_response;
}
