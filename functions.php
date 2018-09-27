<?php

//acf include in theme
add_filter('acf/settings/path', 'my_acf_settings_path');
function my_acf_settings_path( $path ) {
    $path = get_stylesheet_directory() . '/acf/';
    return $path;
}
add_filter('acf/settings/dir', 'my_acf_settings_dir');
function my_acf_settings_dir( $dir ) {
    $dir = get_stylesheet_directory_uri() . '/acf/';
    return $dir;
}
include_once( get_stylesheet_directory() . '/acf/acf.php' );
//end acf include in theme

//add menus
add_action( 'after_setup_theme', 'prof_sys_tools_setup' );
function prof_sys_tools_setup() {
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'widgets' );


    add_image_size('related_prods', 180, 158, true);
    add_image_size('prod_page', 500, 500, true);
    add_image_size('fp_news', 220, 150, true);
    add_image_size('prod_slider', 250, 250, true);
    add_image_size('fp_about', 330, 275, true);
    add_image_size('stock', 125, 125, true);
    add_image_size('cart_popup', 100, 100, true);
    add_image_size('single_news', 860, 480, true);

    add_theme_support('woocommerce');
	register_nav_menus( array(
		'main'      => 'Главное меню',
        'footer1'   => 'Информация',
        'footer2'   => 'Служба поддержки',
        'footer3'   => 'Дополнительно',
        'footer4'   => 'Личный кабинет',
	) );
}
//end add menus

function twentyfifteen_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Widget Area', 'twentyfifteen' ),
		'id'            => 'sidebar-1',
		'description'   => __( 'Add widgets here to appear in your sidebar.', 'twentyfifteen' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'twentyfifteen_widgets_init' );

//add styles and scripts
add_action( 'wp_enqueue_scripts', 'prof_sys_tools_scripts' );
function prof_sys_tools_scripts() {
    wp_enqueue_style( 'wp-style', get_stylesheet_uri() );
    wp_enqueue_style( 'theme-style', get_template_directory_uri() . '/css/style.css' );

    wp_enqueue_script( 'js-script', get_template_directory_uri() . '/js/script.js', array(), '3.1.1', true );
    wp_enqueue_script( 'forms-script', get_template_directory_uri() . '/js/forms.js', array(), '3.1.1', true );
    wp_enqueue_script( 'mask-script', get_template_directory_uri() . '/js/jquery.maskedinput.min.js', array(), '3.1.1', true );

    wp_enqueue_script( 'map', '//api-maps.yandex.ru/2.1/?lang=ru_RU', array(), 2.1, false);
    wp_enqueue_script( 'ajax-script', get_template_directory_uri() . '/js/ajax.js', array(), '1.0.0', true );
}
//auto update cart on quantity change
add_action( 'wp_footer', 'cart_update_qty_script' );
function cart_update_qty_script() {
    if (is_cart()) :
        ?>
        <script type="text/javascript">
            (function($){
                $(function(){
                    $('div.woocommerce').on('click', '.minus', function () {
                        var $input = $(this).parent().find('input');
                        if($input.val() <= 1){return false;};
                        var count = parseInt($input.val()) - 1;
                        count = count < 1 ? 1 : count;
                        $input.val(count);
                        $input.change();
                        $("[name='update_cart']").trigger('click');
                        return false;
                    });
                    $('div.woocommerce').on('click', '.plus', function () {
                        var $input = $(this).parent().find('input');
                        $input.val(parseInt($input.val()) + 1);
                        $input.change();
                        $("[name='update_cart']").trigger('click');
                        return false;
                    });
                });
            })(jQuery);
        </script>
        <?php
    endif;
}
//end add styles and scripts

//wc add hooks
require 'inc/wc-hooks.php';
//disable wc hoocks
require 'inc/wc-disabling.php';
//add ajax file
require 'inc/ajax.php';
//add customizer
require 'inc/customizer.php';

//check if category
function check_cat_child($id){
    $taxonomy     = 'product_cat';
    $orderby      = 'name';  
    $parent 	  = $id;
    $show_count   = 0;      // 1 for yes, 0 for no
    $pad_counts   = 0;      // 1 for yes, 0 for no
    $hierarchical = 0;      // 1 for yes, 0 for no  
    $title        = '';  
    $empty        = 0;

    $args = array(
        'taxonomy'     => $taxonomy,
        'orderby'      => $orderby,
        'parent'	   => $parent,
        'show_count'   => $show_count,
        'pad_counts'   => $pad_counts,
        'hierarchical' => $hierarchical,
        'title_li'     => $title,
        'hide_empty'   => $empty
    );
    $categories = get_categories( $args );

    if($categories){

        return true;

    }

    return false;
}

function get_menu_subcategories($id){

    $taxonomy     = 'product_cat';
    $orderby      = 'name';  
    $parent 	  = $id;
    $show_count   = 0;      // 1 for yes, 0 for no
    $pad_counts   = 0;      // 1 for yes, 0 for no
    $hierarchical = 0;      // 1 for yes, 0 for no  
    $title        = '';  
    $empty        = 0;

    $args = array(
        'taxonomy'     => $taxonomy,
        'orderby'      => $orderby,
        'parent'	   => $parent,
        'show_count'   => $show_count,
        'pad_counts'   => $pad_counts,
        'hierarchical' => $hierarchical,
        'title_li'     => $title,
        'hide_empty'   => $empty
    );
    $all_categories = get_categories( $args ); 

    if($all_categories){
        
        echo '<div class="box">';
            foreach($all_categories as $category){

                $id = $category->term_id;
                $link = get_term_link($category->term_id);
                $name = $category->name;

                if(check_cat_child($id))
                {
                    echo "<div class='box1' onmouseover='openSubmenuOurProduction1(this)' onmouseout='openSubmenuOurProduction2(this)'>
                            <div class='block-name'>
                                <a href='{$link}'><span></span>{$name}</a>
                                <span onclick='openSubmenuOurProduction(this)'></span>
                            </div>
                        <div class='box1-content submenuOurProduction'>";
                        get_menu_subcategories($id);
                        echo "</div></div>";
                } else {
                    echo "<a href='{$link}'><span></span>{$name}</a>";
                }                    

            }
        echo '</div>';
    }
}

function wp_example_excerpt_length( $length ) {
    return 30;
}
add_filter( 'excerpt_length', 'wp_example_excerpt_length');

add_filter('navigation_markup_template', 'my_navigation_template', 10, 2 );
function my_navigation_template( $template, $class ){
	/*
	Вид базового шаблона:
	<nav class="navigation %1$s" role="navigation">
		<h2 class="screen-reader-text">%2$s</h2>
		<div class="nav-links">%3$s</div>
	</nav>
	*/

	return '
	<div class="switch">
		<div class="switch-content">%3$s</div>
	</div>    
	';
}


//global variables
$front_page = get_option( 'page_on_front' ); 
$stock_args = array(
	'post_type' 	 => 'product',
	'meta_key'       => 'ac_t',
	'meta_value'     => true,
);
$stock = new WP_Query($stock_args);