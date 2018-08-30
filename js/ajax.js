'use strict';

$('.custom-ajax-add-to-cart').on('click', function(e){
    e.preventDefault();
    $.ajax({
        url:ajax,
        type:"POST",
        data:{action:'ajax_add_to_cart', prod_id:$(this).data('id')},
        success:function(r){
            var r = JSON.parse(r);
            if(r[0] == 'ok'){
                $('.cart-ajax-update').text("");
                $('.cart-ajax-update').append(r[1]);
            }
        }
    });
})

$('.add-to-wishlist').on('click', function(e){
    e.preventDefault();
    $.ajax({
        url:ajax,
        type:"POST",
        data:{action:'ajax_add_to_wishlist', prod_id:$(this).data('id')},
        success:function(r){console.log(r)}
    });
})

$('.my-wishes-item-wrap').on('click', '.wishes-delete', function(e){
    e.preventDefault();
    $.ajax({
        url:ajax,
        type:"POST",
        data:{action:'remove_from_wishes', prod_id:$(this).data('id')},
        success:function(r){
            $('.my-wishes-item-wrap').text("");
            $('.my-wishes-item-wrap').append(r);
        }
    });
})