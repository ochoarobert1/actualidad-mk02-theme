<?php

/**
 * Adds new shortcode 'myprefix_say_hello' and registers it to
 * the Visual Composer plugin
 *
 */
if (!class_exists('Current_Show_Shortcode')) {
    class Current_Show_Shortcode extends WPBakery_Custom_Main_Class
    {
        /**
         * Main constructor
         */
        public function __construct()
        {
            // Registers the shortcode in WordPress
            add_shortcode('current_show_shortcode', array($this, 'output'));

            // Map shortcode to Visual Composer
            if (function_exists('vc_lean_map')) {
                vc_lean_map('current_show_shortcode', array($this, 'map'));
            }
        }

        /**
         * Shortcode output
         */
        public static function output($atts, $content = null)
        {
            extract(vc_map_get_attributes('current_show_shortcode', $atts));
            // init curl object
            $ch = curl_init();

            

            // Define output
            if (isset($atts['prev_program'])) {
                if ($atts['prev_program'] == 'yes') {
                    // define options
                    $optArray = array(
                CURLOPT_URL => 'https://ott.streann.com/web/services/public/webplayer/category/5d6407b32cdcadcc43a5ad92/reseller/56bb41cce4b01db401d1b040',
                CURLOPT_RETURNTRANSFER => true
            );

                    // apply those options
                    curl_setopt_array($ch, $optArray);

                    // execute request and get response
                    $result = curl_exec($ch);

                    curl_close($ch);

                    $result = json_decode($result);

                    $position = 1;
                    $video = $result[1];
                } else {
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

                    $position = 0;
                    $video = $result[0];
                }
            } else {
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

                $position = 0;
                $video = $result[0];
            }
            
            $output = '';
            ob_start(); ?>
<section class="main-video-live-container p-0 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
    <div class="container p-0">
        <div class="row no-gutters">
            <article class="main-video-live-item col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <img src="<?php echo $video->image; ?>" alt="<?php echo $video->name; ?>" class="img-fluid" />
                <header>
                    <a href="<?php echo home_url('/live/'); ?>?video=<?php echo $position; ?>" class="main-video-live-item-wrapper">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/icon-play.png" alt="Ver Video" class="img-fluid" />
                    </a>
                </header>
            </article>
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
            return array(
                'name'        => esc_html__('Sección de Video Actual', 'actualidad'),
                'description' => esc_html__('Este Shortcode retorna una seccion de Video Actual.', 'actualidad'),
                'base'        => 'current_show_shortcode',
                'params'      => array(
                    array(
                        'type'       => 'checkbox',
                        'heading'    => esc_html__('Seleccione si debe mostrarse el programa anterior, en lugar del actual', 'actualidad'),
                        'param_name' => 'prev_program',
                        'value'      => array(
                            'Mostrar Programa Anterior' => 'yes'
                        )
                    ),

                ),
            );
        }
    }
}

new Current_Show_Shortcode;
