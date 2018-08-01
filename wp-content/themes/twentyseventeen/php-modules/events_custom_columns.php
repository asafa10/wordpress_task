<?php

function events_custom_columns_list($columns) {
    //remove default columns
    unset($columns['title']);
    unset($columns['author']);
    unset($columns['date']);
    
    //set custom columns
    $columns['e_title']         = 'Title';
    $columns['e_location']      = 'Location';
    $columns['e_url']           = 'URL';
    $columns['e_date']          = 'Date';
    $columns['e_gcalendar']     = 'Google Calendar';
    return $columns;
}
add_filter( 'manage_events_posts_columns', 'events_custom_columns_list' );