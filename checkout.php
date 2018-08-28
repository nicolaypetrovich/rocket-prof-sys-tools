<?php 

/*
Template Name: Шаблон для страницы расчета
*/

get_header(); the_post(); ?>

	<?php get_template_part('parts/header-menu', '320'); ?>
	<?php get_template_part('parts/header'); ?>
    
    <div class="min-heght">
			<div class="page page-7">
				
			<?php get_template_part('parts/brands-and-banners', '320'); ?>

			<?php get_template_part('parts/category', 'list'); ?>

                <!-- блок навигация -->
                <?php woocommerce_breadcrumb(); ?>
				<!-- конец блок навигация -->

				<div class="wrapper">
					<div class="wrap-in wrap-in-margin-top wrap-in-margin-bottom wrap-in-column">
						<div class="el1"><div></div></div>
                            <?php the_content(); ?>
					</div>						
				</div>
	
			</div>
		</div>



<?php get_footer(); ?>