
$('.uI').on('click',function(){
    uBt = $(this);
    $('#aIL').load('ajax/images',function(){
        $('#imgModal').modal('show');
    });

});

$('.uui').on('click',function(){
    $('.img-upload').click();
});

$('body').on('click','#aIL .dImg',function(){
    var id = $(this).data('id');
    $.get('ajax/delete-image/'+id).done(function(){
        $('#aIL').load('ajax/images');
    });
});

$('body').on('click','#aIL .gImg',function(){
    var id = $(this).data('id');
    $.get('ajax/image-name/'+id).done(function(result){
        $('#imgModal').modal('hide');
        $('.prvImg').attr('src','uploads/'+result.img_title);
        $('input[name=pro_image_id]').val(result.id);
    });
});

$('.img-upload').on('change', function () {
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
        success: function (rs) {
            $('#aIL').load('ajax/images');
        }
    });

});

$('.confirm').on('click',function(){
    return confirm('Are you sure ?');
});

$('.nD').delay(3000).slideUp();

$('.parCat').on('change',function(){
    var v = $(this).val();
    if(v!=''){
        $.get('ajax/sub-category/'+v).done(function(result){
            var div = '<option value="">Select Sub Category</option>';
            $.each(result,function(i,e){
                div += '<option value="'+ e.id+'">'+ e.cat_title+'</option>';
            });

            $('.parSubCat').html(div)
        })
    }
});