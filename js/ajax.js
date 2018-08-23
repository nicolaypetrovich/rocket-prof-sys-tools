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