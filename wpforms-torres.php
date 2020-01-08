<?php
	/*
  Plugin Name: WP FORMS HACK FOR TORRES
  Plugin URI: http://sputznik.com
  Description:
  Author: Samuel Thomas
  Version: 1.0
  Author URI: http://sputznik.com
  */

  function wpf_dev_process_complete( $fields, $entry, $form_data, $entry_id ) {

    print_r( $form_data['settings']['notifications'][4] );

    // Get the full entry object
    $entry = wpforms()->entry->get( $entry_id );

    // Fields are in JSON, so we decode to an array
    $entry_fields = json_decode( $entry->fields, true );

    print_r( $entry_fields );

    print_r( $entry_fields[27]['amount_raw'] );

    //print_r( $entry[1] );

    //print_r( $entry[27] );

    /*
    // Optional, you can limit to specific forms. Below, we restrict output to
    // form #5.
    if ( absint( $form_data['id'] ) !== 5 ) {
        return;
    }

    // Get the full entry object
    $entry = wpforms()->entry->get( $entry_id );

    // Fields are in JSON, so we decode to an array
    $entry_fields = json_decode( $entry->fields, true );

    // Check to see if user selected 'yes' for callback
    if($entry_fields[6]['value'] === 'Yes') {
        // Set the hidden field to 'Needs Callback' to filter through entries
        $entry_fields[7]['value'] = 'Needs Callback';
    }

    // Convert back to json
    $entry_fields = json_encode( $entry_fields );

    // Save changes
    wpforms()->entry->update( $entry_id, array( 'fields' => $entry_fields ) );
    */

}
add_action( 'wpforms_process_complete', 'wpf_dev_process_complete', 10, 4 );
