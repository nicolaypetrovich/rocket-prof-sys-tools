<?php
/*
Template Name: страница утерянного пароля
*/
get_header();
the_post();
?>

	<?php get_template_part('parts/header-menu', '320'); ?>
	<?php get_template_part('parts/header'); ?>

<div class="min-heght">
    <div class="page page-8 privat-cab">

    <?php get_template_part('parts/brands-and-banners', '320'); ?>

    <?php get_template_part('parts/account', 'banner'); ?>

        <div class="wrapper">
            <div class="wrap-in">
                <div class="el1"><div></div></div>					
            </div>						
        </div>
        <div class="wrapper">
            <div class="wrap-in wrap-in-margin-bottom">
               <div class="my-wishes prof-margin-left">
                    <div class="name-container">
                         <h4>Забыли пароль?</h4>
                    </div>
                    <div class="my-wishes-item-wrap">
                         <?php the_content(); ?>
                    </div>                        
               </div>
               <div class="clear"></div>
            </div>						
        </div>
    </div>
</div>


<?php get_footer(); ?>