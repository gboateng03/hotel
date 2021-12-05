<?php
get_header(); ?>
    <div class="wrap">
        <div id="primary" class="content-area">
            <main id="main" class="site-main">

                <?php
                /* Start the Loop */
                while (have_posts()) : the_post();

                    get_template_part('template-parts/post/content', get_post_format());

                    get_template_part('template-parts/common/author-bio', get_post_format());


                    $obj = erios_get_post_link('category', 'post');
                    $prev_link = $obj->previous_post;
                    $next_link = $obj->next_post;

                    $prev_title = isset($obj->previous_title) ? $obj->previous_title : '';
                    $next_title = isset($obj->next_title) ? $obj->next_title : '';


                    if (!empty($prev_link) || !empty($next_link)):
                        ?>
                        <div class="navigation">
                            <?php if (!empty($prev_link)): ?>
                                <div class="previous-nav">
                                    <div class="nav-content">
                                        <div class="nav-link">
                                            <div class="nav-title"><i class="opal-icon-long-arrow-left"></i><?php esc_html_e('Previous', 'erios'); ?></div>
                                            <?php if (!empty($prev_title)) echo wp_kses_post($prev_link); ?>
                                        </div>
                                        <?php echo wp_kses_post($prev_link); ?>
                                    </div>
                                </div>
                            <?php endif; ?>

                            <?php if (!empty($next_link)): ?>
                                <div class="next-nav">
                                    <div class="nav-content">
                                        <div class="nav-link">
                                            <div class="nav-title"><?php esc_html_e('Next', 'erios'); ?><i class="opal-icon-long-arrow-right"></i></div>
                                            <?php if (!empty($next_title)) echo wp_kses_post($next_link); ?>
                                        </div>
                                        <?php echo wp_kses_post($next_link); ?>
                                    </div>

                                </div>
                            <?php endif; ?>
                        </div>
                    <?php endif;
                    // If comments are open or we have at least one comment, load up the comment template.
                    if (comments_open() || get_comments_number()) :
                        comments_template();
                    endif;


                endwhile; // End of the loop.
                ?>

            </main> <!-- #main -->
        </div> <!-- #primary -->
        <?php get_sidebar(); ?>
    </div><!-- .wrap -->

<?php get_footer();
