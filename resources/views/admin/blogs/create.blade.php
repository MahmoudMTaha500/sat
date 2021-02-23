@extends('admin.app') @section('admin.content')
<div class="app-content content vue-app">
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2">
                <h3 class="content-header-title">قسم المقالات</h3>
                <div class="row breadcrumbs-top">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">لوحة التحكم</a></li>
                            <li class="breadcrumb-item"><a href="{{route('blogs.index')}}"> المقالات</a></li>
                            <li class="breadcrumb-item active">اضافة مقال</li>
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
                            <h4 class="card-title" id="bordered-layout-card-center">اضافة مقال جديد</h4>
                            <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                        </div>
                        <div class="card-content collpase show">
                            <div class="card-body">
                                @include('admin.includes.errors')

                                <form class="form" action="{{route('blogs.store')}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-lg-8">
                                                <div class="form-group">
                                                    <label for="projectinput1">العنوان</label>
                                                    <input type="text" id="eventRegInput1" class="form-control" placeholder="ادخل اسم المعهد" name="title_ar" />
                                                </div>
                                                <div class="form-group">
                                                    <label for="projectinput4">المحتوى</label>
                                                    <textarea name="content_ar" id="ckeditor" cols="30" rows="20" class="ckeditor"> </textarea>
                                                </div>
                                                
                                              
                                            </div>
                                          
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label for="projectinput2">التصنيف</label>
                                                    <select  name="category_id" class="select2 form-control text-left">
                                                        <option value="" selected="" disabled="">اختر التصنيف</option>
                                                       
                                                          
    
                                                            @foreach($BlogCategories as $category)
    
                                                            <option value="{{$category->id}}">{{$category->name_ar}}</option>
    
                                                            @endforeach
                                                        
                                                    </select>
                                                </div>
                                                <country-city-blog-component 
                                            :countries_from_blade="{{ json_encode($countries) }}"
                                            :dahsboard_url="{{ json_encode(url('/dashboard')) }}"
                                        >
                                        </country-city-blog-component>
                                                <div class="form-group">
                                                    <label for="projectinput2">المعهد</label>
                                                    <select class="select2 form-control text-left" name="institute_id">
                                                        <option value=""  >اختر المعهد</option>

                                                        @foreach($Institutes as $institute)

                                                        <option value="{{$institute->id}}">{{$institute->name_ar}}</option>

                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="projectinput4">صورة المقال</label>
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" id="inputGroupFile01" name='banner' />
                                                        <label class="custom-file-label" for="inputGroupFile01">اختر الصورة</label>
                                                    </div>
                                                    <div class="mt-3">
                                                        <img class="w-100" src="{{url('admin')}}/app-assets/images/crop-pic.jpg" alt="" />
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
