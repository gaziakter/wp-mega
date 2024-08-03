<?php
namespace WpMega\Frontend;

class Shortcode {

    function __construct(){
        add_shortcode('wp-mega', [$this, 'render_shortcode']);
    }

    public function render_shortcode($atts, $content = ''){

        wp_enqueue_script( 'academy-script' );
        wp_enqueue_style( 'academy-style' );

        return '<p class="academy-shortcode"></p>Hello from shortcode...!</p>';
    }
}