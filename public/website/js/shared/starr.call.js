// Starr Call Plugin
$('.add-rate').starrr({
    change: function(e, value){
      alert('new rating is ' + value)
    }
})
$(".starrr").each(function () {
    $(this).starrr({
        rating: $(this).attr('ratio'),
        readOnly: true
    })
});