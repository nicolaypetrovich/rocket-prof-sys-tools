<?php 
get_header(); 
global $front_page; 
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
										<?php $stock_args = array(
											'post_type' 	 => 'product',
											'meta_key'       => 'ac_t',
											'meta_value'     => true,
										);
										$stock = new WP_Query($stock_args);
										while($stock->have_posts()) : $stock->the_post(); ?>
											<div class="div">
												<a href="<?php the_permalink(); ?>">
													<span> <?php the_title(); ?> </span>
													<img src="<?php echo wp_get_attachment_image_src( get_post_thumbnail_id(), 'prod_page' )[0];?>" alt="<?php the_title(); ?>">
												</a>
											</div>
										<?php endwhile; wp_reset_query(); ?>
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

									<?php while($stock->have_posts()) : $stock->the_post(); ?>
										<div class="div">
											<a href="<?php the_permalink(); ?>">
												<span> <?php the_title(); ?> </span>
												<img src="<?php echo wp_get_attachment_image_src( get_post_thumbnail_id(), 'prod_page' )[0];?>" alt="<?php the_title(); ?>">
											</a>
										</div>
									<?php endwhile; wp_reset_query(); ?> 
									
								</div>

								<div class="body-shares-banner body-shares-banner-slider">
									<div class="owl-carousel owl-theme body-shares-bannerSlider">

										<?php while($stock->have_posts()) : $stock->the_post(); ?>
											<div class="div">
												<a href="<?php the_permalink(); ?>">
													<span> <?php the_title(); ?> </span>
													<img src="<?php echo wp_get_attachment_image_src( get_post_thumbnail_id(), 'prod_page' )[0];?>" alt="<?php the_title(); ?>">
												</a>
											</div>
										<?php endwhile; wp_reset_query(); ?>

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
							<h4><?php the_field('news_block_title', $front_page); ?><span><?php the_field('news_block_desc', $front_page); ?></span></h4>
							<div class="button"><div><a href="<?php echo get_permalink( woocommerce_get_page_id( 'shop' ) ); ?>"><?php the_field('news_block_link', $front_page); ?></a></div></div>
						</div>
					<div class="catalog-commodity">
						<?php 
						$products = get_field('fp_products', $front_page);
						$args = array(
							'post_type'	=> 'product',
							'post__in'	=> $products
						);
						$query = new WP_Query($args); $i=1;
						while($query->have_posts()) : $query->the_post(); $product = wc_get_product(get_the_ID()); ?>
							<div class="box box<?php echo $i; ?>">
								<div class="div1"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div>
								<div class="div2"><a href="<?php the_permalink(); ?>"><img src="<?php echo wp_get_attachment_image_src( get_post_thumbnail_id(), 'prod_page' )[0];?>" alt="img"></a></div>
								<div class="div3"><p><span><?php echo mb_substr(get_the_excerpt(), 0, 70, 'utf-8');?></span></p></div>
								<div class="div4">
									<div class="wrapper-div4">
										<?php $price = $product->get_regular_price(); if($price) { ?>
											<div class="price"><span><?php echo $product->get_regular_price();?></span> руб.</div>
											<div class="button">
												<div onclick="openPopap(this)">
													<span class="custom-ajax-add-to-cart" data-id="<?php echo get_the_ID(); ?>">купить</span>
												</div>
											</div>
										<?php }else{ ?>
											<div class="price">Нет в наличии</div>
											<div class="button">
												<a href="<?php echo get_the_permalink(get_the_ID()); ?>">Подробнее</a>
											</div>
										<?php } ?>
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
							<?php $i++; endwhile; wp_reset_query(); ?>
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
							<?php $term = get_term_by('name', 'Новости', 'category'); ?>
							<h4><?php echo $term->name; ?><span><?php echo $term->description; ?></span></h4>
							<div class="button"><div><a href="<?php echo get_term_link($term->term_id); ?>"><?php echo $term->name; ?></a></div></div>
						</div>
						<div class="product">
							<?php 
								$news_count = get_field('news_count', $front_page);
								$args = array(
									'post_type' 		=> 'post',
									'category__in'     	=> array( 1 ),
									'posts_per_page' 	=> $news_count,

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
							<?php $i++; endwhile; wp_reset_query();?>
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
								<?php $i++; endwhile; wp_reset_query();?>

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
						<h4><?php the_field('brand_block_title', $front_page); ?><span><?php the_field('brand_block_desc', $front_page); ?></span></h4>
					</div>

					<div class="our-brend-slider">
						<div class="owl-carousel owl-theme ourBrend-slider">
							<?php $brands = get_field('brand', $front_page); foreach($brands as $brand){ ?>
								<div class="item">
									<img src="<?php echo $brand['url']; ?>" alt="img" style="width: 39%;">
								</div>
							<?php } ?>
						</div>
					</div>

				</div>
			</div>
			<!-- конец бллока наши бренды -->

			<!-- начало блок о магазине -->
			<?php $about_id = get_field('about_block_page', $front_page); ?>
			<div class="about-store">
				<div class="wrapper">
					<div class="name-container">
						<h4><?php the_field('about_block_title', $front_page); ?><span><?php the_field('about_block_desc', $front_page); ?></span></h4>
					</div>
					<?php $link = get_field('about_block_link', $front_page); ?>
					<div class="container">
						<div class="text">
							<p><?php echo apply_filters('the_excerpt', mb_substr(get_post_field('post_content', $about_id), 0, 390, 'utf-8' )); ?></p>
							<div class="name-container"><div class="button"><div><a href="<?php echo $link['url']; ?>"><?php echo $link['title']; ?></a></div></div></div>
						</div>
						<div class="img">
							<img src="<?php echo wp_get_attachment_image_src( get_post_thumbnail_id($about_id), 'fp_about' )[0];?>" alt="img">
						</div>
					</div>
				</div>
			</div>
			<!-- конец блок о магазине -->

		</div>
	</div>
<?php get_footer(); ?>