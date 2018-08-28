<?php get_header(); ?>

	<?php get_template_part('parts/header-menu', '320'); ?>
	<?php get_template_part('parts/header'); ?>
		
	<div class="min-heght">
		<div class="page2">


			<?php get_template_part('parts/category', 'list'); ?>

			<?php get_template_part('parts/brands-and-banners', '320'); ?>

			<?php get_template_part('parts/brands-and', 'banners'); ?>


            <!-- блок каталог -->
            <div class="our-novelties">
				<div class="el1"><div></div></div>
				<div class="el2"><div></div></div>
				
					<div class="wrapper">
						<div class="name-container">
							<h4><?php echo single_cat_title(); ?></h4>
						</div>
						<div class="product">
							<?php 
								while(have_posts()) : the_post(); ?>
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
							<?php endwhile;?>
						</div>

						<!-- слайдер -->

						<div class="product product-slider">
							<div class="owl-carousel owl-theme productSlider">

								<?php 
								while(have_posts()) : the_post(); ?>
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
								<?php endwhile;?>

							</div>
						</div>
					</div>
				
			</div>
			<!-- конец блок наши новинки -->

		</div>
	</div>

<?php get_footer(); ?>