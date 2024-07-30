<?php
namespace WpMega;

/**
 * Admin Class
 */
class Admin{

    function __construct(){

        $addressboook = new Admin\Addressbook();
        
        $this->dispatch_action($addressboook);
        
        new Admin\Menu($addressboook);
    }

    public function dispatch_action($addressboook){



        add_action('admin_init', [$addressboook, 'form_handler']);

    }
}