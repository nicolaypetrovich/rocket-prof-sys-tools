<?php

add_filter( 'woocommerce_breadcrumb_defaults', 'jk_woocommerce_breadcrumbs' );
function jk_woocommerce_breadcrumbs() {
    return array(
            'delimiter'   => ' &#47; ',
            'wrap_before' => '<div class="main-navigation wrap-in" itemprop="breadcrumb"><div class="wrapper">',
            'wrap_after'  => '</div></div>',
            'before'      => '',
            'after'       => '',
            'home'        => _x( 'Home', 'breadcrumb', 'woocommerce' ),
        );
}

add_action('woocommerce_before_single_product_summary', 'woocommerce_template_single_title', 10);

//top box
function woocommerce_custom_product_top_box_start(){
    echo '<div class="top-box">';
}
function custom_price_template(){ 
    global $product;
    if($product->is_on_sale()){ ?>
        <div class="price">
            <span><?php echo $product->get_sale_price(); ?></span>
            <span><?php echo $product->get_regular_price(); ?></span>
        </div>
    <?php } else {?>
        <div class="price">
            <span><?php echo $product->get_regular_price(); ?></span>
        </div>
    <?php }
    ?>
    
<?php }
function woocommerce_custom_product_top_box_end(){
    echo '</div>';
}

//table box
function woocommerce_custom_product_table_box_start(){
    echo '<div class="table-box">';
}
function woocommerce_custom_product_table_box_end(){
    echo '</div>';
}

//bottom box
function woocommerce_custom_product_bottom_box_start(){
    echo '<div class="bottom-box">';
}
function wishlist_wrapper(){
    get_template_part('parts/wishlist', 'product');
}
function woocommerce_custom_product_bottom_box_end(){
    echo '</div>';
}

function additional_information(){
    return call_user_func( 'woocommerce_product_additional_information_tab');
}

//customazing product template
add_action('woocommerce_single_product_summary', 'woocommerce_custom_product_top_box_start', 1);
add_action('woocommerce_single_product_summary', 'custom_price_template', 2);
add_action('woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 4);
add_action('woocommerce_single_product_summary', 'woocommerce_custom_product_top_box_end', 10);

add_action('woocommerce_single_product_summary', 'woocommerce_custom_product_table_box_start', 20);
add_action('woocommerce_single_product_summary', 'additional_information', 22);

add_action('woocommerce_single_product_summary', 'woocommerce_custom_product_table_box_end', 30);

add_action('woocommerce_single_product_summary', 'woocommerce_custom_product_bottom_box_start', 40);
add_action('woocommerce_single_product_summary', 'wishlist_wrapper', 44);
add_action('woocommerce_single_product_summary', 'woocommerce_custom_product_bottom_box_end', 50);

//список пунктов на странице моего акаунта
add_filter( 'woocommerce_account_menu_items', 'add_my_menu_items', 99, 1 );
function add_my_menu_items( $items ) {
    $items = array(
            'edit-account'  => 'Профиль',
            'orders'        => 'Мои заказы',
            'wishlist'  => 'Мои желания'
        );

    return $items;
}

//сраница аккаунта дашбоард
function account_menu_wrap(){
    echo '<div class="privat-cab-nav-box">
    <h3>Личный кабинет</h3>';
}
function account_menu_wrap_end(){
    echo '</div>';
}
add_action('woocommerce_before_account_navigation', 'account_menu_wrap', 5);
add_action('woocommerce_after_account_navigation', 'account_menu_wrap_end', 5);

//страница аккаунта формы редактирования профиля
function account_forms_wrap(){
    echo '<div class="wrap-profile-form">';
}
function account_forms_wrap_end(){
    echo '</div>';
}
add_action('woocommerce_before_edit_account_form', 'account_forms_wrap', 5);
add_action('woocommerce_after_edit_account_form', 'account_forms_wrap_end', 5);

//форма информации личного кабинета
function account_form(){
    echo '<div class="my-profile">
            <div class="name-container">
                <h4>Личный кабинет</h4>
                </div>';
}
function account_form_end(){
    echo '</div>';
}
add_action('woocommerce_edit_account_form_start', 'account_form', 5);
add_action('woocommerce_edit_account_form_end', 'account_form_end', 5);

//shop loop item
    //styling title
    function shop_loop_item_open_wrap(){ echo '<div class="div1">'; }
    function shop_loop_product_title(){ 
        $title = get_the_title(); 
        $link = get_the_permalink();
        echo "<a href='{$link}'>{$title}</a>";
    }
    function shop_loop_item_open_wrap_end(){ echo '</div>'; }
    add_action('woocommerce_before_shop_loop_item_title', 'shop_loop_item_open_wrap', 5);
    add_action('woocommerce_before_shop_loop_item_title', 'shop_loop_product_title', 6);
    add_action('woocommerce_before_shop_loop_item_title', 'shop_loop_item_open_wrap_end', 7);
    //styling image
    function shop_loop_item_image_wrap(){echo '<div class="div2">';}
    function shop_loop_item_image_wrap_end(){echo '</div>';}
    add_action('woocommerce_before_shop_loop_item_title', 'shop_loop_item_image_wrap', 8);
    add_action('woocommerce_before_shop_loop_item_title', 'shop_loop_item_image_wrap_end', 12);
    //short description
    function shop_loop_item_description(){
        $excerpt = get_the_excerpt();
        $excerpt = mb_substr($excerpt, 0, 50, 'utf-8');
        echo "<div class='div3'><p>{$excerpt}</p></div>";
    }
    add_action('woocommerce_shop_loop_item_title', 'shop_loop_item_description', 10);
    //pricing and add to cart
    function shop_loop_item_pricing_wrap(){
        echo '<div class="div4"><div class="wrapper-div4">';
    }
    function shop_loop_item_pricing_wrap_end(){
        echo '</div></div>';
    }
    add_action('woocommerce_after_shop_loop_item_title', 'shop_loop_item_pricing_wrap', 2);
    add_action('woocommerce_after_shop_loop_item', 'shop_loop_item_pricing_wrap_end', 12);

//add archive page ordering hook
add_action('custom_filtering_plase', 'woocommerce_catalog_ordering', 10);  

add_filter( 'woocommerce_currency_symbol', 'change_currency_symbol', 10, 2 );

function change_currency_symbol( $symbols, $currency ) {
	if ( 'RUB' === $currency ) {
		return ' руб.';
	}
    return $symbols;
}


add_action('woocommerce_checkout_before_order_review', 'checkout_wrap', 1);
add_action('woocommerce_checkout_before_order_review', 'checkout_title', 5);
// add_action('woocommerce_checkout_order_review', 'checkout_wrap_end', 50);
function checkout_wrap(){
    echo '<div class="checkout_table_wrapper">';
}
function checkout_title(){
    echo '<div class="name-container">
		<h4>Ваш заказ</h4>
	</div>';
}
function checkout_wrap_end(){
    echo '</div>';
}