@extends('admin.app')
 @section('admin.content')
<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2">
                <h3 class="content-header-title">قسم التاشيرات</h3>
                <div class="row breadcrumbs-top">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">لوحة التحكم</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('visas.index') }}">التاشيرات</a></li>
                            <li class="breadcrumb-item active">تعديل تاشيرة</li>
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
                            <h4 class="card-title" id="bordered-layout-card-center">تعديل  التاشيرة </h4>
                            <a href="/sat/courses/create.php" class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                        </div>
                        <div class="card-content collpase show">
                            <div class="card-body">
                                <form class="form" action="{{route('visas.update',$visa->id)}}" method="POST">
                                    @csrf
                                    @method('put')
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="projectinput2"> تصنيف التاشيرة</label>
                                                    <select class="select2 form-control text-left" name="category_id" required>
                                                        <option value="" selected disabled>اختر التاشيرة</option>
                                                        @foreach($visaCategory as $cat)
                                                        <option value="{{$cat->id}}" @if($cat->id == $visa->category->id) echo selected @endif>{{$cat->name_ar}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="projectinput2"> الدوله</label>
                                                    <select class="select2 form-control text-left" name="country_id" required>
                                                        <option value="" selected disabled>اختر الدوله</option>
                                                        @foreach($countries as $country)
                                                        <option value="{{$country->id}}" @if($country->id == $visa->country->id) echo selected @endif >{{$country->name_ar}} </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="projectinput2"> سعر التاشيرة</label>
                                                    <input type="number" class="form-control" name="price" required value="{{$visa->price}}" />
                                                </div>
                                            </div>
                                            <div class="col-md-6"></div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-12 mb-2 contact-repeater">
                                                <label for="projectinput3">اضافة اسئله الي التاشيرة </label>
                                                <div class="repeated-dev-box">
                                                    <div class="repeated-dev">
                                                        @foreach($VisaQuestion as $question)
                                                        <div class="repeated-el">

                                                            <div class="input-group mb-1">
                                                                <input type="tel" name="priority[]" placeholder="الاولوية" class="form-control visa-question" id="example-tel-input" value="{{$question->priority}}" />
                                                                <select name="visa_question_type[]" class="form-control text-left visa-question-type">
                                                                    <option value="">اختر نوع السؤال</option>
                                                                    <option value="name" @if($question->field_type == "name") echo selected @endif >اسم</option>
                                                                    <option value="email" @if($question->field_type == "email") echo selected @endif>بريد إلكتروني</option>
                                                                    <option value="phone" @if($question->field_type == "phone") echo selected @endif>هاتف</option>
                                                                    <option value="text" @if($question->field_type == "text") echo selected @endif>نص </option>
                                                                    <option value="long_text" @if($question->field_type == "long_text") echo selected @endif>نص كبير </option>
                                                                    <option value="select" @if($question->field_type == "select") echo selected @endif>متعدد الخيارات </option>
                                                                    <option value="file" @if($question->field_type == "file") echo selected @endif>ملف </option>
                                                                </select>
                                                                @php
                                                                
                                                                $choices = ''; 
                                                                foreach($question->question_choices as $index => $qc){ 
                                                                    if($index==0){
                                                                         $choices .=$qc->choice_ar; 
                                                                        }else{ 
                                                                            $choices .=','.$qc->choice_ar;
                                                                         } 

                                                                        }
                                                                 @endphp
                                                                 @if ($question->field_type == "select")
                                                                 <input value="{{$choices}}" name="visa_question_select[]" class="form-control  visa-question-select" type="text" placeholder="قم بفصل الخيارات بعلامة الفاصلة (,)" > 
                                                                @else
                                                                <input value="{{$choices}}" style="display:none" name="visa_question_select[]" class="form-control  visa-question-select" type="text" placeholder="قم بفصل الخيارات بعلامة الفاصلة (,)" > 
                                                                 @endif
                                                                

                                                                <input name="visa_question[]" type="tel" placeholder="اكتب السؤال" class="form-control visa-question" id="example-tel-input" value="{{$question->question_ar}}" />
                                                                <span class="input-group-append" id="button-addon2">
                                                                    <button class="btn btn-danger repeated-close-btn" type="button"><i class="ft-x"></i></button>
                                                                </span>
                                                            </div>
                                                          </div>
                                                        @endforeach 
                                                    </div>
                                                    <button type="button" class="btn btn-primary visa-repeated-btn"><i class="ft-plus"></i> اضافة سؤال جديد</button>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-actions center">
                                            <button type="submit" class="btn btn-primary w-100"><i class="la la-check-square-o"></i> حفظ</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--/ Recent Transactions -->
        </div>
    </div>

    @endsection
</div>
