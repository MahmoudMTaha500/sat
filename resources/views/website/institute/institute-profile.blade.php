@extends('website.app') @section('website.content')
<!-- Institute Info -->
<section class="institute-info py-4 bg-sub-secondary-color">
    <div class="container-fluid">
        <!-- Section Heading -->
        <div class="row px-xl-5 mb-4">
            <div class="col-12">
                <div class="heading-institutes">
                    <h3 class="text-main-color font-weight-bold">{{$institute->name_ar}}</h3>
                    <p class="mb-1">
                        <i class="fas fa-map-marker-alt text-main-color"></i>
                        {{$institute->country->name_ar}} - {{$institute->city->name_ar}}
                    </p>
                    <!-- Institute Rate -->
                    <p class="mb-0"><span class="starrr" ratio="{{institute_rate($institute)}}"></span> {{institute_rate($institute)}}</p>
                    <!-- ./Institute Rate -->
                </div>
            </div>
        </div>
        <!-- ./Section Heading -->
        <div class="row px-xl-5 mx-xl-2">
            <div class="col-12 px-0">
                <!-- Institute Imgs -->
                <div class="institute-imgs owl-carousel" id="institute-imgs">
                    <div class="profile-institute-img"><img src="{{asset($institute->banner)}}" alt="{{asset($institute->name_ar)}}" class="img-fluid w-100 d-block" /></div>
                </div>
                <!-- ./Institute Imgs -->
            </div>
        </div>
        <div class="row px-xl-5 mt-5">
            <div class="col-lg-8">
                <!-- Tabs -->
                <ul class="nav nav-tabs bg-white border-0 rounded-10 nav-justified p-0 mb-3" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link font-weight-bold rounded-0 text-dark border-0 py-3 px-md-0 px-5 active" id="about-course-tab" data-toggle="tab" href="#about-course" role="tab" aria-controls="about-course" aria-selected="true">
                            تفاصيل الكورس
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link font-weight-bold rounded-0 text-dark border-0 py-3 px-md-0 px-5" id="brief-institute-tab" data-toggle="tab" href="#brief-institute" role="tab" aria-controls="brief-institute" aria-selected="false">
                            نبذه عن المعهد
                        </a>
                    </li>
                    {{--
                    <li class="nav-item">
                        <a class="nav-link font-weight-bold rounded-0 text-dark border-0 py-3 px-md-0 px-5" id="living-tab" data-toggle="tab" href="#living" role="tab" aria-controls="living" aria-selected="false">المعيشة</a>
                    </li>
                    --}}
                    <li class="nav-item">
                        <a class="nav-link font-weight-bold rounded-0 text-dark border-0 py-3 px-md-0 px-5" id="training-tab" data-toggle="tab" href="#training" role="tab" aria-controls="training" aria-selected="false">الدورات التدريبية</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link font-weight-bold rounded-0 text-dark border-0 py-3 px-md-0 px-5" id="rate-tab" data-toggle="tab" href="#rate" role="tab" aria-controls="rate" aria-selected="false">التقييمات</a>
                    </li>
                </ul>

                @error('login_error')
                <div class="alert alert-danger text-center">
                    {{ $message }}
                </div>
                @enderror @if (auth()->guard('student')->check()) @include('admin.includes.errors') @endif @if (session()->has('alert_message'))
                <div class="alert alert-success text-center">
                    {{session()->get('alert_message')}}
                </div>
                @endif

                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="about-course" role="tabpanel" aria-labelledby="about-course-tab">
                        <!-- About Course Tab -->
                        <div class="bg-white rounded-10 p-4">
                            <h5 class="text-main-color font-weight-bold mb-3">{{$course->name_ar}}</h5>
                            <p class="mb-3">{!! $course->about_ar !!}</p>
                            <div class="row mt-5">
                                @if ($course->min_age !=null)
                                    <div class="course-include d-inline-block mb-4 col-md-4 col-6">
                                        <div class="include-img d-inline-block">
                                            <i class="fas fa-user text-main-color fa-lg position-relative"></i>
                                        </div>
                                        <div class="include-info d-inline-block pr-3">
                                            <p class="mb-2">الحد الأدنى للعمر</p>
                                            <p class="text-main-color font-weight-bold">{{$course->min_age}}</p>
                                        </div>
                                    </div>
                                    @endif @if ($course->hours_per_week !=null)
                                    <div class="course-include d-inline-block mb-4 col-md-4 col-6">
                                        <div class="include-img d-inline-block">
                                            <i class="fas fa-clock text-main-color fa-lg position-relative"></i>
                                        </div>
                                        <div class="include-info d-inline-block pr-3">
                                            <p class="mb-2">ساعات/أسبوع</p>
                                            <p class="text-main-color font-weight-bold">{{$course->hours_per_week}}</p>
                                        </div>
                                    </div>
                                    @endif
                                    <div class="course-include d-inline-block mb-4 col-md-4 col-6">
                                        <div class="include-img d-inline-block">
                                            <i class="fas fa-calendar-plus text-main-color fa-lg position-relative"></i>
                                        </div>
                                        <div class="include-info d-inline-block pr-3">
                                            <p class="mb-2">يبدأ الكورس كل</p>
                                            <p class="text-main-color font-weight-bold">الاثنين</p>
                                        </div>
                                    </div>
                                    @if ($course->required_level !=null)
                                        <div class="course-include d-inline-block mb-4 col-md-4 col-6">
                                            <div class="include-img d-inline-block">
                                                <i class="fas fa-signal text-main-color fa-lg position-relative"></i>
                                            </div>
                                            <div class="include-info d-inline-block pr-3">
                                                <p class="mb-2">المستوى المطلوب</p>
                                                <p class="text-main-color font-weight-bold">{{$course->required_level}}</p>
                                            </div>
                                        </div>
                                    @endif
                                    @if ($course->study_period !=null)
                                   
                                        <div class="course-include d-inline-block mb-4 col-md-4 col-6">
                                            <div class="include-img d-inline-block">
                                                <i class="fas fa-sun text-main-color fa-lg position-relative"></i>
                                            </div>
                                            <div class="include-info d-inline-block pr-3">
                                                <p class="mb-2">وقت الدراسة</p>
                                                <p class="text-main-color font-weight-bold">{{$course->study_period == 'morning' ? 'صباحي' : 'مسائي'}}</p>
                                            </div>
                                        </div>
                                    @endif
                                    @if ($course->lessons_per_week !=null)
                                   
                                        <div class="course-include d-inline-block mb-4 col-md-4 col-6">
                                            <div class="include-img d-inline-block">
                                                <i class="fas fa-book-open text-main-color fa-lg position-relative"></i>
                                            </div>
                                            <div class="include-info d-inline-block pr-3">
                                                <p class="mb-2">درس/الأسبوع</p>
                                                <p class="text-main-color font-weight-bold">{{$course->lessons_per_week}}</p>
                                            </div>
                                        </div>
                                    @endif
                            </div>
                        </div>
                        <!-- ./About Course Tab -->
                    </div>
                    <div class="tab-pane fade" id="brief-institute" role="tabpanel" aria-labelledby="brief-institute-tab">
                        <!-- Brief Institute Tab -->
                        <div class="bg-white rounded-10 p-4 mb-4">
                            <h5 class="text-main-color font-weight-bold mb-3">{{$institute->name_ar}}</h5>
                            <p class="mb-3">{{$institute->about_ar}}</p>
                        </div>
                        <!-- Map -->
                        <div class="bg-white rounded-10 p-4 mb-4">
                            <h5 class="text-main-color font-weight-bold mb-3">موقع المعهد</h5>
                            <p class="mb-3"><i class="fas fa-map-marker-alt text-main-color ml-3"></i> {{$institute->country->name_ar}} - {{$institute->city->name_ar}}</p>
                            {!! $institute->map !!}
                        </div>
                        <!-- ./Brief Institute Tab -->
                    </div>
                    {{--
                    <div class="tab-pane fade" id="living" role="tabpanel" aria-labelledby="living-tab">
                        <!-- Living Tab -->
                        <div class="bg-white rounded-10 p-4 mb-4">
                            <img src="imgs/living.png" alt="" class="w-100 rounded-10" />
                            <h5 class="text-main-color font-weight-bold my-3">معلومات عن المعيشة في نيويورك</h5>
                            <p class="mb-3">
                                مع أكثر من 80 عاماً من الخبرة في مجال تعليم اللغات، تدياسأل سكان أبو ظبي عن الأشياء التي يفضلونها، وستحصل على عشرات الإجابات المختلفة، وهذا يتوقف على الحي الذي يعيشون فيه وطبيعة الطقس في ذاك اليوم. ومن الصعب
                                قليلًا تحديد سمات سكان ابوظبي لأن لديهم الكثير من الأنشطة التي يقومون بها، مثل التجول في الشوارع ذات التراث الاستعماري المرصوفة بالحصى، وتشجيع الفرق الرياضية، وغيرها من الأنشطة المجانية.وتعتبر بوسطن واحدة من
                                أقدم المدن في الولايات المتحدة الأمريكية، وقد أسسها المستعمرون البيوريتان الإنجليز البروتستانت عام 1630، وتشتهر عمارتها بمزيج من الهندسة الحديثة والطرز القديمة. علاوة على
                                <a href="" class="text-secondary-color">.. قراءة المزيد</a>
                            </p>

                            <a href="" class="btn bg-secondary-color font-weight-bold text-white rounded-10">عرض جميع معاهد نيويورك</a>
                            <a href="" class="btn bg-white px-5 mr-3 font-weight-bold border-secondary-color text-secondary-color rounded-10">دول أخــرى</a>
                        </div>
                        <!-- ./Living Tab -->
                    </div>
                    --}}
                    <div class="tab-pane fade" id="training" role="tabpanel" aria-labelledby="training-tab">
                        <!-- Other Courses -->
                        <div class="row">
                            @foreach ($institute->courses as $institute_course) @if ($institute_course->id != $course->id)
                            <div class="col-lg-4 px-0">
                                <!-- Course -->
                                <div class="card mx-xl-4 shadow-sm offer border-0 institute-card rounded-10 mb-5">
                                    <!-- Institute Img -->
                                    <img src="{{asset($institute->banner)}}" class="card-img-top" alt="..." />
                                    <!-- ./Institute Img -->
                                    <div class="card-body rounded-10 bg-white">
                                        <!-- Course Title -->
                                        <h5 class="card-title"><a href="{{route('website.institute' , [$institute->id, $institute->slug , $institute_course->slug])}}" class="text-main-color"> {{$institute_course->name_ar}}</a></h5>
                                        <!-- ./Course Title -->

                                        <!-- Course Time And Level -->
                                        <p class="mb-0 overflow-hidden">
                                            @if ($institute_course->study_period != null)
                                                <span class="float-right"><i class="fas fa-sun text-main-color"></i> {{$institute_course->study_period}}</span>
                                            @endif
                                            @if ($institute_course->required_level != null)
                                                <span class="float-left"> <i class="fas fa-signal text-main-color"></i> {{$institute_course->required_level}}</span>
                                            @endif
                                        </p>
                                        <!-- ./Course Time And Level -->
                                    </div>
                                    <!-- Course Price -->
                                    <div class="card-footer bg-white overflow-hidden">
                                        <span class="float-left text-main-color">{{$institute_course->coursesPricePerWeek->price}} / أسبوع </span>
                                    </div>
                                    <!-- ./Course Price -->
                                </div>
                                <!-- ./Course -->
                            </div>
                            @endif @endforeach
                        </div>
                        <!-- ./Other Courses -->
                    </div>
                    <div class="tab-pane fade" id="rate" role="tabpanel" aria-labelledby="rate-tab">
                        <!-- Course Rate Tab -->

                        <div class="bg-white rounded-10 py-4 mb-4">
                            @foreach ($institute->approved_rates as $rate)
                            <div class="border-bottom mt-3">
                                <div class="row px-4">
                                    <div class="col-lg-2 col-4">
                                        <img src="{{$rate->student->profile_image == null ? asset('storage/default_images.png') : $rate->student->profile_image}}" alt="{{$rate->student->name}}" class="img-fluid rounded-pill img-user" />
                                    </div>
                                    <div class="col-lg-10 col-8">
                                        <h5 class="text-main-color">{{$rate->student->name}}</h5>
                                        <p>
                                            <span class="starrr" ratio="{{$rate->rate}}"></span> <small class="text-muted pr-3">{{ArabicDate($rate->created_at)}}</small>
                                            <small class="text-muted pr-3">{{$rate->student->single_course_request->course->name_ar}} - {{$rate->student->single_course_request->course->institute->name_ar}}</small>
                                        </p>
                                        <p>
                                            {{$rate->review}}
                                        </p>
                                    </div>
                                </div>
                            </div>
                            @endforeach {{--
                            <div class="text-center p-3">
                                <a href="" class="text-secondary-color font-weight-bold">المزيد من التقيمات</a>
                            </div>
                            --}}
                        </div>
                        <div class="bg-white rounded-10 p-4 mb-4">
                            <h5 class="text-main-color font-weight-bold">أضف تقييم</h5>
                            <p class="starrr add-rate"></p>
                            <form method="POST" action="{{route('institutes.add.review')}}">
                                @csrf
                                <input type="hidden" name="institute_id" value="{{$institute->id}}" />
                                <input type="hidden" name="rate" class="add-rate-field" />
                                <div class="form-group btn-light rounded-10">
                                    <textarea name="review" class="form-control bg-transparent rounded-10" placeholder="اكتب تعليقك" rows="5"></textarea>
                                </div>
                                <div class="text-left">
                                    <button class="btn bg-secondary-color text-white">أضافة التقييم</button>
                                </div>
                            </form>
                        </div>
                        <!-- ./Course Rate Tab -->
                    </div>
                </div>
                <!-- ./Tabs -->
            </div>
            <div class="col-lg-4">
                @error('from_date')
                <div class="alert alert-danger text-center">
                    {{ $message }}
                </div>
                @enderror @error('weeks')
                <div class="alert alert-danger text-center">
                    {{ $message }}
                </div>
                @enderror 
                <course-price-info-component
                    course_obj = '{{$course}}'
                    residence_obj = '{{$course->institute->residence}}'
                    airport_obj = '{{$course->institute->airport}}'
                    course_id = '{{$course->id}}'
                    course_for_institute_page_url = {{route('vue.get.course.for.institute.page')}}
                    get_course_price_url = {{route('vue.get.course.price.per.week')}}
                    get_insurance_price_url = {{route('vue.get.insurance.price.per.week')}}
                    save_request_url = {{route('student_requests.confirm_reservation')}}
                    csrf_token =  "{{csrf_token()}}"
                >
                </course-price-info-component>
            </div>
        </div>
    </div>
</section>
<!-- ./Institute Info -->
@endsection
