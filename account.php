<?php 

/**
Template Name: Шаблон для страниц аккаунта
*/
get_header();
the_post();
?>

	<?php get_template_part('parts/header-menu', '320'); ?>
	<?php get_template_part('parts/header'); ?>

<div class="min-heght">
    <div class="page page-8 privat-cab">

			<?php get_template_part('parts/brands-and-banners', '320'); ?>

			<?php get_template_part('parts/category', 'list'); ?>


        <div class="wrapper">
            <div class="wrap-in">
                <div class="el1"><div></div></div>					
            </div>						
        </div>

        <div class="wrapper">
            <div class="wrap-in wrap-in-margin-bottom">
                <?php the_content(); ?>                
            <div class="clear"></div>
            </div>						
        </div>

    </div>
</div>

<?php get_footer(); ?>