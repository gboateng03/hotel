<?php
get_header(); ?>
    <div class="wrap">
        <div id="primary" class="content-area">
            <main id="main" class="site-main">
                <?php
                /* Start the Loop */
                while (have_posts()) : the_post();
                    ?>
                    <article id="post-<?php the_ID(); ?>" <?php post_class('single-room'); ?>>
                        <div class="post-inner">
                            <?php if (has_post_thumbnail()) : ?>
                                <?php $gallery = get_post_meta(get_the_ID(), 'osf_room_gallery', true); ?>
                                <div class="owl-theme owl-carousel" data-opal-carousel="true" data-dots="false" data-nav="true" data-items="1" data-loop="false">
                                    <?php
                                    the_post_thumbnail('erios-featured-image-full');
                                    if (!empty($gallery)) {
                                        foreach ((array)$gallery as $attachment_id => $attachment_url) {
                                            echo wp_get_attachment_image($attachment_id, 'erios-featured-image-full');
                                        }
                                    }
                                    ?>
                                </div>
                            <?php endif; ?>

                            <?php $features = get_post_meta(get_the_ID(), 'osf_room_feature', true);
                            if (!empty($features)):
                                ?>
                                <div class="entry-features">
                                    <?php
                                    foreach ((array)$features as $key => $entry) {
                                        $icon = $desc = '';
                                        if (isset($entry['icon'])) {
                                            $icon = esc_html($entry['icon']);
                                        }
                                        if (isset($entry['description'])) {
                                            $desc = esc_html($entry['description']);
                                        }
                                        echo '<div class="feature-item"><i class="' . $icon . '" ></i><div>' . $desc . '</div></div>';
                                    }
                                    ?>
                                </div>
                            <?php endif; ?>
                            <div class="entry-content">
                                <?php the_content(); ?>
                            </div>
                        </div>

                    </article><!-- #post-## -->
                <?php
                endwhile;
                ?>
            </main> <!-- #main -->
        </div> <!-- #primary -->
        <aside id="secondary" class="widget-area" role="complementary">
            <div class="inner">
                <div class="room-book">
                    <?php do_action('before_osf_room_form_book');

                    $symbol      = get_post_meta(get_the_ID(), 'osf_currency_symbol');
                    $price       = get_post_meta(get_the_ID(), 'osf_room_price');
                    $period      = get_post_meta(get_the_ID(), 'osf_room_price_period');
                    $link        = get_post_meta(get_the_ID(), 'osf_room_link');
                    $symbol_html = '';

                    if (!empty($symbol)) {
                        $symbol_html = OSF_Custom_Post_Type_Room::getInstance()->get_currency_symbol($symbol[0]);
                    }
                    ?>
                    <?php if (!empty($price)) { ?>

                        <div class="room-book-price">
                            <div class="room-book-title-price"><?php echo esc_html__('from', 'erios') ?></div>
                            <span class="room-book-price__currency"><?php echo esc_html($symbol_html); ?></span>
                            <span class="room-book-price__integer-part"><?php echo esc_html($price[0]); ?></span>
                            <span class="room-book-price__period"><?php if (!empty($period)): echo '/ ' . esc_html($period[0]); endif; ?></span>
                        </div>
                    <?php }
                    if (!empty($link)) {
                        ?>
                        <a href="<?php echo esc_url($link[0]); ?>"
                           target="_blank"
                           class="button-primary"><?php echo esc_html__('BOOK NOW', 'erios') ?></a>
                    <?php } ?>
                    <?php do_action('after_osf_room_form_book') ?>
                </div>
                <?php dynamic_sidebar('sidebar-room'); ?>
            </div>
        </aside><!-- #secondary -->
    </div><!-- .wrap -->
<?php OSF_Custom_Post_Type_Room::getInstance()->related_room(); ?>

<?php get_footer();
