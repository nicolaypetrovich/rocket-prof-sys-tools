<?php 
get_header(); 
global $front_page; 
global $stock;
?>
	
	<?php get_template_part('parts/header-menu', '320'); ?>
	<?php get_template_part('parts/header'); ?>
		
    <div class="min-heght">
		<div class="page1">

			<?php get_template_part('parts/category', 'list'); ?>

			<?php get_template_part('parts/brands-and-banners', '320'); ?>

			<?php get_template_part('parts/brands-and', 'banners'); ?>

			<!-- блок наши новинки -->
			<div class="our-novelties">
				<div  class="el1"><div></div></div>
				<div class="wrapper">
					<div class="name-container">
							<h4><?php the_field('prod_block_title', $front_page); ?><span><?php the_field('prod_block_desc', $front_page); ?></span></h4>
							<div class="button"><div><a href="<?php echo get_permalink( woocommerce_get_page_id( 'shop' ) ); ?>"><?php the_field('prod_block_link', $front_page); ?></a></div></div>
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
											<div class="price"><span><?php echo $product->get_price_html(); ?></span></div>
											<div class="button">
												<div onclick="openPopap(this)" > 
													<span class="custom-ajax-add-to-cart" data-id="<?php echo get_the_ID(); ?>">купить</span>
												</div>
											</div>
										<?php }else{ ?>
											<div class="price">Нет в наличии</div>
											<div class="button">
												<div>
													<a href="<?php echo get_the_permalink(get_the_ID()); ?>">Подробнее</a>
												</div>
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
											<div class="price"><span><?php echo $product->get_price_html(); ?></span></div>
											<div class="button"><div onclick="openPopap(this)"><span class="custom-ajax-add-to-cart" data-id="<?php echo get_the_ID(); ?>">купить</span></div></div>
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
							<h4><?php the_field('news_block_title', $front_page); ?><span><?php the_field('news_block_desc', $front_page); ?></span></h4>
							<div class="button"><div><a href="<?php echo get_term_link($term->term_id); ?>"><?php the_field('news_block_link', $front_page); ?></a></div></div>
						</div>
						<div class="product">
							<?php 
								$args = array(
									'post_type' 		=> 'post',
									'category__in'     	=> array( 1 ),
									'posts_per_page' 	=> 4,

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
							<?php 						
								$filtered = get_terms( array(
									'taxonomy'      => array( 'pa_proizvoditel' ),
									'hide_empty'    => true, 
								) );
								foreach( $filtered as $term ){ $image = get_field('image', $term)['url']; if(!empty($image)){?>
								<div class="item">
									<a href="/shop/?filter_proizvoditel=<?php echo $term->slug; ?>"><img src="<?php echo $image; ?>" alt="<?php echo $term->name; ?>"></a>
								</div>
							<?php } } ?>
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