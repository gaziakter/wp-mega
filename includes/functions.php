<?php

function wp_mega_insert_address($args = []){

    global $wpdb;

    if(empty($args['name'])){
        return new WP_Error('no-name', __('You must provide a name.', 'wp-mega'));
    }

    $defaults = [
        'name' => '',
        'address' => '',
        'phone' => '',
        'created_by' => get_current_blog_id(  ),
        'created_at' => current_time( 'mysql' ),
    ];

    $data = wp_parse_args( $args, $defaults );

    $inserted = $wpdb->insert(
        $wpdb->prefix . 'ac_addresses',
        $data,
        [
           '%s',
           '%s',
           '%s',
           '%d',
           '%s'
        ]
    );

    if(! $inserted){
        return new \WP_Error('failed-to-insert', __('Failed to insert data', 'wp-mega'));
    }

    return $wpdb->insert_id;

}