<?php
/**
 * Plugin Name: faws
 * Plugin URI: http://test.com
 * Description: This is faws plugin
 * Author: cahs
 * Author URI: http://github.com
 * Version: 1.1
 * Licence: GPLv2 or later
 */
function enqueue_scripts_and_styles()
{
//    wp_register_style('faws-foundation', get_theme_root_uri() . '/lib/foundation.css', array());
//    wp_enqueue_style('faws-foundation');
    wp_enqueue_script('jquery');
    wp_register_script('faws-plugin-script', plugins_url('/js/script.js'), __FILE__);
    wp_enqueue_script('faws-plugin-script');
}

/*
 * register css style sheets and javascript files
 */
add_action('wp_enqueue_scripts', 'enqueue_scripts_and_styles');

function register_my_settings()
{
    register_setting('faws-settings-group', 'faws_option_1');
    register_setting('faws-settings-group', 'faws_option_api_key');
}

function faws_create_menu()
{
    add_menu_page('FAWS Plugin Settings', 'FAWS Settings', 'administrator', 'faws_settings', 'faws_settings_page', plugins_url('/images/icon.png', __FILE__), 2);
    add_action('admin_init', 'register_my_settings');
}

/*
 * add the FAWS Settings menu to the administrator menu
 */
add_action('admin_menu', 'faws_create_menu');

/**
 * html of faws settings page
 */
function faws_settings_page()
{
    ?>
    <div class="wrap">
        <h2>FAWS settings page</h2>
        <?php if (isset($_GET['settings-updated'])) { ?>
            <div id="message" class="updated">
                <p><strong><?php _e('Settings saved.') ?></strong></p>
            </div>
        <?php } ?>
        <form method="post" action="options.php">
            <?php settings_fields('faws-settings-group'); ?>
            <table class="form-table">
                <tr valign="top">
                    <th scope="row">Tùy chọn cài đặt</th>
                    <td><input type="text" class="input" name="faws_option_1" value="<?php echo get_option('faws_option_1'); ?>"/></td>
                </tr>
                <tr valign="top">
                    <th scope="row">AWS API KEY</th>
                    <td><input type="text" class="input" name="faws_option_api_key" value="<?php echo get_option('faws_option_api_key'); ?>"/></td>
                </tr>
            </table>
            <?php submit_button(); ?>
        </form>
    </div>
    <?php
}


if (!class_exists('FAWS')) {
    class FAWS
    {
        function __construct()
        {
            if (!function_exists('add_shortcode')) {
                return;
            }
            add_shortcode('xinchao', array(&$this, 'xinchao_func'));
        }

        function xinchao_func($atts = array(), $content = null)
        {
            extract(shortcode_atts(array('name' => 'Thế'), $atts));
            return '<div><p>Xin chào <strong>' . $name . '</strong>!!!</p></div>';
        }
    }
}

function faws_load()
{
    global $cfaws;
    $cfaws = new FAWS();
}

add_action('plugins_loaded', 'faws_load');