@extends('website.app') @section('website.content')
<!-- Confirm Reservation -->
<section class="confirm-reservation py-4 bg-sub-secondary-color">
    <div class="container-fluid">
        <!-- Section Heading -->
        <div class="row px-xl-5 mb-4">
            <div class="col-12">
                <div class="heading-institutes">
                    <h3 class="text-main-color font-weight-bold">تأكيد الحجز</h3>
                    <p class="mb-1">برجاء ادخل جميع البيانات لتأكيد حجزك وسيقوم فريق الموقع بالتواصل معك لتأكيد جميع التفاصيل لذا تأكد من صحة الجوال والبريد الإلكتروني</p>
                </div>
            </div>
        </div>
        <!-- ./Section Heading -->
        <div class="row px-xl-5">
            <div class="col-lg-8">
                <!-- Confirm Reservation Form -->
                <div class="bg-white p-xl-5 p-3 rounded-10 mb-4">
                    <form action="{{route('create_student_request')}}" method="post">
                        @csrf
                        <input type="hidden" name="course_details" value="{{json_encode($course_details)}}">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group rounded-10 border pl-3 pr-2 btn-light">
                                    <input value="{{old('name')}}" type="text" name="name" class="form-control border-0 bg-transparent @error('name') is-invalid @enderror" placeholder="الاسم كاملا *" />
                                </div>
                                @error('name') <span class="invalid-feedback d-block mb-3" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group rounded-10 border pl-3 pr-2 btn-light">
                                    <input value="{{old('email')}}" type="email" name="email" class="form-control border-0 bg-transparent @error('email') is-invalid @enderror" placeholder="البريد الإلكتروني *" />
                                </div>
                                @error('email') <span class="invalid-feedback d-block mb-3" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group rounded-10 border pl-3 pr-2 btn-light">
                                    <input value="{{old('phone')}}" type="text" name="phone" class="form-control border-0 bg-transparent @error('phone') is-invalid @enderror" placeholder="رقم الجوال *" />
                                </div>
                                @error('phone') <span class="invalid-feedback d-block mb-3" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group rounded-10 border pl-3 pr-2 btn-light">
                                    <input value="{{old('nationality')}}" type="text" name="nationality" class="form-control border-0 bg-transparent @error('nationality') is-invalid @enderror" placeholder="الجنسية *" />
                                </div>
                                @error('nationality') <span class="invalid-feedback d-block mb-3" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group rounded-10 border pl-3 pr-2 btn-light">
                                    <input value="{{old('country')}}" type="text" name="country" class="form-control border-0 bg-transparent @error('country') is-invalid @enderror" placeholder="الدولة *" />
                                </div>
                                @error('country') <span class="invalid-feedback d-block mb-3" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group rounded-10 border pl-3 pr-2 btn-light">
                                    <input value="{{old('city')}}" type="text" name="city" class="form-control border-0 bg-transparent @error('city') is-invalid @enderror" placeholder="المدينة *" />
                                </div>
                                @error('city') <span class="invalid-feedback d-block mb-3" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                            </div>
                            <div class="col-12">
                                <div class="form-group rounded-10 border pl-3 pr-2 btn-light">
                                    <input value="{{old('address')}}" type="text" name="address" class="form-control border-0 bg-transparent @error('address') is-invalid @enderror" placeholder="العنوان *" />
                                </div>
                                @error('address') <span class="invalid-feedback d-block mb-3" role="alert"> <strong>{{ $message }}</strong> </span> @enderror
                            </div>

                            <div class="col-12">
                                <div class="form-group btn-light rounded-10">
                                    <textarea name="note" class="form-control rounded-10" placeholder="أضف ملاحظاتك" rows="5"></textarea>
                                </div>
                            </div>
                            <div class="col-12">
                                <button class="btn bg-secondary-color text-white w-100 rounded-10" type="submit">
                                    تأكيد الحجز
                                </button>
                            </div>
                            <div class="col-12">
                                <button type="button" class="btn bg-secondary-color text-white w-100 rounded-10" data-toggle="modal" data-target="#successModal">
                                    اظهار
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- ./Confirm Reservation Form -->
            </div>
            <div class="col-lg-4">
                <!-- Course Details -->
                <div class="bg-white py-4 rounded-10 mb-4">
                    <div class="cost-heading border-bottom pb-2 px-3">
                        <h5 class="font-weight-bold text-main-color">تفاصيل الكورس والحجز</h5>
                    </div>
                    <div class="cost-body px-3 pt-3">
                        <p class="text-dark"><span class="font-weight-bold">تكلفة الكورس الإجمالية : </span> {{round($course_details['total_price'])}} دينار سعودي</p>
                        <p class="text-dark"><span class="font-weight-bold">أسم المعهد : </span> {{$course_details['institute_name']}}</p>
                        <p class="text-dark"><span class="font-weight-bold">اسم الكورس : </span> {{$course_details['course_name']}}</p>
                        <p class="text-dark"><span class="font-weight-bold">الموقع : </span> {{$course_details['country']}} - {{$course_details['city']}}</p>
                        <p class="text-dark"><span class="font-weight-bold">تاريخ بداية الكورس : </span> {{$course_details['started_date']}}</p>
                        @if ($course_details['airport'] != 0)
                        <p class="text-dark"><span class="font-weight-bold">الاستقبال : </span> {{$course_details['airport']['name_ar']}} - {{$course_details['airport']['price']}} دينار سعودي</p>
                        @endif @if ($course_details['residence'] != 0)
                        <p class="text-dark"><span class="font-weight-bold">تفاصيل السكن : </span> {{$course_details['residence']['name_ar']}} - {{$course_details['residence']['price']*$course_details['weeks'] }} دينار سعودي</p>
                        @endif @if ($course_details['insurance_price'] != 0)
                        <p class="text-dark"><span class="font-weight-bold">التامين : </span> {{$course_details['insurance_price']*$course_details['weeks']}} دينار سعودي</p>
                        @endif
                        <p class="text-dark"><span class="font-weight-bold">عدد الأسابيع : </span> {{$course_details['weeks']}} أسابيع</p>
                        <p class="text-dark"><span class="font-weight-bold">عدد الدروس : </span> {{$course_details['lessons_per_week']}} درس / أسبوع</p>
                        <p class="text-dark"><span class="font-weight-bold">عدد الساعات : </span> {{$course_details['hours_per_week']}} ساعة في الأسبوع</p>
                    </div>
                </div>

                <div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-body py-5 px-4 text-center">
                                <div class="cheched-img">
                                    <img src="imgs/checked.png" alt="" class="img-fluid" />
                                </div>
                                <div class="cheched-heading">
                                    <h3 class="text-main-color font-weight-bold">تم التسجيل بنجاح</h3>
                                    <p>لقد تم استلام طلبك بنجاح و سوف يقوم طاقم الموقع بالاتصال بك لمراجعة طلبك و تأكيد الحجز <a target="_blank" href="{{route('student_invoice')}}" class="text-secondary-color"> عرض السعر</a></p>
                                </div>
                                <div class="checked-btns">
                                    <a href="pay-now.html" class="btn bg-secondary-color text-white rounded-10 ml-3 px-3 mb-4">دفع الان</a>
                                    <a href="index.html" class="btn bg-white text-secondary-color border-secondary-color px-5 rounded-10 mb-4">الغاء</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ./Confirm Reservation -->
@endsection
