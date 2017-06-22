<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="entry-thumbnail">
        <?php fcms_thumbnail('large'); ?>
    </div>
    <header class="entry-header">
        <?php fcms_entry_header(); ?>
        <?php fcms_entry_meta(); ?>
    </header>
    <div class="entry-content">
        <?php the_content() ?>
        Contact: <?php echo get_post_meta($post->ID, 'admin_email', true) ?>
    </div>
</article>