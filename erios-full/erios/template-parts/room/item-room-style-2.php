<article id="post-<?php the_ID(); ?>" <?php post_class('room'); ?>>
    <div class="room-inner">

        <?php if (has_post_thumbnail()) : ?>
            <div class="room-post-thumbnail">
                <?php the_post_thumbnail('erios-gallery-image'); ?>
            </div><!-- .post-thumbnail -->
        <?php endif; ?>

        <div class="room-content">
            <div class="room-content-inner">
                <?php
                /**
                 * hotel_booking_loop_room_price hook
                 */
                do_action('hotel_booking_loop_room_rating');

                /**
                 * hotel_booking_loop_room_title hook
                 */
                do_action('hotel_booking_loop_room_title');

                /**
                 * hotel_booking_loop_room_price hook
                 */
                do_action('hotel_booking_loop_room_price');
                ?>
            </div>
        </div>
    </div>
</article><!-- #post-## -->