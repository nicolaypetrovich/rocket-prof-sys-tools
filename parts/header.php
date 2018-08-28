<!-- начало блок хедер -->
<div class="header">
    <div class="border-top-main"></div>
    <div onclick="openMainMenu320()" class="openMenu-320"></div>
    <div class="wrapper">
        <div class="el1"><div></div></div>
        <div class="el2"><div></div></div>
        <div class="el13"><div></div></div>
        <div class="logo">
            <a href="<?php echo home_url( '/' ) ?>">
                <img src="<?php echo (wp_get_attachment_image_url(get_theme_mod( 'custom_logo' ), 'full'));?>" alt="img">
            </a>
        </div>
        <div class="personal-area-header">	
            <div class="box">
                <div class="box-wrapper">
                    <?php $phone = get_theme_mod('phone_little') . get_theme_mod('phone_big'); $phone = preg_replace('/[^0-9]/', '', $phone); ?>
                    <a href="tel:<?php echo $phone; ?>"><span><?php echo get_theme_mod('phone_little'); ?></span> <?php echo get_theme_mod('phone_big'); ?></a>
                    <?php if(is_user_logged_in()){ ?>
                        <a href="<?php echo get_permalink(wc_get_page_id( 'myaccount' ));?>"><span>ЛИЧНЫЙ КАБИНЕТ</span></a>
                    <?php }else{ ?>
                        <a href="#" onclick="open_modal_window_PA()"><span>ЛИЧНЫЙ КАБИНЕТ</span></a>
                    <?php }; ?>
                </div>
            </div>
            <div class="box">
                <div class="box-wrapper">
                    <a href="<?php echo WC()->cart->get_cart_url(); ?>"></a>
                    <span>Товаров <?php echo WC()->cart->get_cart_contents_count(); ?> <br>
                    на <?php echo WC()->cart->get_cart_contents_total(); ?> <br>	
                    <a href="<?php echo WC()->cart->get_cart_url(); ?>">ОФОРМИТЬ</a></span>
                </div>
            </div>
        </div>
        <div class="main-menu">	
            <form role="search" method="get" id="searchform" action="<?php echo home_url( '/' ) ?>" >
                <input type="text" value="<?php echo get_search_query() ?>" name="s" id="s" placeholder="Найти на сайте" />
                <input type="submit" id="searchsubmit" value="">
            </form>
            <div class="menu">
                <ul>
                    <?php 
                    $menu_name = 'main';
                    $locations = get_nav_menu_locations();
                    if( $locations && isset($locations[ $menu_name ]) ){
                        $menu = wp_get_nav_menu_object( $locations[ $menu_name ] );
                        $menu_items = wp_get_nav_menu_items( $menu );
                        foreach ( (array) $menu_items as $key => $menu_item ){
                            $image = get_field('image', $menu_item);
                            if($image)
                            {
                                $menu_desktop .= '<li><a href="' . $menu_item->url . '"><img src="'.$image['url'].'" alt="img">' . $menu_item->title . '</a></li>';
                            }else{
                                $menu_desktop .= '<li><a href="' . $menu_item->url . '">' . $menu_item->title . '</a></li>';
                            }
                        }
                        echo $menu_desktop;
                    }; ?>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- конец блок хеадер -->