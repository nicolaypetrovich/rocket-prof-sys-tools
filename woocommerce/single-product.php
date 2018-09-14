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


	<?php get_template_part('parts/header-menu', '320'); ?>
	<?php get_template_part('parts/header'); ?>

	<div class="min-heght">
		<div class="page3">

			<?php get_template_part('parts/brands-and-banners', '320'); ?>

			<?php get_template_part('parts/category', 'list'); ?>

			<?php get_template_part('parts/brands-and', 'banners'); ?>

			<?php 
			
			$args = array(
				'delimiter'   => ' &#47; ',
				'wrap_before' => '<div class="main-navigation" itemprop="breadcrumb"><div class="wrapper">',
				'wrap_after'  => '</div></div>',
				'before'      => '',
				'after'       => '',
				'home'        => _x( 'Home', 'breadcrumb', 'woocommerce' ),
			);
			
			woocommerce_breadcrumb($args); ?>

				<?php
					/**
					 * woocommerce_before_main_content hook.
					 *
					 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
					 * @hooked woocommerce_breadcrumb - 20
					 */
					do_action( 'woocommerce_before_main_content' );
				?>

					<div class="card-product single-product-quantity">
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
										<?php the_content(); ?>
									</div>
								</div>
								<div class="container-right">
									<div class="name-container">
										<h4>УХОД, ВОЗВРАТ И ОБМЕН</h4>
									</div>
									<div class="text">
										<?php the_field('return'); ?>
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
										<?php the_field('delivery');?>
									</div>
								</div>
								<div class="container-box">
									<div class="name-container">
										<h4>ОПЛАТА</h4>
									</div>
									<div class="text brekable">
										<?php the_field('cash'); ?>
									</div>
								</div>
								<div class="container-box">

									<span
									class="button btn-form custom-ajax-add-to-cart"
									data-id="<?php echo get_the_id(); ?>" data-product_sku="" aria-label="" 
									rel="nofollow" onclick="openPopapPage3()">В корзину</a>
									
								</div>
								<div class="popap" id="popap1"><span>Товар добавлен в корзину</span></div>	
					
							</div>
						</div>
					</div>
					<!-- конец блок доставка и оплата -->
					
					<?php $related_products = get_field('recommended'); if($related_products) : ?>
						<div class="see-also">
							<div class="el1"><div></div></div>
							<div class="wrapper">
								<div class="name-container">
									<h4>Смотрите так же</h4>
								</div>
								<div class="catalog-commodity">
									<?php foreach($related_products as $related_product) : $prod = wc_get_product($related_product); 
										if(!empty($prod)):?>
										<div class="box box1">
											<div class="div1"><a href="<?php get_permalink($related_product);?>"><?php echo $prod->name;?></a></div>
											<div class="div2"><a href="<?php get_permalink($related_product);?>">
											<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $related_product ), 'related_prods' );?>
												<img src="<?php echo $image[0]; ?>">
											</a></div>
											<div class="div3"><p><span><?php echo mb_substr(get_the_excerpt($related_product), 0, 60, 'utf-8');?></span></p></div>
											<div class="div4">
												<div class="wrapper-div4">
													<div class="price"><span><?php echo $prod->get_price_html(); ?></span></div>
													<div class="button"><div onclick="openPopap(this)"><span class="custom-ajax-add-to-cart" data-id="<?php echo $related_product; ?>" data-value="<?php echo $related_product; ?>">купить</span></div></div>
												</div>
											</div>
											<div class="popap"><span>Товар добавлен в корзину</span></div>	
										</div>
									<?php endif; endforeach; ?>
								</div>
								<div class="catalog-commodity catalog-commodity-slider">
									<div class="owl-carousel owl-theme catalogCommodity-slider ">
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
													<div class="button"><div onclick="openPopap(this)"><span class="custom-ajax-add-to-cart" data-id="<?php echo $related_product; ?>" data-value="<?php echo $related_product; ?>">купить</span></div></div>
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
