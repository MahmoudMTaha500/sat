@extends('website.app') @section('website.content')
<!-- Intro  -->
<section class="intro">
    <div class="container-fluid">
        <div class="row px-xl-5 align-items-end pt-md-5">
            <div class="col-lg-6 align-self-center">
                <!-- Section Heading -->
                <h1 class="text-white font-weight-bold mb-4 intro-title">ابدأ رحلتك الآن، وتعلم اللغة في أكبر المعاهد الدولية</h1>
                <p class="lead text-white mb-4 intro-desc">نسعى - من خلال عقودنا واتفاقياتنا مع المعاهد، والجامعات، والمؤسسات الأكاديمية - إلى رفع مستوى التعاون، وخلق بيئة تنافسية</p>
                <!-- ./Section Heading -->

                <!-- Search Form -->
                <form class="form-inline row" method="GET" action="{{route('website.institutes')}}">
                    {{-- <div class="col-md-9">
                        <!-- Search Field -->
                        <input  id='searchform' name="keyword" type="text" class="form-control rounded-10 mb-2 ml-sm-2 w-100 btn-light" placeholder="ادخل اسم المعهد او المدينة او الدولة او الدورة لبدء البحث" />
                        <!-- ./Search Field -->
                    </div> --}}

                    <search-component  
                    :public_path="{{ json_encode(url('/')) }}"    
                    >
                </search-component>
                    <div class="col-md-3">
                        <!-- Confirm Btn -->
                        <button type="submit" class="btn rounded-10 bg-secondary-color text-white mb-2 w-100">ابدأ الان</button>
                        <!-- ./Confirm Btn -->
                    </div>
                </form>
                <!-- ./Search Form -->
            </div>
            <div class="col-lg-6 mx-auto text-center">
                <img class="w-100 mt-5 mt-md-2" src="{{asset('storage/banners/intro-home.png')}}" alt="Home Intro Image" srcset="">
            </div>
        </div>
    </div>
</section>
<!-- ./Intro -->
<!-- Search Institute -->
<section class="search-institute py-5">
    <div class="container-fluid">
        <div class="row px-xl-5">
            <!-- Section Heading -->
            <div class="col-md-6 align-self-center">
                <h3 class="text-main-color font-weight-bold">ابحث عن دورة اللغة المناسبة لك</h3>
                <p>ابحث عن أفضل الجامعات والمعاهد للدراسة بالخارج بكل سهولة مع أفضل تجربة مُستخدم</p>
            </div>
            <!-- ./Section Heading -->

            <div class="col-md-6 col-xl-5 mr-auto">
                <!-- Search Institute Form -->
                <div class="search-institute-form shadow-lg rounded-10 py-4 px-2 p-xl-5 mx-auto bg-white">
                    <form class="my-4" method="GET" action="{{route('website.institutes')}}">
                        <!-- Country Field -->
                        <div class="form-group">
                            <country-component ref="countries_component_ref" get_countries_url="{{route('vue.get.countries')}}" ele_class="{{'form-control rounded-10'}}"> </country-component>
                        </div>
                        <!-- ./Country Field -->
                        <!-- City Field -->
                        <div class="form-group">
                            <city-component ref="cities_component_ref" get_cities_url="{{route('vue.get.cities')}}" ele_class="{{'form-control rounded-10'}}"> </city-component>
                        </div>
                        <!-- ./City Field -->
                        <!-- Weeks Count Field -->
                        <div class="form-group">
                            <select name="weeks" class="form-control rounded-10" data-live-search="true">
                                <option value="" disabled selected>عدد الأسابيع</option>
                                @for ($i = 0; $i <= 45; $i++)
                                    <option value="{{$i}}">{{$i}}</option>
                                @endfor                                
                            </select>
                        </div>
                        <!-- ./Weeks Count Field -->
                        <!-- Confirm Btn  -->
                        <button type="submit" class="btn rounded-10 bg-secondary-color w-100 text-center text-white">ابحث عن معهد</button>
                        <!-- ./Confirm Btn  -->
                    </form>
                </div>
                <!-- ./Search Institute Form -->
            </div>
        </div>
    </div>
</section>
<!-- ./Search Institute-->

@if (isset($best_offers[0]))
<!-- Best Offers -->
<section class="best-offers py-5 bg-sub-secondary-color">
    <div class="container-fluid">
        <!-- Section Heading -->
        <div class="row px-xl-5 mb-5">
            <div class="col-12">
                <div class="heading-best-offers text-center">
                    <h3 class="text-main-color font-weight-bold">أفضل العروض</h3>
                    <p>نسعى من خلال عقودنا واتفاقياتنا مع المعاهد والجامعات والمؤسسات الأكاديمية</p>
                </div>
            </div>
        </div>
        <!-- ./Section Heading -->
        <div class="row px-xl-4">
            <div class="col-12 px-0">
                <!-- Offers -->
                <div class="offers owl-carousel position-relative" id="offers-list">
                    @foreach ($best_offers as $offer)

                    <!-- Institute -->
                    <div class="card mx-xl-4 mx-2 shadow-sm offer border-0 institute-card rounded-10 mb-5">
                        <!-- Offer Icon -->
                        <div class="offer-icon position-absolute bg-secondary-color text-white">
                            - {{$offer->discount*100}} %
                        </div>
                        <!-- Offer Icon -->
                        <!-- Add To Favourite Btn -->
                        <div class="add-favourite position-absolute" course-id="{{$offer->id}}">
                            <i @if(!auth()->guard('student')->check()) onclick="alert('يجب عليك تسجيل الدخول اولا')" @endif class="@if(auth()->guard('student')->check()) {{heart_type($offer)}} @else far @endif    fa-heart favourite-icon"></i>
                        </div>
                        
                            
                        
                        <!-- ./Add To Favourite Btn -->
                        <!-- Institute Img -->
                        <a href="{{route('website.institute' , [$offer->institute->id, $offer->institute->slug , $offer->slug])}}">
                            <div class="institute-img d-inline-block position-relative">
                                <picture>
                                    <source srcset="{{empty($offer->institute->getFirstMedia('institute_banner')) ? asset('/storage/default_images.png') : $offer->institute->getFirstMedia('institute_banner')->getUrl('thumb_md')}}" media="(min-width:700px)">
                                    <source srcset="{{empty($offer->institute->getFirstMedia('institute_banner')) ? asset('/storage/default_images.png') : $offer->institute->getFirstMedia('institute_banner')->getUrl('thumb')}}" media="(min-width:400px)">
                                    <img loading="lazy" width="100" src="{{empty($offer->institute->getFirstMedia('institute_banner')) ? asset('/storage/default_images.png') : $offer->institute->getFirstMedia('institute_banner')->getUrl('thumb_md')}}" alt="{{$offer->institute->name_ar}}" class="card-img-top"/>
                                </picture>
                            </div>
                        </a>
                        <!-- ./Institute Img -->
                        <div class="card-body rounded-10 bg-white">
                            <!-- Institute Title -->
                            <p class="card-title"><a class="h5" href="{{route('website.institute' , [$offer->institute->id, $offer->institute->slug ])}}" class="text-dark"> معهد {{$offer->institute->name_ar}} </a></p>
                            <p class="card-title"><a class="h6" href="{{route('website.institute' , [$offer->institute->id, $offer->institute->slug , $offer->slug])}}" class="text-main-color">{{$offer->name_ar}} </a></p>
                            <!-- ./Institute Title -->
                            <!-- Institute Rate -->
                            <p class="mb-0"><span class="starrr" ratio="{{institute_rate($offer->institute)}}"></span> {{institute_rate($offer->institute)}}</p>
                            <!-- ./Institute Rate -->
                            <!-- Institute Location -->
                            <p class="mb-0"><i class="fas fa-map-marker-alt text-main-color"></i> {{$offer->institute->country->name_ar}} , {{$offer->institute->city->name_ar}}</p>
                            <!-- ./Institute Location -->
                            <!-- Course Name -->
                            <!-- ./Course Name -->
                            <!-- Course Time And Level -->
                            <p class="mb-0 overflow-hidden">
                                <span class="float-right"><i class="fas fa-sun text-main-color"></i> {{$offer->study_period=='morning' ? 'صباحي' : 'مسائي'}}</span>
                                <span class="float-left"> <i class="fas fa-signal text-main-color"></i> {{$offer->required_level}}</span>
                            </p>
                            <!-- ./Course Time And Level -->
                        </div>
                        <!-- Course Price -->
                        <div class="card-footer bg-white overflow-hidden">
                            <del class="text-muted del">{{$offer->coursesPricePerWeek->price}} ريال / أسبوع </del> <span class="float-left text-main-color">{{$offer->coursesPricePerWeek->price*(1-$offer->discount) }} ريال / أسبوع </span>
                        </div>
                        <!-- ./Course Price -->
                    </div>
                    <!-- ./Institute -->

                    @endforeach
                </div>
                <!-- ./Offers -->
            </div>
        </div>
    </div>
</section>
<!-- ./Best Offers -->
@endif 
<!-- Studies -->
<div class="studies py-5">
    <div class="container-fluid">
        @if (isset($two_blogs[0]))
        <div class="row">
            <!-- Background Img -->
            <div class="col-md-6 bg-study-1 p-0 align-self-end"> 
            <picture>
                <source srcset="{{empty($two_blogs[0]->getFirstMedia('blog_featured_image')) ? asset('/storage/default_images.png') : $two_blogs[0]->getFirstMediaUrl('blog_featured_image')}}" media="(min-width:700px)">
                <source srcset="{{empty($two_blogs[0]->getFirstMedia('blog_featured_image')) ? asset('/storage/default_images.png') : $two_blogs[0]->getFirstMedia('blog_featured_image')->getUrl('thumb')}}" media="(min-width:500px)">
                <img loading="lazy" src="{{empty($two_blogs[0]->getFirstMedia('blog_featured_image')) ? asset('/storage/default_images.png') : $two_blogs[0]->getFirstMedia('blog_featured_image')->getUrl('thumb')}}" alt="{{$two_blogs[0]->img_alt}}" width="100%">
            </picture>

                            
            </div>
            <!-- ./Background Img -->
            <div class="col-md-6 p-md-5 p-3">
                <h3 class="text-main-color mt-xl-5">{{$two_blogs[0]->title_ar}}</h3>
                <p>{!! mb_substr(strip_tags($two_blogs[0]->content_ar) ,0 , 300 , 'utf-8') !!} ....</p>
                <a href="#" onclick="this.href = '{{route('website.institutes' , ['country' => $two_blogs[0]->country->id])}}' "><button class="btn rounded-10 bg-secondary-color text-white mb-4 ml-3">عرض معاهد {{$two_blogs[0]->country->name_ar}}</button></a>
                <a href="{{route('website.article',$two_blogs[0]->id)}}"><button class="btn rounded-10 border-secondary-color text-secondary-color mb-4">اقرأ المزيد</button></a>
                <div class="overflow-hidden">
                    {{-- <a href="#" class="text-secondary-color float-left">دول أخـــــرى <i class="fas fa-angle-double-left"></i></a> --}}
                </div>
            </div>
        </div>
        @endif
        @if (isset($two_blogs[1]))

        <div class="row">
            <div class="col-md-6 p-md-5 p-3 order-md-1 order-2">
                <h3 class="text-main-color mt-xl-5">{{$two_blogs[1]->title_ar}}</h3>
                <p>{!! mb_substr(strip_tags($two_blogs[1]->content_ar) ,0 , 300 , 'utf-8') !!} ....</p>
                <a href="#" onclick="this.href = '{{route('website.institutes' , ['country' => $two_blogs[1]->country->id])}}' "><button class="btn rounded-10 bg-secondary-color text-white mb-4 ml-3">عرض معاهد {{$two_blogs[1]->country->name_ar}}</button></a>
                <a href="{{route('website.article',$two_blogs[1]->id)}}"><button class="btn rounded-10 border-secondary-color text-secondary-color mb-4">اقرأ المزيد</button></a>
                <div class="overflow-hidden">
                    {{-- <a href="#" class="text-secondary-color float-left">دول أخـــــرى <i class="fas fa-angle-double-left"></i></a> --}}
                </div>
            </div>
            <!-- Background Img -->
            <div class="col-md-6 bg-study-2 order-md-2 order-1 p-0">
                <picture>
                    <source srcset="{{empty($two_blogs[1]->getFirstMedia('blog_featured_image')) ? asset('/storage/default_images.png') : $two_blogs[1]->getFirstMediaUrl('blog_featured_image')}}" media="(min-width:700px)">
                    <source srcset="{{empty($two_blogs[1]->getFirstMedia('blog_featured_image')) ? asset('/storage/default_images.png') : $two_blogs[1]->getFirstMedia('blog_featured_image')->getUrl('thumb')}}" media="(min-width:500px)">
                    <img loading="lazy" src="{{empty($two_blogs[1]->getFirstMedia('blog_featured_image')) ? asset('/storage/default_images.png') : $two_blogs[1]->getFirstMedia('blog_featured_image')->getUrl('thumb')}}" alt="{{$two_blogs[1]->img_alt}}" width="100%">
                </picture>
            </div>
            <!-- ./Background Img -->
        </div>
        @endif

    </div>
</div>
<!-- ./Studies -->


<!-- Trusted Us -->
{{--
<section class="trusted-us py-5">
    <div class="container-fluid">
        <!-- Section Heading -->
        <div class="row px-xl-5">
            <div class="col-12">
                <div class="heading-trusted-us text-center">
                    <h3 class="text-main-color font-weight-bold">من وثقوا بنا</h3>
                    <p>نسعى من خلال عقودنا واتفاقياتنا مع المعاهد والجامعات والمؤسسات الأكاديمية</p>
                </div>
            </div>
        </div>
        <!-- ./Section Heading -->
        <div class="row px-xl-5">
            <div class="col-12">
                <div class="trusted-list owl-carousel" id="trusted-list">
                    @foreach ($partners as $partner)
                    <div class="p-5"><img loading="lazy" src="{{$partner->logo == null ? asset('storage/default_images.png') : $partner->logo}}" alt="{{$partner->name}}" class="img-fluid" /></div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
--}}
<!-- ./Trusted Us -->

@if (isset($blogs[0]))
<!-- News -->
<section class="news py-5 bg-sub-secondary-color">
    <div class="container-fluid">
        <!-- Section Heading -->
        <div class="row px-xl-5 mb-4">
            <div class="col-12">
                <div class="heading-best-offers text-center">
                    <h3 class="text-main-color font-weight-bold">آخر الأخبار والموضوعات المهمة</h3>
                    <p>اعرف آخر الأخبار والموضوعات الجديدة التي تخص حياة الطلبة السعوديين بالخارج والدراسة بشكل عام</p>
                </div>
            </div>
        </div>
        <!-- ./Section Heading -->
        <div class="row px-xl-5">
            <div class="col-12">
                <!-- News List -->
                <div class="news-list owl-carousel position-relative px-xl-5" id="news-list">
                    @foreach ($blogs as $blog)

                    <div class="card mx-xl-4 mx-2 shadow-sm offer border-0 rounded-10">
                        <a href="{{route('website.article',$blog->id)}}">
                            <img loading="lazy" src="{{empty($blog->getFirstMedia('blog_featured_image')) ? asset('/storage/default_images.png') : $blog->getFirstMedia('blog_featured_image')->getUrl('thumb')}}" alt="{{$blog->img_alt}}" class="card-img-top" />
                        </a>
                        <div class="card-body rounded-10 bg-white">
                            <a href="{{route('website.article',$blog->id)}}"><p class="card-title text-main-color h5">{{$blog->title_ar}}</p></a>
                            <p class="mb-0">
                                <span>{!! mb_substr(strip_tags($blog->content_ar) ,0 , 150 , 'utf-8') !!} ... <a href="{{route('website.article',$blog->id)}}">اقرأ المزيد</a></span>
                            </p>
                            <p class="mb-0"><span class="text-muted">{{ArabicDate($blog->created_at)}}</span></p>
                        </div>
                    </div>
                    @endforeach
                </div>
                <!-- ./News List -->
            </div>
        </div>
    </div>
</section>
<!-- ./News -->
@endif @if (isset($success_stories[0]))
<!-- Success Stories -->
<section class="success-stories pt-5 pb-0">
    <div class="container-fluid">
        <!-- Section Heading -->
        <div class="row px-xl-5 mb-5">
            <div class="col-12">
                <div class="heading-success-stories text-center">
                    <h3 class="text-main-color font-weight-bold">آراء العملاء</h3>
                    <p>نسعى من خلال عقودنا واتفاقياتنا مع المعاهد، والجامعات، والمؤسسات الأكاديمية - إلى رفع مستوى التعاون، وخلق بيئة تنافسية</p>
                </div>
            </div>
        </div>
        <!-- ./Section Heading -->
        <div class="row px-xl-5">
            <div class="col-12">
                <!-- Stories -->
                <div class="stories-list owl-carousel custome_slide position-relative px-xl-5" id="slide-testimonal">
                    @foreach ($success_stories as $story)

                    <!-- Quote -->
                    <div class="quote text-center">
                        <!-- Quote Text -->
                        <div class="user-quote pt-4 pb-5 px-4 rounded-10">
                            <i class="fas fa-quote-right"></i>
                            <p>{{$story->story}}</p>
                        </div>
                        <!-- ./Quote Text -->
                        <div class="user-info">
                            <!-- User Img -->
                            <div class="user-info__img">
                                <img loading="lazy" src="{{$story->student->profile_image == null ? asset('storage/default_images.png') : $story->student->profile_image}}" alt="student-image" class="img-fluid rounded-pill mx-auto" />
                            </div>
                            <!-- ./User Img -->
                            <!-- User Name -->
                            <div class="user-info__name">
                                <span>{{$story->student->name}}</span>
                            </div>
                            <!-- ./User Name -->
                            <!-- University Name -->
                            {{--
                            <div class="user-info__Institute">
                                <span class="text-muted">جامعة كالفورنيا</span>
                            </div>
                            --}}
                            <!-- ./University Name -->
                        </div>
                    </div>
                    <!-- ./Quote -->
                    @endforeach
                </div>
                <!-- ./Stories -->
            </div>
        </div>
    </div>
</section>
<!-- ./Success Stories -->
@endif @if (isset($blogs[0]))
<!-- Browse our institutes -->
<section class="browse-our-institutes py-5">
    <div class="container-fluid">
        <!-- Section Heading -->
        <div class="row px-xl-5">
            <div class="col-12 text-center">
                <h3 class="text-main-color font-weight-bold">تصفح معاهدنا</h3>
                <p>تصفح لائحة أفضل معاهد اللغات المعتمدة، أعددناها من أجل تطوير مهاراتك اللغوية</p>
                <a href="{{route('website.institutes')}}"><button class="btn rounded-10 bg-secondary-color text-white px-4">ابدأ الآن</button></a>
            </div>
        </div>
        <!-- ./Section Heading -->
    </div>
</section>
<!-- ./Browse our institutes -->
@endif @endsection
