<?php

//sort data by Event Data
add_filter( 'manage_edit-events_sortable_columns', 'events_custom_column_sort' );

function events_custom_column_sort( $columns ) {
  $columns['e_date'] = 'Date';

  return $columns;
}


add_action( 'pre_get_posts', 'events_date_orderby' );

function events_date_orderby( $query ) {
  

  $orderby = $query->get( 'orderby');

  if ( 'Date' == $orderby ) {
    $query->set( 'order', 'DESC' );
    $query->set( 'meta_key', 'Date' );
    $query->set( 'orderby', 'meta_value' );
  }
}
