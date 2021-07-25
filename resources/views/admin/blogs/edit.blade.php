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
                            <li class="breadcrumb-item active">تعديل مقال</li>
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
                            <h4 class="card-title" id="bordered-layout-card-center">تعديل مقال</h4>
                            <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                        </div>
                        <div class="card-content collpase show">
                            <div class="card-body">
                                @include('admin.includes.errors')

                                <form class="form" action="{{route('blogs.update' , $blog->id)}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('put')
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-lg-8">
                                                <div class="form-group">
                                                    <label for="projectinput1">العنوان</label>
                                                    <input type="text" id="eventRegInput1" class="form-control" placeholder="ادخل اسم المعهد" name="title_ar" value="{{$blog->title_ar}}" />
                                                </div>
                                                <div class="form-group">
                                                    <label for="projectinput4">المحتوى</label>
                                                    <textarea  id="ckeditor" name="content_ar" cols="30" rows="20" class="ckeditor">{{$blog->content_ar}} </textarea>
                                                </div>
                                                
                                              
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label for="projectinput2">التصنيف</label>
                                                    <select  name="category_id" class="select2 form-control text-left">
                                                        <option value="" selected="" disabled="">اختر التصنيف</option>
                                                       
                                                          
    
                                                            @foreach($BlogCategories as $category)
    
                                                            <option value="{{$category->id}}"  @if($category->id == $blog->category_id) selected @endif >{{$category->name_ar}}</option>
    
                                                            @endforeach
                                                        
                                                    </select>
                                                </div>
                                                <country-city-blog-component 
                                            :countries_from_blade="{{ json_encode($countries) }}"
                                            :dahsboard_url="{{ json_encode(url('/dashboard')) }}"
                                            :country_id2="{{ json_encode($blog->country_id) }}"
                                            :city_id="{{ json_encode($blog->city_id) }}"
                                        >
                                        </country-city-blog-component>
                                                <div class="form-group">
                                                    <label for="projectinput2">المعهد</label>
                                                    <select class="select2 form-control text-left" name="institute_id">
                                                        <option value=""  >اختر المعهد</option>

                                                        @foreach($Institutes as $institute)

                                                        <option value="{{$institute->id}}"   @if($institute->id == $blog->institute_id)  selected @endif>{{$institute->name_ar .'-'. $institute->city->name_ar}}</option>

                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    {{-- <label for="projectinput4">صورة المقال</label>
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" id="inputGroupFile01"  name="banner" value="{{$blog->banner}}"/>
                                                        <label class="custom-file-label" for="inputGroupFile01">اختر الصورة</label>
                                                    </div>
                                                    <div class="mt-3">
                                                        <img class="w-100" src="{{asset($blog->banner)}}" alt="" />
                                                    </div> --}}

                                                    <show-images-component
                                                    :image_name="{{json_encode("banner")}}"
                                                    :image_label="{{json_encode("اختر الصورة")}}"
                                                    :old="{{json_encode(old('banner'))}}"
                                                    :path_image_edit="{{ json_encode( asset($blog->banner) )}}"
    
    
                                                    ></show-images-component>
                                                </div>
                                                
                                            </div>
                                            <div class="col-12">
                                                <hr>
                                                <h4 class="mt-5 mb-2 text-black">حقول ال SEO</h4>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="projectinput1">بديل صورة المقال</label> 
                                                            <input type="text" placeholder="ادخل اسم بديل للصورة " name="img_alt" value="{{$blog->img_alt}}" class="form-control">
                                                        </div>
                                                        
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="projectinput1">title tage</label> 
                                                            <input type="text" placeholder="ادخل title tage " name="title_tag" value="{{$blog->title_tag}}" class="form-control">
                                                        </div>
                                                        
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="projectinput1">الكلمات  المفتاحية</label> 
                                                            <input type="text" placeholder="ادخل الكلمات المفتاحية " name="meta_keywords" value="{{$blog->meta_keywords}}" class="form-control">
                                                        </div>
                                                        
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="projectinput1">وصف الصفحة</label> 
                                                            <input type="text" placeholder="ادخل meta description" name="meta_description" value="{{$blog->meta_description}}" class="form-control">
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
