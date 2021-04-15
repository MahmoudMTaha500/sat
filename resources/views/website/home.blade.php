@extends('website.app') @section('website.content') 
<!-- Intro  -->
<section class="intro" style="background-image: url({{asset('website')}}/imgs/home_page_header.png)">
    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-lg-7 align-self-center py-5 order-lg-1 order-2">
                <!-- Section Heading -->
                <h1 class="text-white font-weight-bold mb-4">أبدا رحلتك الأن و تعلم اللغة في أكبر المعاهد</h1>
                <p class="lead text-white mb-4">نسعى من خلال عقودنا واتفاقياتنا مع المعاهد والجامعات والمؤسسات الأكاديمية لرفع مستوى التعاون التعليمي بين المؤسسات وخلق بيئة تنافسية</p>
                <!-- ./Section Heading -->

                <!-- Search Form -->
                <form class="form-inline row" method="GET" action="{{route('website.institutes')}}">
                    
                    <div class="col-md-9">
                        <!-- Search Field -->
                        <input name="keyword" type="text" class="form-control rounded-10 mb-2 ml-sm-2 w-100 btn-light" placeholder="ادخل اسم المعهد او المدينة او الدولة او الدورة لبدء البحث" />
                        <!-- ./Search Field -->
                    </div>
                    <div class="col-md-3">
                        <!-- Confirm Btn -->
                        <button type="submit" class="btn rounded-10 bg-secondary-color text-white mb-2 w-100">ابدأ الان</button>
                        <!-- ./Confirm Btn -->
                    </div>
                </form>
                <!-- ./Search Form -->
            </div>
            <div class="col-lg-5 mx-auto order-lg-2 order-1 text-center">
                <!-- Intro Img -->
                <!-- ./Intro Img -->
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
                <h3 class="text-main-color font-weight-bold">أبحث عن دورة اللغة المناسبة لك</h3>
                <p>ابحث عن أفضل الجامعات والمعاهد للدراسة بالخارج بكل سهولة ومع افضل تجربة مستخدم</p>
            </div>
            <!-- ./Section Heading -->

            <div class="col-md-6 col-xl-5 mr-auto">
                <!-- Search Institute Form -->
                <div class="search-institute-form shadow-lg rounded-10 py-4 px-2 p-xl-5 mx-auto bg-white">
                    <form class="my-4">
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
                            <select class="form-control rounded-10" data-live-search="true">
                                <option value="" disabled selected>عدد الاسابيع</option>
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                            </select>
                        </div>
                        <!-- ./Weeks Count Field -->
                        <!-- Options  -->
                        <div class="mb-4">
                            <div class="form-check form-check-inline mr-0 ml-4">
                                <input class="form-check-input mr-0 ml-3 bg-secondary" type="checkbox" value="option2" />
                                <label class="form-check-label">افضل العروض</label>
                            </div>
                            <div class="form-check form-check-inline mr-0 ml-4">
                                <input class="form-check-input mr-0 ml-3 bg-secondary" type="checkbox" value="option1" />
                                <label class="form-check-label">الأعلى تقيما</label>
                            </div>
                            <div class="form-check form-check-inline mr-0 ml-4">
                                <input class="form-check-input mr-0 ml-3 bg-secondary" type="checkbox" id="inlineCheckbox1" value="option1" />
                                <label class="form-check-label">الاكثر انتشارا</label>
                            </div>
                        </div>
                        <!-- ./Options  -->
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
                        <div class="add-favourite position-absolute">
                            <i class="far fa-heart"></i>
                        </div>
                        <!-- ./Add To Favourite Btn -->
                        <!-- Institute Img -->
                        <a href="{{route('website.institute' , [$offer->institute->id, $offer->institute->slug , $offer->slug])}}">
                            <div class="institute-img d-inline-block position-relative">
                                <img src="{{$offer->institute->banner}}" alt="{{$offer->institute->name_ar}}" class="card-img-top" alt="..." />
                            </div>
                        </a>
                        <!-- ./Institute Img -->
                        <div class="card-body rounded-10 bg-white">
                            <!-- Institute Title -->
                            <h5 class="card-title"><a href="{{url($offer->slug)}}" class="text-main-color"> معهد {{$offer->institute->name_ar}} </a></h5>
                            <!-- ./Institute Title -->
                            <!-- Institute Rate -->
                            <p class="mb-0"><span class="starrr" ratio="{{institute_rate($offer->institute)}}"></span> {{institute_rate($offer->institute)}}</p>
                            <!-- ./Institute Rate -->
                            <!-- Institute Location -->
                            <p class="mb-0"><i class="fas fa-map-marker-alt text-main-color"></i> {{$offer->institute->country->name_ar}} , {{$offer->institute->city->name_ar}}</p>
                            <!-- ./Institute Location -->
                            <!-- Course Name -->
                            <p class="mb-0"><i class="fas fa-graduation-cap text-main-color"></i> {{$offer->name_ar}}</p>
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
<!-- Success Stories -->
<section class="success-stories pt-5 pb-0">
    <div class="container-fluid">
        <!-- Section Heading -->
        <div class="row px-xl-5 mb-5">
            <div class="col-12">
                <div class="heading-success-stories text-center">
                    <h3 class="text-main-color font-weight-bold">قصص النجاح</h3>
                    <p>نسعى من خلال عقودنا واتفاقياتنا مع المعاهد والجامعات والمؤسسات الأكاديمية</p>
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
                                <img src="{{$story->student->profile_image == null ? asset('storage/default_images.png') : $story->student->profile_image}}" alt="{{$story->student->name}}" class="img-fluid rounded-pill mx-auto" />
                            </div>
                            <!-- ./User Img -->
                            <!-- User Name -->
                            <div class="user-info__name">
                                <h6>{{$story->student->name}}</h6>
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
<!-- Studies -->
<div class="studies">
    <div class="container-fluid">
        <div class="row">
            <!-- Background Img -->
            <div class="col-md-6 bg-study-1" style="background-image: url({{$two_blogs[0]->banner == null ? asset('storage/default_images.png') : $two_blogs[0]->banner}})"></div>
            <!-- ./Background Img -->
            <div class="col-md-6 p-5 bg-sub-secondary-color">
                <h3 class="text-main-color mt-xl-5">{{$two_blogs[0]->title_ar}}</h3>
                <p>{{$two_blogs[0]->content_ar}}</p>
                <a href="{{$two_blogs[0]->country->id}}"><button class="btn rounded-10 bg-secondary-color text-white mb-4 ml-3">عرض معاهد {{$two_blogs[0]->country->name_ar}}</button></a>
                <a href="{{$two_blogs[0]->id}}"><button class="btn rounded-10 border-secondary-color text-secondary-color mb-4">معرفة المزيد</button></a>
                <div class="overflow-hidden">
                    <a href="#" class="text-secondary-color float-left">دول أخـــــرى <i class="fas fa-angle-double-left"></i></a>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 p-5 bg-sub-secondary-color">
                <h3 class="text-main-color mt-xl-5">{{$two_blogs[1]->title_ar}}</h3>
                <p>{{$two_blogs[1]->content_ar}}</p>
                <a href="{{$two_blogs[1]->country->id}}"><button class="btn rounded-10 bg-secondary-color text-white mb-4 ml-3">عرض معاهد {{$two_blogs[1]->country->name_ar}}</button></a>
                <a href="{{$two_blogs[1]->id}}"><button class="btn rounded-10 border-secondary-color text-secondary-color mb-4">معرفة المزيد</button></a>
                <div class="overflow-hidden">
                    <a href="#" class="text-secondary-color float-left">دول أخـــــرى <i class="fas fa-angle-double-left"></i></a>
                </div>
            </div>
            <!-- Background Img -->
            <div class="col-md-6 bg-study-2" style="background-image: url({{$two_blogs[1]->banner == null ? asset('storage/default_images.png') : $two_blogs[1]->banner}})"></div>
            <!-- ./Background Img -->
        </div>
    </div>
</div>
<!-- ./Studies -->
<!-- Trusted Us -->
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
                    <div class="p-5"><img src="{{$partner->logo == null ? asset('storage/default_images.png') : $partner->logo}}" alt="{{$partner->name}}" class="img-fluid" /></div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ./Trusted Us -->
<!-- News -->
<section class="news py-5 bg-sub-secondary-color">
    <div class="container-fluid">
        <!-- Section Heading -->
        <div class="row px-xl-5 mb-4">
            <div class="col-12">
                <div class="heading-best-offers text-center">
                    <h3 class="text-main-color font-weight-bold">أخر الأخبار و الموضوعات المهمة</h3>
                    <p>اعرف اخر الأخبار و الموضوعات الجديده الخاص بالطالب السعودي بالخارج و الدراسه بشكل عام</p>
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
                        <a href="{{$blog->id}}">
                            <img src="{{$blog->banner == null ? asset('storage/default_images.png') : $blog->banner}}" alt="{{$blog->title_ar}}" class="card-img-top" />
                        </a>
                        <div class="card-body rounded-10 bg-white">
                            <a href="{{$blog->id}}"><h5 class="card-title text-main-color">{{$blog->title_ar}}</h5></a>
                            <p class="mb-0"><span>بواسطة {{$blog->creator->name}}</span></p>
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
<!-- Browse our institutes -->
<section class="browse-our-institutes py-5">
    <div class="container-fluid">
        <!-- Section Heading -->
        <div class="row px-xl-5">
            <div class="col-12 text-center">
                <h3 class="text-main-color font-weight-bold">تصفح معاهدنا</h3>
                <p>تصفح لائحة أفضل معاهد اللغات المعتمدة من أجلك لتطوير مهاراتك اللغوية</p>
                <button class="btn rounded-10 bg-secondary-color text-white px-4">ابدأ الآن</button>
            </div>
        </div>
        <!-- ./Section Heading -->
    </div>
</section>
<!-- ./Browse our institutes -->
@endsection
