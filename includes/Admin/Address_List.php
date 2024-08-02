<?php

namespace WpMega\Admin;

if(! class_exists('WP_List_Table')){
    require_once ABSPATH . 'wp-admin/includes/class-wp-list-table.php';
}

/**
 * List Class
 */
class Address_List extends \WP_List_Table{

    function __construct(){
        parent:: __construct([
            'singular' => 'contact',
            'plural' => 'contacts',
            'singular' => false
        ]);
    }
}