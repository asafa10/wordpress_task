<?php

/***********************************/
/* Meta box 'AEvents' */
/**********************************/

function events_meta_box() {

        add_meta_box(
            'events_meta_box',
            'Event Info',
            'show_events_meta_box',
            'events',
            'normal',
            'high'
        );
    

}

add_action('add_meta_boxes', 'events_meta_box');

// Field Array
$event_meta_fields = array(
    array(
        'label'=> 'Title',
        'id'    => 'etitle',
        'type'  => 'text'
    ),
    array(
        'label'=> 'Date',
        'id'    => 'date',
        'type'  => 'datepicker'
    ),
    array(
        'label'=> 'Location',
        'id'    => 'location',
        'type'  => 'text-auto-complete'
    ),
    array(
        'label'=> 'URL',
        'id'    => 'url',
        'type'  => 'text'
    ),
);

// The Callback
function show_events_meta_box() {
    global $event_meta_fields, $post;
// Use nonce for verification
    echo '<input type="hidden" name="custom_meta_box_nonce" value="'.wp_create_nonce(basename(__FILE__)).'" />';

    // Begin the field table and loop
    echo '<table class="form-table">';
    foreach ($event_meta_fields as $field) {
        // get value of this field if it exists for this post
        $meta = get_post_meta($post->ID, $field['id'], true);
        // begin a table row with
        echo '<tr>
                <th style="width:85px"><label for="'.$field['id'].'">'.$field['label'].'</label></th>
                <td>';
        switch($field['type']) {
            // case items will go here
            case 'text':
                echo '<input type="text" name="'.$field['id'].'" id="'.$field['id'].'" value="'.$meta.'" style="width: 100%; height: 40px;" />
        <br />';
                break;
            case 'text-auto-complete':
                echo '<input type="text" name="'.$field['id'].'" id="'.$field['id'].'" value="'.$meta.'" style="width: 100%; height: 40px;" />
        <br />';
                break;
             case 'datepicker':
                echo '<input type="date" name="'.$field['id'].'" id="datepicker"'.$meta.' value="'.$meta.'">
        <br />';
                break;
        } //end switch
        echo '</td></tr>';
    } // end foreach
    echo '</table>'; // end table
}

// Save the Data
function save_events_meta($post_id) {
    global $event_meta_fields;

    // verify nonce
    if (!wp_verify_nonce($_POST['custom_meta_box_nonce'], basename(__FILE__)))
        return $post_id;
    // check autosave
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
        return $post_id;
    // check permissions
    if ('page' == $_POST['post_type']) {
        if (!current_user_can('edit_page', $post_id))
            return $post_id;
    } elseif (!current_user_can('edit_post', $post_id)) {
        return $post_id;
    }

    // loop through fields and save the data
    foreach ($event_meta_fields as $field) {
        $old = get_post_meta($post_id, $field['id'], true);
        $new = $_POST[$field['id']];
        if ($new && $new != $old) {
            update_post_meta($post_id, $field['id'], $new);
        } elseif ('' == $new && $old) {
            delete_post_meta($post_id, $field['id'], $old);
        }
    } // end foreach
}
add_action('save_post', 'save_events_meta');

?>

<!--integration with google maps places autocomplete-->
<script>
        function activatePlacesSearch() {
            var input = document.getElementById('location');
                var service = new google.maps.places.Autocomplete(input);
        }
    
</script>

<!--load google maps places javascript auto complete-->
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDeQAAtj-2_YB91DA7PB956ITnnyTLh664&libraries=places&callback=activatePlacesSearch" defer></script>

<!--load javascript for the ajax request-->
<script type="text/javascript" src="http://localhost/wordpress/wp-content/themes/twentyseventeen/assets/js/requestAjax.js" defer></script>


