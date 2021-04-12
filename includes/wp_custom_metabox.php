<?php
function ed_metabox_include_front_page($display, $meta_box)
{
    if (!isset($meta_box['show_on']['key'])) {
        return $display;
    }

    if ('front-page' !== $meta_box['show_on']['key']) {
        return $display;
    }

    $post_id = 0;

    // If we're showing it based on ID, get the current ID
    if (isset($_GET['post'])) {
        $post_id = $_GET['post'];
    } elseif (isset($_POST['post_ID'])) {
        $post_id = $_POST['post_ID'];
    }

    if (!$post_id) {
        return false;
    }

    // Get ID of page set as front page, 0 if there isn't one
    $front_page = get_option('page_on_front');

    // there is a front page set and we're on it!
    return $post_id == $front_page;
}
add_filter('cmb2_show_on', 'ed_metabox_include_front_page', 10, 2);

function be_metabox_show_on_slug($display, $meta_box)
{
    if (!isset($meta_box['show_on']['key'], $meta_box['show_on']['value'])) {
        return $display;
    }

    if ('slug' !== $meta_box['show_on']['key']) {
        return $display;
    }

    $post_id = 0;

    // If we're showing it based on ID, get the current ID
    if (isset($_GET['post'])) {
        $post_id = $_GET['post'];
    } elseif (isset($_POST['post_ID'])) {
        $post_id = $_POST['post_ID'];
    }

    if (!$post_id) {
        return $display;
    }

    $slug = get_post($post_id)->post_name;

    // See if there's a match
    return in_array($slug, (array) $meta_box['show_on']['value']);
}
add_filter('cmb2_show_on', 'be_metabox_show_on_slug', 10, 2);

add_action('cmb2_admin_init', 'actualidad_register_custom_metabox');
function actualidad_register_custom_metabox()
{
    $prefix = 'act_';

    /* 3.- HOME: BENEFITS SECTION */
    $cmb_podcasts = new_cmb2_box(array(
        'id'            => $prefix . 'podcasts_metabox',
        'title'         => esc_html__('Podcast: Información Adicional', 'actualidad'),
        'object_types'  => array('podcast'),
        'context'       => 'normal',
        'priority'      => 'high',
        'show_names'    => true,
        'cmb_styles'    => true,
        'closed'        => false
    ));

    $cmb_podcasts->add_field(array(
        'name'    => esc_html__('Tipo de Archivo', 'actualidad'),
        'id'      => 'episode_type',
        'type'    => 'radio_inline',
        'options' => array(
            'audio' => __('Audio', 'actualidad'),
            'video'   => __('Video', 'actualidad')
        ),
        'default' => 'standard',
    ));

    $cmb_podcasts->add_field(array(
        'id'        => 'audio_file',
        'name'      => esc_html__('Archivo del Podcast', 'actualidad'),
        'desc'      => esc_html__('Cargar Archivo del Podcast', 'actualidad'),
        'type'      => 'file',

        'options' => array(
            'url' => true
        ),
        'text'    => array(
            'add_upload_file_text' => esc_html__('Cargar Audio / Video', 'actualidad'),
        ),
        'preview_size' => 'thumbnail'
    ));

    $cmb_podcasts->add_field(array(
        'id'        => 'duration',
        'name'      => esc_html__('Duracion del Archivo', 'actualidad'),
        'desc'      => esc_html__('Agregar la duración del archivo podcast', 'actualidad'),
        'type'      => 'text'
    ));

    $cmb_podcasts->add_field(array(
        'id'        => 'filesize',
        'name'      => esc_html__('Tamaño del Archivo', 'actualidad'),
        'desc'      => esc_html__('Agregar el tamaño del archivo', 'actualidad'),
        'type'      => 'text_url'
    ));

    $cmb_podcasts->add_field(array(
        'id'        => 'date_recorded',
        'name'      => esc_html__('Fecha de Grabacion del Archivo', 'actualidad'),
        'desc'      => esc_html__('Agregar la Fecha de Grabacion del archivo', 'actualidad'),
        'type'      => 'text_url'
    ));
}
