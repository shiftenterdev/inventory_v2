$('.select').selectize();
$('.date').datetimepicker({
    timepicker:false,
    format:'Y-m-d',
    scrollMonth: false,
    scrollInput: false
});
var load = {
    on:function(){
        $('.waiting').show();
    },
    off: function(){
        $('.waiting').hide();
    }
};

$('.num').on('input', function(){
    $(this).val($(this).val().replace(/[^0-9]/g, ''));
});

$('.uI').on('click', function() {
    load.on();
    uBt = $(this);
    $('#aIL').load('ajax/images', function() {
        $('#imgModal').modal('show');
        load.off();
    });

});

$('.uui').on('click', function() {
    $('.img-upload').click();
});

$('body').on('click', '#aIL .dImg', function() {
    if(confirm('Are you sure ?')){
        load.on();
        var id = $(this).data('id');
        $.get('ajax/delete-image/' + id).done(function() {
            $('#aIL').load('ajax/images',function(){
                load.off();
            });
        });
    }
});

$('body').on('click', '#aIL .gImg', function() {
    var id = $(this).data('id');
    $.get('ajax/image-name/' + id).done(function(result) {
        $('#imgModal').modal('hide');
        $('.prvImg').attr('src', 'uploads/' + result.img_title);
        $('#imgIdVal').val(result.id);
    });
});

$('.img-upload').on('change', function() {
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    load.on();
    if (this.files[0].size / 1024 > 512) {
        load.off();
        alert('File size cannot greater than 500KB');
        return false;
    }
    var myFormData = new FormData();
    myFormData.append('image', $(this).prop("files")[0]);
    myFormData.append('_token', CSRF_TOKEN);


    $.ajax({
        url: 'ajax/upload-image',
        type: 'POST',
        processData: false, // important
        contentType: false, // important
        dataType: 'json',
        data: myFormData,
        success: function(rs) {
            $('#aIL').load('ajax/images',function(){
                load.off();
            });
        }
    });

});

$('.cN').on('click','.confirm', function() {
    return confirm('Are you sure ?');
});

$('.nD').delay(4000).slideUp();

$('.parCat').on('change', function() {
    var v = $(this).val();
    if (v != '') {
        $.get('ajax/sub-category/' + v).done(function(result) {
            var div = '<option value="">Select Sub Category</option>';
            $.each(result, function(i, e) {
                div += '<option value="' + e.id + '">' + e.cat_title + '</option>';
            });
            if (result.length == 0) {
                div = '<option value="" >No Sub-category Available</option>';
            }
            $('.parSubCat').html(div);
        })
    }
});

$('.parSubCat').on('change', function() {
    var v = $(this).val();
    if (v != '') {
        $.get('ajax/products/' + v).done(function(result) {
            var div = '<option value="">Select Product</option>';
            $.each(result, function(i, e) {
                div += '<option value="' + e.id + '">' + e.pro_title + '</option>';
            });
            if (result.length == 0) {
                div = '<option value="">No Product Available</option>';
            }
            $('.parProduct').html(div);
        });

    }
});

/**
 * Product info by product code
 */
/*$('#pro_code').on('change', function() {
    var v = $(this).val();
    if (v != '') {
        load.on();
        $.get('ajax/product-by-code/' + v).done(function(result) {
            $('.ppj').val(result.pro_price);
            $('.pqj').text('Stock Limit: ' + result.pro_stock);
            $('input[name=pro_quantity]').attr('max', result.pro_stock).focus();
            load.off();
        });
    }
});*/

/**
 * Add product for sell
 */


/**
 * Increase decrease product update
 */



/**
 * Add product for buy
 */
$('body').on('change','.bpo', function(e) {
    e.preventDefault();
    if($(this).val()!==''){
        load.on();
        var product = {
            pro_code : $('select[name=pro_code]').val(),
            _token : $('meta[name="csrf-token"]').attr('content')
        };

        $.post('ajax/buy-list',product).done(function(result){
            $('.spo').val('');
            $('#productList').load('purchase/product-list',function(){
                load.off();
            });
        });
    }
});

/**
 * remove product form append[session] list
 */

/**
 * remove product form append[session] list
 */
$('body').on('click','.rBI',function(){
    load.on();
    var v = $(this).data('key');
    $.get('ajax/remove-buy-product/'+v).done(function(result){
        $('#productList').load('purchase/product-list',function(){
            load.off();
        });
    });
});

/**
 * get customer info by mobile no
 */
/*$('.c-p').on('input',functuion(){
    var m = $(this).val();
    if(m!=''){
        $.get('ajax/mobile-suggestion/'+m).done(function(result){
            
        });
    }
});*/
/**
 * Save customer and go to sell invoice
 */
$('.cN').on('click','.sell-invoice',function(){
    load.on();
    var customer = $('#customerForm').serializeArray();
    $.post('ajax/store-sell-customer',customer).done(function(result){
        if(result==1){
            window.location = 'sell/invoice';
            load.off();
        }
    })
});

/**
 * Save customer and go to sell invoice
 */
$('.cN').on('click','.purchase-invoice',function(){
    load.on();
    var customer = $('#customerForm').serializeArray();
    $.post('ajax/store-purchase-customer',customer).done(function(result){
        if(result==1){
            window.location = 'purchase/invoice';
            load.off();
        }
    })
});

/**
 * Print function
 */
function printDiv(divName) {
    $('button.print,.navbar,.sB,.breadcrumb').hide();
     // var printContents = document.getElementById(divName).innerHTML;
     // $('button.print').show();
     // var originalContents = document.body.innerHTML;
     // document.body.innerHTML = printContents;
     window.print();
     $('button.print,.navbar,.sB,.breadcrumb').show();
     // document.body.innerHTML = originalContents;
}

$('body .print').on('click',function(){
    printDiv('printDiv');
});

/**
 * Quantity add / sub for sale
 */

$("body").on('click','.pq-s',function () {
   $(this).select();
});

/**
 * Quantity add / sub for purchase
 */
$("body").on('click','.select-text',function () {
   $(this).select();
});

$('#productList').on('change','.pq-p',function(){
    load.on();
    if($(this).val()<1){
        $(this).val(1);
    }
    pProductUpdate($(this).val(),$(this).data('code'));
});

var pProductUpdate = function(q,code){
    $.get('ajax/purchase-pro-update/'+q+'/'+code).done(function(){
        $('#productList').load('purchase/product-list',function(){
            load.off();
        });
    });
};
$('.openRight').on('click', function () {
    // console.log('clicked');
    $('.r-slide').addClass('slideInRight').removeClass('slideOutRight').show();
});
$('.r-slide .cls').on('click', function () {
    $('.r-slide').addClass('slideOutRight').addClass('slideInRight');
});

