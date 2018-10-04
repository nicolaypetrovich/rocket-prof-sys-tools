<?php
/*
Template Name: Контакты
*/
get_header();
?>

	<?php get_template_part('parts/header-menu', '320'); ?>
    <?php get_template_part('parts/header'); ?>
    
    <div class="min-heght">
        <div class="page page4">

            <?php get_template_part('parts/brands-and-banners', '320'); ?>

            <?php get_template_part('parts/category', 'list'); ?>

            <?php 
            
            $args = array(
                'delimiter'   => ' &#47; ',
                'wrap_before' => '<div class="main-navigation"><div class="wrapper">',
                'wrap_after'  => '</div></div>',
                'before'      => '',
                'after'       => '',
                'home'        => _x( 'Home', 'breadcrumb', 'woocommerce' ),
            );
            
            woocommerce_breadcrumb($args); ?>

            <!-- начало блока Контакты -->
            <div class="wrapper">
                <div class="wrap-in wrap-in-margin-top">
                <div class="el1"><div></div></div>	
                    <div class="name-container">
                        <h4><?php the_title(); ?></h4>
                    </div>
                    <div class="wrap-contacts">
                        <div class="contacts">
                            <div class="contacts-item">
                                <img src="<?php echo get_template_directory_uri()?>/img/img-phone.png" alt="img">
                                <div class="contact-info">
                                    <h5>Тeлефон:</h5><br>
                                    <span><b><?php echo get_theme_mod('phone_little'); ?> <?php echo get_theme_mod('phone_big'); ?></b></span>
                                </div>									
                            </div>
                            
                            <div class="contacts-item">
                                <img src="<?php echo get_template_directory_uri()?>/img/img-mail.png" alt="img">
                                <div class="contact-info">
                                    <h5>E-mail:</h5><br>
                                    <span><?php echo get_option('admin_email'); ?></span>
                                </div>									
                            </div>
                            
                            <div class="contacts-item">
                                <img src="<?php echo get_template_directory_uri()?>/img/img-addres.png" alt="img">
                                <div class="contact-info">
                                    <h5>Адрес:</h5><br>
                                    <span><?php the_field('address')?></span>
                                </div>									
                            </div>
                            
                            <div class="contacts-item">
                                <img src="<?php echo get_template_directory_uri()?>/img/img-time.png" alt="img">
                                <div class="contact-info">
                                    <h5>Время работы:</h5><br>
                                    <span><?php the_field('working_hours')?></span>
                                </div>									
                            </div>
                        </div>
                        <!-- /.contacts -->
                        <div class="wrap-map">
                            <div id="map"></div>							
                        </div>
                        <?php 
                        $map_data = json_decode(get_field('map'), true); 
                        $map_data = $map_data['marks'][0]; 
                        $map_lat = $map_data['coords'][0]; 
                        $map_lng = $map_data['coords'][1]; 
                        ?>
                        <script>
                        ymaps.ready(init);

                        function init () {
                            var myMap = new ymaps.Map("map", {
                                    center: [<?php echo $map_lat; ?>, <?php echo $map_lng; ?>],
                                    zoom: 15
                                }, {
                                    searchControlProvider: 'yandex#search'
                                }),
                                myPlacemark = new ymaps.Placemark([<?php echo $map_lat; ?>, <?php echo $map_lng; ?>]);

                            myMap.geoObjects.add(myPlacemark);

                        }</script>
                        <!-- /."wrap-map -->	
                    </div>
                </div>
            </div>
            <!-- конец блок наша Контакты -->
            <!-- начоло блока Отправить сообщение -->
            <div class="wrapper wrap-form-bg-boards">
                <div class="wrap-form-bg-things">
                    <div class="wrap-in ">
                        <div class="name-container name-container_brown">
                            <h4>Отправить сообщение</h4>
                        </div>
                        <div class="wrap-form">
                            <form  action="#" class="form-send-messege" data-action="message">
                                <div class="wrap-form-in">
                                    <div class="wrap-input">
                                        <input class="form-input-item  required" type="text" name="message_name" placeholder="Ваше имя" />
                                        <input class="form-input-item phone required" type="tel" name="message_phone" placeholder="Номер телефона" />
                                        <input class="form-input-item required" type="email" name="message_email" placeholder="Ваш e-mail" />
                                    </div>
                                    <textarea placeholder="Сообщение" class="required" name="message_message"></textarea>
                                </div>
                                <div id="mess_error"></div>
                                <span>Заполняя форму, Вы даете согласие на обработку своих <a href="<?php the_field('prof')?>">персональных данных</a></span><br>
                                <input type="submit" class="btn-form" value="Отправить" />	
                            </form>
                            <!-- /.form-send-messege -->
                            <div class="popap-form-out">Спасибо, ваше сообщение отправлено. Менеджер с вами свяжется в течении дня</div>
                        <!-- /.wrap-form -->							
                        </div>
                    </div>
				</div>
            <div class="contacts-note contacts-img-bg"><img src="<?php echo get_template_directory_uri()?>/img/contacts-note.png" alt="img"></div>
            <div class="contacts-inkwell contacts-img-bg"><img src="<?php echo get_template_directory_uri()?>/img/contacts-inkwell.png" alt="img"></div>
            <div class="contacts-pen contacts-img-bg"><img src="<?php echo get_template_directory_uri()?>/img/contacts-pen.png" alt="img"></div>
        </div>
    </div>
</div>


<?php get_footer(); ?>