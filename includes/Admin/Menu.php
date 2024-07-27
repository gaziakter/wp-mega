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
            [$this, 'addressbook_page'],
            'dashicons-cover-image'
        );

        add_submenu_page( 
            $parent_slug,
            __('Address Book', 'wp-mega'), 
            __('Address Book', 'wp-mega'),
            $capability, 
            $parent_slug, 
            [$this, 'addressbook_page'],
        );

        add_submenu_page( 
            $parent_slug,
            __('Settings', 'wp-mega'), 
            __('Settings', 'wp-mega'), 
            $capability, 
            'wp-mega-settings', 
            [$this, 'addressbook_setting'],
        );
    }

    public function addressbook_page(){
       $addressbook = new Addressbook();
       $addressbook->plugin_page();
    }

    public function addressbook_setting(){
        echo 'Welcome to address book settings';
    }
}