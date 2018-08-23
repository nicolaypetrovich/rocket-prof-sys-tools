<?php

add_action('wp_ajax_nopriv_ajax_add_to_cart', 'ajax_add_to_cart');
add_action('wp_ajax_ajax_add_to_cart', 'ajax_add_to_cart');
function ajax_add_to_cart(){
    $product_id = $_POST['prod_id'];
    $quantity = 1;
    if(WC()->cart->add_to_cart( $product_id, $quantity )){
        return 'ok';
    }
    return 'false';

    wp_die();
}