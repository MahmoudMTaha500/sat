@extends('admin.app') @section('admin.content')
<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2">
                <h3 class="content-header-title">قسم التاشيرات</h3>
                <div class="row breadcrumbs-top">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">لوحة التحكم</a></li>
                            <li class="breadcrumb-item active">التاشيرات</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">
            <!-- Recent Transactions -->
            <div class="row">
                <div id="recent-transactions" class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">التاشيرات ({{count($visas)}})</h4>
                            <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                            <div class="heading-elements">
                                <ul class="list-inline mb-0">
                                    <li>
                                        <a class="btn btn-sm btn-success box-shadow-2 round btn-min-width pull-right" href="{{route('visas.create')}}"> <i class="ft-plus ft-md"></i> اضافة تاشيرة جديد</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-content">
                            <div class="table-responsive">
                                <table id="recent-orders" class="table table-hover table-xl mb-0 text-center">
                                    <thead>
                                        <tr>
                                            <th class="border-top-0">الدولة</th>
                                            <th class="border-top-0">تصنيف التاشيرة</th>
                                            <th class="border-top-0">عدد الطلبات</th>
                                            <th class="border-top-0">تاريخ الانشاء</th>
                                            <th class="border-top-0">اكشن</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <style></style>
                                        @foreach($visas as $visa)
                                      
                                        <tr>
                                            <td> {{$visa->country->name_ar}}</td>
                                            <td> {{ $visa->category->name_ar ?? "غير مصنف"}}</td>
                                            <td><a href="#" class="btn btn-primary round btn-min-width btn-sm">15 طلب </a></td>
                                            <td>{{$visa->created_at}}</td>

                                            <td>
                                                <div class="btn-group" role="group" aria-label="Basic example">
                                                    <a href="{{route('visas.edit',$visa->id)}}" class="btn btn-info btn-sm round">تعديل <i class="la la-pencil"></i></a>
                                                    <form action="{{route('visas.destroy',$visa->id)}}" method="POST" class="btn-group">
                                                        @csrf 
                                                        @method("DELETE")
                                                        <button class="btn btn-danger btn-sm round" onclick="return confirm('Are you sure?')">حذف <i class="la la-trash"></i></button>
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
