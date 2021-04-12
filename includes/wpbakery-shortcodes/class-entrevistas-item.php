<?php

/**
 * Adds new shortcode 'myprefix_say_hello' and registers it to
 * the Visual Composer plugin
 *
 */
if (!class_exists('Main_Entrevistas_Shortcode')) {

    class Main_Entrevistas_Shortcode extends WPBakery_Custom_Main_Class
    {

        /**
         * Main constructor
         */
        public function __construct()
        {
            // Registers the shortcode in WordPress
            add_shortcode('main_entrevistas_item', array($this, 'output'));

            // Map shortcode to Visual Composer
            if (function_exists('vc_lean_map')) {
                vc_lean_map('main_entrevistas_item', array($this, 'map'));
            }
        }

        /**
         * Shortcode output
         */
        public static function output($atts, $content = null)
        {

            // Extract shortcode attributes (based on the vc_lean_map function - see next function)
            extract(vc_map_get_attributes('main_entrevistas_item', $atts));
            // Define output
            $output = '';
            $url_link = vc_build_link($atts['page_link']);
            ob_start();
?>
            <article class="main-item-entrevistas-container col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="container-fluid p-0">
                    <div class="row align-items-center">
                        <header class="main-item-entrevistas-content col-12">
                            <h2><?php echo $atts['title']; ?></h2>
                            <div class="content">
                                <?php echo apply_filters('the_content', $content); ?>
                            </div>
                            <audio src="<?php echo $url_link['url']; ?>" controls></audio>
                        </header>
                    </div>
                </div>
            </article>
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
                'name'        => esc_html__('Sección de Entrevistas', 'actualidad'),
                'description' => esc_html__('Este Shortcode retorna un item natural de Entrevistas.', 'actualidad'),
                'base'        => 'main_entrevistas_item',
                'params'      => array(
                    array(
                        'heading' => __('Título de la Entrevista', 'actualidad'),
                        'value' => __('Título de la sección', 'actualidad'),
                        'description' => __('Ingrese el título a mostrar en el recuadro.', 'actualidad'),
                        'type' => 'textfield',
                        'holder' => 'div',
                        'class' => '',
                        'param_name' => 'title'
                    ),
                    array(
                        'heading' => __('Contenido de la Entrevista', 'actualidad'),
                        'value' => __('Contenido de la Entrevista', 'actualidad'),
                        'description' => __('Ingrese el contenido a mostrar en el recuadro.', 'actualidad'),
                        'type' => 'textfield',
                        'holder' => 'div',
                        'class' => '',
                        'param_name' => 'content'
                    ),
                    array(
                        'heading' => __('Link de la Entrevista', 'actualidad'),
                        'value' => __('Link de la Entrevista', 'actualidad'),
                        'description' => __('Seleccione o cargue el link del archivo donde esta la entrevista', 'actualidad'),
                        'type' => 'vc_link',
                        'holder' => '',
                        'class' => '',
                        'param_name' => 'page_link'
                    )

                ),
            );
        }
    }
}

new Main_Entrevistas_Shortcode;
