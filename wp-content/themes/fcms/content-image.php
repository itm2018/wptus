<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="entry-header">
        <?php fcms_thumbnail('large'); ?>
        <?php fcms_entry_header(); ?>
        <?php
        /**
         * count post attachments
         */
        $attachments = get_children(array('post_parent' => $post->ID));
        $attachments_number = count($attachments);
        printf(__('This image contains %1$s photos', 'fcms'), $attachments_number);
        ?>
    </header>
    <div class="entry-content">
        <?php fcms_entry_conent(); ?>
        <?php (is_single() ? fcms_entry_tag() : ''); ?>
    </div>
</article>