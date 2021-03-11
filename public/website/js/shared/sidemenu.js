// Open/Close Side Menu
$('.open-sidemenu').click(function () {
    $(this).find('.sidemenu').toggleClass('open')
  })
  $(".sidemenu-nav").click(function (e) {
    e.stopPropagation();
  })