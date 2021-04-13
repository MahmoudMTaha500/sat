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
                <div class="heading overflow-hidden mb-4">
                    <span class="text-main-color font-weight-bold h5 d-inline-block pt-2">
                        الحجوزات
                    </span>
                </div>
                <!-- ./Section Heading -->
                <!-- Reservation List -->
                <div class="reservation-list">
                    @foreach ($requests as $request)
                    <div class="accordion mb-4" id="reservation-1">
                        <div class="card rounded-10 border-0">
                            {{-- <div class="card-header bg-white border-0" id="reservationHeading-{{$request->id}}">
                                <h6 class="mb-0">
                                    <p class="text-main-color font-weight-bold mb-0 py-2" type="button" data-toggle="collapse" data-target="#reservationCollapse-{{$request->id}}" aria-expanded="true" aria-controls="reservationCollapse-1">
                                        دورة انجليزي مكثف <span class="float-left text-secondary-color"><i class="fas fa-chevron-down"></i></span>
                                    </p>
                                </h6>
                            </div> --}}

                            <div id="reservationCollapse-{{$request->id}}" class="collapse show" aria-labelledby="reservationHeading-{{$request->id}}" data-parent="#reservation-1">
                                <div class="card-body">
                                    <p><span class="font-weight-bold">أجمالي تكاليف الدورة :</span> {{$request->total_price}} ريال سعودي</p>
                                    <p><span class="font-weight-bold">أسم المعهد :</span> معهد {{$request->course->institute->name_ar}}</p>
                                    <p><span class="font-weight-bold">الدولة :</span>{{$request->course->institute->country->name_ar}}</p>
                                    <p><span class="font-weight-bold">المدينة :</span>{{$request->course->institute->city->name_ar}}</p>
                                    <p><span class="font-weight-bold">تاريخ الحجز :</span>{{ArabicDate($request->created_at)}}</p>
                                    <div class="overflow-hidden">
                                        <a href="reservation-details.html" class="btn float-left bg-secondary-color text-white rounded-10">تفاصيل الدورة</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <!-- ./Reservation List -->
            </div>
        </div>
    </div>
</section>
<!-- ./Profile -->

@endsection
