@extends('admin.app') @section('admin.content')
<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2">
                <h3 class="content-header-title">قسم المقالات</h3>
                <div class="row breadcrumbs-top">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">لوحة التحكم</a></li>
                            <li class="breadcrumb-item active">المقالات</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">المقالات (15)</h4>
                            <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                            <div class="heading-elements">
                                <ul class="list-inline mb-0">
                                    <li>
                                        <button data-toggle="modal" data-target="#exampleModalCenter" class="btn btn-sm btn-info box-shadow-2 round btn-min-width pull-right"><i class="ft-filter ft-md"></i> فلتر</button>
                                    </li>
                                    <li>
                                        <a class="btn btn-sm btn-success box-shadow-2 round btn-min-width pull-right" href="{{route('blogs.create')}}"> <i class="ft-plus ft-md"></i> اضافة معهد جديد</a>
                                    </li>
                                </ul>

                                <!-- Modal -->
                                <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLongTitle">البحث في المقالات</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label class="font-medium-2 text-bold-600" >الكاتب</label>
                                                    <select class="form-control" name="fname">
                                                        <option value="" selected="" disabled="">اختر الكاتب</option>
                                                        <option value="">كل الكاتبين</option>
                                                        <option value="">كاتب</option>
                                                        <option value="">كاتب</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label class="font-medium-2 text-bold-600">التصنيف</label>
                                                    <select class="form-control" name="fname">
                                                        <option value="" selected="" disabled="">اختر التصنيف</option>
                                                        <option value="">كل التصنيفات</option>
                                                        <option value="">تصنيف</option>
                                                        <option value="">تصنيف</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label class="font-medium-2 text-bold-600">الحالة</label>
                                                    <div class="row">
                                                        <div class="col-4 d-flex">
                                                            <div class="form-group mt-1">
                                                                <label for="switcherySize13" class="mr-1">مقبول</label>
                                                                <input type="checkbox" id="switcherySize13" class="switchery" data-size="xs"/>
                                                            </div>
                                                        </div>
                                                        <div class="col-2"></div>
                                                        <div class="col-4 d-flex">
                                                            <div class="form-group mt-1">
                                                                <label for="switcherySize13" class="mr-1">مرفوض</label>
                                                                <input type="checkbox" id="switcherySize13" class="switchery" data-size="xs"/>
                                                            </div>
                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="font-medium-2 text-bold-600">البحث بكلمات مفتاحية</label>
                                                    <input type="text" class="form-control" placeholder="البحث في عنوان او محتوى المقال بكلمة مفتاحية" name="fname">
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-primary w-100">بحث</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-content">
                            <div class="table-responsive">
                                <table id="recent-orders" class="table table-hover table-xl mb-0">
                                    <thead>
                                        <tr>
                                            <th class="border-top-0">العنوان</th>
                                            <th class="border-top-0">الكاتب</th>
                                            <th class="border-top-0">التصنيف</th>
                                            <th class="border-top-0">التعليقات</th>
                                            <th class="border-top-0">التاريخ</th>
                                            <th class="border-top-0">الحلة</th>
                                            <th class="border-top-0">اكشن</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($blogs as $blog)
                                        <tr>
                                            <td>{{$blog->title_ar}}</td>
                                            <td>{{$blog->creator->name}}</td>
                                            <td>{{$blog->category->name_ar}}</td>
                                            <td>
                                                <div class="btn-group" role="group" aria-label="Basic example">
                                                    <a href="{{route('blogs.edit' , $blog->id)}}" class="btn btn-outline-info btn-sm round">حالي</a>
                                                    <a href="{{route('blogs.edit' , $blog->id)}}" class="btn btn-outline-success btn-sm round">جديد</a>
                                                    
                                                </div>
                                            </td>
                                            <td>{{date("Y-m-d",strtotime($blog->created_at))}}</td>
                                            <td>
                                                <div class="form-group mt-1">
                                                    <label for="switcherySize13" class="font-medium-2 text-bold-600 mr-1">مقبول</label>
                                                    <input type="checkbox" id="switcherySize13" class="switchery" data-size="xs" checked/>
                                                    <label for="switcherySize13" class="font-medium-2 text-bold-600 ml-1">غير مقبول</label>
                                                  </div>
                                            </td>
                                            <td>
                                                <div class="btn-group" role="group" aria-label="Basic example">
                                                    <a href="{{route('blogs.edit' , $blog->id)}}" class="btn btn-info btn-sm round">تعديل</a>
                                                    <form action="{{route('blogs.destroy' , $blog->id)}}" method="POST" class="btn-group">
                                                        @csrf @method("DELETE")
                                                        <button class="btn btn-danger btn-sm round" onclick="return confirm('هل انت متاكد من حذف هذا المقال')">حذف</button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
