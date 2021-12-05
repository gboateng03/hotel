<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="post-inner">

        <?php if ('' !== get_the_post_thumbnail() && !is_single()) : ?>
            <div class="post-thumbnail">
                <a href="<?php the_permalink(); ?>">
                    <?php the_post_thumbnail('erios-featured-image-full'); ?>
                </a>
            </div><!-- .post-thumbnail -->
        <?php endif; ?>
        <div class="post-content">
            <header class="entry-header">

                <?php if ('post' === get_post_type()) : ?>
                    <div class="entry-meta">
                        <?php erios_posted_on(); ?>
                    </div><!-- .entry-meta -->
                <?php endif; ?>

                <?php
                if (is_single()) {
                } elseif (is_front_page() && is_home()) {
                    the_title('<h3 class="entry-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h3>');
                } else {
                    the_title('<h2 class="entry-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>');
                }
                ?>

            </header><!-- .entry-header -->

            <div class="entry-content">
                <?php

                /* translators: %s: Name of current post */
                the_content(sprintf(esc_html__('Read More', 'erios') . '<span class="screen-reader-text"> "%s"</span>', get_the_title()));

                wp_link_pages(array(
                    'before' => '<div class="page-links">' . esc_html__('Pages:', 'erios'),
                    'after' => '</div>',
                    'link_before' => '<span class="page-number">',
                    'link_after' => '</span>',
                ));

                ?>
            </div><!-- .entry-content -->

        </div><!-- .post-content -->
        <?php
        if (is_single()) {
            erios_entry_footer();
        }
        ?>
    </div>

</article><!-- #post-## -->
