$(function(){
    $('.sH').on('click',function(){
        if($('.sB').hasClass('h')){
            $('.sB').removeClass('h');
            $('.mB').removeClass('col-md-offset-1 col-md-10')
        .addClass('col-md-9');
        }else{
            $('.sB').addClass('h');
            $('.mB').addClass('col-md-offset-1 col-md-10')
        .removeClass('col-md-9');
        }
        
        
    });
});