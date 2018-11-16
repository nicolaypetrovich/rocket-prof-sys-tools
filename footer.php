		<!-- начало футер -->
		<div class="footer">
			<div class="border-top-main"></div>	
			<div class="wrapper">
				<div class="el1"><div></div></div>	
				<div class="el2"><div></div><div></div></div>
				<div class="el3"><div></div></div>
				<div class="content">	
					<div class="footer-block-left">
						<div class="div">
							<p onclick="open_footer_menu(this)">ИНФОРМАЦИЯ</p>
							<div class="footer-menu">	
								<?php 
								$menu_name = 'footer1';
								$locations = get_nav_menu_locations();
								if( $locations && isset($locations[ $menu_name ]) ){
									$menu = wp_get_nav_menu_object( $locations[ $menu_name ] );
									$menu_items = wp_get_nav_menu_items( $menu );
									foreach ( (array) $menu_items as $key => $menu_item ) {
										$menu_desktop .= '<a href="' . $menu_item->url . '"><span></span>' . $menu_item->title . '</a>';
									}
									echo $menu_desktop;
									$menu_desktop = '';
								}; ?>
							</div>
						</div>
						<div class="div">
							<p  onclick="open_footer_menu(this)">СЛУЖБА ПОДДЕРЖКИ</p>
							<div  class="footer-menu">	
								<?php 
									$menu_name = 'footer2';
									$locations = get_nav_menu_locations();
									if( $locations && isset($locations[ $menu_name ]) ){
										$menu = wp_get_nav_menu_object( $locations[ $menu_name ] );
										$menu_items = wp_get_nav_menu_items( $menu );
										foreach ( (array) $menu_items as $key => $menu_item ) {
											$menu_desktop .= '<a href="' . $menu_item->url . '"><span></span>' . $menu_item->title . '</a>';
										}
										echo $menu_desktop;
										$menu_desktop = '';
									}; ?>	
							</div>
						</div>
						<div class="div">
							<p  onclick="open_footer_menu(this)">ДОПОЛНИТЕЛЬНО</p>
							<div class="footer-menu">	
								<?php 
									$menu_name = 'footer3';
									$locations = get_nav_menu_locations();
									if( $locations && isset($locations[ $menu_name ]) ){
										$menu = wp_get_nav_menu_object( $locations[ $menu_name ] );
										$menu_items = wp_get_nav_menu_items( $menu );
										foreach ( (array) $menu_items as $key => $menu_item ) {
											$menu_desktop .= '<a href="' . $menu_item->url . '"><span></span>' . $menu_item->title . '</a>';
										}
										echo $menu_desktop;
										$menu_desktop = '';
									}; ?>
							</div>	
						</div>
						<div class="div">	
							<p  onclick="open_footer_menu(this)">Личный кабинет</p>
							<div class="footer-menu">	
								<?php 
									$menu_name = 'footer4';
									$locations = get_nav_menu_locations();
									if( $locations && isset($locations[ $menu_name ]) ){
										$menu = wp_get_nav_menu_object( $locations[ $menu_name ] );
										$menu_items = wp_get_nav_menu_items( $menu );
										foreach ( (array) $menu_items as $key => $menu_item ) {
											$menu_desktop .= '<a href="' . $menu_item->url . '"><span></span>' . $menu_item->title . '</a>';
										}
										echo $menu_desktop;
										$menu_desktop = '';
									}; ?>
							</div>
						</div>	
					</div>
					<div class="footer-block-right">
						<?php $phone = get_theme_mod('phone_little') . get_theme_mod('phone_big'); $phone = preg_replace('/[^0-9]/', '', $phone); ?>
						<a href="tel:<?php echo $phone; ?>" class="tel-footer"><span><?php echo get_theme_mod('phone_little'); ?></span> <?php echo get_theme_mod('phone_big'); ?></a>
						<a href="mailto:<?php echo get_option('admin_email'); ?>" class="email-footer"> <span><?php echo get_option('admin_email'); ?></span></a>
						<span class="span-footer"><?php echo get_theme_mod('copyright'); ?> <br><?php echo get_theme_mod('copyright_desc'); ?></span>	

					</div>
				</div>
			</div>
		</div>
		<!-- конец футер -->

		<!-- модальное окно попап вход в личный кабинет -->
		<div class="modal-window" id="modal-window-PA">
			<div class="content">
				<div class="close" onclick="closeModalWindow(this)"><img src="<?php echo get_template_directory_uri(); ?>/img/close.png" alt="img"></div>
				<form method="post" data-action="login">

				<p>Вход на сайт</p>
				<input placeholder="E-mail" type="text" class="formEmail" name="login_name" autocomplete="username" />
				<input placeholder="Пароль" class="form_password" type="password" name="login_password" autocomplete="current-password" />

				<div id="login_error"></div>

				<div class="button">
					<div>
						<span>войти</span>
						<button type="submit" class="button" name="login" value="Войти">Войти</button>
					</div>
				</div>
				<div style="display:block;">
					<a href="/registratsiya/">Регистрация</a>
				</div>
				<div style="display:block;">
					<a href="/my-account/lost-password/">Забыли пароль?</a>
				</div>
				</form>
			</div>	
		</div>

		<!-- конец  -->

	</div>
	<?php wp_footer(); ?>
	
    <?php if( get_page_template_slug() == 'contacts.php' ){ ?>
		<script>
			jQuery(function($){
				$(".phone").mask("+7 (999) 999-9999");
			});
		</script>
    <?php } ?>

	<a href="#body" class="toTop">
    	<span id="toTopHover"></span>
	</a>

</body>
</html>