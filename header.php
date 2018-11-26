<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?php if( is_front_page() ){ echo get_bloginfo('name')  . ' » ' . get_bloginfo('description'); } else { echo wp_title(); }; ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<link rel="shortcut icon" type="img/png" href="<?php echo get_template_directory_uri(); ?>/img/favicon.png"/>
	<?php wp_head();?>
	<script>
		var ajax = '<?php echo admin_url('admin-ajax.php'); ?>';
	</script>
</head>
<body>

	<div class="headerFixed">
		<div class="container">
			<div class="headerFixed__wrapper">

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
	                                $menu_desktop .= '<li><a href="' . $menu_item->url . '">' . $menu_item->title . '</a></li>';
	                            }else{
	                                $menu_desktop .= '<li><a href="' . $menu_item->url . '">' . $menu_item->title . '</a></li>';
	                            }
	                        }
	                        echo $menu_desktop;
	                    }; ?>
	                </ul>
	            </div>

	            <?php $phone = get_theme_mod('phone_little') . get_theme_mod('phone_big'); $phone = preg_replace('/[^0-9]/', '', $phone); ?>
                <a class="headerFixed__number" href="tel:<?php echo $phone; ?>"><span><?php echo get_theme_mod('phone_little'); ?></span> <?php echo get_theme_mod('phone_big'); ?></a>

                 <div class="headerFixed__right">
                 	<a href="<?php echo get_permalink(wc_get_page_id( 'myaccount' ));?>" class="user__logOut-cabinet-bg user__logOut-cabinet-800"></a>

	                 <div class="box-wrapper cart-ajax-update">
	                    <a  href="<?php echo WC()->cart->get_cart_url(); ?>"></a>
	                    <span>Товаров <?php echo WC()->cart->get_cart_contents_count(); ?> <br>
	                    на <?php echo WC()->cart->get_cart_contents_total(); ?> руб.<br>	
	                    <a href="<?php echo WC()->cart->get_checkout_url(); ?>">ОФОРМИТЬ</a></span>
	                </div>
					<div onclick="openMainMenu320()" class="openMenu-320"></div>
                 </div>	<!-- headerFixed__right -->
			</div>
		</div>
	</div>

    <div class="body body-page2" id="body">
