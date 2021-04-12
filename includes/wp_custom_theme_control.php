<?php
/* --------------------------------------------------------------
WP CUSTOMIZE SECTION - CUSTOM SETTINGS
-------------------------------------------------------------- */

add_action('customize_register', 'actualidad_customize_register');

function actualidad_customize_register($wp_customize)
{

    /* SOCIAL SETTINGS */
    $wp_customize->add_section('act_social_settings', array(
        'title'    => __('Redes Sociales', 'actualidad'),
        'description' => __('Agregue aqui las redes sociales de la página, serán usadas globalmente', 'actualidad'),
        'priority' => 175,
    ));

    $wp_customize->add_setting('act_social_settings[facebook]', array(
        'default'           => '',
        'sanitize_callback' => 'actualidad_sanitize_url',
        'capability'        => 'edit_theme_options',
        'type'           => 'option',
    ));

    $wp_customize->add_control('facebook', array(
        'type' => 'url',
        'section' => 'act_social_settings',
        'settings' => 'act_social_settings[facebook]',
        'label' => __('Facebook', 'actualidad'),
    ));

    $wp_customize->add_setting('act_social_settings[twitter]', array(
        'default'           => '',
        'sanitize_callback' => 'actualidad_sanitize_url',
        'capability'        => 'edit_theme_options',
        'type'           => 'option',
    ));

    $wp_customize->add_control('twitter', array(
        'type' => 'url',
        'section' => 'act_social_settings',
        'settings' => 'act_social_settings[twitter]',
        'label' => __('Twitter', 'actualidad'),
    ));

    $wp_customize->add_setting('act_social_settings[instagram]', array(
        'default'           => '',
        'sanitize_callback' => 'actualidad_sanitize_url',
        'capability'        => 'edit_theme_options',
        'type'           => 'option',

    ));

    $wp_customize->add_control('instagram', array(
        'type' => 'url',
        'section' => 'act_social_settings',
        'settings' => 'act_social_settings[instagram]',
        'label' => __('Instagram', 'actualidad'),
    ));

    $wp_customize->add_setting('act_social_settings[linkedin]', array(
        'default'           => '',
        'sanitize_callback' => 'actualidad_sanitize_url',
        'capability'        => 'edit_theme_options',
        'type'           => 'option',
    ));

    $wp_customize->add_control('linkedin', array(
        'type' => 'url',
        'section' => 'act_social_settings',
        'settings' => 'act_social_settings[linkedin]',
        'label' => __('LinkedIn', 'actualidad'),
    ));

    $wp_customize->add_setting('act_social_settings[youtube]', array(
        'default'           => '',
        'sanitize_callback' => 'actualidad_sanitize_url',
        'capability'        => 'edit_theme_options',
        'type'           => 'option',

    ));

    $wp_customize->add_control('youtube', array(
        'type' => 'url',
        'section' => 'act_social_settings',
        'settings' => 'act_social_settings[youtube]',
        'label' => __('YouTube', 'actualidad'),
    ));

    /* COOKIES SETTINGS */
    $wp_customize->add_section('act_cookie_settings', array(
        'title'    => __('Cookies', 'actualidad'),
        'description' => __('Opciones de Cookies', 'actualidad'),
        'priority' => 176,
    ));

    $wp_customize->add_setting('act_cookie_settings[cookie_text]', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_text_field',
        'capability'        => 'edit_theme_options',
        'type'           => 'option'

    ));

    $wp_customize->add_control('cookie_text', array(
        'type' => 'textarea',
        'label'    => __('Cookie consent', 'actualidad'),
        'description' => __('Texto del Cookie consent.'),
        'section'  => 'act_cookie_settings',
        'settings' => 'act_cookie_settings[cookie_text]'
    ));

    $wp_customize->add_setting('act_cookie_settings[cookie_link]', array(
        'default'           => '',
        'sanitize_callback' => 'absint',
        'capability'        => 'edit_theme_options',
        'type'           => 'option',

    ));

    $wp_customize->add_control('cookie_link', array(
        'type'     => 'dropdown-pages',
        'section' => 'act_cookie_settings',
        'settings' => 'act_cookie_settings[cookie_link]',
        'label' => __('Link de Cookies', 'actualidad'),
    ));
}

function actualidad_sanitize_url($url)
{
    return esc_url_raw($url);
}

/* --------------------------------------------------------------
CUSTOM CONTROL PANEL
-------------------------------------------------------------- */

class Custom_Control_Panel
{
    public function __construct()
    {
        add_action('admin_init', array($this, 'register_settings'));
        add_action('admin_menu', array($this, 'custom_panel_control'));
    }

    public function register_settings()
    {
        //register_setting('actualidad-settings-group', 'monday_start');
        //register_setting('actualidad-settings-group', 'monday_end');
        //register_setting('actualidad-settings-group', 'monday_all');
    }

    public function custom_panel_control()
    {
        add_menu_page(
            __('Actualidad - Control', 'actualidad'),
            __('Actualidad - Control', 'actualidad'),
            'edit_posts',
            'actualidad-control-panel',
            array($this, 'actualidad_control_panel_callback'),
            'none',
            1
        );
    }

    public function actualidad_control_panel_callback()
    {
        ob_start();
?>
        <div class="actualidad-admin-header-container">
            <img src="<?php echo get_template_directory_uri(); ?>/images/logo.png" alt="actualidad" />
            <h1><?php echo esc_html(get_admin_page_title()); ?></h1>
        </div>
        <form method="post" action="options.php" class="actualidad-admin-content-container">
            <?php settings_fields('actualidad-settings-group'); ?>
            <?php do_settings_sections('actualidad-settings-group'); ?>
            <div class="actualidad-admin-content-item">
                <table class="form-table">
                    <tr valign="center">
                        <th scope="row"><?php _e('Monday', 'actualidad'); ?></th>
                        <td>
                            <label for="monday_start">Starting Hour: <input type="time" name="monday_start" value="<?php echo esc_attr(get_option('monday_start')); ?>"></label>
                            <label for="monday_end">Ending Hour: <input type="time" name="monday_end" value="<?php echo esc_attr(get_option('monday_end')); ?>"></label>
                            <label for="monday_all">All Day: <input type="checkbox" name="monday_all" value="1" <?php checked(get_option('monday_all'), 1); ?>></label>
                        </td>
                    </tr>
                </table>
            </div>
            <div class="actualidad-admin-content-submit">
                <?php submit_button(); ?>
            </div>
        </form>
<?php
        $content = ob_get_clean();
        echo $content;
    }
}


new Custom_Control_Panel;
