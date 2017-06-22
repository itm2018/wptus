<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="entry-header">
        <?php fcms_entry_header(); ?>
    </header>
    <div class="entry-content">
        <?php fcms_entry_conent(); ?>
        <?php (is_single() ? fcms_entry_tag() : ''); ?>
    </div>
</article>