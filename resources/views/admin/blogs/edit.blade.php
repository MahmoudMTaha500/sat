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
                                <form class="form" action="{{route('blogs.update' , $blog->id)}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('put')
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-lg-8">
                                                <div class="form-group">
                                                    <label for="projectinput1">العنوان</label>
                                                    <input type="text" id="eventRegInput1" class="form-control" placeholder="ادخل اسم المعهد" name="fullname" />
                                                </div>
                                                <div class="form-group">
                                                    <label for="projectinput4">المحتوى</label>
                                                    <textarea name="ckeditor" id="ckeditor" cols="30" rows="20" class="ckeditor"> </textarea>
                                                </div>
                                                
                                              
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label for="projectinput2">التصنيف</label>
                                                    <select class="select2 form-control text-left">
                                                        <option value="" selected="" disabled="">اختر التصنيف</option>
                                                        <option value="">غير مصنف</option>
                                                        <option value="">الدراسة في كندا</option>
                                                        <option value="">الدراسة في بريطانية</option>
                                                        <option value="">الدراسة في امريكا</option>
                                                        <option value="">الدراسة في استراليا</option>
                                                        <option value="">الدراسة في لندن</option>
                                                        <option value="">الدراسة في مصر</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="projectinput2">الدولة</label>
                                                    <select class="select2 form-control text-left">
                                                        <option value="" selected="" disabled="">اختر الدولة</option>
                                                        <option value="">لا ينتمي الي دولة</option>
                                                        <option value="">مصر</option>
                                                        <option value="">مصر</option>
                                                        <option value="">مصر</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="projectinput2">المدينة</label>
                                                    <select class="select2 form-control text-left">
                                                        <option value="" selected="" disabled="">اختر المدينة</option>
                                                        <option value="">لا ينتمي الي مدينة</option>
                                                        <option value="">جيزة</option>
                                                        <option value="">قاهرة</option>
                                                        <option value="">اسيوط</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="projectinput2">المعهد</label>
                                                    <select class="select2 form-control text-left">
                                                        <option value="" selected="" disabled="">اختر المعهد</option>
                                                        <option value="">لا ينتمي الي معهد</option>
                                                        <option value="">كابلان</option>
                                                        <option value="">كابلان</option>
                                                        <option value="">كابلان</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="projectinput4">صورة المقال</label>
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" id="inputGroupFile01" />
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
