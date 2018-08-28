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

add_action('wp_ajax_nopriv_registration', 'registration');
add_action('wp_ajax_registration', 'registration');
function registration(){
    
    parse_str($_POST['data'], $data);

    if($data['password_1'] != $data['password_2']){
        echo 'pass_error';
    }

    $user_id = wp_create_user( $data['name'], $data['password_1'], $data['email'] );

    if ( is_wp_error( $user_id ) ) {
        echo 'user_exists';
    }
    else {
        echo 'user_ok';
    }

    update_user_meta( $user_id, 'first_name',           $data['name']       );

    update_user_meta( $user_id, 'billing_first_name',   $data['name']       );
    update_user_meta( $user_id, 'billing_country',      'RU'                );
    update_user_meta( $user_id, 'billing_city',         $data['city']       );
    update_user_meta( $user_id, 'billing_email',        $data['email']      );
    update_user_meta( $user_id, 'billing_phone',        $data['phone']      );

    update_user_meta( $user_id, 'shipping_first_name',  $data['name']       );
    update_user_meta( $user_id, 'shipping_country',     'RU'                );
    update_user_meta( $user_id, 'shipping_city',        $data['city']       );

    wp_die();
}

add_action('wp_ajax_nopriv_message', 'message');
add_action('wp_ajax_message', 'message');
function message(){

    parse_str($_POST['data'], $data);

    if(empty($data['message_name'])||empty($data['message_phone'])||empty($data['message_email'])||empty($data['message_message'])){
        echo 'mess_error';
        return false;
    }

    $message = 'Имя: ' . $data['message_name'] . '.<br>Телефон: ' . $data['message_phone'] . '.<br>Email: ' . $data['message_email'] . '.<br>Текст: ' . $data['message_message'];

    $post_data = array(
        'post_type'     => 'messages',
        'post_title'    => wp_strip_all_tags( $data['message_name'] ),
        'post_content'  => $message,
        'post_status'   => 'draft',
    );
    $post_id = wp_insert_post( $post_data );
    if($post_id){
        echo 'mess_ok';
        $headers = array(
            'content-type: text/html',
        );
        wp_mail(get_option('admin_email'), 'Уведомление', $message, $headers);
    }else{
        echo 'mess_error';
    }
    wp_die();;
}

add_action('wp_ajax_nopriv_login', 'login');
add_action('wp_ajax_login', 'login');
function login(){

    parse_str($_POST['data'], $data);
    $creds = array();
    $creds['user_login'] = $data['login_name'];
    $creds['user_password'] = $data['login_password'];
    $creds['remember'] = true;

    $user = wp_signon( $creds, false );

    if ( is_wp_error($user) ) {
        echo 'error';
    } else {
        echo 'ok';
    }
    wp_die();
}