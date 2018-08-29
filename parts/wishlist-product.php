<?php if(is_user_logged_in()) { ?>

    <?php 
        $wishlist = get_user_meta(get_current_user_id(), 'wishlist')[0];
        if(!empty($wishlist)){
            foreach($wishlist as $list){
                $check[] = $list['product_id'];
            }
        } ?>

    <?php if(!empty($check)&&in_array(get_the_id(), $check)){ ?>
        <span class="button" data-id="<?php echo get_the_id(); ?>">Товар уже добавлен в список желаний!</span><a href="#" class="a">Поделиться</a>
    <?php }else{ ?>
        <span class="button add-to-wishlist" data-id="<?php echo get_the_id(); ?>">Добавить в список желаний</span><a href="#" class="a">Поделиться</a>
    <?php } ?>

<?php } else { ?>
    <span class="button" onclick="open_modal_window_PA()">Для доступа к списку желаний необходимо войти</span>
<?php } ?>