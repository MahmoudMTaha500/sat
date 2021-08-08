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
                            <li class="breadcrumb-item active">اضافة معهد</li>
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
                            <h4 class="card-title" id="bordered-layout-card-center">اضافة معهد جديد</h4>
                            <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                        </div>
                        <div class="card-content collpase show">
                            <div class="card-body">
                                @include('admin.includes.errors')
                                <form class="form" action="{{route('institute.store')}}" method="POST" enctype="multipart/form-data" >
                                    @csrf
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="institute-name">اسم المعهد</label>
                                                    <input type="text" id="institute-name" class="form-control" placeholder="ادخل اسم المعهد" name="name_ar" value="{{old('name_ar')}}" />
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="institute-about">نبذة عن المعهد</label>
                                                    <textarea type="text" id="institute-about" class="form-control" placeholder="نبذة عن المعهد" name="about_ar" >{{old('about_ar')}}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <country-city-component 
                                            :countries_from_blade="{{ json_encode($countries) }}"
                                            :dahsboard_url="{{ json_encode(url('/dashboard')) }}"
                                            :old_country_id="{{json_encode(Session::getOldInput('country_id'))}}"
                                            :old_city_id="{{json_encode(Session::getOldInput('city_id'))}}"

                                        >
                                        </country-city-component>
                                        <div class="row">
                                            <div class="col-md-12">

                                            <div class="form-group">
                                                <label for="projectinput4">الاسئله</label>
                                                <textarea name="institute_questions" id="ckeditor" cols="30" rows="20" class="ckeditor">{{old('institute_questions')}} </textarea>
                                            </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <show-images-component
                                                :image_name="{{json_encode("logo")}}"
                                                :image_label="{{json_encode("اللوجو")}}"
                                                :old="{{json_encode(old('logo'))}}"
                                                ></show-images-component>
                                            </div>
                                            <div class="col-md-6">
                                                <show-images-component
                                                :image_name="{{json_encode("banner")}}"
                                                :image_label="{{json_encode("صورة الباننر")}}"
                                                :old="{{json_encode(old('banner'))}}"
                                                ></show-images-component>
                                            </div>
                                        </div>
                                        <div class="row">
                                        <div  class="col-md-12">
                                            <div class="form-group">
                                                <label for="institute-name"> الموقع</label>
                                                <input type="text" id="institute-map" class="form-control" placeholder="ادخل  الموقع" name="map" value="{{old('map')}}" />
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <hr>
                                            <h4 class="mt-5 mb-2 text-black">حقول ال SEO</h4>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput1">بديل صورة اللوجو</label> 
                                                        <input type="text" placeholder="ادخل اسم بديل للصورة " name="logo_alt" value="{{old('logo_alt')}}" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput1">بديل صورة الباننر</label> 
                                                        <input type="text" placeholder="ادخل اسم بديل للصورة " name="banner_alt" value="{{old('banner_alt')}}" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput1">title tage</label> 
                                                        <input type="text" placeholder="ادخل title tage " name="title_tag" value="{{old('title_tag')}}" class="form-control">
                                                    </div>
                                                    
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput1">الكلمات  المفتاحية</label> 
                                                        <input type="text" placeholder="ادخل الكلمات المفتاحية " name="meta_keywords" value="{{old('meta_keywords')}}" class="form-control">
                                                    </div>
                                                    
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput1">وصف الصفحة</label> 
                                                        <input type="text" placeholder="ادخل meta description" name="meta_description" value="{{old('meta_description')}}" class="form-control">
                                                    </div>
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
