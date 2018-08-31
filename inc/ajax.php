<?php

add_action('wp_ajax_nopriv_ajax_add_to_cart', 'ajax_add_to_cart');
add_action('wp_ajax_ajax_add_to_cart', 'ajax_add_to_cart');
function ajax_add_to_cart(){
    $result = array();
    $product_id = $_POST['prod_id'];
    $quantity = 1;
    if(WC()->cart->add_to_cart( $product_id, $quantity )){
        $result[] = 'ok';
        $cart_url = WC()->cart->get_cart_url();
        $cart_count = WC()->cart->get_cart_contents_count();
        $cart_total = WC()->cart->get_cart_contents_total();
        $result[] = "<a href='{$cart_url}'></a>
            <span>Товаров {$cart_count} <br>
            на {$cart_total} руб.<br>	
            <a href='{$cart_url}'>ОФОРМИТЬ</a></span>";
        
    }else{
        $result[] = 'error';
    }

    echo json_encode($result); 

    wp_die();
}

add_action('wp_ajax_nopriv_ajax_add_to_wishlist', 'ajax_add_to_wishlist');
add_action('wp_ajax_ajax_add_to_wishlist', 'ajax_add_to_wishlist');
function ajax_add_to_wishlist(){

    if(is_user_logged_in()){

        $user_id = get_current_user_id();
        $wishlist = get_user_meta( $user_id, 'wishlist' );

        $product_id = $_POST['prod_id'];
        $date = date("d.m.Y");

        $data = array($product_id => array('product_id' => $product_id, 'date' => $date));

        if(empty($wishlist)){
            update_user_meta($user_id, 'wishlist', $data);
        }else{
            $wishlist = $wishlist[0];
            $wishlist = array_merge($wishlist, $data);
            update_user_meta($user_id, 'wishlist', $wishlist);
        }

        $result = '1';

    }else{

        $result = '0';

    }

    echo $result;

    wp_die();

}

add_action('wp_ajax_nopriv_remove_from_wishes', 'remove_from_wishes');
add_action('wp_ajax_remove_from_wishes', 'remove_from_wishes');
function remove_from_wishes(){

    $user_id = get_current_user_id();
    $wishlist = get_user_meta( $user_id, 'wishlist' )[0];

    foreach ($wishlist as $key => $val) {
        if($val['product_id'] == $_POST['prod_id']){
            $remove = $key;
        }
    }

    unset($wishlist[$remove]);

    update_user_meta($user_id, 'wishlist', $wishlist);

    echo wishlist_ajax_template();

    wp_die();

}

function wishlist_ajax_template(){
    $wishlist = get_user_meta(get_current_user_id(), 'wishlist')[0];
    if(!empty($wishlist)){
        foreach($wishlist as $list){ 
            $product = new WC_Product($list['product_id']); ?>
            <div class="my-wishes-item">
                <a href="<?php echo get_the_permalink($list['product_id']); ?>" class="my-wishes-item_img">
                    <img src="<?php echo wp_get_attachment_image_src( get_post_thumbnail_id($list['product_id']), 'prod_page' )[0];?>" alt="img">
                </a>
                <div class="my-wishes-item_descr">

                    <a href="<?php echo get_the_permalink($list['product_id']); ?>"><?php echo $product->name; ?></a>

                    <?php if($product->is_on_sale()){ ?>
                        <p class="my-wishes-item_price"><b><?php echo $product->get_sale_price(); ?></b></p>
                        <p class="my-wishes-item_price_dashed"><b><?php echo $product->get_regular_price(); ?></b></p>
                    <?php } else {?>
                        <div class="price">
                        <p class="my-wishes-item_price_dashed"><b><?php echo $product->get_regular_price(); ?></b></p>
                        </div>
                    <?php } ?>
                    
                </div>

                <div class="my-wishes-item_add">
                    <p>Добавлено <?php echo $list['date']?></p>
                    <input type="submit" class="wishes-delete" value="Удалить" data-id="<?php echo $list['product_id']; ?>" />
                </div>
                <div class="my-wishes-item_popap"><span>Товар добавлен в корзину</span></div>	
            </div>
        <?php 
        }
    } else { ?>

        <div class="my-wishes-item">В списке желаний нет товаров</div>

    <?php }
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

add_action('wp_ajax_nopriv_order_details', 'order_details');
add_action('wp_ajax_order_details', 'order_details');
function order_details(){
    $order = wc_get_order($_POST['id']);

    $result = '<div class="slide-down">';

    foreach ($order->get_items() as $item_key => $item_values):
        $item_id = $item_values->get_id();    
        $product_id = $item_values->get_product_id();
        $item_data = $item_values->get_data();
        $product_name = $item_data['name'];
        $product_id = $item_data['product_id'];
        $prod_link = get_the_permalink($product_id);
        $prod_img = wp_get_attachment_image_src( get_post_thumbnail_id($product_id), 'cart_popup' )[0];
        
        $result .= "<div class='my-orders_popup-content_item'>
        <a href='{$prod_link}' class='my-orders_popup_img'><img src='{$prod_img}' alt='img'></a>
        <div>
            <a href='{$prod_link}' class='my-orders_popup_title'>{$product_name}</a>
            <p>Это пример текста, создан для описания товара в три строки</p>
        </div>
        <div class='clear'></div>
    </div>";

    endforeach;

    $result .= '</div>'; 

    echo $result;

    wp_die();
}