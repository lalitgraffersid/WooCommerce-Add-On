<?php
/**
 * Plugin Name: WooCommerce Add-On
 * Plugin URI:  #
 * Description: lalit.
 * Version: 1.0.0  
 * Author: lalit.
 * Text Domain: 
 */   

define("add_on", plugin_dir_path(__FILE__));

add_shortcode("owt-file", "myform");

function myform() {
    include_once add_on . 'form.php';
}
add_action( 'woocommerce_after_add_to_cart_form', 'bbloomer_woocommerce_cf7_single_product', 30 );
function bbloomer_woocommerce_cf7_single_product() {
   echo do_shortcode('[owt-file]');
   echo '</div>';
}

// Hook in
add_filter( 'woocommerce_checkout_fields' , 'custom_override_checkout_fields' );

// Our hooked in function - $fields is passed via the filter!
function custom_override_checkout_fields( $fields ) {
     $fields['billing']['billing_infos'] = array(
        'type'      => 'textarea',
        'label'     => __('my-order-Address', 'woocommerce'),
    'placeholder'   => _x('my-order-Address', 'placeholder', 'woocommerce'),
    'required'  => false,
    'class'     => array('form-row-wide'),
    'clear'     => true
     );

     return $fields;
}   
add_action( 'woocommerce_admin_order_data_after_billing_address', 'display_billing_infos_to_admin_order_meta', 20, 1 );
function display_billing_infos_to_admin_order_meta( $order ){
    echo '<p>
    <strong>'.__('my-order-Address').':</strong> ' . get_post_meta( $order->get_id(), '_billing_infos', true ) . '</p>';
}
// create  product_inquire tabel
global $wpdb;
$table_name = $wpdb->prefix . "product_inquire";
$my_products_db_version = '1.0.0';
$charset_collate = $wpdb->get_charset_collate();

if ( $wpdb->get_var("SHOW TABLES LIKE '{$table_name}'") != $table_name ) {

    $sql = "CREATE TABLE $table_name (
            ID mediumint(9) NOT NULL AUTO_INCREMENT,
            `name` text NOT NULL,
            `email` text NOT NULL,
            `message` int(9) NOT NULL,
            PRIMARY KEY  (ID)
    ) $charset_collate;";

    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    dbDelta($sql);
    add_option('my_db_version', $my_products_db_version);
}
/**
 * Enqueues scripts and styles for front end.
 *
 * @return void
 */

