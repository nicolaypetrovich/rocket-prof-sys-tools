<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.4.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

/**
 * Hook: woocommerce_before_single_product.
 *
 * @hooked wc_print_notices - 10
 */
do_action( 'woocommerce_before_single_product' );

if ( post_password_required() ) {
	echo get_the_password_form(); // WPCS: XSS ok.
	return;
}
?>
<div id="product-<?php the_ID(); ?>">



		<?php
			/**
			 * Hook: woocommerce_before_single_product_summary.
			 *
			 * @hooked woocommerce_show_product_sale_flash - 10
			 * @hooked woocommerce_show_product_images - 20
			 */
			do_action( 'woocommerce_before_single_product_summary' );
		?>
		<div class="container">
			<div class="container-left">
				<?php $attachment_ids = $product->get_gallery_image_ids();
					if ( $attachment_ids && has_post_thumbnail() ) { ?>
					<div class="small-pictures small-pictures-760">
						<?php foreach ( $attachment_ids as $attachment_id ) { ?>
							<div class="small-box" onclick="openBigPhoto(this)">
								<img src="<?php echo wp_get_attachment_image_url($attachment_id); ?>" alt="img">
							</div>
						<?php } ?>
					</div>
				<?php } ?> 

				<?php $attachment_ids = $product->get_gallery_image_ids();
					if ( $attachment_ids && has_post_thumbnail() ) { ?>
					<div class="small-pictures small-pictures-slider">
						<?php foreach ( $attachment_ids as $attachment_id ) { ?>
							<div class="owl-carousel owl-theme  small-picturesSlider">
								<div class="small-box"><img src="<?php echo wp_get_attachment_image_url($attachment_id); ?>" alt="img"></div>
							</div>
						<?php } ?>
					</div> 
				<?php } ?> 	

				<div class="big-pictures">
					<img src="<?php echo wp_get_attachment_image_src( get_post_thumbnail_id(), 'prod_page' )[0];?>" alt="img">
				</div>
				<div class="popap" id="popap"><span>Товар добавлен в корзину</span></div>
			</div>

			<div class="container-right">

				<?php
				/**
				 * Hook: woocommerce_single_product_summary.
				 *
				 * @hooked woocommerce_template_single_title - 5
				 * @hooked woocommerce_template_single_rating - 10
				 * @hooked woocommerce_template_single_price - 10
				 * @hooked woocommerce_template_single_excerpt - 20
				 * @hooked woocommerce_template_single_add_to_cart - 30
				 * @hooked woocommerce_template_single_meta - 40
				 * @hooked woocommerce_template_single_sharing - 50
				 * @hooked WC_Structured_Data::generate_product_data() - 60
				 */
				do_action( 'woocommerce_single_product_summary' );
				?>

			</div>
		</div>

	

	<?php
		/**
		 * Hook: woocommerce_after_single_product_summary.
		 *
		 * @hooked woocommerce_output_product_data_tabs - 10
		 * @hooked woocommerce_upsell_display - 15
		 * @hooked woocommerce_output_related_products - 20
		 */
		do_action( 'woocommerce_after_single_product_summary' );
	?>
</div>

<?php do_action( 'woocommerce_after_single_product' ); ?>
