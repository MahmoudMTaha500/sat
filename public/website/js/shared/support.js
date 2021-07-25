$('.close-support').click(function(){
    $(this).parents('.support').remove()
})

$(window).on('scroll',function(){
    if($(window).scrollTop() > 80 ){
       $('.support').addClass('open')
    }else{
        $('.support').removeClass('open')
    }
})

