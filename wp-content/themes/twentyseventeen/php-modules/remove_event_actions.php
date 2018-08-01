<?php

add_filter( 'post_row_actions', 'remove_event_actions', 10, 1 );
function remove_event_actions( $actions )
{
    if( get_post_type() === 'events' ) {
        unset( $actions['edit'] );
        unset( $actions['view'] );
        unset( $actions['trash'] );
        unset( $actions['inline hide-if-no-js'] );
    }
    return $actions;
}