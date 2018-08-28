<!-- начало бллок главное меню мобверсия -->
<div class="main-menu-320" id="main-menu-320">
    <img src="<?php echo get_template_directory_uri(); ?>/img/img89.png" alt="img" class="close320" onclick="closeMainMenu320()">
    <ul>
        <?php 
        $menu_name = 'main';
        $locations = get_nav_menu_locations();
        if( $locations && isset($locations[ $menu_name ]) ){
            $menu = wp_get_nav_menu_object( $locations[ $menu_name ] );
            $menu_items = wp_get_nav_menu_items( $menu );
            foreach ( (array) $menu_items as $key => $menu_item ){
                $menu_mobile .= '<li><a href="' . $menu_item->url . '">' . $menu_item->title . '</a></li>';
            }
            echo $menu_mobile;
        }; ?>
    </ul>
</div>
<!-- конец блок главное меню мобверсия -->