<?php

function profsys_custom_logo_setup() {
    $defaults = array(
        'height'      => 210,
        'width'       => 171,
        'flex-height' => true,
        'flex-width'  => true,
    );
    add_theme_support( 'custom-logo', $defaults );
}
add_action( 'after_setup_theme', 'profsys_custom_logo_setup' );

add_action( 'customize_register', 'profsys_customizer_settings' );
function profsys_customizer_settings( $wp_customize ) {

	$wp_customize->add_section( 'global_options', array(
		'title'    => 'Настройки общей информации',
		'priority' => 20,
    ) );
    
    $wp_customize->add_setting( 'phone_little', array(
		'default'           => 'Политика конфиденциальности',
		'transport'         => 'refresh',
	) );
	$wp_customize->add_control( 'phone_little', array(
		'label'       => 'Маленькие цифры в телефоне',
		'section'     => 'global_options',
    ) );
    $wp_customize->add_setting( 'phone_big', array(
		'default'           => 'Политика конфиденциальности',
		'transport'         => 'refresh',
	) );
	$wp_customize->add_control( 'phone_big', array(
		'label'       => 'Большие цифры в телефоне',
		'section'     => 'global_options',
	) );

	$wp_customize->add_setting( 'copyright', array(
		'default'           => 'Copyright 2018',
		'transport'         => 'refresh',
	) );
	$wp_customize->add_control( 'copyright', array(
		'label'       => 'Копирайт',
		'section'     => 'global_options',
    ) );
    $wp_customize->add_setting( 'copyright_desc', array(
		'default'           => 'Proril Sistem Tools',
		'transport'         => 'refresh',
	) );
	$wp_customize->add_control( 'copyright_desc', array(
		'label'       => 'Копирайт Описание',
		'section'     => 'global_options',
    ) );
    


}