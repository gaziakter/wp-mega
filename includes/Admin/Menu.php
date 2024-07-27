<?php

namespace WpMega\Admin;

class Menu{
    function __construct(){
        add_action('admin_menu', [$this, 'admin_menu']);
    }

    public function admin_menu(){
        add_menu_page(
            __('WP Mega', 'wp-mega'),
            __('WP Mega', 'wp-mega'),
            'manage_options',
            'wp-mega',
            [$this, 'plugin_page'],
            'dashicons-cover-image'
        );
    }

    public function plugin_page(){
        echo "Hello Bangladesh!";
    }
}