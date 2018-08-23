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
    add_theme_support('woocommerce');
	register_nav_menus( array(
		'main' => 'Главное меню',
		'footer' => 'Меню в футере', 
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
                    $('div.woocommerce').on( 'change', '.qty', function(){
                        $("[name='update_cart']").trigger('click');
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

// add_filter( 'woocommerce_checkout_fields' , 'custom_override_checkout_fields' );

// // Our hooked in function - $fields is passed via the filter!
// function custom_override_checkout_fields( $fields ) {
//      $fields['order']['order_comments']['placeholder'] = 'My new placeholder';
//      return $fields;
// }