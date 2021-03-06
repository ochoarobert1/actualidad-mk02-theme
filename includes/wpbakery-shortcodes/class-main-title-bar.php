<?php

/**
 * Adds new shortcode 'myprefix_say_hello' and registers it to
 * the Visual Composer plugin
 *
 */
if (!class_exists('Main_Title_Bar_Shortcode')) {

    class Main_Title_Bar_Shortcode extends WPBakery_Custom_Main_Class
    {

        /**
         * Main constructor
         */
        public function __construct()
        {
            // Registers the shortcode in WordPress
            add_shortcode('main_title_bar', array($this, 'output'));

            // Map shortcode to Visual Composer
            if (function_exists('vc_lean_map')) {
                vc_lean_map('main_title_bar', array($this, 'map'));
            }
        }

        /**
         * Shortcode output
         */
        public static function output($atts, $content = null)
        {

            // Extract shortcode attributes (based on the vc_lean_map function - see next function)
            extract(vc_map_get_attributes('main_title_bar', $atts));
            // Define output
            $output = '';
            ob_start();
?>
            <section class="main-title-bar-container col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <h3><?php echo $content; ?></h3>
            </section>
<?php
            $output = ob_get_clean();
            return $output;
        }

        /**
         * Map shortcode to VC
         *
         * This is an array of all your settings which become the shortcode attributes ($atts)
         * for the output. See the link below for a description of all available parameters.
         *
         * @since 1.0.0
         * @link  https://kb.wpbakery.com/docs/inner-api/vc_map/
         */
        public static function map()
        {
            $categories_arr = array();
            $categories = get_terms(array('taxonomy' => 'category', 'hide_empty'));
            if (!empty($categories)) :
                foreach ($categories as $item) {
                    $categories_arr[$item->name] = $item->term_id;
                }
            endif;

            return array(
                'name'        => esc_html__('Titulo de Seccion Personalizado', 'actualidad'),
                'description' => esc_html__('Este Shortcode retorna el estilo natural de los titulos en el sitio.', 'actualidad'),
                'base'        => 'main_title_bar',
                'params'      => array(
                    array(
                        'heading' => __('Título de la Barra', 'actualidad'),
                        'value' => __('Título de la sección', 'actualidad'),
                        'description' => __('Ingrese el título a mostrar en el recuadro izquierdo.', 'actualidad'),
                        'type' => 'textfield',
                        'holder' => 'div',
                        'class' => '',
                        'param_name' => 'content'
                    ),
                    array(
                        'heading' => __('Link de la Barra', 'actualidad'),
                        'value' => __('Link de la sección', 'actualidad'),
                        'description' => __('Seleccione a donde debe ir la pagina si se hace click en el título', 'actualidad'),
                        'type' => 'vc_link',
                        'holder' => '',
                        'class' => '',
                        'param_name' => 'page_link'
                    ),
                ),
            );
        }
    }
}

new Main_Title_Bar_Shortcode;
