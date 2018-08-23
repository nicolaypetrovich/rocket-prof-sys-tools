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
								<a href="#"><span></span>О нас</a>
								<a href="#"><span></span>Информация о доставке</a>
							</div>
						</div>
						<div class="div">
							<p  onclick="open_footer_menu(this)">СЛУЖБА ПОДДЕРЖКИ</p>
							<div  class="footer-menu">	
								<a href="#"><span></span> Связаться с нами</a>
								<a href="#"><span></span> Возврат товара</a>	
								<a href="#"><span></span>Карта сайта</a>	
							</div>
						</div>
						<div class="div">
							<p  onclick="open_footer_menu(this)">ДОПОЛНИТЕЛЬНО</p>
							<div class="footer-menu">	
								<a href="#"><span></span>Производители</a>
								<a href="#"><span></span> Подарочные сертификаты</a>
								<a href="#"><span></span> Партнёры</a>
								<a href="#"><span></span>Товары со скидкой</a>
							</div>	
						</div>
						<div class="div">	
							<p  onclick="open_footer_menu(this)">Личный кабинет</p>
							<div class="footer-menu">	
								<a href="#"><span></span> Личный кабинет</a>
								<a href="#"><span></span>История заказов</a>
								<a href="#"><span></span>Мои закладки</a>
								<a href="#"><span></span>Рассылка новостей</a>
							</div>
						</div>	
					</div>
					<div class="footer-block-right">
						<a href="tel:7(123)725-00-66" class="tel-footer"><span>+7(123)</span> 456 78 90</a>
						<a href="mailto:mail@mail.com" class="email-footer"> <span>mail@mail.com</span></a>
						<span class="span-footer">Copyright 2018 <br>Proril Sistem Tools</span>	

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