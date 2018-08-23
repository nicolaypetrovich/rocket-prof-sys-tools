<?php get_header(); global $front_page; ?>
		
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
		<div class="page1">

                <!-- начало блока наша продукция -->
                <div class="banner-our-production">
                    <div class="wrapper">
                        <div class="banner-our-production-content-wrapper">
                            <div class="banner-our-production-content">	
                                <h1 onclick="open_banner_our_production(this)">НАША ПРОДУКЦИЯ <img src="<?php echo get_template_directory_uri(); ?>/img/img15.png" alt="img"></h1>
                                <div class="banner-our-production-content-320" id="banner-our-production-content-320">
                                    <?php

                                    $taxonomy     = 'product_cat';
                                    $orderby      = 'name';
                                    $parent 	  = 0;
                                    $show_count   = 0;
                                    $pad_counts   = 0;
                                    $hierarchical = 0;
                                    $title        = '';
                                    $empty        = 0;

                                    $args = array(
                                        'taxonomy'     => $taxonomy,
                                        'orderby'      => $orderby,
                                        'parent'	   => $parent,
                                        'show_count'   => $show_count,
                                        'pad_counts'   => $pad_counts,
                                        'hierarchical' => $hierarchical,
                                        'title_li'     => $title,
                                        'hide_empty'   => $empty
                                    );
                                    $all_categories = get_categories( $args ); 
                                    $i=1;
                                    foreach($all_categories as $category){

                                        $id = $category->term_id;
                                        $link = get_term_link($category->term_id);
                                        $name = $category->name;

                                        echo "<div class='banner-our-production-menu banner-our-production-menu{$i}'>";

                                            if(check_cat_child($id)){
                                                echo "<h3><a href='{$link}'><span>{$name}</span></a></h3>";
                                                get_menu_subcategories($id);
                                            }else{
                                                echo "<h3><a href='{$link}'><span>{$name}</span></a></h3>";
                                            };								

                                        echo "</div>";
                                        $i++;
                                    } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- конец блок наша продукция -->


				<!-- начало блок-банер наши акции и наши бренды мобверсия -->
				<div class="shares-and-brands-banner shares-and-brands-banner-320 ">
					<div class="buttons-shares-and-brands-banner-320"><span  onclick="openBrandsMob(this)" class="scroll-down">наши бренды</span><span class="scroll-down" onclick="openSharesMob(this)">наши акции</span></div>
					<div class="wrapper">
						<div class="shares-and-brands-banner-wrapper">
							<div class="shares-banner" id="shares-banner">
								<div class="body-shares-banner-wrapper">
									<div class="body-shares-banner body-shares-banner-slider">
										<div class="owl-carousel owl-theme body-shares-bannerSlider">
											<div class="div"><a href="#"><span>Бормашина Профиль М-03 с 6 мм цангой </span><img src="<?php echo get_template_directory_uri(); ?>/img/img25.jpg" alt="img"></a></div>
											<div class="div"><a href="#"><span>Бормашина Профиль Б-06, исполнение Торнадо с БП-6Т</span><img src="<?php echo get_template_directory_uri(); ?>/img/img26.jpg" alt="img"></a></div>
											<div class="div"><a href="#"><span>Сменный шпиндель с цангой 6 мм</span><img src="<?php echo get_template_directory_uri(); ?>/img/img27.jpg" alt="img"></a></div>
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
											<?php $brands = get_field('brand', $front_page); foreach($brands as $brand){ ?>
											    <div class="item">
											    	<img src="<?php echo $brand['url']; ?>" alt="img" style="width: 39%;">
											    </div>
											<?php } ?>
											     
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
										<div class="div"><a href="#"><span>Бормашина Профиль М-03 с 6 мм цангой </span><img src="<?php echo get_template_directory_uri(); ?>/img/img25.jpg" alt="img"></a></div>
										<div class="div"><a href="#"><span>Бормашина Профиль Б-06, исполнение Торнадо с БП-6Т</span><img src="<?php echo get_template_directory_uri(); ?>/img/img26.jpg" alt="img"></a></div>
										<div class="div"><a href="#"><span>Сменный шпиндель с цангой 6 мм</span><img src="<?php echo get_template_directory_uri(); ?>/img/img27.jpg" alt="img"></a></div>
									</div>

									<div class="body-shares-banner body-shares-banner-slider">
										<div class="owl-carousel owl-theme body-shares-bannerSlider">
											<div class="div"><a href="#"><span>Бормашина Профиль М-03 с 6 мм цангой </span><img src="<?php echo get_template_directory_uri(); ?>/img/img25.jpg" alt="img"></a></div>
											<div class="div"><a href="#"><span>Бормашина Профиль Б-06, исполнение Торнадо с БП-6Т</span><img src="<?php echo get_template_directory_uri(); ?>/img/img26.jpg" alt="img"></a></div>
											<div class="div"><a href="#"><span>Сменный шпиндель с цангой 6 мм</span><img src="<?php echo get_template_directory_uri(); ?>/img/img27.jpg" alt="img"></a></div>
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
												<?php $brands = get_field('brand', $front_page); foreach($brands as $brand){ ?>
													<div class="item">
														<img src="<?php echo $brand['url']; ?>" alt="img" style="width: 39%;">
													</div>
												<?php } ?>
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


				<!-- блок наши новинки -->
				<div class="our-novelties">
					<div  class="el1"><div></div></div>
					<div class="wrapper">
						<div class="name-container">
								<h4>НАШИ НОВИНКИ<span>новые товары каталога</span></h4>
								<div class="button"><div><span>ВСЕ НОВИНКИ</span></div></div>
							</div>
						<div class="catalog-commodity">
                            <?php 
                            $args = array(
                                'post_type' => 'product',
                                'posts_per_page' => 4,

                            );
                            $query = new WP_Query($args); $i=1;
                            while($query->have_posts()) : $query->the_post(); $product = wc_get_product(get_the_ID()); ?>
                                <div class="box box<?php echo $i; ?>">
                                    <div class="div1"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div>
                                    <div class="div2"><a href="<?php the_permalink(); ?>"><img src="<?php echo wp_get_attachment_image_src( get_post_thumbnail_id(), 'prod_page' )[0];?>" alt="img"></a></div>
                                    <div class="div3"><p><span><?php echo mb_substr(get_the_excerpt(), 0, 70, 'utf-8');?></span></p></div>
                                    <div class="div4">
                                        <div class="wrapper-div4">
                                            <div class="price"><span><?php echo $product->get_regular_price();?></span></div>
                                            <div class="button"><div onclick="openPopap(this)"><span>купить</span></div></div>
                                        </div>
                                    </div>
                                    <div class="popap"><span>Товар добавлен в корзину</span></div>	
                                </div>
                            <?php $i++; endwhile; ?>
						</div>
						<!-- слайдер -->
						<div class="catalog-commodity catalog-commodity-slider">
							<div class="owl-carousel owl-theme catalogCommodity-slider ">
                                <?php $i=1; while($query->have_posts()) : $query->the_post(); $product = wc_get_product(get_the_ID()); ?>
                                    <div class="box box<?php echo $i; ?>">
                                        <div class="div1"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div>
                                        <div class="div2"><a href="<?php the_permalink(); ?>"><img src="<?php echo wp_get_attachment_image_src( get_post_thumbnail_id(), 'prod_page' )[0];?>" alt="img"></a></div>
                                        <div class="div3"><p><span><?php echo mb_substr(get_the_excerpt(), 0, 70, 'utf-8');?></span></p></div>
                                        <div class="div4">
                                            <div class="wrapper-div4">
                                                <div class="price"><span><?php echo $product->get_regular_price();?></span></div>
                                                <div class="button"><div onclick="openPopap(this)"><span>купить</span></div></div>
                                            </div>
                                        </div>
                                        <div class="popap"><span>Товар добавлен в корзину</span></div>	
                                    </div>
                                <?php $i++; endwhile; ?>
							</div>
						</div>
					</div>
				</div>
				<!-- конец блок наши новинки -->

				<!-- начало блок наши новости -->
				<div class="our-news">
					<div class="el1"><div></div></div>
					<div class="el2"><div></div></div>
					
						<div class="wrapper">
							<div class="name-container">
								<h4>НАШИ НОВости<span>актуальные события магазина</span></h4>
								<div class="button"><div><span>ВСЕ НОВости</span></div></div>
							</div>
							<div class="product">
                                <?php 
                                    $args = array(
                                        'post_type' => 'post',
                                        'posts_per_page' => 4,

                                    );
                                    $query = new WP_Query($args);
                                    while($query->have_posts()) : $query->the_post(); ?>
                                    <div class="box box">
                                        <div class="div2-1">
                                            <a href="<?php the_permalink(); ?>" style="background:url('<?php echo wp_get_attachment_image_src( get_post_thumbnail_id(), 'fp_news' )[0];?>')"></a>
                                        </div>
                                        <div class="div2-2">
                                            <div class="data">
                                                <span><?php echo get_the_date('d'); ?></span><span><?php echo get_the_date('m.y'); ?></span>
                                            </div>
                                            <div class="a"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div>
                                        </div>
                                        <div class="div2-3"><span><?php echo mb_substr(get_the_excerpt(), 0, 50, 'utf-8');?></span></div>
                                    </div>
                                <?php $i++; endwhile;?>
							</div>

							<!-- слайдер -->

							<div class="product product-slider">
								<div class="owl-carousel owl-theme productSlider">

									<?php 
                                    while($query->have_posts()) : $query->the_post(); ?>
                                        <div class="box box">
                                            <div class="div2-1">
                                                <a href="<?php the_permalink(); ?>" style="background:url('<?php echo wp_get_attachment_image_src( get_post_thumbnail_id(), 'fp_news' )[0];?>')"></a>
                                            </div>
                                            <div class="div2-2">
                                                <div class="data">
                                                    <span><?php echo get_the_date('d'); ?></span><span><?php echo get_the_date('m.y'); ?></span>
                                                </div>
                                                <div class="a"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div>
                                            </div>
                                            <div class="div2-3"><span><?php echo mb_substr(get_the_excerpt(), 0, 50, 'utf-8');?></span></div>
                                        </div>
                                    <?php $i++; endwhile;?>

								</div>
							</div>
						</div>
					
				</div>
				<!-- конец блок наши новости -->


				<!-- начало блока наши бренды -->
				<div class="our-brend">
					<div class="el1"><div></div></div>
					<div class="el2"><div></div></div>
					<div class="wrapper">
						<div class="name-container">
							<h4>НАШИ БРЕНДЫ<span>производители и партнеры</span></h4>
						</div>

						<div class="our-brend-slider">
							<div class="owl-carousel owl-theme ourBrend-slider">
							    <div class="item">
							    	<img src="<?php echo get_template_directory_uri()?>/img/img39.png" alt="img" style="width: 39%;">
							    </div>
							     <div class="item">
							    	<img src="<?php echo get_template_directory_uri()?>/img/img40.png" alt="img" style="width: 45%;">
							    </div>
							    <div class="item">
							    	<img src="<?php echo get_template_directory_uri()?>/img/img41.jpg" alt="img" style="width: 88%;">
							    </div>
							    <div class="item">
							    	<img src="<?php echo get_template_directory_uri()?>/img/img42.png" alt="img" style="width: 64%;">
							    </div>
							</div>
						</div>

					</div>
				</div>
				<!-- конец бллока наши бренды -->

				<!-- начало блок о магазине -->
				<div class="about-store">
					<div class="wrapper">
						<div class="name-container">
							<h4>О МАГАЗИНЕ<span>подробнее о нас</span></h4>
						</div>
						<div class="container">
							<div class="text">
								<p>Это пример небольшого текста о магазине, создан для того, чтобы было понятно, где будет текст. Это пример небольшого текста о магазине, создан для того, чтобы было понятно, где будет текст. Это пример небольшого текста о магазине, создан для того, чтобы было понятно, где будет текст. Это пример небольшого текста о магазине, создан для того, чтобы было понятно, где будет текст. </p>
								<div class="name-container"><div class="button"><div><span>ВСЕ НОВИНКИ</span></div></div></div>
							</div>
							<div class="img">
								<img src="<?php echo get_template_directory_uri(); ?>/img/img55.png" alt="img">
							</div>
						</div>
					</div>
				</div>
				<!-- конец блок о магазине -->

			</div>
		</div>
<?php get_footer(); ?>