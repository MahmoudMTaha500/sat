$('[data-toggle="collapse"]').click(function(){
    if($(this).find('.fa-chevron-down').length >0){

        $(this).find('.fa-chevron-down').replaceWith('<i class="fas fa-chevron-up"></i>')
    }else{
        $(this).find('.fa-chevron-up').replaceWith('<i class="fas fa-chevron-down"></i>')
    }
})