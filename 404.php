<?php

get_header(); ?>

    <?php get_template_part('parts/header-menu', '320'); ?>
    <?php get_template_part('parts/header'); ?>
    
    <div class="min-heght">
        <div class="page page-5">

			<?php get_template_part('parts/brands-and-banners', '320'); ?>

			<?php get_template_part('parts/category', 'list'); ?>

            <div class="main-navigation" itemprop="breadcrumb">
                <div class="wrapper">
                    <a href="http://prof-sys-tools.rocketcompany.website">Главная</a> / 
                    Страница не найдена
                </div>
            </div>

            <div class="wrapper">
                <div class="wrap-in wrap-in-margin-top">
                    <div class="el1"><div></div></div>
                    
                    <div class="wrap-error">
                        <h5>Ошибка <span>404!</span></h5>
                        <p>к сожаленю, запрашиваемая страница не найдена.</p>
                        <a href="<?php echo home_url(); ?>" class="link-error"><div>перейти на главную</div></a>
                    </div>
                </div>						
            </div>

        </div>
    </div>

<?php get_footer(); ?>