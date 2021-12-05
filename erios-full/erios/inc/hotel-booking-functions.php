<?php
/**
 * Custom Hotel Booking Function.
 */

remove_action( 'hotel_booking_after_single_product', 'hotel_booking_single_room_related' );
add_action( 'erios_single_room_related', 'hotel_booking_single_room_related' );
add_action( 'erios_loop_room_types', 'erios_get_list_room_type' );


if (!function_exists('erios_get_list_room_type')) {
    function erios_get_list_room_type() {
        echo '<div class="room-types">';
        echo get_the_term_list( get_the_ID(), 'hb_room_type', '', '' );
        echo '</div>';
    }
}