<?php
$symbol = get_post_meta(get_the_ID(), 'osf_currency_symbol');
$price  = get_post_meta(get_the_ID(), 'osf_room_price');
$period = get_post_meta(get_the_ID(), 'osf_room_price_period');
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('room'); ?>>
    <div class="room-inner">
        <div class="room-post-thumbnail">
            <?php if (has_post_thumbnail()) : ?>
                <?php the_post_thumbnail('erios-gallery-image'); ?>
            <?php endif; ?>
            <?php
            $symbol_html = "";
            if (!empty($symbol)) {
                $symbol_html = OSF_Custom_Post_Type_Room::getInstance()->get_currency_symbol($symbol[0]);
            }
            ?>
            <?php if (!empty($price)) { ?>
                <div class="room-book-price">
                    <div class="room-book-price__label"><?php echo esc_html__('from', 'erios'); ?></div>
                    <span class="room-book-price__currency"><?php echo esc_html($symbol_html); ?></span>
                    <span class="room-book-price__integer-part"><?php echo esc_html($price[0]); ?></span>
                    <span class="room-book-price__period"><?php if (!empty($period)): echo '/ ' . esc_html($period[0]); endif; ?></span>
                </div>
            <?php } ?>
        </div><!-- .post-thumbnail -->
        <div class="room-content">
            <div class="room-content-inner">
                <h2 class="entry-title"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
                <?php $features = get_post_meta(get_the_ID(), 'osf_room_feature', true);
                if (!empty($features)):
                    ?>
                    <div class="entry-features">
                        <?php
                        foreach ((array)$features as $key => $entry) {
                            $desc = '';
                            if (isset($entry['description'])) {
                                $desc = esc_html($entry['description']);
                            }
                            echo '<div class="feature-item">' . $desc . '</div>';
                        }
                        ?>
                    </div>
                <?php endif; ?>
                <?php if ($post->post_style == 3) : ?>
                    <div class="room-description">
                        <?php echo erios_get_excerpt(); ?>
                    </div>
                    <div class="room-group-style-3">
                        <?php if (!empty($price)) { ?>
                            <div class="room-book-price">
                                <div class="room-book-price__label"><?php echo esc_html__('from', 'erios'); ?></div>
                                <span class="room-book-price__currency"><?php echo esc_html($symbol_html); ?></span>
                                <span class="room-book-price__integer-part"><?php echo esc_html($price[0]); ?></span>
                                <span class="room-book-price__period"><?php if (!empty($period)): echo '/ ' . esc_html($period[0]); endif; ?></span>
                            </div>
                        <?php } ?>
                        <a class="room-read-link" href="<?php the_permalink() ?>"><?php echo esc_html__('see detail', 'erios') ?><i class="opal-icon-long-arrow-right"></i></a>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</article><!-- #post-## -->