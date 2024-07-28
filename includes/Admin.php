<?php
namespace WpMega;

/**
 * Admin Class
 */
class Admin{

    function __construct(){
        
        $this->dispatch_action();
        
        new Admin\Menu();
    }

    public function dispatch_action(){

        $addressboook = new Admin\Addressbook();

        add_action('admin_init', [$addressboook, 'form_handler']);

    }
}