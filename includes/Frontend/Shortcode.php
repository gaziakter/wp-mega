<?php
namespace WpMega\Frontend;

class Shortcode {

    function __construct(){
        add_shortcode('wp-mega', [$this, 'render_shortcode']);
    }

    public function render_shortcode($atts, $content = ''){
        return 'Hello from shortcode...!';
    }
}