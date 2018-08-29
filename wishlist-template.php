<?php
/*
Template Name: Шаблон для страницы списка желаний
*/
get_header();
the_post();
?>

	<?php get_template_part('parts/header-menu', '320'); ?>
	<?php get_template_part('parts/header'); ?>

<div class="min-heght">
    <div class="page page-8 privat-cab">

    <?php get_template_part('parts/brands-and-banners', '320'); ?>

    <?php get_template_part('parts/account', 'banner'); ?>

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
                                <a href="<?php echo home_url();?>/my-account/edit-account/">Профиль</a>
                            </li>
                            <li class="woocommerce-MyAccount-navigation-link woocommerce-MyAccount-navigation-link--orders">
                                <a href="<?php echo home_url();?>/my-account/orders/">Мои заказы</a>
                            </li>
                            <li class="woocommerce-MyAccount-navigation-link woocommerce-MyAccount-navigation-link--tinv_wihlist is-active">
                                <a href="<?php echo home_url();?>/my-account/wishlist/">Мои желания</a>
                            </li>
                        </ul>
                    </nav>
                    </div>
                    <div class="my-wishes prof-margin-left">
                        <div class="name-container">
                            <h4>Мои желания</h4>
                        </div>

                        <div class="my-wishes-item-wrap">
                            <?php
                            
                            
                            $wishlist = get_user_meta(get_current_user_id(), 'wishlist')[0];
                            if(!empty($wishlist)){
                                foreach($wishlist as $list){ $product = wc_get_product($list['product_id']); var_dump($product);?>
                                    <div class="my-wishes-item">
                                        <a href="<?php echo get_the_permalink($list['product_id']); ?>" class="my-wishes-item_img"><img src="img/cart-img1.png" alt="img"></a>
                                        <div class="my-wishes-item_descr">
                                            <a href="<?php echo get_the_permalink($list['product_id']); ?>"><?php echo $product->name; ?></a>
                                            <p class="my-wishes-item_in-not-available"><?php if($product->is_in_stock()){echo 'test'; }?>Нет в наличии</p>
                                            <p class="my-wishes-item_price"><b><?php echo $product->get_price(); ?></b> руб.</p>
                                            <input type="submit" class="btn-form btn-not-available" value="Добавить в корзину" />
                                        </div>
                                        <div class="my-wishes-item_add">
                                            <p>Добавлено <?php echo $list['date']?></p>
                                            <input type="submit" class="" value="Удалить" />
                                        </div>
                                        <div class="my-wishes-item_popap"><span>Товар добавлен в корзину</span></div>	
                                    </div>
                                <?php } } ?>                        
                            
                        </div>                        


                    </div>
                <div class="clear"></div>
            </div>						
        </div>
    </div>
</div>


<?php get_footer(); ?>