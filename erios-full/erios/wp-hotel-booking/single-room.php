<?php
/**
 * The template for displaying single room page.
 *
 * This template can be overridden by copying it to yourtheme/wp-hotel-booking/single-room.php.
 *
 * @author  ThimPress, leehld
 * @package WP-Hotel-Booking/Templates
 * @version 1.6
 */

/**
 * Prevent loading this file directly
 */
defined( 'ABSPATH' ) || exit();

get_header(); ?>
<div class="wrap">
    <div id="primary" class="content-area">
        <main id="main" class="site-main">
            <?php
            /**
             * hotel_booking_before_main_content hook
             */
            do_action( 'hotel_booking_before_main_content' );
            ?>

            <?php while ( have_posts() ) : the_post(); ?>

                <?php hb_get_template_part( 'content', 'single-room' ); ?>

            <?php endwhile; ?>

            <?php
            /**
             * hotel_booking_after_main_content hook
             */
            do_action( 'hotel_booking_after_main_content' );
            ?>
        </main> <!-- #main -->
    </div> <!-- #primary -->
    <div class="content-sidebar">
        <aside class="widget-room-area">
            <?php
            /**
             * hotel_booking_loop_room_price hook
             */
            do_action( 'hotel_booking_loop_room_price' );

            /**
             * hotel_booking_single_room_title hook
             */
            do_action( 'hotel_booking_single_room_title' );
            ?>
        </aside>
        <?php
        get_sidebar(); ?>
    </div>
</div><!-- .wrap -->
<?php
/**
 * hotel_booking_single_room_related
 */
do_action('erios_single_room_related');
?>
<?php get_footer(); ?>