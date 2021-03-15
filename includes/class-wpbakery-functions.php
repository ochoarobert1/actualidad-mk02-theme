<?php

/**
 * WP_BAKERY_MAIN_CLASS
 *
 * @package actualidad
 * @subpackage actualidad-mk01-theme
 * @since Mk. 1.0
 */
if (!class_exists('WPBakery_Custom_Main_Class')) {

    class WPBakery_Custom_Main_Class
    {
        /**
         * Main constructor
         */
        public function __construct()
        {
            add_action('wp_enqueue_scripts', array($this, 'wpbakery_enqueue_elements'));
        }

        /**
         * General Scripts and Styles
         */
        public function wpbakery_enqueue_elements()
        {
            wp_enqueue_script('wpbakery-scripts', get_template_directory_uri() . '/js/wpbakery-functions.js', array('jquery'), null, true);
            wp_enqueue_style('wpbakery-styles', get_template_directory_uri() . '/css/wpbakery-styles.css', null, null, 'all');
            wp_enqueue_style('wpbakery-mediaqueries', get_template_directory_uri() . '/css/wpbakery-mediaqueries.css', null, null, 'all');
        }
    }
}

new WPBakery_Custom_Main_Class;