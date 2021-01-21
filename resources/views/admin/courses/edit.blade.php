@extends('admin.app') @section('admin.content')
<div class="app-content content vue-app">
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2">
                <h3 class="content-header-title">قسم المعاهد</h3>
                <div class="row breadcrumbs-top">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">لوحة التحكم</a></li>
                            <li class="breadcrumb-item"><a href="{{route('courses.index')}}"> الدورات</a></li>
                            <li class="breadcrumb-item active"> تعديل الدورة</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">
            @if ($message = Session::get('success'))
            <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ $message }}</strong>
            </div>
            @endif @if ($message = Session::get('error'))
            <div class="alert alert-danger alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ $message }}</strong>
            </div>
            @endif
            <div class="row justify-content-md-center">
                <div class="col-lg-10">
                    <div class="card" style="zoom: 1;">
                        <div class="card-header">
                            <h4 class="card-title" id="bordered-layout-card-center">تعديل الدورة </h4>
                            <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                        </div>
                        <div class="card-content collpase show">
                            <div class="card-body">
                                <form class="form" method="POST" action="{{route('courses.update',$course->id)}}">
                                    @csrf
                                    @method('put')
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="projectinput1">اسم الدورة</label>
                                                    <input type="text" id="projectinput1" class="form-control" placeholder="ادخل اسم الدورة" name="name_ar" required  value="{{$course->name_ar}}"/>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="projectinput2">المعهد</label>
                                                    <select class="select2 form-control text-left" name="institute_id" required>
                                                        <option value=""  >اختر المعهد</option>

                                                        @foreach($institutes as $institute)

                                                        <option value="{{$institute->id}}" @if($institute->id == $course->institute_id) echo selected @endif>{{$institute->name_ar}}</option>

                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="projectinput1">الحد الأدنى للعمر </label>
                                                    <input type="number" id="projectinput1" min="1" class="form-control" placeholder="ادخل الحد الادني" name="min_age" value="{{$course->min_age}}" required />
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    {{-- <startdate-component></startdate-component>
                                                         --}}

                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                          


                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="projectinput2">وقت الدراسة</label>
                                                    <select class="form-control text-left" name="study_period" required>
                                                        <option   @if($course->study_period == "صباحي") echo selected @endif  value=" صباحي">صباحي</option>
                                                        <option  @if($course->study_period == "مسائي") echo selected @endif  value="مسائي">مسائي</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="projectinput1">درس/الأسبوع </label>
                                                    <input type="number" id="projectinput1" min="1" class="form-control" placeholder="درس/الأسبوع" name="lessons_per_week" value="{{$course->lessons_per_week}}" required />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="projectinput1">ساعات/أسبوع </label>
                                                    <input type="number" id="projectinput1" min="1" class="form-control" placeholder="ساعات/أسبوع" name="hours_per_week"  value="{{$course->hours_per_week}}" required/>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="projectinput2">المستوى المطلوب</label>
                                                    <select class="form-control text-left " name="required_level" required>
                                                        <option   @if($course->required_level == "مبتدئ") echo selected @endif  value=" مبتدئ ">مبتدئ</option>
                                                        <option   @if($course->required_level == "متوسط") echo selected @endif value=  "     متوسط "   >متوسط</option>
                                                        <option  @if($course->required_level == "متقدم") echo selected @endif value="  متقدم  ">متقدم</option>
                                                    </select>
                                                </div>
                                        </div>
                                        <div class="row">
                                          
                                          
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="projectinput3">وصف الدورة</label>
                                                    <textarea type="text" id="projectinput3" rows="20" class="form-control" placeholder="اضف وصف للدورة" name="desc" required>{{$course->about_ar}}</textarea>
                                                </div>
                                            </div>
                                          
                                        </div>
                                        <div class="form-group col-12 mb-2 contact-repeater">
                                            <label for="projectinput3">سعر الكورس</label>
                                            <div data-repeater-list="coures_price">
                                              @foreach($course_prices as $price)
                                                <div class="input-group mb-1" data-repeater-item>
                                                    <input type="tel" placeholder="عدد الاسابيع" class="form-control" id="example-tel-input"  name="num_of_weeks" required  value="{{$price->weeks}}"/>
                                                    <input type="tel" placeholder="السعر لكل اسبوع" class="form-control" id="example-tel-input" name="preice_per_week"  required  value="{{$price->price}}"/>
                                                    <span class="input-group-append" id="button-addon2">
                                                        <button class="btn btn-danger" type="button" data-repeater-delete><i class="ft-x"></i></button>
                                                    </span>
                                                </div>
                                                @endforeach
                                            </div>
                                            <button type="button" data-repeater-create class="btn btn-primary"><i class="ft-plus"></i> اضافة سعر جديد</button>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="projectinput3">التخفيض</label>
                                                        <input type="number" id="projectinput1" min="1" class="form-control" placeholder="00%" name="discount" value="{{$course->discount}}" />
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-actions center">
                                                <button type="submit" class="btn btn-primary w-100"><i class="la la-check-square-o"></i> حفظ</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
