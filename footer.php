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
				<form  name="contact_form_PA" method="get" action="#" onsubmit="return validate_form_PA ( );">
					<p>Вход на сайт</p>
					<input type="email" name="email" class="formEmail" id="formEmail_PA" placeholder="E-mail:" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$"><br>	
					<input type="password" name="password" placeholder="Пароль" class="form_password" id="form_password_PA">
					<div class="button"><div><span>войти</span><input type="submit" name="submit" value="" ></div></div>
					<a href="#">Регистрация</a>
				</form>	
			</div>	
		</div>

		<!-- конец  -->

	</div>
	<?php wp_footer(); ?>
</body>
</html>