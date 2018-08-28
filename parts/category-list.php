<!-- начало блока наша продукция -->
<div class="banner-our-production">
    <div class="wrapper">
        <div class="banner-our-production-content-wrapper">
            <div class="banner-our-production-content">	
                <h1 onclick="open_banner_our_production(this)">НАША ПРОДУКЦИЯ <img src="<?php echo get_template_directory_uri(); ?>/img/img15.png" alt="img"></h1>
                <div class="banner-our-production-content-320" id="banner-our-production-content-320">
                    <?php

                    $taxonomy     = 'product_cat';
                    $orderby      = 'name';
                    $parent 	  = 0;
                    $show_count   = 0;
                    $pad_counts   = 0;
                    $hierarchical = 0;
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
                    $i=1;
                    foreach($all_categories as $category){

                        $id = $category->term_id;
                        $link = get_term_link($category->term_id);
                        $name = $category->name;

                        echo "<div class='banner-our-production-menu banner-our-production-menu{$i}'>";

                            if(check_cat_child($id)){
                                echo "<h3><a href='{$link}'><span>{$name}</span></a></h3>";
                                get_menu_subcategories($id);
                            }else{
                                echo "<h3><a href='{$link}'><span>{$name}</span></a></h3>";
                            };								

                        echo "</div>";
                        $i++;
                    } ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- конец блок наша продукция -->