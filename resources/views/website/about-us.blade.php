@extends('website.app') @section('website.content') 
<div class="bg-sub-secondary-color">
 <!-- About Us -->
 <section class="about-us py-5">
    <div class="container-fluid">
        <!-- Section Heading -->
        <div class="row px-xl-5">
            <div class="col-12 ">
                <div class="heading-about-us">

                    <h3 class="text-main-color font-weight-bold">من نحن</h3>
                    <p>"سات" مؤسسة للاستشارات التعليمية الدولية، تعمل على تقديم الاستشارات الأكاديمية والقانونية، يقع مقرها الرئيسي في الرياض. 
                        تهدف "سات" إلى مساعدة الطلبة الناطقين باللغة العربية الراغبين في الدراسة بالخارج، والالتحاق بالمدارس، والجامعات، والمعاهد الأجنبية. 
                        تأسست "سات" في عام 2015 بنيوكاسل ببريطانيا، حيث كان يُقيم ويدرس الشريك المؤسس لمدة خمس سنوات. عمل المؤسسون قبل تأسيس "سات" بالنوادي السعودية ببريطانيا؛ لمساعدة الطلبة المحتملين الجدد الذين كانوا على تواصل مستمر فبل مغادرة البلاد وحتى بعد الوصول الى بريطانيا. 
                        عمل مؤسسو "سات" على توظيف وتكريس الخبرات المكتسبة خلال المسيرة الأكاديمية للنهوض بالمؤسسة، وقاموا بانتقاء فريق عمل "سات" بعناية تامة. 
                    </p>
                </div>
            </div>
        </div>
        <!-- ./Section Heading -->
    </div>

</section>
<!-- ./About Us -->
<!-- Brief -->
<section class="brief bg-white py-5">
    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-lg-4 mb-4 text-center">
                <!-- Img Brief -->
                <img src="{{asset('website')}}/imgs/brief.png" alt="" class="img-fluid rounded-10">
                <!-- ./Img Brief -->
            </div>
            <div class="col-lg-8 align-self-center">
                <div class="heading-brief">

                    <h3 class="text-main-color font-weight-bold">نبذه عن فريق العمل والمعاهد</h3>
                    <p>موقع سات هو نظام عالمي مختص بالبحث والحجز المباشر لكورسات اللغة ودورات التدريب والتقديم على
                        الجامعات حول العالم ويعد الأفضل لاحتوائه على أقوى المؤسسات التعليمية في نطاق واسع، بحيث يضم
                        أكثر من 350 معهد لتعليم اللغة الإنجليزية و 1,100 جامعة في اكثر من 20 دولة حول العالم </p>
                    <a href="{{route('website.institutes')}}"
                        class="btn rounded-10 bg-secondary-color text-center mb-3 text-white">تصفح المعاهد</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ./Brief -->
<!-- Team -->
<section class="team py-5" id="team">
    <div class="container-fluid">
        <!-- Section Heading -->
        <div class="row px-xl-5">
            <div class="col-lg-12">
                <div class="heading-team">

                    <h3 class="text-main-color font-weight-bold">الفريق</h3>
                    <p>لدينا أكثر من 60 موظف يعملون بتفانٍ على تقديم الدعم الكامل لطلابنا الزائرين لموقعنا وللرد على
                        الاستفسارات عن طريق المحادثة على الانترنت والهاتف والبريد الألكتروني</p>
                </div>
            </div>
        </div>
        <!-- ./Section Heading -->
        {{-- <div class="row px-xl-4">
            <div class="col-12">
                <!-- Team List -->
                <div class="team-list owl-carousel" id="team-list">
                    <!-- Team Member -->
                    <div class="team-member bg-white rounded-10 p-3 text-center mx-3">
                        <!-- Member Img -->
                        <img src="{{asset('website')}}/imgs/users/user2.png" alt="" class="rounded-pill mx-auto">
                        <!-- ./Member Img -->
                        <!-- Member Name -->
                        <h5 class="text-main-color mt-3 mb-2">محمود احمد</h5>
                        <!-- ./Member Name -->
                        <!-- Member Title -->
                        <span class="text-capitalize">Author at Panoply Store</span>
                        <!-- ./Member Title -->
                        <!-- Member Social -->
                        <div class="social-links-sm mt-3">
                            <a class="bg-main-color d-inline-block text-center ml-3" href="#"><span
                                    class="text-white font-weight-bold"><i
                                        class="fab fa-facebook-f"></i></span></a>
                            <a class="bg-main-color d-inline-block text-center ml-3" href="#"><span
                                    class="text-white font-weight-bold"><i
                                        class="fab fa-twitter"></i></span></a>
                        </div>
                        <!-- ./Member Social -->
                    </div>
                    <!-- ./Team Member -->
                     <!-- Team Member -->
                     <div class="team-member bg-white rounded-10 p-3 text-center mx-3">
                        <!-- Member Img -->
                        <img src="{{asset('website')}}/imgs/users/user2.png" alt="" class="rounded-pill mx-auto">
                        <!-- ./Member Img -->
                        <!-- Member Name -->
                        <h5 class="text-main-color mt-3 mb-2">محمود احمد</h5>
                        <!-- ./Member Name -->
                        <!-- Member Title -->
                        <span class="text-capitalize">Author at Panoply Store</span>
                        <!-- ./Member Title -->
                        <!-- Member Social -->
                        <div class="social-links-sm mt-3">
                            <a class="bg-main-color d-inline-block text-center ml-3" href="#"><span
                                    class="text-white font-weight-bold"><i
                                        class="fab fa-facebook-f"></i></span></a>
                            <a class="bg-main-color d-inline-block text-center ml-3" href="#"><span
                                    class="text-white font-weight-bold"><i
                                        class="fab fa-twitter"></i></span></a>
                        </div>
                        <!-- ./Member Social -->
                    </div>
                    <!-- ./Team Member -->
                     <!-- Team Member -->
                     <div class="team-member bg-white rounded-10 p-3 text-center mx-3">
                        <!-- Member Img -->
                        <img src="{{asset('website')}}/imgs/users/user2.png" alt="" class="rounded-pill mx-auto">
                        <!-- ./Member Img -->
                        <!-- Member Name -->
                        <h5 class="text-main-color mt-3 mb-2">محمود احمد</h5>
                        <!-- ./Member Name -->
                        <!-- Member Title -->
                        <span class="text-capitalize">Author at Panoply Store</span>
                        <!-- ./Member Title -->
                        <!-- Member Social -->
                        <div class="social-links-sm mt-3">
                            <a class="bg-main-color d-inline-block text-center ml-3" href="#"><span
                                    class="text-white font-weight-bold"><i
                                        class="fab fa-facebook-f"></i></span></a>
                            <a class="bg-main-color d-inline-block text-center ml-3" href="#"><span
                                    class="text-white font-weight-bold"><i
                                        class="fab fa-twitter"></i></span></a>
                        </div>
                        <!-- ./Member Social -->
                    </div>
                    <!-- ./Team Member -->
                     <!-- Team Member -->
                     <div class="team-member bg-white rounded-10 p-3 text-center mx-3">
                        <!-- Member Img -->
                        <img src="{{asset('website')}}/imgs/users/user2.png" alt="" class="rounded-pill mx-auto">
                        <!-- ./Member Img -->
                        <!-- Member Name -->
                        <h5 class="text-main-color mt-3 mb-2">محمود احمد</h5>
                        <!-- ./Member Name -->
                        <!-- Member Title -->
                        <span class="text-capitalize">Author at Panoply Store</span>
                        <!-- ./Member Title -->
                        <!-- Member Social -->
                        <div class="social-links-sm mt-3">
                            <a class="bg-main-color d-inline-block text-center ml-3" href="#"><span
                                    class="text-white font-weight-bold"><i
                                        class="fab fa-facebook-f"></i></span></a>
                            <a class="bg-main-color d-inline-block text-center ml-3" href="#"><span
                                    class="text-white font-weight-bold"><i
                                        class="fab fa-twitter"></i></span></a>
                        </div>
                        <!-- ./Member Social -->
                    </div>
                    <!-- ./Team Member -->
                     <!-- Team Member -->
                     <div class="team-member bg-white rounded-10 p-3 text-center mx-3">
                        <!-- Member Img -->
                        <img src="{{asset('website')}}/imgs/users/user2.png" alt="" class="rounded-pill mx-auto">
                        <!-- ./Member Img -->
                        <!-- Member Name -->
                        <h5 class="text-main-color mt-3 mb-2">محمود احمد</h5>
                        <!-- ./Member Name -->
                        <!-- Member Title -->
                        <span class="text-capitalize">Author at Panoply Store</span>
                        <!-- ./Member Title -->
                        <!-- Member Social -->
                        <div class="social-links-sm mt-3">
                            <a class="bg-main-color d-inline-block text-center ml-3" href="#"><span
                                    class="text-white font-weight-bold"><i
                                        class="fab fa-facebook-f"></i></span></a>
                            <a class="bg-main-color d-inline-block text-center ml-3" href="#"><span
                                    class="text-white font-weight-bold"><i
                                        class="fab fa-twitter"></i></span></a>
                        </div>
                        <!-- ./Member Social -->
                    </div>
                    <!-- ./Team Member -->
                     <!-- Team Member -->
                     <div class="team-member bg-white rounded-10 p-3 text-center mx-3">
                        <!-- Member Img -->
                        <img src="{{asset('website')}}/imgs/users/user2.png" alt="" class="rounded-pill mx-auto">
                        <!-- ./Member Img -->
                        <!-- Member Name -->
                        <h5 class="text-main-color mt-3 mb-2">محمود احمد</h5>
                        <!-- ./Member Name -->
                        <!-- Member Title -->
                        <span class="text-capitalize">Author at Panoply Store</span>
                        <!-- ./Member Title -->
                        <!-- Member Social -->
                        <div class="social-links-sm mt-3">
                            <a class="bg-main-color d-inline-block text-center ml-3" href="#"><span
                                    class="text-white font-weight-bold"><i
                                        class="fab fa-facebook-f"></i></span></a>
                            <a class="bg-main-color d-inline-block text-center ml-3" href="#"><span
                                    class="text-white font-weight-bold"><i
                                        class="fab fa-twitter"></i></span></a>
                        </div>
                        <!-- ./Member Social -->
                    </div>
                    <!-- ./Team Member -->
                     <!-- Team Member -->
                     <div class="team-member bg-white rounded-10 p-3 text-center mx-3">
                        <!-- Member Img -->
                        <img src="{{asset('website')}}/imgs/users/user2.png" alt="" class="rounded-pill mx-auto">
                        <!-- ./Member Img -->
                        <!-- Member Name -->
                        <h5 class="text-main-color mt-3 mb-2">محمود احمد</h5>
                        <!-- ./Member Name -->
                        <!-- Member Title -->
                        <span class="text-capitalize">Author at Panoply Store</span>
                        <!-- ./Member Title -->
                        <!-- Member Social -->
                        <div class="social-links-sm mt-3">
                            <a class="bg-main-color d-inline-block text-center ml-3" href="#"><span
                                    class="text-white font-weight-bold"><i
                                        class="fab fa-facebook-f"></i></span></a>
                            <a class="bg-main-color d-inline-block text-center ml-3" href="#"><span
                                    class="text-white font-weight-bold"><i
                                        class="fab fa-twitter"></i></span></a>
                        </div>
                        <!-- ./Member Social -->
                    </div>
                    <!-- ./Team Member -->
                     <!-- Team Member -->
                     <div class="team-member bg-white rounded-10 p-3 text-center mx-3">
                        <!-- Member Img -->
                        <img src="{{asset('website')}}/imgs/users/user2.png" alt="" class="rounded-pill mx-auto">
                        <!-- ./Member Img -->
                        <!-- Member Name -->
                        <h5 class="text-main-color mt-3 mb-2">محمود احمد</h5>
                        <!-- ./Member Name -->
                        <!-- Member Title -->
                        <span class="text-capitalize">Author at Panoply Store</span>
                        <!-- ./Member Title -->
                        <!-- Member Social -->
                        <div class="social-links-sm mt-3">
                            <a class="bg-main-color d-inline-block text-center ml-3" href="#"><span
                                    class="text-white font-weight-bold"><i
                                        class="fab fa-facebook-f"></i></span></a>
                            <a class="bg-main-color d-inline-block text-center ml-3" href="#"><span
                                    class="text-white font-weight-bold"><i
                                        class="fab fa-twitter"></i></span></a>
                        </div>
                        <!-- ./Member Social -->
                    </div>
                    <!-- ./Team Member -->
                     <!-- Team Member -->
                     <div class="team-member bg-white rounded-10 p-3 text-center mx-3">
                        <!-- Member Img -->
                        <img src="{{asset('website')}}/imgs/users/user2.png" alt="" class="rounded-pill mx-auto">
                        <!-- ./Member Img -->
                        <!-- Member Name -->
                        <h5 class="text-main-color mt-3 mb-2">محمود احمد</h5>
                        <!-- ./Member Name -->
                        <!-- Member Title -->
                        <span class="text-capitalize">Author at Panoply Store</span>
                        <!-- ./Member Title -->
                        <!-- Member Social -->
                        <div class="social-links-sm mt-3">
                            <a class="bg-main-color d-inline-block text-center ml-3" href="#"><span
                                    class="text-white font-weight-bold"><i
                                        class="fab fa-facebook-f"></i></span></a>
                            <a class="bg-main-color d-inline-block text-center ml-3" href="#"><span
                                    class="text-white font-weight-bold"><i
                                        class="fab fa-twitter"></i></span></a>
                        </div>
                        <!-- ./Member Social -->
                    </div>
                    <!-- ./Team Member -->

                </div>
                <!-- ./Team List -->
            </div>
        </div> --}}
    </div>

</section>
<!-- ./Team -->
<!-- Value & mission -->
<section class="value-mission py-5 bg-white">
    <div class="container-fluid">
        <!-- Section Heading -->
        <div class="row px-xl-5 mb-4">
            <div class="col-12">
                <div class="heading-team">

                    <h3 class="text-main-color font-weight-bold">عن الشركة و قيمها و مهمتها</h3>
                    <p>نسعى من خلال عقودنا واتفاقياتنا مع المعاهد والجامعات والمؤسسات الأكاديمية لرفع مستوى التعاون التعليمي بين المؤسسات وخلق بيئة تنافسية شريفة لتقديم اجود الخدمات للمتقدمين 
                        القيم التي تأسست عليها سات هى التعاون والعمل المشترك الإخلاص والمبادرة وشغفنا الشخصي بما نفعل</p>
                </div>
            </div>
        </div>
        <!-- ./Section Heading -->
        <div class="row px-xl-5">
            <div class="col-lg-4 col-md-6">
                <div class="bg-white shadow-lg rounded-10 py-3 mission px-xl-4 px-3 mb-4">
                    <!-- Mission Icon -->
                    <div class="mission-icon mb-3">
                        <i class="fas fa-tags text-main-color font-xl"></i>
                    </div>
                    <!-- ./Mission Icon -->
                    <!-- Mission Title -->
                    <div class="mission-title">
                        <h5 class="font-weight-bold">الاسعار</h5>
                    </div>
                    <!-- ./Mission Title -->
                    <!-- Mission Description -->
                    <div class="mission-description">
                        <p>تقديم الإستشارات التعليمية لاختيار التخصص الجامعى</p>
                    </div>
                    <!-- ./Mission Description -->
                </div>
            </div>

            <div class="col-lg-4 col-md-6">
                <div class="bg-white shadow-lg rounded-10 py-3 mission px-xl-4 px-3 mb-4">
                    <!-- Mission Icon -->
                    <div class="mission-icon mb-3">
                        <i class="fas fa-lightbulb text-main-color font-xl"></i>
                    </div>
                    <!-- ./Mission Icon -->
                    <!-- Mission Title -->
                    <div class="mission-title">
                        <h5 class="font-weight-bold">الإبداع</h5>
                    </div>
                    <!-- ./Mission Title -->
                    <!-- Mission Description -->
                    <div class="mission-description">
                        <p>تقديم الإستشارات التعليمية لاختيار التخصص الجامعى</p>
                    </div>
                    <!-- ./Mission Description -->
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="bg-white shadow-lg rounded-10 py-3 mission px-xl-4 px-3 mb-4">
                    <!-- Mission Icon -->
                    <div class="mission-icon mb-3">
                        <i class="fas fa-trophy text-main-color font-xl"></i>
                    </div>
                    <!-- ./Mission Icon -->
                    <!-- Mission Title -->
                    <div class="mission-title">
                        <h5 class="font-weight-bold">الجوائز</h5>
                    </div>
                    <!-- ./Mission Title -->
                    <!-- Mission Description -->
                    <div class="mission-description">
                        <p>تقديم الإستشارات التعليمية لاختيار التخصص الجامعى</p>
                    </div>
                    <!-- ./Mission Description -->
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="bg-white shadow-lg rounded-10 py-3 mission px-xl-4 px-3 mb-4">
                    <!-- Mission Icon -->
                    <div class="mission-icon mb-3">
                        <i class="fas fa-tags text-main-color font-xl"></i>
                    </div>
                    <!-- ./Mission Icon -->
                    <!-- Mission Title -->
                    <div class="mission-title">
                        <h5 class="font-weight-bold">الاسعار</h5>
                    </div>
                    <!-- ./Mission Title -->
                    <!-- Mission Description -->
                    <div class="mission-description">
                        <p>تقديم الإستشارات التعليمية لاختيار التخصص الجامعى</p>
                    </div>
                    <!-- ./Mission Description -->
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="bg-white shadow-lg rounded-10 py-3 mission px-xl-4 px-3 mb-4">
                    <!-- Mission Icon -->
                    <div class="mission-icon mb-3">
                        <i class="fas fa-tags text-main-color font-xl"></i>
                    </div>
                    <!-- ./Mission Icon -->
                    <!-- Mission Title -->
                    <div class="mission-title">
                        <h5 class="font-weight-bold">الاسعار</h5>
                    </div>
                    <!-- ./Mission Title -->
                    <!-- Mission Description -->
                    <div class="mission-description">
                        <p>تقديم الإستشارات التعليمية لاختيار التخصص الجامعى</p>
                    </div>
                    <!-- ./Mission Description -->
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="bg-white shadow-lg rounded-10 py-3 mission px-xl-4 px-3 mb-4">
                    <!-- Mission Icon -->
                    <div class="mission-icon mb-3">
                        <i class="fas fa-tags text-main-color font-xl"></i>
                    </div>
                    <!-- ./Mission Icon -->
                    <!-- Mission Title -->
                    <div class="mission-title">
                        <h5 class="font-weight-bold">الاسعار</h5>
                    </div>
                    <!-- ./Mission Title -->
                    <!-- Mission Description -->
                    <div class="mission-description">
                        <p>تقديم الإستشارات التعليمية لاختيار التخصص الجامعى</p>
                    </div>
                    <!-- ./Mission Description -->
                </div>
            </div>
            
        </div>
    </div>
</section>
<!-- ./Value & mission -->
<!-- Trusted Us -->
{{-- <section class="trusted-us py-5" id="trusted-us">
    <div class="container-fluid">
        <!-- Section Heading -->
        <div class="row px-xl-5 ">
            <div class="col-12">
                <div class="heading-trusted-us">

                    <h3 class="text-main-color font-weight-bold">من وثقوا بنا </h3>
                    <p>نسعى من خلال عقودنا واتفاقياتنا مع المعاهد والجامعات والمؤسسات الأكاديمية</p>
                </div>
            </div>
        </div>
        <!-- ./Section Heading -->
        <div class="row px-xl-5">
            <div class="col-12">
                <div class="trusted-list owl-carousel" id="trusted-list">
                    <div class="p-5"><img src="{{asset('website')}}/imgs/trusted/Bg@2x.png" alt="" class="img-fluid"></div>
                    <div class="p-5"><img src="{{asset('website')}}/imgs/trusted/Mask Group 15@2x.png" alt="" class="img-fluid"></div>
                    <div class="p-5"><img src="{{asset('website')}}/imgs/trusted/University_of_Canberra_Logo_75@2x.png" alt=""
                            class="img-fluid"></div>
                    <div class="p-5"><img src="{{asset('website')}}/imgs/trusted/university_of_liverpool_logo_75@2x.png" alt=""
                            class="img-fluid"></div>
                    <div class="p-5"><img src="{{asset('website')}}/imgs/trusted/Bg@2x.png" alt="" class="img-fluid"></div>
                    <div class="p-5"><img src="{{asset('website')}}/imgs/trusted/Mask Group 15@2x.png" alt="" class="img-fluid"></div>
                    <div class="p-5"><img src="{{asset('website')}}/imgs/trusted/University_of_Canberra_Logo_75@2x.png" alt=""
                            class="img-fluid"></div>
                    <div class="p-5"><img src="{{asset('website')}}/imgs/trusted/university_of_liverpool_logo_75@2x.png" alt=""
                            class="img-fluid"></div>
                    <div class="p-5"><img src="{{asset('website')}}/imgs/trusted/Bg@2x.png" alt="" class="img-fluid"></div>
                    <div class="p-5"><img src="{{asset('website')}}/imgs/trusted/Mask Group 15@2x.png" alt="" class="img-fluid"></div>
                    <div class="p-5"><img src="{{asset('website')}}/imgs/trusted/University_of_Canberra_Logo_75@2x.png" alt=""
                            class="img-fluid"></div>
                    <div class="p-5"><img src="{{asset('website')}}/imgs/trusted/university_of_liverpool_logo_75@2x.png" alt=""
                            class="img-fluid"></div>
                    <div class="p-5"><img src="{{asset('website')}}/imgs/trusted/Bg@2x.png" alt="" class="img-fluid"></div>
                    <div class="p-5"><img src="{{asset('website')}}/imgs/trusted/Mask Group 15@2x.png" alt="" class="img-fluid"></div>
                    <div class="p-5"><img src="{{asset('website')}}/imgs/trusted/University_of_Canberra_Logo_75@2x.png" alt=""
                            class="img-fluid"></div>
                    <div class="p-5"><img src="{{asset('website')}}/imgs/trusted/university_of_liverpool_logo_75@2x.png" alt=""
                            class="img-fluid"></div>
                </div>
            </div>
        </div>
    </div>
</section> --}}
<!-- ./Trusted Us -->
</div>
 
@endsection
