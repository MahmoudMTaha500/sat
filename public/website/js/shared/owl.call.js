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

