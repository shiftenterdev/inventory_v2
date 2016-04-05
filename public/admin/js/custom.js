$('.uI').on('click', function() {
    uBt = $(this);
    $('#aIL').load('ajax/images', function() {
        $('#imgModal').modal('show');
    });

});

$('.uui').on('click', function() {
    $('.img-upload').click();
});

$('body').on('click', '#aIL .dImg', function() {
    var id = $(this).data('id');
    $.get('ajax/delete-image/' + id).done(function() {
        $('#aIL').load('ajax/images');
    });
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
    if (this.files[0].size / 1024 > 512) {
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
            $('#aIL').load('ajax/images');
        }
    });

});

$('.confirm').on('click', function() {
    return confirm('Are you sure ?');
});

$('.nD').delay(3000).slideUp();

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
$('#pro_code').on('change', function() {
    var v = $(this).val();
    if (v != '') {
        $.get('ajax/product-by-code/' + v).done(function(result) {
            $('.ppj').val(result.pro_price);
            $('.pqj').text('Max: ' + result.pro_stock);
            $('input[name=pro_quantity]').attr('max', result.pro_stock).focus();
        });
    }
});

/**
 * Add product for sell
 */
$('.add-pro-s').on('click', function(e) {
    e.preventDefault();
    var product = {
        pro_code : $('select[name=pro_code]').val(),
        pro_price : $('input[name=pro_price]').val(),
        pro_quantity : $('input[name=pro_quantity]').val(),
        _token : $('meta[name="csrf-token"]').attr('content')
    };

    $.post('ajax/sell-list',product).done(function(result){
        $('.spo').val('');
        $('.pqj').text('');
        $('#productList').load('sell/product-list');
    });
});
