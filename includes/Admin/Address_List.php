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

        $per_page =20;

        $this->_column_headers = [$column, $hidden, $sortable];

        $this->items = wp_mega_get_addressess();

        $this->set_pagination_args([
            'total_items' => gazi_mega_addresss_count(),
            'per_page'=>  $per_page,
        ]);
    }
}