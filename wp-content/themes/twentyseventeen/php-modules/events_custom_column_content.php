<?php

//set values for each cell in table row depending on corresponding custom field
function events_custom_columns_content( $column_name, $post_id ) { 
        if ( 'e_title' == $column_name ) { 
		$title = setDefaultValues('e_title', get_post_meta( $post_id, 'etitle', true )); 
		echo $title; 
	}
    
        if ( 'e_location' == $column_name ) { 
		$location = setDefaultValues('e_location', get_post_meta( $post_id, 'location', true )); 
		echo $location; 
	} 
        
        if ( 'e_url' == $column_name ) { 
		$url = setDefaultValues('e_url', get_post_meta( $post_id, 'url', true )); 
		echo '<a href='.$url.'>Event URL</a>';
	} 
        
        if ( 'e_date' == $column_name ) { 
		$e_date = setDefaultValues('e_date', get_post_meta( $post_id, 'date', true )); 
		echo $e_date; 
	} 
        
        if ( 'e_gcalendar' == $column_name ) { 
                 echo "<button type='button' id='".$post_id."' onClick='processRequest(this.id); this.disabled=true;'>ADD</button>";
        } 
		
} 
add_action( 'manage_events_posts_custom_column', 'events_custom_columns_content', 10, 2 );

//set defaultValues if custom field value is empty or replace value if it's incorect
function setDefaultValues($cfield, $value) {
    
    switch ($cfield) {
        case 'e_title':
            $value = empty($value) ? 'Empty Title' : $value;
            break;
        case 'e_location':
            $value = empty($value) ? 'Empty Location' : $value;
            break;
        case 'e_url':
            $value = !filter_var($value, FILTER_VALIDATE_URL) || empty($value)  ? 'https://event_example_url' : $value;
            break;
        case 'e_date':
            $value = empty($value) ? date('Y-m-d') : $value;
            break;
    }
    
    return $value;
    
}