<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.4.0
 */

defined( 'ABSPATH' ) || exit;

get_header( 'shop' ); ?>

	<?php get_template_part('parts/header-menu', '320'); ?>
	<?php get_template_part('parts/header'); ?>

	<div class="min-heght">
		<div class="page2">
			
		<?php get_template_part('parts/brands-and-banners', '320'); ?>

		<?php get_template_part('parts/category', 'list'); ?>

		<?php get_template_part('parts/brands-and', 'banners'); ?>

		<!-- блок каталог -->
		<div class="our-novelties">
			<div  class="el1"><div></div></div>
			<div  class="el2"><div></div></div>
			<div class="wrapper">

			<?php

			/**
			 * Hook: woocommerce_before_main_content.
			 *
			 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
			 * @hooked woocommerce_breadcrumb - 20
			 * @hooked WC_Structured_Data::generate_website_data() - 30
			 */
			do_action( 'woocommerce_before_main_content' );

			?>

			<div class="name-container">
				<?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>
					<h4><?php woocommerce_page_title(); ?></h4>
				<?php endif; ?>

				<?php
				/**
				 * Hook: woocommerce_archive_description.
				 *
				 * @hooked woocommerce_taxonomy_archive_description - 10
				 * @hooked woocommerce_product_archive_description - 10
				 */
				do_action( 'woocommerce_archive_description' );
				?>
			</div>

			<?php 						
			$terms = get_terms( array(
				'taxonomy'      => array( 'pa_proizvoditel' ),
				'hide_empty'    => true, 
			) );
			$filter2 = array();
			foreach( $terms as $term ){
				$filter2[$term->slug] = $term->name;
			} ?>

			<div class="filter">
				<div class="button-filter-320"><span onclick="openFilter320(this)">фильтр</span></div>
					<div class="filter-wrapper" id="filter-wrapper">
						<div class="button-filter-320"><span onclick="openFilter320(this)">фильтр</span></div>
						<div  class="filterWrapper">
							<div class="filter-block">
								<div class="filter-box"><span>Фильтр по цене</span></div>
								<div class="filter-box">
									<?php $order = $_GET['orderby']; 
									$order = ($order == 'price') ? 'По возрастанию' : 'По убыванию'; ?>
									<div onclick="filter_menu(this)"><span><?php echo $order; ?></span></div>
									<div class="filter-menu">
										<span><a href="/shop/?orderby=price
											<?php if($_GET['filter_proizvoditel']){
												echo '/shop/&filter_proizvoditel='.$_GET['filter_proizvoditel'];
												};
											?>">По возрастанию</a></span>
										<span><a href="?orderby=price-desc
											<?php if($_GET['filter_proizvoditel']){
												echo '/shop/&filter_proizvoditel='.$_GET['filter_proizvoditel'];
												};
											?>">По убыванию</a></span>
									</div>
								</div>
							</div>
							<div class="filter-block">
								<div class="filter-box"><span>Фильтр по производителю</span></div>
								<div class="filter-box">
									<?php $filter_proizvoditel = (!empty($_GET['filter_proizvoditel'])) ? $filter2[$_GET['filter_proizvoditel']] : 'Любой производитель'; ?>
									<div onclick="filter_menu(this)"><span><?php echo $filter_proizvoditel; ?></span></div>
									<div class="filter-menu">
										<span><a href="/shop/?
												<?php if($_GET['orderby']){
													echo 'orderby='.$_GET['orderby'];}
													;?>">Любой производитель</a></span>
										<?php 						
										$terms = get_terms( array(
											'taxonomy'      => array( 'pa_proizvoditel' ),
											'hide_empty'    => true, 
										) );
										foreach( $terms as $term ){ ?>							
											<span><a href="/shop/?
												<?php if($_GET['orderby']){
													echo 'orderby='.$_GET['orderby'].'&';}
													;?>
													filter_proizvoditel=<?php echo $term->slug; ?>"><?php echo $term->name; ?></a></span>
										<?php } ?>
									</div>
								</div>
							</div>
							<div class="filter-block">
								<div class="filter-box"><span>Пункт фильтра</span></div>
								<div class="filter-box">
									<div onclick="filter_menu(this)"><span></span></div>
									<div class="filter-menu">
										<span onclick="giveText(this)">Пункт фильтра1</span>
										<span onclick="giveText(this)">Пункт фильтра2</span>
										<span onclick="giveText(this)">Пункт фильтра3</span>
									</div>
								</div>
							</div>
						</div>
					</div>

				
			</div>

				<?php
				if ( woocommerce_product_loop() ) { ?>

						<div class="block-catalog-page2 block-catalog-page2-active">
							<?php

							/**
							 * Hook: woocommerce_before_shop_loop.
							 *
							 * @hooked wc_print_notices - 10
							 * @hooked woocommerce_result_count - 20
							 * @hooked woocommerce_catalog_ordering - 30
							 */
							do_action( 'woocommerce_before_shop_loop' );

							woocommerce_product_loop_start();

							if ( wc_get_loop_prop( 'total' ) ) {
								while ( have_posts() ) {
									the_post();

									/**
									 * Hook: woocommerce_shop_loop.
									 *
									 * @hooked WC_Structured_Data::generate_product_data() - 10
									 */
									do_action( 'woocommerce_shop_loop' );

									wc_get_template_part( 'content', 'product' );
								}

							}

							woocommerce_product_loop_end();

							/**
							 * Hook: woocommerce_after_shop_loop.
							 *
							 * @hooked woocommerce_pagination - 10
							 */
							do_action( 'woocommerce_after_shop_loop' );
						
						} else {
							/**
							 * Hook: woocommerce_no_products_found.
							 *
							 * @hooked wc_no_products_found - 10
							 */
							do_action( 'woocommerce_no_products_found' );
						} ?>

					</div>

					<?php the_posts_pagination(); ?>

				<?php

				/**
				 * Hook: woocommerce_after_main_content.
				 *
				 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
				 */
				do_action( 'woocommerce_after_main_content' );

				/**
				 * Hook: woocommerce_sidebar.
				 *
				 * @hooked woocommerce_get_sidebar - 10
				 */
				do_action( 'woocommerce_sidebar' ); ?>
		</div>
	</div>
</div>

<?php get_footer( 'shop' );
