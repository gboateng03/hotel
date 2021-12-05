<?php
/**
 * The template for displaying related room in single room page.
 *
 * This template can be overridden by copying it to yourtheme/wp-hotel-booking/single-room/related-room.php.
 *
 * @author  ThimPress, leehld
 * @package WP-Hotel-Booking/Templates
 * @version 1.6
 */

/**
 * Prevent loading this file directly
 */
defined('ABSPATH') || exit();

$room = WPHB_Room::instance(get_the_ID());
$related = $room->get_related_rooms();

/**
 * @var $related WP_Query
 */
?>

<?php if ($related->posts) { ?>
    <div class="hb_related_other_room has_slider">
        <h3 class="title"><?php echo esc_html__('Other Rooms', 'erios'); ?></h3>
        <div class="hb_room_carousel">
            <?php hotel_booking_room_loop_start(); ?>
            <div class="owl-carousel owl-theme" data-opal-carousel="true" data-dots="true" data-margin="30" data-nav="false" data-items="3" data-loop="false">
                <?php while ($related->have_posts()) : $related->the_post(); ?>
                    <?php hb_get_template_part('content', 'room-carousel'); ?>
                <?php endwhile; ?>
            </div>
            <?php hotel_booking_room_loop_end(); ?>
        </div>
    </div>
<?php } ?>

