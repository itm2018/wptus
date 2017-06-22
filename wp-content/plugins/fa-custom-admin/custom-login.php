<?php
/**
 * Plugin Name: FA Customize Admin Screen
 * Plugin URI: https://giare.co
 * Description: Tùy biến lại trang quản trị của admin.
 * Version: 1.0
 * Author: CaHs
 * Author URI: https://giare.co
 */

function fa_custom_logo()
{
    ?>
    <style type="text/css">
        body {
            background: #ff9800 !important;
        }

        .login #nav a, .login #backtoblog a, .login label {
            color: #f3f3f3 !important;
        }

        #wp-submit {
            background-color: #e91e63 !important;
        }

        .wp-core-ui .button-primary {
            background: #31b36b !important;
            border: none !important;
            text-shadow: none !important;
            box-shadow: none !important;

        }

        .login form {
            box-shadow: none !important;
            background: transparent !important;
        }

        #login h1 a {
            background-image: url(<?php echo plugins_url('images/logo.png', __FILE__); ?>);
            /*background-size: 280px 80px;*/
            /*width: 280px;*/
            /*height: 80px;*/
        }
    </style>
    <?php
}

add_action('login_enqueue_scripts', 'fa_custom_logo');

function fa_rememberme_check()
{
    add_filter('login_footer', 'fa_rememberme_checked');
}

add_action('init', 'fa_rememberme_check');

function fa_rememberme_checked()
{
    ?>
    <script type="text/javascript">
        document.getElementById("rememberme").checked = true;
    </script>
    <?php
}

/**
 * them logo
 */
function fa_admin_logo()
{
    echo '<br/> <img src="' . plugins_url('images/logo.png', __FILE__) . '"/>';
}

add_action('admin_notices', 'fa_admin_logo');

/**
 * sua footer
 */
function fa_admin_footer_credits($text)
{
    $text = '<p>Chào mừng đến với website <a href="//demowp.local">wptuts.org</a></p>';
    return $text;
}

add_filter('admin_footer_text', 'fa_admin_footer_credits');

/**
 * xoa widget
 */
function fa_remove_default_admin_widget()
{
    remove_meta_box('dashboard_primary', 'dashboard', 'side');
    remove_meta_box('dashboard_quick_press', 'dashboard', 'side');
    remove_meta_box('dashboard_recent_drafts', 'dashboard', 'side');
    remove_meta_box('dashboard_recent_comments', 'dashboard', 'normal');
    remove_meta_box('dashboard_activity', 'dashboard', 'normal');
    remove_meta_box('dashboard_right_now', 'dashboard', 'normal');
}

add_action('wp_dashboard_setup', 'fa_remove_default_admin_widget');
remove_action( 'welcome_panel', 'wp_welcome_panel' );

/*
 * tao mot widget
 */
function fa_create_admin_widget_notice(){
    wp_add_dashboard_widget('fa_notice', __('Ghi chú'), 'fa_create_admin_widget_notice_callback');
}

/**
 * dang ky widget
 */
add_action('wp_dashboard_setup', 'fa_create_admin_widget_notice');

/**
 * tao noi dung cho widget
 */
function fa_create_admin_widget_notice_callback(){
    echo 'Đây là nội dung mẫu của widget ghi chú đơn giản';
}