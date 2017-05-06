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
    $table_name = $wpdb->prefix . "unique_key_gen";
    return $table_name;
}

function ukg_return_char_set(){
    global $wpdb;
    return $wpdb->get_charset_collate();
}

