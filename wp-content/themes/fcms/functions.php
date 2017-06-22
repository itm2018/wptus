<?php
/**
 * Description: main functions of the theme
 * User: PCPV
 * Date: 06/14/2017
 * Time: 04:10 PM
 */

/**
 * define necessary variables
 */
define('THEME_URL', get_stylesheet_directory());
define('CORE', THEME_URL . '/core');

/**
 * load core init
 */
require_once(CORE . '/init.php');

if (!isset($content_width)) {
    $content_width = 620;
}

if (!function_exists('fcms_theme_setup')) {
    function fcms_theme_setup()
    {

        $language_folder = THEME_URL . '/languages';
        load_theme_textdomain('fcms', $language_folder);
        /*
         * rss feed
         */
        add_theme_support('automatic-feed-link');
        /**
         * post thumbnail
         */
        add_theme_support('post-thumbnails');
        /**
         * title-tag
         */
        add_theme_support('title-tag');
        /*
         * post format
         */
        add_theme_support('post-formats', array(
            'image',
            'video',
            'gallery',
            'quote',
            'link',
            'job'
        ));
        /*
         * custom background
         */
        $default_background = array(
            'default-color' => '#e8e8e8'
        );
        add_theme_support('custom-background', $default_background);

        /**
         * menu
         */
        register_nav_menu('primary-menu', __('Primary Menu', 'fcms'));
        register_nav_menu('secondary-menu', __('Secondary Menu', 'fcms'));

        /*
         * sidebar
         */
        $sidebar = array(
            'name' => __('Main Sidebar', 'fcms'),
            'id' => 'main-sidebar',
            'description' => 'Main sidebar of FMCS theme',
            'class' => 'main-sidebar',
            'before_title' => '<h3 class="widgettile">',
            'after_sidebar' => '</h3>'
        );
        register_sidebar($sidebar);
    }

    add_action('init', 'fcms_theme_setup');
}

if (!function_exists('fcms_logo')) {
    function fcms_logo()
    {
        ?>
        <div class="logo">
            <div class="site-name">
                <?php if (is_home()) {
                    printf(
                        '<h1><a href="%1$s" title="%2$s">%3$s</a></h1>',
                        get_bloginfo('url'),
                        get_bloginfo('description'),
                        get_bloginfo('sitename')
                    );
                } else {
                    printf(
                        '<p><a href="%1$s" title="%2$s">%3$s</a></p>',
                        get_bloginfo('url'),
                        get_bloginfo('description'),
                        get_bloginfo('sitename')
                    );
                } // endif
                ?>
            </div>
            <div class="site-description"><?php bloginfo('description'); ?></div>
        </div>
        <?php
    }
}

if (!function_exists('fcms_menu')) {
    function fcms_menu($slug)
    {
        $menu = array(
            'theme_location' => $slug,
            'container' => 'nav',
            'container_class' => $slug
        );
        wp_nav_menu($menu);
    }
}

if (!function_exists('fcms_pagination')) {
    function fcms_pagination()
    {
//        if (!$GLOBALS['wp_query']->max_num_pages < 2) {
//            return '';
//        }
        ?>
        <nav class="pagination" role="navigation">
            <?php if (get_next_post_link()): ?>
                <div class="prev"><?php next_post_link(__('Older Posts', 'fcms')) ?></div>
            <?php endif; ?>
            <?php if (get_previous_post_link()): ?>
                <div class="next"><?php previous_post_link(__('Newer Posts', 'fcms')) ?></div>
            <?php endif; ?>
        </nav>
        <?php
    }
}

/*
 * hien thi thumbnail
 */
if (!function_exists('fcms_thumbnail')) {
    function fcms_thumbnail($size)
    {
        if (!is_single() && has_post_thumbnail() && !post_password_required() || has_post_format('image')):?>
            <figure class="post-thumbnail"><?php the_post_thumbnail($size) ?></figure>
            <?php
        endif;
    }
}

/*
 * hien thi tieu de post
 */

if (!function_exists('fcms_entry_header')) {
    function fcms_entry_header()
    {
        if (is_single()) : ?>
            <h1 class="entry-title">
                <a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute() ?>">
                    <?php the_title() ?>
                </a>
            </h1>
        <?php else: ?>
            <h2 class="entry-title">
                <a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute() ?>">
                    <?php the_title() ?>
                </a>
            </h2>
            <?php
        endif;
    }
}

/*
 * hien thi post meta
 */
if (!function_exists('fcms_entry_meta')) {
    function fcms_entry_meta()
    {
        if (!is_page()):
            ?>
            <div class="entry-meta">
                <?php printf(__('<span class="author">Posted by %1$s</span>', 'fcms'), get_the_author()) ?>
                <?php printf(__('<span class="date-published"> at %1$s</span>', 'fcms'), get_the_date()) ?>
                <?php printf(__('<span class="category"> in %1$s</span>', 'fcms'), get_the_category_list(', ')) ?>
                <?php
                if (comments_open()):
                    ?>
                    <span class="meta-reply">
                  <?php
                  comments_popup_link(
                      __('Leave a comment', 'fcms'),
                      __('One comment', 'fcms'),
                      __('% comments', 'fcms'),
                      __('Read all comments', 'fcms')
                  );
                  ?>
              </span>
                    <?php
                endif;
                ?>
            </div>
            <?php
        endif;
    }
}

/*
 * hien thi read more
 */
if (!function_exists('fcms_readmore')) {
    function fcms_readmore()
    {
        return '...<a class="read-more" href="' . get_permalink(get_the_ID()) . '">' . __('Read more', 'fcms') . '</a>';
    }
}
add_filter('excerpt_more', 'fcms_readmore');

/*
 * hien thi entry content
 */
if (!function_exists('fcms_entry_conent')) {
    function fcms_entry_conent()
    {
        if (!is_single()):
            the_excerpt();
        else:
            the_content();
            /*
             * pagination
             */
            $link_pages = array(
                'before' => __('<p>Page:', 'fcms'),
                'after' => '</p>',
                'nextpagelink' => __('Next page', 'fcms'),
                'previouspagelink' => __('Previous page', 'fcms')
            );
            wp_link_pages($link_pages);
        endif;
    }
}

/**
 * hien thi post tags
 */

if (!function_exists('fcms_entry_tag')) {
    function fcms_entry_tag()
    {
        if (has_tag()):
            ?>
            <div class="entry-tag">
                <?php printf(__('Tagged in %1$s', 'fcms'), get_the_tag_list('', ', ')); ?>
            </div>
            <?php
        endif;
    }
}