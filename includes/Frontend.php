<?php
namespace WpMega;

class Frontend{

    function __construct(){
        new Frontend\Shortcode();
        new Frontend\Enquiry();
    }
}