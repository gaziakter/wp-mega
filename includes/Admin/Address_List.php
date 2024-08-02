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
        parent::__construct([
            'singular' => 'contact',
            'plural' => 'contacts',
            'ajax' => false
        ]);
    }

    public function get_columns(){
        return [
            'cb' => '<input type"checkbox"',
            'name' => __('Name', 'wp-mega'),
            'address' => __('Address', 'wp-mega'),
            'phone' => __('Phone', 'wp-mega'),
            'created_at' => __('Date', 'wp-mega')
        ];
    }

    public function prepare_items(){

        $column = $this->get_columns();
        $hidden = [];
        $sortable = $this->get_sortable_columns();

        $this->_column_headers = [$column, $hidden, $sortable];
    }
}