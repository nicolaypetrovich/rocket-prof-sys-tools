<?php
/*
Template Name: Шаблон для страницы списка желаний
*/
get_header();
the_post();
?>

<!-- начало бллок главное меню мобверсия -->
<div class="main-menu-320" id="main-menu-320">
    <img src="<?php echo get_template_directory_uri(); ?>/img/img89.png" alt="img" class="close320" onclick="closeMainMenu320()">
    <ul>
        <?php 
        $menu_name = 'main';
        $locations = get_nav_menu_locations();
        if( $locations && isset($locations[ $menu_name ]) ){
            $menu = wp_get_nav_menu_object( $locations[ $menu_name ] );
            $menu_items = wp_get_nav_menu_items( $menu );
            foreach ( (array) $menu_items as $key => $menu_item ){
                $menu_mobile .= '<li><a href="' . $menu_item->url . '">' . $menu_item->title . '</a></li>';
            }
            echo $menu_mobile;
        }; ?>
    </ul>
</div>
<!-- конец блок главное меню мобверсия -->

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
                <img src="<?php echo get_template_directory_uri(); ?>/img/logo.png" alt="img">
            </a>
        </div>
        <div class="personal-area-header">	
            <div class="box">
                <div class="box-wrapper">
                    <a href="tel:7(123)725-00-66"><span>+7(123)</span> 456 78 90</a>
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

<div class="min-heght">
    <div class="page page-8 privat-cab">
        <!-- начало блок-банер наши акции и наши бренды мобверсия -->
        <div class="shares-and-brands-banner shares-and-brands-banner-320 ">
            <div class="buttons-shares-and-brands-banner-320"><span class="scroll-down" onclick="openBrandsMob(this)">наши бренды</span><span class="scroll-down" onclick="openSharesMob(this)">наши акции</span></div>
            <div class="wrapper">
                <div class="shares-and-brands-banner-wrapper">
                    <div class="shares-banner" id="shares-banner">
                        <div class="body-shares-banner-wrapper">
                            <div class="body-shares-banner body-shares-banner-slider">
                                <div class="owl-carousel owl-theme body-shares-bannerSlider">
                                    <div class="div"><a href="#"><span>Бормашина Профиль М-03 с 6 мм цангой </span><img src="img/img25.jpg" alt="img"></a></div>
                                    <div class="div"><a href="#"><span>Бормашина Профиль Б-06, исполнение Торнадо с БП-6Т</span><img src="img/img26.jpg" alt="img"></a></div>
                                    <div class="div"><a href="#"><span>Сменный шпиндель с цангой 6 мм</span><img src="img/img27.jpg" alt="img"></a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="clear"></div>
                    <div class="brands-banner" id="brands-banner">
                        <div class="body-brands-banner-wrapper">
                            <div class="body-brands-banner">
                                <div class="ourBrend-slider-banner-wrapper">
                                    <div class="owl-carousel owl-theme ourBrend-slider-banner">
                                        <div class="item">
                                            <img src="img/img39.png" alt="img" style="width: 39%;">
                                        </div>
                                            <div class="item">
                                            <img src="img/img40.png" alt="img" style="width: 45%;">
                                        </div>
                                        <div class="item">
                                            <img src="img/img41.jpg" alt="img" style="width: 88%;">
                                        </div>
                                        <div class="item">
                                            <img src="img/img42.png" alt="img" style="width: 64%;">
                                        </div>
                                    </div>
                                </div>		
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- конец блок-банер наши акции и наши бренды мобверсия -->

        <!-- начало блока наша продукция -->
        <div class="banner-our-production">
            <div class="wrapper">
                <div class="banner-our-production-content-wrapper">
                    <div class="banner-our-production-content">	
                        <h1 onclick="open_banner_our_production(this)">Личный кабинет <img src="img/img15.png" alt="img"></h1>
                        <div class="banner-our-production-content-320" id="banner-our-production-content-320">
                            <div class="banner-our-production-menu banner-our-production-menu1">
                                <div class="box">
                                    <a href="http://profsys.tools/my-account/edit-account/">Профиль</a>
                                    <a href="http://profsys.tools/my-account/orders/">Мои заказы</a>
                                    <a class="is-active" href="http://profsys.tools/my-account/tinv_wihlist/">Мои желания</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- конец блок наша продукция -->


        <div class="wrapper">
            <div class="wrap-in">
                <div class="el1"><div></div></div>					
            </div>						
        </div>
        <div class="wrapper">
            <div class="wrap-in wrap-in-margin-bottom">
                <div class="woocommerce"><div class="privat-cab-nav-box">
                <h3>Личный кабинет</h3>
                    <nav class="woocommerce-MyAccount-navigation privat-cab-nav">
                        <ul>
                            <li class="woocommerce-MyAccount-navigation-link woocommerce-MyAccount-navigation-link--edit-account">
                                <a href="http://profsys.tools/my-account/edit-account/">Профиль</a>
                            </li>
                            <li class="woocommerce-MyAccount-navigation-link woocommerce-MyAccount-navigation-link--orders">
                                <a href="http://profsys.tools/my-account/orders/">Мои заказы</a>
                            </li>
                            <li class="woocommerce-MyAccount-navigation-link woocommerce-MyAccount-navigation-link--tinv_wihlist is-active">
                                <a href="http://profsys.tools/my-account/wishlist/">Мои желания</a>
                            </li>
                        </ul>
                    </nav>

                    </div>
                    <div class="my-wishes prof-margin-left">
                        <div class="name-container">
                            <h4>Мои желания</h4>
                        </div>
                        <?php the_content(); ?>
                    </div>

                <div class="clear"></div>
            </div>						
        </div>
    </div>
</div>


<?php get_footer(); ?>