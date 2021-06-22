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
                <h5 class="text-main-color font-weight-bold mb-4">البيانات الشخصية</h5>
                <!-- ./Section Heading -->
                <div class="bg-white shadow-sm p-xl-5 px-3 py-5 rounded-10">
                    @if (session()->has('alert_message'))
                        <div class="alert alert-success text-center">
                            {{session()->get('alert_message')}}
                        </div>
                    @endif
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
                                    <div class="col-12">
                                        <hr>
                                        <h4>وضع كلمة مرور جديدة</h4>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label> كلمة المرور</label>
                                            <input type="password" class="form-control rounded-10 @error('password') is-invalid @enderror" name="password" />
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label> تاكيد كلمة المرور</label>
                                            <input type="password" class="form-control rounded-10 @error('password_confirmation') is-invalid @enderror" name="password_confirmation" value="{{$student->password_confirmation}}" />
                                            @error('password_confirmation')
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
