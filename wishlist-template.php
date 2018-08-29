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
                    </div>
                <div class="clear"></div>
            </div>						
        </div>
    </div>
</div>


<?php get_footer(); ?>