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

        global $wpdb;

        $charset_collate = $wpdb->get_charset_collate();

        $schema = "CREATE TABLE IF NOT EXISTS `{$wpdb->prefix}ac_addresses` (
    `id` int(9) unsigned NOT NULL AUTO_INCREMENT,
    `name` varchar(100) NOT NULL,
    `address` varchar(255) DEFAULT NULL,
    `phone` varchar(30) DEFAULT NULL,
    `created_by` bigint(20) unsigned NOT NULL,
    `created_at` datetime NOT NULL,
    KEY `id` (`id`)
    )  $charset_collate;
    ";

    }
}