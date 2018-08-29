'use strict';

$('.custom-ajax-add-to-cart').on('click', function(e){
    e.preventDefault();
    $.ajax({
        url:ajax,
        type:"POST",
        data:{action:'ajax_add_to_cart', prod_id:$(this).data('id')},
        success:function(r){console.log(r)}
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
    console.log(11);
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