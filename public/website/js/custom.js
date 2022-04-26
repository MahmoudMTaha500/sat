document.addEventListener("scroll" , function(){
    let navBar = document.querySelector(".navbar")
    if(window.pageYOffset > 40){
        if(navBar !== null){
            $(".navbar-brand").hide();
            navBar.classList.add("fixed");
        }
    }else{
        if(navBar !== null){ 
            navBar.classList.remove("fixed");
            $(".navbar-brand").show();
        }
    }
})

$('.toggel-filter-btn').click( function(){
    let btn = $(this)
    btn.text( btn.attr("aria-expanded") != "true" ? "اغلاق" : "بحث من جديد")
})

// Starr Call Plugin
$('.add-rate').starrr({
    change: function(e, value){
    //   alert('new rating is ' + value)
      $('.add-rate-field').val(value)
    }
})
$(".starrr").each(function () {
    $(this).starrr({
        rating: $(this).attr('ratio'),
        readOnly: true
    })
});

// owl.call.js 
$('#offers-list,#news-list,#offer-group-list').owlCarousel({
    rtl:true,
    margin: 0,
    loop: true,
    nav: true,
    dots:false,
    autoplay:true,
    autoplayTimeout:5000,
    autoplayHoverPause:false,
    navText : ["<i class='fas fa-chevron-right right'></i>","<i class='fas fa-chevron-left left'></i>"],
    responsive: {
    0: {
       items: 1,
       nav: false,
       dots:false
    },
    768: {
       items: 2,
        margin: 15,
        nav: false,
        dots:false
    },
    940:{
        items: 3,
        margin: 15,
        nav: false,
        dots:false
    },
    1200: {
       items: 3,
    },
    1300:{
        items: 3,
    }
    }
});
$('#team-list').owlCarousel({
    rtl:true,
    margin: 0,
    loop: true,
    nav: true,
    dots:true,
    autoplay:true,
    autoplayTimeout:5000,
    autoplayHoverPause:false,
    navText : ["<i class='fas fa-chevron-right right'></i>","<i class='fas fa-chevron-left left'></i>"],
    responsive: {
    0: {
       items: 1,
       nav: false,
       dots:false
    },
    768: {
       items: 2,
        margin: 15,
        nav: false,
        dots:false
    },
    940:{
        items: 3,
        margin: 15,
        nav: false,
        dots:false
    },
    1200: {
       items: 3,
    },
    1300:{
        items: 3,
    }
    }
});
$('#trusted-list').owlCarousel({
    rtl:true,
    margin: 0,
    loop: true,
    dots:true,
    
    autoplay:true,
    autoplayTimeout:5000,
    autoplayHoverPause:false,
    responsive: {
    0: {
       items: 2,
       nav: false,
       dots:false
    },
    768: {
       items: 3,
        margin: 15,
        nav: false,
        dots:false
    },
    1200: {
        items: 5,
     },
    1300: {
       items: 6,
    }
    }
});

$('#slide-testimonal').owlCarousel({
    rtl:true,
	margin: 0,
	center: true,
	loop: true,
	nav: true,
    dots:false,
    autoplay:true,
    autoplayTimeout:5000,
    autoplayHoverPause:false,
    navText : ["<i class='fas fa-chevron-right right'></i>","<i class='fas fa-chevron-left left'></i>"],
	responsive: {
	0: {
	   items: 1,
       nav: false,
       dots:false
	},
	768: {
	   items: 2,
	    margin: 15,
        nav: false,
        dots:false
	},
	1000: {
	   items: 3,
	}
    }
});
$('#institute-imgs').owlCarousel({
    rtl:true,
    margin: 0,
    loop: true,
    nav: true,
    dots:true,
    autoplay:true,
    autoplayTimeout:5000,
    autoplayHoverPause:false,
    navText : ["<i class='fas fa-chevron-right right'></i>","<i class='fas fa-chevron-left left'></i>"],
    responsive: {
    0: {
       items: 1,
       nav: false,
       dots:false
    },
    768: {
       items: 1,
        margin: 15,
        nav: false,
        dots:false
    },
    940:{
        items: 1,
        margin: 15,
        nav: false,
        dots:false
    },
    1200: {
       items: 1,
    }
    }
});











// Open/Close Side Menu
$('.open-sidemenu').click(function () {
    $(this).find('.sidemenu').toggleClass('open')
  })
  $(".sidemenu-nav").click(function (e) {
    e.stopPropagation();
  })


//support file
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


// custom file
$(".navbar-toggler").click(function () {
    $(".navbar-collapse").slideToggle(300);
})

$(".datepicker-active-monday").datepicker({
    beforeShowDay: function (a) {
        return [1 == a.getDay()];
    }
})

$(".datepicker-active-monday").change(function(){
    // $(".datepicker-helper-field").val($(this).val())
    console.log(this)
})



// add-favourite
$(document).on("click", ".add-favourite", function () {
    $favourite_obj = $(this)
    axios.get("/update-student-favorit", { params: { course_id: $favourite_obj.attr("course-id") } }).then(function (a) {
        "removed" == a.data && $favourite_obj.find(".favourite-icon").addClass("far").removeClass("fas"), "added" == a.data && $favourite_obj.find(".favourite-icon").addClass("fas").removeClass("far"), console.log(a.data);
    });
});


