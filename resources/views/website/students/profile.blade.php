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
                <div class="bg-white rounded-10 py-4 shadow-sm">
                    <div class="profile-img pt-4 text-center position-relative mx-auto">
                        <img src="{{$student->profile_image == null ? asset('storage/default__user_image.jpg') : asset($student->profile_image)}}" alt="" class="img-fluid rounded-circle" />
                        <h6 class="text-main-color font-weight-bold mt-2">{{$student->name}}</h6>
                    </div>
                    <ul class="list-group list-group-flush p-0 border-0">
                        <li class="list-group-item py-3 border-bottom active"><a href="profile.html" class="text-dark">البيانات الشخصية</a></li>
                        <li class="list-group-item py-3 border-bottom"><a href="favourite.html" class="text-dark">المفضلة</a></li>
                        <li class="list-group-item py-3 border-bottom"><a href="reservation.html" class="text-dark">الحجوزات</a></li>
                        <li class="list-group-item py-3"><a href="notification.html" class="text-dark">الاشعارات</a></li>
                    </ul>
                </div>
            </div>
            <!-- ./Side Nav -->
            <div class="col-lg-9">
                <!-- Section Heading -->
                <h5 class="text-main-color font-weight-bold mb-4">البيانات الشخصية</h5>
                <!-- ./Section Heading -->
                <div class="bg-white shadow-sm p-xl-5 px-3 py-5 rounded-10">
                    <form action="{{route('update.student.profile')}}" method="post"  enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="student_id" value="{{$student->id}}">
                        <div class="row">
                            <div class="col-lg-8 col-md-6">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label> الاسم</label>
                                            <input type="text" class="form-control rounded-10 @error('name') is-invalid @enderror" name="name" value="{{$student->name}}" />
                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label> البريد الالكتروني</label>
                                            <input type="text" class="form-control rounded-10 @error('email') is-invalid @enderror" name="email" value="{{$student->email}}" />
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label> الهاتف</label>
                                            <input type="text" class="form-control rounded-10 @error('phone') is-invalid @enderror" name="phone" value="{{$student->phone}}" />
                                            @error('phone')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
        
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label> الجنسية</label>
                                            <input type="text" name="nationality" class="form-control rounded-10 @error('nationality') is-invalid @enderror" value="{{$student->nationality}}" />
                                            @error('nationality')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label> الدولة</label>
                                            <input type="text" class="form-control rounded-10 @error('country') is-invalid @enderror" name="country" value="{{$student->country}}" />
                                            @error('country')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label> المدينة</label>
                                            <input type="text" class="form-control rounded-10 @error('city') is-invalid @enderror" name="city" value="{{$student->city}}" />
                                            @error('city')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label> العنوان</label>
                                            <input type="text" class="form-control rounded-10 @error('address') is-invalid @enderror" name="address" value="{{$student->address}}" />
                                            @error('address')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <show-images-component
                                    :image_name="{{json_encode("profile_image")}}"
                                    :image_label="{{json_encode("الصورة الشخصية")}}"
                                    :old="{{json_encode($student->profile_image == null ? asset('storage/default__user_image.jpg') : asset($student->profile_image))}}"
                                ></show-images-component>
                                @error('profile_image')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="oveflow-hidden">
                                    <button type="submit" class="btn rounded-10 bg-secondary-color text-center text-white float-left px-5">حفظ</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ./Profile -->

@endsection
