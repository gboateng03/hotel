<?php
/**
 * The template for displaying content archive room.
 *
 * This template can be overridden by copying it to yourtheme/wp-hotel-booking/content-room.php.
 *
 * @author  ThimPress, leehld
 * @package WP-Hotel-Booking/Templates
 * @version 1.6
 */

/**
 * Prevent loading this file directly
 */
defined( 'ABSPATH' ) || exit();
?>

<article id="room-<?php the_ID(); ?>" <?php post_class('column-item'); ?>>
    <div class="room-inner">
        <div class="room-post-thumbnail">
            <?php
            /**
             * hotel_booking_loop_room_thumbnail hook
             */
            do_action( 'hotel_booking_loop_room_thumbnail' );

            /**
             * hotel_booking_loop_room_price hook
             */
            do_action( 'hotel_booking_loop_room_price' );
            ?>
        </div><!-- .post-thumbnail -->
        <div class="room-content">
            <div class="room-content-inner">
                <?php
                /**
                 * hotel_booking_loop_room_price hook
                 */
                do_action( 'hotel_booking_loop_room_rating' );

                /**
                 * hotel_booking_loop_room_title hook
                 */
                do_action( 'hotel_booking_loop_room_title' );

                /**
                 * hotel_booking_loop_room_type hook
                 */
                do_action( 'erios_loop_room_types' );
                ?>
            </div>
        </div>
    </div>
</article><!-- #post-## -->

<?php
/**
 * hotel_booking_after_loop_room
 */
do_action( 'hotel_booking_after_loop_room' ); ?>
