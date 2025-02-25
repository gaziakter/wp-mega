<?php
/**
* Plugin Name: WP Mega
* Plugin URI: http://gaziakter.com/plugins/wp-mega/
* Author URI: http://gaziakter.com/
* Description: WP Mega only for practical purpose. 
* Author: Gazi Akter
* Version: 1.0.0
* text-domain: wp-mega
 */

 if(!defined('ABSPATH')){
    exit();
 }

  if ( file_exists( __DIR__ . '/vendor/autoload.php' ) ) {
    require_once __DIR__ . '/vendor/autoload.php';
}


 /**
  * Main class
  */
 final class WP_Mega{

    const version = '1.0';

    private function __construct(){
        $this->define_constants();

        register_activation_hook(__FILE__, [$this, 'activate'] );
        add_action('plugins_loaded', [$this, 'init_plugin']);
        
    }

    public static function init(){

        static $instance = false;

        if(! $instance){
            $instance = new self();
        }

        return $instance;
    }

    public function define_constants(){

        define('WP_MEGA_VERSION', self::version);
        define('WP_MEGA_FILE', __FILE__);
        define('WP_MEGA_PATH', __DIR__);
        define('WP_MEGA_URL', plugins_url('', WP_MEGA_FILE));
        define('WP_MEGA_ASSETS', WP_MEGA_URL. '/assets');
    }

    public function init_plugin(){

        new WpMega\Assets();

        if(is_admin()){
            new \WpMega\Admin();
        } else{
            new WpMega\Frontend();
        }
    }

    public function activate(){

        $installer = new WpMega\Installer;
        $installer->run();

    }

 }

 function wp_mega(){
    return WP_Mega::init();
}

wp_mega();

