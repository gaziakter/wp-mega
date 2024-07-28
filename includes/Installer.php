<?php 
namespace WpMega;


class Installer{



    
    public function add_version(){
        $installed = get_option('wp_mega_installed');

        if(! $installed){
            update_option('wp_mega_installed', time());
        }
        update_option('wp_mega_version', WP_MEGA_VERSION );
    }

    public function create_table(){

    }


}