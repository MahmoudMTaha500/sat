// Add Check On CLick 
$('.country').click(function () {
    $('.selected-country').addClass('d-none')
    $('.country').removeClass('selected')
    $(this).toggleClass('selected')
    $(this).find('.selected-country').toggleClass('d-none')
})
// Add Class to Buttons (Next & Previous)
$('a[href="#next"],a[href="#finish"]').addClass('bg-secondary-color text-white rounded-10 px-lg-5 px-4')
$('a[href="#previous"]').addClass('border-secondary-color bg-transparent text-secondary-color rounded-10 px-lg-5 px-4')
// the name of the file appear on select
$(".custom-file-input").on("change", function () {
    var fileName = $(this).val().split("\\").pop();
    $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
});

