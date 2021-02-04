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
                            <li class="breadcrumb-item"><a href="{{route('institute.index')}}"> المعاهد</a></li>
                            <li class="breadcrumb-item active">تعديل معهد</li>
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
            @endif
            @if ($message = Session::get('error'))
            <div class="alert alert-danger alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>    
                <strong>{{ $message }}</strong>
            </div>
            @endif
            <div class="row justify-content-md-center">
                <div class="col-lg-10">
                    <div class="card" style="zoom: 1;">
                        <div class="card-header">
                            <h4 class="card-title" id="bordered-layout-card-center">تعديل معهد </h4>
                            <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                        </div>
                        <div class="card-content collpase show">
                            <div class="card-body">
                                <form class="form" action="{{route('institute.update',$institute->id)}}" method="POST" enctype="multipart/form-data" >
                                    @csrf
                                    @method('put')
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="institute-name">اسم المعهد</label>
                                                    <input type="text" id="institute-name" class="form-control" placeholder="ادخل اسم المعهد" name="name_ar"  value="{{$institute->name_ar}}"  required/>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="institute-about">نبذة عن المعهد</label>
                                                    <textarea type="text" id="institute-about" class="form-control" placeholder="نبذة عن المعهد" name="about_ar"  required> {{$institute->about_ar}}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <country-city-component 
                                            :countries_from_blade="{{ json_encode($countries) }}"
                                            :dahsboard_url="{{ json_encode(url('/dashboard')) }}"
                                            :country_id2="{{$institute->country_id}}"
                                            :city_id="{{$institute->city_id}}"
                                        >
                                        </country-city-component>
                                        <div class="row">
                                            <div class="col-md-6">
                                              <div class="form-group">
                                                <label for="projectinput4">التقييم</label>
                                                <div id="default-star-rating"></div>
                                              </div>
                                            </div>
                                            <div class="col-md-6">
                                              <div class="form-group">
                                                <label for="projectinput4">التقييم بواسطة سات</label>
                                                <input type="checkbox" id="switchery" class="switchery" checked/>
                                              </div>
                                            </div>
                                          </div>
                                        <div class="row">
                                            <div class="form-group col-12 mb-2 contact-repeater">
                                                <label>الاسئلة الخاصة بالمعهد</label>
                                                <div data-repeater-list="questionList">
                                                  @foreach($questions as $question)
                                                    <div class="input-group mb-1" data-repeater-item>
                                                        <input type="tel" placeholder="السؤال" class="form-control" name="questions" value="{{$question->question}}" required/>
                                                        <input type="tel" placeholder="الاجابة" class="form-control"  name="answer"    value="{{$question->answer}}" required/>
                                                        <span class="input-group-append" id="button-addon2">
                                                            <button class="btn btn-danger" type="button" data-repeater-delete><i class="ft-x"></i></button>
                                                        </span>
                                                    </div>
                                                    @endforeach
                                                </div>
                                                <button type="button" data-repeater-create class="btn btn-success btn-sm"><i class="ft-plus"></i> اضافة سؤال جديد</button>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="projectinput4">لوجو المعهد</label>
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" id="inputGroupFile01"  name="logo"  value="{{asset($institute->logo)}}"/>
                                                        <label class="custom-file-label" for="inputGroupFile01">اختر الصورة</label>
                                                    </div>
                                                    <div class="mt-1">
                                                        <img class="w-100" src="{{asset($institute->logo)}}" alt="">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group image-box-input">
                                                    <label for="projectinput4">صورة المعهد</label>
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input image-input" id="inputGroupFile01" name="panner" value="{{asset($institute->banner)}}" />
                                                        <label class="custom-file-label" for="inputGroupFile01">اختر الصورة</label>
                                                    </div>
                                                    <div class="mt-1 image-box">
<img class="w-100" src="{{asset($institute->banner)}}" alt="">
                                                        
</div>
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
        </div>
    </div>
</div>

@endsection