<div class="column-item post-style-2">
    <div class="post-inner">
        <?php if (has_post_thumbnail() && '' !== get_the_post_thumbnail()) : ?>
            <div class="post-thumbnail">
                <a href="<?php the_permalink(); ?>">
                    <?php the_post_thumbnail('konstruktic-featured-image-large'); ?>
                </a>
            </div><!-- .post-thumbnail -->

        <?php endif; ?>
        <div class="post-content">
            <div class="entry-item">
                <div class="entry-header">
                    <div class="entry-meta">
                        <?php erios_posted_on(); ?>
                    </div><!-- .entry-meta -->
                    <h3 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                </div><!-- .entry-header -->

                <div class="entry-content">

                    <div class="entry-summary">
                        <?php echo wp_trim_words(get_the_content(), 20); ?>
                    </div><!-- .entry-summary -->

                    <div class="more-link-wrap">
                        <a class="more-link"
                           href="<?php the_permalink(); ?>"><?php echo esc_html__('Learn More', 'erios'); ?>
                            <i class="opal-icon-long-arrow-right" aria-hidden="true"></i>
                        </a>
                    </div><!-- .more-link-wrap -->

                </div><!-- .entry-content -->

            </div>
        </div>

    </div>
</div>