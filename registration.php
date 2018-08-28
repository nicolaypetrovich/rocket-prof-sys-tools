<?php
/*
Template Name: Регистрация
*/

get_header();
?>

	<?php get_template_part('parts/header-menu', '320'); ?>
    <?php get_template_part('parts/header'); ?>
    
    <div class="min-heght">
        <div class="page page-11">

            <?php get_template_part('parts/brands-and-banners', '320'); ?>

            <?php get_template_part('parts/category', 'list'); ?>

            <!-- блок навигация -->
            <?php woocommerce_breadcrumb(); ?>
            <!-- <div class="main-navigation wrap-in">
                <div class="wrapper">
                    <span><a href="#" class="el-main-navigation">Главная </a></span>
                    <span class="el-main-navigation">Регистрация</span>
                </div>
            </div> -->
            <!-- конец блок навигация -->

            <div class="wrapper">
                <div class="wrap-in wrap-in-margin-top wrap-in-margin-bottom">
                    <div class="el1"><div></div></div>
                    
                    <div class="name-container">
                        <h4>Регистрация</h4>
                    </div>

                    <div class="wrap-form-registry">
                        <form action="#" data-action="registration">
                            <input class="input-my-profile required"  type="text" name="name" placeholder="Имя" />
                            <input class="input-my-profile required" type="email" name="email" placeholder="E-mail" />
                            <input class="input-my-profile phone required" type="tel" name="phone" placeholder="Номер телефона" />
                            <input class="input-my-profile required" type="text" name="city" placeholder="Город" />
                            <input class="input-my-profile required password" type="password" name="password_1" placeholder="Новый пароль" />
                            <div><input class="input-my-profile required passwordConfirmation" type="password" name="password_2" placeholder="Подтвердите новый пароль" /></div>
                            <div id="reg_error"></div>
                            <p>Заполняя форму, Вы даете согласие на обработку своих <a href="<?php the_field('conf')?>">персональных данных</a></p>
                            <input type="submit" class="btn-form" value="Зарегистрироваться" />
                        </form>
                    </div>

                
                </div>						
            </div>

        </div>
    </div>

<?php get_footer(); ?>