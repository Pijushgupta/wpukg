<?php
/*
 * Plugin Name: Unique Key Genarator
 * Description: A simple plugin to genarate unique number everytime. 
 * Plugin URI: https://github.com/Pijushgupta/wpukg.git
 * Author: Pijush Gupta
 * Author URI: https://github.com/Pijushgupta
 * Version: 1.0
 * Lincense: GPLv2
 **/

function ukg_return_table_name(){
    global $wpdb;
    $table_name = "unique_key_gen";
    //You can change the table name before activating the plugin!
    $table_name = $wpdb->prefix.$table_name ;
    return $table_name;
}

function ukg_return_char_set(){
    global $wpdb;
    return $wpdb->get_charset_collate();
}

function ukg_create_table(){
    $sql = "CREATE TABLE ukg_return_table_name() (
        uk varchar(255) NOT NULL
        ) ukg_return_char_set();";
    
    require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
    dbDelta( $sql );
}

function ukg_set_intial_data($args=null){
    global $wpdb;
    if($args!=null){
        $wpdb->insert(ukg_return_table_name(),array('uk'=>$args));
    }else{
        $wpdb->insert(ukg_return_table_name(),array('uk'=>1));
    }
}

function ukg_is_table_exits(){
    global $wpdb;
    if($wpdb->get_var("SHOW TABLES LIKE 'ukg_return_table_name()'")!= ukg_return_table_name()){
        
    }
}

function ukg_init(){
    
}
register_activation_hook(__FILE__,'ukg_init');