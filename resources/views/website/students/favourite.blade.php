@extends('website.app') @section('website.content')

<!-- Profile -->
<section class="profile py-5 bg-sub-secondary-color">
    <div class="container-fluid">
        <div class="row px-xl-5 mb-4">
            <!-- Section Heading -->
            <div class="col-12 d-lg-block d-none">
                <h3 class="text-main-color font-weight-bold">الملف الشخصي</h3>
            </div>
            <!-- ./Section Heading -->
        </div>
        <div class="row px-xl-5">
            <!-- Side Nav -->
            <div class="col-lg-3 mb-4 d-lg-block d-none">
                @include('website.students.student-sidebar')
            </div>
            <!-- ./Side Nav -->
            <div class="col-lg-9">
                <!-- Section Heading -->
                <h5 class="text-main-color font-weight-bold mb-4">المفضلة</h5>
                <!-- ./Section Heading -->
                <div class="bg-white shadow-sm p-xl-5 p-2 rounded-10">
                    <div class="row">
                        @foreach ($favourites as $favourite)
                        <div class="col-xl-4 col-md-6">
                            <div class="card mx-xl-4 mx-0 shadow-sm offer border-0 institute-card rounded-10 mb-5">
                                <!-- Offer Icon -->
                                <div class="offer-icon position-absolute bg-secondary-color text-white">
                                    - {{$favourite->course->discount*100}} %
                                </div>
                                <!-- Offer Icon -->
                                <!-- Add To Favourite Btn -->
                                <div class="add-favourite position-absolute" course-id="{{$favourite->course->id}}">
                                    <i class="fas fa-heart favourite-icon"></i>
                                </div>
                                <!-- ./Add To Favourite Btn -->
                                <!-- Institute Img -->
                                <a href="{{route('website.institute' , [$favourite->course->institute->id, $favourite->course->institute->slug , $favourite->course->slug])}}">
                                    <div class="institute-img d-inline-block position-relative">
                                        <img src="{{empty($favourite->course->institute->getFirstMedia('institute_banner')) ? asset('/storage/default_images.png') : $favourite->course->institute->getFirstMedia('institute_banner')->getUrl('thumb_md')}}" alt="{{$favourite->course->institute->name_ar}}" class="card-img-top w-100" />
                                    </div>
                                </a>
                                <!-- ./Institute Img -->
                                <div class="card-body rounded-10 bg-white">
                                    <!-- Institute Title -->
                                    <h5 class="card-title">
                                        <a href="{{route('website.institute' , [$favourite->course->institute->id, $favourite->course->institute->slug , $favourite->course->slug])}}" class="text-main-color">
                                            معهد {{$favourite->course->institute->name_ar}}
                                        </a>
                                    </h5>
                                    <!-- ./Institute Title -->
                                    <!-- Institute Rate -->
                                    <p class="mb-0"><span class="starrr" ratio="{{institute_rate($favourite->course->institute)}}"></span> {{institute_rate($favourite->course->institute)}}</p>
                                    <!-- ./Institute Rate -->
                                    <!-- Institute Location -->
                                    <p class="mb-0"><i class="fas fa-map-marker-alt text-main-color"></i> {{$favourite->course->institute->country->name_ar}} , {{$favourite->course->institute->city->name_ar}}</p>
                                    <!-- ./Institute Location -->
                                    <!-- Course Name -->
                                    <p class="mb-0"><i class="fas fa-graduation-cap text-main-color"></i> {{$favourite->course->name_ar}}</p>
                                    <!-- ./Course Name -->
                                    <!-- Course Time And Level -->
                                    <p class="mb-0 overflow-hidden">
                                        <span class="float-right"><i class="fas fa-sun text-main-color"></i> {{$favourite->course->study_period=='morning' ? 'صباحي' : 'مسائي'}}</span>
                                        <span class="float-left"> <i class="fas fa-signal text-main-color"></i> {{$favourite->course->required_level}}</span>
                                    </p>
                                    <!-- ./Course Time And Level -->
                                </div>
                                <!-- Course Price -->
                                <div class="card-footer bg-white overflow-hidden">
                                    <del class="text-muted del">{{round($favourite->course->coursesPricePerWeek->price)}} ر.س / أسبوع </del>
                                    <span class="float-left text-main-color">{{round($favourite->course->coursesPricePerWeek->price*(1-$favourite->course->discount)) }} ر.س / أسبوع </span>
                                </div>
                                <!-- ./Course Price -->
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ./Profile -->


@endsection 