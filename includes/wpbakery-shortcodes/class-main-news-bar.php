<?php

/**
 * Adds new shortcode 'myprefix_say_hello' and registers it to
 * the Visual Composer plugin
 *
 */
if (!class_exists('Main_News_Bar_Shortcode')) {

    class Main_News_Bar_Shortcode extends WPBakery_Custom_Main_Class
    {

        /**
         * Main constructor
         */
        public function __construct()
        {
            // Registers the shortcode in WordPress
            add_shortcode('main_news_bar', array($this, 'output'));

            // Map shortcode to Visual Composer
            if (function_exists('vc_lean_map')) {
                vc_lean_map('main_news_bar', array($this, 'map'));
            }
        }

        /**
         * Shortcode output
         */
        public static function output($atts, $content = null)
        {

            // Extract shortcode attributes (based on the vc_lean_map function - see next function)
            extract(vc_map_get_attributes('main_news_bar', $atts));
            // Define output
            global $posted_id;
            $output = '';
            $args = array('post_type' => $atts['post_type'], 'posts_per_page' => 8, 'order' => 'DESC', 'orderby' => 'date', 'category' => array($atts['category_bar']), 'post__not_in' => $posted_id);
            ob_start();
?>
            <section class="main-news-bar-container col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="container p-0">
                    <div class="row no-gutters">
                        <div class="main-news-bar-content col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="main-news-bar-wrapper">
                                <header class="main-news-bar-title">
                                    <?php echo $content; ?>
                                </header>
                                <main class="main-news-bar-slider">
                                    <?php $arr_posts = new WP_Query($args); ?>
                                    <?php if ($arr_posts->have_posts()) : ?>
                                        <div class="main-bar-swiper-container swiper-container">
                                            <div class="swiper-wrapper">
                                                <?php while ($arr_posts->have_posts()) : $arr_posts->the_post(); ?>
                                                <?php array_push($posted_id, get_the_ID()); ?>
                                                    <div class="swiper-slide">
                                                        <article class="main-news-bar-item">
                                                            <picture><a href="<?php the_permalink(); ?>" title="<?php _e('Haga click aqui para visualizar esta noticia', 'actualidad'); ?>"><?php the_post_thumbnail('small_thumb', array('class' => 'img-fluid')); ?></a></picture>
                                                            <h4><a href="<?php the_permalink(); ?>" title="<?php _e('Haga click aqui para visualizar esta noticia', 'actualidad'); ?>"><?php the_title(); ?></a></h4>
                                                        </article>
                                                    </div>
                                                <?php endwhile; ?>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                    <?php wp_reset_query(); ?>
                                </main>
                            </div>
                        </div>
                    </div>
                </div>
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
                'name'        => esc_html__('Barra en Slider de Noticias', 'actualidad'),
                'description' => esc_html__('Este Shortcode retorna una barra con noticias dentro de un slider.', 'actualidad'),
                'base'        => 'main_news_bar',
                'params'      => array(
                    array(
                        'heading' => __('Título de la Barra', 'actualidad'),
                        'value' => __('Lo Último', 'actualidad'),
                        'description' => __('Ingrese el título a mostrar en el recuadro izquierdo.', 'actualidad'),
                        'type' => 'textfield',
                        'holder' => 'div',
                        'class' => '',
                        'param_name' => 'content'
                    ),
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

new Main_News_Bar_Shortcode;
