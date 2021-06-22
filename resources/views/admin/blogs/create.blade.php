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
                                                    <input type="text" id="eventRegInput1" class="form-control" placeholder="ادخل اسم المعهد" name="title_ar" value="{{old('title_ar')}}" />
                                                </div>
                                                <div class="form-group">
                                                    <label for="projectinput4">المحتوى</label>
                                                    <textarea name="content_ar" id="ckeditor" cols="30" rows="20" class="ckeditor"> {{old('content_ar')}} </textarea>
                                                </div>


                                            </div>

                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label for="projectinput2">التصنيف</label>
                                                    <select name="category_id" class="select2 form-control text-left"  >
                                                        <option value="" selected="" disabled="">اختر التصنيف</option>
                                                            @foreach($BlogCategories as $category)
                                                            <option value="{{$category->id}}" @if($category->id == old('category_id')) selected @endif>{{$category->name_ar}}</option>
                                                            @endforeach
                                                    </select>
                                                </div>
                                                <create-blog-component 
                                                    :countries_from_blade="{{ json_encode($countries) }}" 
                                                    :getcities_url="{{ json_encode(route('getcities')) }}"
                                                    :get_institutes_url="{{ json_encode(route('blog.get.institutes.vue')) }}"
                                                    :get_courses_url="{{ json_encode(route('blog.get.courses.vue')) }}"
                                                    :old_country="{{json_encode(old('country_id'))}}"
                                                    :old_city="{{json_encode(old('city_id'))}}"
                                                    :old_institute="{{json_encode(old('institute_id'))}}"
                                                    :old_course="{{json_encode(old('course_id'))}}"
                                                >
                                                </create-blog-component>
                                                <show-images-component :image_name="{{json_encode("banner")}}" 
                                                :image_label="{{json_encode(" اختر الصورة ")}}"
                                                :old="{{json_encode(old('banner'))}}"
                                                ></show-images-component>
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