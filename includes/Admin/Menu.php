<?php

namespace WpMega\Admin;

class Menu{
    function __construct(){
        add_action('admin_menu', [$this, 'admin_menu']);
    }

    public function admin_menu(){

        $parent_slug =  'wp-mega';
        $capability = 'manage_options';

        add_menu_page(
            __('WP Mega', 'wp-mega'),
            __('WP Mega', 'wp-mega'),
            $capability,
            $parent_slug,
            [$this, 'plugin_page'],
            'dashicons-cover-image'
        );

        add_submenu_page( 
            $parent_slug,
            __('Address Book', 'wp-mega'), 
            __('Address Book', 'wp-mega'),
            $capability, 
            'wp-mega-addressbook', 
            [$this, 'addressbook_page'],
        );
    }

    public function plugin_page(){
        echo "Hello Bangladesh!";
    }

    public function addressbook_page(){
        echo 'Adress book dashbord';
    }
}