<?php
/**
 * The Template for displaying all single products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

get_header( 'shop' ); global $product; ?>


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
		<div class="page3">
			<!-- начало блока наша продукция -->
			<div class="banner-our-production">
				<div class="wrapper">
					<div class="banner-our-production-content-wrapper">
						<div class="banner-our-production-content">	
							<h1 onclick="open_banner_our_production(this)">НАША ПРОДУКЦИЯ <img src="img/img15.png" alt="img"></h1>
							<div class="banner-our-production-content-320" id="banner-our-production-content-320">
								<div class="banner-our-production-menu banner-our-production-menu1">
									<h3><a href="#"><span>ЭЛЕКТРОИНСТРУМЕНТ</span></a></h3>	
									<div class="box">
										<a href="#"><span></span>Бормашины</a>
										<a href="#"><span></span>Камнерезный станок</a>
										<a href="#"><span></span>УШМ</a>
										<a href="#"><span></span>Токарный станок Skrab</a>	
									</div>
								</div>
								<div class="banner-our-production-menu banner-our-production-menu2">
									<h3><a href="#"><span>ОСНАСТКА</span></a></h3>
									<div class="box">
										<div class="box1" onmouseover="openSubmenuOurProduction1(this)" onmouseout="openSubmenuOurProduction2(this)">
											<div class="block-name"><a href="#"><span></span>Борфрезы</a><span onclick="openSubmenuOurProduction(this)"></span></div>
											<div class="box1-content submenuOurProduction">
												<a href="#"><span></span>Ccылка на раздел1</a>
												<a href="#"><span></span>Ccылка на раздел</a>
												<a href="#"><span></span>Ccылка на раздел</a>
												<a href="#"><span></span>Ccылка на раздел</a>
											</div>
										</div>
										<div class="box1" onmouseover="openSubmenuOurProduction1(this)" onmouseout="openSubmenuOurProduction2(this)">
											<div class="block-name"><a href="#"><span></span>Диски</a><span onclick="openSubmenuOurProduction(this)"></span></div>
											<div class="box1-content submenuOurProduction">
												<a href="#"><span></span>Ccылка на раздел2</a>
												<a href="#"><span></span>Ccылка на раздел</a>
												<a href="#"><span></span>Ccылка на раздел</a>
												<a href="#"><span></span>Ccылка на раздел</a>
											</div>
										</div>
										<div class="box1" onmouseover="openSubmenuOurProduction1(this)" onmouseout="openSubmenuOurProduction2(this)">
											<div class="block-name"><a href="#"><span></span>Дискодержатели </a><span onclick="openSubmenuOurProduction(this)"></span></div>
											<div class="box1-content submenuOurProduction">
												<a href="#"><span></span>Ccылка на раздел3</a>
												<a href="#"><span></span>Ccылка на раздел</a>
												<a href="#"><span></span>Ccылка на раздел</a>
												<a href="#"><span></span>Ccылка на раздел</a>
											</div>
										</div>
										<div class="box1" onmouseover="openSubmenuOurProduction1(this)" onmouseout="openSubmenuOurProduction2(this)">
											<div class="block-name"><a href="#"><span></span>Другое </a><span onclick="openSubmenuOurProduction(this)"></span></div>
											<div class="box1-content submenuOurProduction">
												<a href="#"><span></span>Ccылка на раздел4</a>
												<a href="#"><span></span>Ccылка на раздел</a>
												<a href="#"><span></span>Ccылка на раздел</a>
												<a href="#"><span></span>Ccылка на раздел</a>
											</div>
										</div>	
									</div>	
								</div>

								<div class="banner-our-production-menu banner-our-production-menu3">
									<h3><a href="#"><span>ПРИСПОСОБЛЕНИЯ</span></a></h3>
									<div class="box">
										<a href="#"><span></span>Токарная станок/станина</a>
										<a href="#"><span></span>Фрезерный стол</a>
										<a href="#"><span></span>Распиловочный стол</a>
										<a href="#"><span></span>Фрезерная приставка</a>
										<a href="#"><span></span>Угловой наконечник</a>	
										<a href="#"><span></span>Редукторный наконечник</a>	
										<a href="#"><span></span>Сверлильная стойка</a>	
									</div>		
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- конец блок наша продукция -->

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

			<!-- начало блок-банер наши акции и наши бренды -->
			<div class="shares-and-brands-banner">
				<div class="wrapper">
					<div class="shares-and-brands-banner-wrapper">
						<div class="shares-banner">
							<div class="button2" onclick="openSharesBrands(this)"></div>
							<div class="body-shares-banner-wrapper" id="body-shares-banner-wrapper">
								<div class="body-shares-banner">
									<div class="div"><a href="#"><span>Бормашина Профиль М-03 с 6 мм цангой </span><img src="img/img25.jpg" alt="img"></a></div>
									<div class="div"><a href="#"><span>Бормашина Профиль Б-06, исполнение Торнадо с БП-6Т</span><img src="img/img26.jpg" alt="img"></a></div>
									<div class="div"><a href="#"><span>Сменный шпиндель с цангой 6 мм</span><img src="img/img27.jpg" alt="img"></a></div>
								</div>

								<div class="body-shares-banner body-shares-banner-slider">
									<div class="owl-carousel owl-theme body-shares-bannerSlider">
										<div class="div"><a href="#"><span>Бормашина Профиль М-03 с 6 мм цангой </span><img src="img/img25.jpg" alt="img"></a></div>
										<div class="div"><a href="#"><span>Бормашина Профиль Б-06, исполнение Торнадо с БП-6Т</span><img src="img/img26.jpg" alt="img"></a></div>
										<div class="div"><a href="#"><span>Сменный шпиндель с цангой 6 мм</span><img src="img/img27.jpg" alt="img"></a></div>
									</div>
								</div>
							</div>
							<div class="button1"></div>
						</div>
						<div class="clear"></div>
						<div class="brands-banner">
							<div class="button2" onclick="openSharesBrands(this)"></div>
							<div class="body-brands-banner-wrapper" id="body-brands-banner-wrapper">
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
							<div class="button1"></div>
						</div>
					</div>
				</div>
			</div>
			<!-- конец блок-банер наши акции и наши бренды -->

				<?php
					/**
					 * woocommerce_before_main_content hook.
					 *
					 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
					 * @hooked woocommerce_breadcrumb - 20
					 */
					do_action( 'woocommerce_before_main_content' );
				?>

					<div class="card-product">
						<div  class="el1"><div></div></div>
						<div class="wrapper">

							<?php while ( have_posts() ) : the_post(); ?>

								<?php wc_get_template_part( 'content', 'single-product' ); ?>

							<?php endwhile; // end of the loop. ?>

						</div>
					</div>

					<!-- начало блок информация и сервисе -->
					<div class="information-and-servicer">
						<div class="el1"><div></div></div>
						<div class="wrapper">
							<div class="container">
								<div class="container-left">
									<div class="name-container">
										<h4>ОПИСАНИЕ</h4>
									</div>
									<div class="text">	
										<?php the_excerpt(); ?>
									</div>
								</div>
								<div class="container-right">
									<div class="name-container">
										<h4>УХОД, ВОЗВРАТ И ОБМЕН</h4>
									</div>
									<div class="text">
										<p>Повторно-кратковременная эксплуатация. ронять лучше не надо! смазывать по необходимости. В начале работы возможно нагревание шпинделя, пока будет разгоняться заводская смазка в закрытых подшипниках.- это не повлияет на работу.</p>
										<p>На наши бормашины Профиль мы даем гарантию пожизненную. Смотрите наш блог. Провода и педаль - это расходники, покупаются при утрате. На "Импульсные блоки питания", блоки "Профиль 5Р" и "Профиль 6Т" - гарантия 1 год. Все фрезы и шлифовки, и диски - это все расходники, и возврату не подлежат. Обязательно проверяйте размер хвостовика - подойдет ли он под вашу машину.</p>	
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- конец блок информация и сервисе -->

					<!-- начало блок доставка и оплата -->
					<div class="shipping-and-payment">
						<div class="el1"><div>	</div></div>
						<div class="wrapper">
							<div class="container">
								<div class="container-box">	
									<div class="name-container">
										<h4>ДОСТАВКА</h4>
									</div>
									<div class="text">
										<ul>
											<li>Почта</li>
											<li>Транспортная компания</li>
											<li>Самовывоз / Личная встреча</li>
											<li>Проводник поезда</li>
											<li>Курьер </li>
										</ul>
									</div>
								</div>
								<div class="container-box">
									<div class="name-container">
										<h4>ОПЛАТА</h4>
									</div>
									<div class="text">
										<ul>
											<li>Наличные</li>
											<li>Банковский перевод на счёт</li>
											<li> Перевод на банковскую карту</li>
											<li>Электронные платёжные  системы </li>
										</ul>
									</div>
								</div>
								<div class="container-box">
									<div class="text">
										<ul>
											<li> Система денежных переводов</li>
											<li>   Наложенный платёж</li>
										</ul>
									</div>
									<form class="cart" action="http://profsys.tools/product/bormashina-profil-m-03-s-6-mm-tsangoj/" method="post" enctype="multipart/form-data">
										<button type="submit" name="add-to-cart" value="23" class="button btn-form">В корзину</button>
									</form>
									
								</div>
								<div class="popap" id="popap1"><span>Товар добавлен в корзину</span></div>	
					
							</div>
						</div>
					</div>
					<!-- конец блок доставка и оплата -->
					
					<?php $related_products = wc_get_related_products( $product->ID, 4, array($product->ID)); if($related_products) : ?>
						<div class="see-also">
							<div class="el1"><div></div></div>
							<div class="wrapper">
								<div class="name-container">
									<h4>Смотрите так же</h4>
								</div>
								<div class="catalog-commodity">
									<?php foreach($related_products as $related_product) : $prod = wc_get_product($related_product); ?>
										<div class="box box1">
											<div class="div1"><a href="<?php get_permalink($related_product);?>"><?php echo $prod->name;?></a></div>
											<div class="div2"><a href="<?php get_permalink($related_product);?>">
											<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $related_product ), 'related_prods' );?>
												<img src="<?php echo $image[0]; ?>">
											</a></div>
											<div class="div3"><p><span><?php echo mb_substr(get_the_excerpt($related_product), 0, 60, 'utf-8');?></span></p></div>
											<div class="div4">
												<div class="wrapper-div4">
													<div class="price"><span><?php echo $prod->get_regular_price(); ?></span></div>
													<div class="button"><div onclick="openPopap(this)"><span data-value="<?php echo $related_product; ?>">купить</span></div></div>
												</div>
											</div>
											<div class="popap"><span>Товар добавлен в корзину</span></div>	
										</div>
									<?php endforeach; ?>
								</div>
								<div class="catalog-commodity catalog-commodity-slider">
									<div class="owl-carousel owl-theme catalogCommodity-slider ">
										<?php foreach($related_products as $related_product) : ?>
											<div class="box box1">
												<div class="div1"><a href="#">Переходник к сменным узким шпинделям</a></div>
												<div class="div2"><a href="#"><img src="img/img24.jpg" alt="img"></a></div>
												<div class="div3"><p><span>Это пример текста, создан для описания товара в три строки</span></p></div>
												<div class="div4">
													<div class="wrapper-div4">
														<div class="price"><span>400</span></div>
														<div class="button"><div onclick="openPopap(this)"><span>купить</span></div></div>
													</div>
												</div>
												<div class="popap"><span>Товар добавлен в корзину</span></div>	
											</div>
										<?php endforeach; ?>
									</div>
								</div>
							</div>
						</div>
					<?php endif; wp_reset_postdata(); ?>

				<?php
					/**
					 * woocommerce_after_main_content hook.
					 *
					 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
					 */
					do_action( 'woocommerce_after_main_content' );
				?>

				<?php
					/**
					 * woocommerce_sidebar hook.
					 *
					 * @hooked woocommerce_get_sidebar - 10
					 */
					do_action( 'woocommerce_sidebar' );
				?>
		</div>
	</div>

<?php get_footer( 'shop' );

/* Omit closing PHP tag at the end of PHP files to avoid "headers already sent" issues. */
