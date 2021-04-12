<?php

/**
 * Adds new shortcode 'myprefix_say_hello' and registers it to
 * the Visual Composer plugin
 *
 */
if (!class_exists('Vertical_Slider_Shortcode')) {

    class Vertical_Slider_Shortcode extends WPBakery_Custom_Main_Class
    {

        /**
         * Main constructor
         */
        public function __construct()
        {
            // Registers the shortcode in WordPress
            add_shortcode('vertical_slider_item', array($this, 'output'));

            // Map shortcode to Visual Composer
            if (function_exists('vc_lean_map')) {
                vc_lean_map('vertical_slider_item', array($this, 'map'));
            }
        }

        /**
         * Shortcode output
         */
        public static function output($atts, $content = null)
        {

            // Extract shortcode attributes (based on the vc_lean_map function - see next function)
            extract(vc_map_get_attributes('vertical_slider_item', $atts));
            // Define output
            $output = '';
            $args = array('post_type' => $atts['post_type'], 'posts_per_page' => 6, 'order' => 'DESC', 'orderby' => 'date', 'category' => array($atts['category_bar']), 'post__not_in' => $posted_id);
            ob_start();
?>

            <?php $arr_posts = new WP_Query($args); ?>
            <?php if ($arr_posts->have_posts()) : ?>
                <!-- Slider main container -->
                <div class="vertical-swiper-container swiper-container">
                    <div class="swiper-wrapper">
                        <?php while ($arr_posts->have_posts()) : $arr_posts->the_post(); ?>
                        <?php array_push($posted_id, get_the_ID()); ?>
                            <div class="swiper-slide">
                                <article class="vertical-slider-item-container">
                                    <picture class="vertical-slider-item-image">
                                        <?php the_post_thumbnail('horizontal_news', array('class' => 'img-fluid')); ?>
                                    </picture>
                                </article>
                            </div>
                        <?php endwhile; ?>
                    </div>
                </div>
            <?php endif; ?>
            <?php wp_reset_query(); ?>

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
                'name'        => esc_html__('Slider Vertical', 'actualidad'),
                'description' => esc_html__('Este Shortcode retorna un slider vertical de elementos.', 'actualidad'),
                'base'        => 'vertical_slider_item',
                'params'      => array(
                    array(
                        'heading' => __('Tipos de Entradas', 'actualidad'),
                        'value' => __('post', 'actualidad'),
                        'description' => __('Seleccione el/los tipos de entrada a mostrar en esta zona.', 'actualidad'),
                        'type' => 'posttypes',
                        'holder' => 'div',
                        'class' => '',
                        'param_name' => 'post_type'
                    ),
                    array(
                        'type'       => 'checkbox',
                        'heading'    => esc_html__('Seleccione las categorias a considerar en esta barra', 'actualidad'),
                        'param_name' => 'category_bar',
                        'value'      => $categories_arr
                    ),

                ),
            );
        }
    }
}

new Vertical_Slider_Shortcode;
