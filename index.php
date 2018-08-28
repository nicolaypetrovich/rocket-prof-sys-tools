<?php get_header(); ?>

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
					<div class="name-container">
						<h4><?php the_title(); the_post(); ?></h4>
					</div>

					<div class="text-wrap">
						<?php the_content(); ?>
					</div>
												
				</div>
			</div>
			<!-- конец блок наши новинки -->

		</div>
	</div>
<?php get_footer(); ?>