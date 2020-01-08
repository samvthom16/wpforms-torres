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

    // Get the full entry object
    $entry = wpforms()->entry->get( $entry_id );

    // Fields are in JSON, so we decode to an array
    $entry_fields = json_decode( $entry->fields, true );

    //print_r( $entry_fields );

    if( $entry_fields[27]['value_raw'] == '1,2' ){

      $notification = $form_data['settings']['notifications'][4];

      $to = $entry_fields[1]['value'];

      $flag = wp_mail( $to, $notification['subject'], $notification['message'] );

      //print_r( $flag );

    }
  }
add_action( 'wpforms_process_complete', 'wpf_dev_process_complete', 10, 4 );
