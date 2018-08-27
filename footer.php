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
				<form class="woocommerce-form woocommerce-form-login login" method="post">

				<?php do_action( 'woocommerce_login_form_start' ); ?>

				<p>Вход на сайт</p>
				<input placeholder="E-mail" type="text" class="formEmail woocommerce-Input woocommerce-Input--text input-text" name="username" id="username" autocomplete="username" value="<?php echo ( ! empty( $_POST['username'] ) ) ? esc_attr( wp_unslash( $_POST['username'] ) ) : ''; ?>" /><?php // @codingStandardsIgnoreLine ?>
				<input placeholder="Пароль" class="form_password woocommerce-Input woocommerce-Input--text input-text" type="password" name="password" id="password" autocomplete="current-password" />

				<?php do_action( 'woocommerce_login_form' ); ?>
				<div class="button">
					<div>
						<?php wp_nonce_field( 'woocommerce-login', 'woocommerce-login-nonce' ); ?>
						<span>войти</span>
						<button type="submit" class="woocommerce-Button button" name="login" value="<?php esc_attr_e( 'Log in', 'woocommerce' ); ?>"><?php esc_html_e( 'Log in', 'woocommerce' ); ?></button>
					</div>
				</div>

				<a href="#">Регистрация</a>

				<?php do_action( 'woocommerce_login_form_end' ); ?>

				</form>
			</div>	
		</div>

		<!-- конец  -->

	</div>
	<?php wp_footer(); ?>
</body>
</html>