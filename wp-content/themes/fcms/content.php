<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="entry-thumbnail">
        <?php fcms_thumbnail('thumbnail'); ?>
    </div>
    <header class="entry-header">
        <?php fcms_entry_header(); ?>
        <?php fcms_entry_meta(); ?>
    </header>
    <div class="entry-content">
        <?php fcms_entry_conent(); ?>
        <?php (is_single() ? fcms_entry_tag() : '') ?>
    </div>
</article>