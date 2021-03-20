<?php

/**
 * Adds new shortcode 'myprefix_say_hello' and registers it to
 * the Visual Composer plugin
 *
 */
if (!class_exists('Main_News_Dest_Shortcode')) {

    class Main_News_Dest_Shortcode extends WPBakery_Custom_Main_Class
    {

        /**
         * Main constructor
         */
        public function __construct()
        {
            // Registers the shortcode in WordPress
            add_shortcode('main_news_dest', array($this, 'output'));

            // Map shortcode to Visual Composer
            if (function_exists('vc_lean_map')) {
                vc_lean_map('main_news_dest', array($this, 'map'));
            }
        }

        /**
         * Shortcode output
         */
        public static function output($atts, $content = null)
        {

            // Extract shortcode attributes (based on the vc_lean_map function - see next function)
            extract(vc_map_get_attributes('main_news_dest', $atts));
            // Define output
            $output = '';
            $args = array('post_type' => $atts['post_types'], 'posts_per_page' => 8, 'order' => 'DESC', 'orderby' => 'date', 'category' => array($atts['category_bar']));
            ob_start();
?>
            <section class="main-dest-news-container col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <?php $arr_posts = new WP_Query($args); ?>
                <?php if ($arr_posts->have_posts()) : ?>
                    <div class="main-bar-dest-news-swiper swiper-container">
                        <div class="swiper-wrapper">
                            <?php while ($arr_posts->have_posts()) : $arr_posts->the_post(); ?>
                                <div class="swiper-slide">
                                    <article class="main-dest-news-item">
                                        <?php the_post_thumbnail('full', array('class' => 'img-fluid')); ?>
                                        <a href="<?php the_permalink(); ?>" class="main-dest-news-item-wrapper">
                                            <h2><?php the_title(); ?></h2>
                                            <div class="meta-wrapper">
                                                <span><?php echo get_the_author(); ?></span> - <span><?php echo get_the_date(); ?></span>
                                            </div>
                                        </a>
                                    </article>
                                </div>
                            <?php endwhile; ?>
                        </div>
                    </div>
                <?php endif; ?>
                <?php wp_reset_query(); ?>
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
                'name'        => esc_html__('Sección de Destacado en Slider', 'actualidad'),
                'description' => esc_html__('Este Shortcode retorna el slider de destacados principal.', 'actualidad'),
                'base'        => 'main_title_bar',
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

new Main_News_Dest_Shortcode;
