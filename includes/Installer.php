<?php 
namespace WpMega;


class Installer{

    /**
     * Run function
     *
     * @return void
     */
    public function run(){
        $this->add_version();
        $this->create_table();
    }

    /**
     * Virsion function
     */
    public function add_version(){
        $installed = get_option('wp_mega_installed');

        if(! $installed){
            update_option('wp_mega_installed', time());
        }
        update_option('wp_mega_version', WP_MEGA_VERSION );
    }

    /**
     * Table create function
     *
     * @return void
     */
    public function create_table(){

    }
}