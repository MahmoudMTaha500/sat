@extends('website.app') @section('website.content')
<div class="bg-sub-secondary-color">
    <!-- Institutes Offer -->
    <section class="institutes-offer pt-5">
        <div class="container-fluid">
          <!-- Section Heading -->
          <div class="row px-xl-5">
            <div class="col-12">
              <div class="heading-institutes">
    
                <h3 class="text-main-color font-weight-bold">العروض</h3>
                <p>نسعى من خلال عقودنا واتفاقياتنا مع المعاهد والجامعات والمؤسسات الأكاديمية</p>
              </div>
            </div>
          </div>
          <!-- ./Section Heading -->
          <!-- Institute List -->
          <div class="row px-xl-4">
            @foreach ($offers as $offer)
                        <div class="col-xl-3 col-md-6">
                            <div class="card mx-xl-4 mx-2 shadow-sm offer border-0 institute-card rounded-10 mb-5">
                                <!-- Offer Icon -->
                                <div class="offer-icon position-absolute bg-secondary-color text-white">
                                    - {{$offer->discount*100}} %
                                </div>
                                <!-- Offer Icon -->
                                <!-- Add To Favourite Btn -->
                                @if (auth()->guard('student')->check())
                                    <div class="add-favourite position-absolute"  course-id="{{$offer->id}}">
                                        <i class="{{heart_type($offer)}} fa-heart favourite-icon"></i>
                                    </div>
                                @endif
                                <!-- ./Add To Favourite Btn -->
                                <div class="add-favourite position-absolute" course-id="{{$offer->id}}">
                                    <i @if(!auth()->guard('student')->check()) onclick="alert('يجب عليك تسجيل الدخول اولا')" @endif class="@if(auth()->guard('student')->check()) {{heart_type($offer)}} @else far @endif    fa-heart favourite-icon"></i>
                                </div>
                                <!-- Institute Img -->
                                <a href="{{route('website.institute' , [$offer->institute->id, $offer->institute->slug , $offer->slug])}}">
                                    <div class="institute-img d-inline-block position-relative">
                                        <img src="{{empty($offer->institute->getFirstMedia('institute_banner')) ? asset('/storage/default_images.png') : $offer->institute->getFirstMedia('institute_banner')->getUrl('thumb')}}" alt="{{$offer->institute->name_ar}}" alt="{{$offer->institute->name_ar}}" class="card-img-top" />
                                    </div>
                                </a>
                                <!-- ./Institute Img -->
                                <div class="card-body rounded-10 bg-white">
                                    <!-- Institute Title -->
                                    <h5 class="card-title"><a href="{{route('website.institute' , [$offer->institute->id, $offer->institute->slug ])}}" class="text-dark"> معهد {{$offer->institute->name_ar}} </a></h5>
                            <h6 class="card-title"><a href="{{route('website.institute' , [$offer->institute->id, $offer->institute->slug , $offer->slug])}}" class="text-main-color">{{$offer->name_ar}} </a></h6>
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
                                    <del class="text-muted del">{{round($offer->coursesPricePerWeek->price)}} ريال / أسبوع </del>
                                    <span class="float-left text-main-color">{{round($offer->coursesPricePerWeek->price*(1-$offer->discount)) }} ريال / أسبوع </span>
                                </div>
                                <!-- ./Course Price -->
                            </div>
                        </div>
                        @endforeach
                        
          </div>
            <div class="website-pagination">
                {{ $offers->links() }}
            </div>
          <!-- ./Institute List -->
    
        </div>
      </section>
      <!-- ./Institutes Offer -->
</div>

@endsection
