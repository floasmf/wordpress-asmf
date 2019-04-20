<?php
function change_timeline_express_announcement_image_size( $image_size ) {
    $image_size = 'full';
    return $image_size;
}
add_filter( 'timeline-express-announcement-img-size' , 'change_timeline_express_announcement_image_size' );