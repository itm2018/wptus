<?php get_header(); ?>
    <div class="content">
        <div class="search-info">
            <!--Sử dụng query để hiển thị số kết quả tìm kiếm được tìm thấy
                    Cũng như hiển thị từ khóa tìm kiếm. Từ khóa tìm kiếm cũng
                    có thể hiển thị được với hàm get_search_query()-->
            <?php
            $search_query = new WP_Query( 's='.$s.'&showposts=-1' );
            $search_keyword = esc_sql( $s );
            $search_count = $search_query->post_count;
            //var_dump( $search_query );

            $search_count ? printf( __('Search results for <strong>%1$s</strong>. We found <strong>%2$s</strong> articles for you.', 'fcms'), $search_keyword, $search_count ) :
                printf(__('Nothing found for <strong>%1$s</strong>'), $search_keyword);
            ?>
        </div>
        <section id="main-content">
            <?php if (have_posts()): while (have_posts()):the_post() ?>
                <?php get_template_part('content', get_post_format()) ?>
            <?php endwhile; ?>
                <?php fcms_pagination() ?>
            <?php else: ?>
                <?php get_template_part('content', 'none') ?>
            <?php endif; ?>
        </section>
        <section id="sidebar">
            <?php get_sidebar() ?>
        </section>
    </div>
<?php get_footer(); ?>