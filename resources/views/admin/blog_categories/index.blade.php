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
                            <li class="breadcrumb-item"><a href="{{route('blogs.index')}}">المقالات</a></li>
                            <li class="breadcrumb-item active">تصنيفات المقالات</li>
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
            <!-- Recent Transactions -->
            <div class="row">
                <div id="recent-transactions" class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">تصنيف ({{count( $categories )}})</h4>
                            <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                            <div class="heading-elements">
                                <ul class="list-inline mb-0">
                                    <li>
                                        <a class="btn btn-sm btn-success box-shadow-2 round btn-min-width pull-right" href="{{route('blog_categories.create')}}"> <i class="ft-plus ft-md"></i> اضافة تصنيف جديد</a>
                                    </li>
                                </ul>
                            </div>
                            
                        </div>
                     
                        <div class="card-content text-center">



                            
                            <div class="table-responsive">
                                <table id="recent-orders" class="table table-hover table-xl mb-0">
                                    <thead>
                                        <tr>
                                            <th class="border-top-0">اسم التصنيف</th>
                                            <th class="border-top-0">عدد المقالات</th>
                                            <th class="border-top-0">اكشن</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($categories as $cat)
                                        <tr>
                                            <td>{{$cat->name_ar}}</td>
                                            <td><a href="#" class="btn btn-outline-primary round btn-min-width btn-sm">15 مقالة </a></td>

                                            <td class="text-truncate">
                                                <div class="btn-group" role="group" aria-label="Basic example">
                                                    <a href="{{route('blog_categories.edit' ,$cat->id)}}" class="btn btn-info btn-sm round">تعديل </a>
                                                    <form action="{{route('blog_categories.destroy',$cat->id)}}" method="POST" class="btn-group">
                                                        @csrf @method("DELETE")
                                                        <button class="btn btn-danger btn-sm round" onclick="return confirm('Are you sure?')">حذف </button>
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
            <!--/ Recent Transactions -->
        </div>
    </div>
</div>
@endsection
