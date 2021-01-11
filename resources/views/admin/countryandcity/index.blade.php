@extends('admin.app')
@section('admin.content')
{{ $department_name = 'country'}}
{{ $page_name = 'getcountries'}}
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <h3 class="content-header-title">قسم الدول</h3>
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('dashboard')}}">لوحة التحكم</a>
                                </li>
                                <li class="breadcrumb-item active">كل الدول
                                </li>
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
                                <h4 class="card-title"> المعاهد (15)</h4>
                                <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                                <div class="heading-elements">
                                    <ul class="list-inline mb-0">
                                        <li><a class="btn btn-sm btn-success box-shadow-2 round btn-min-width pull-right"
                                                href="/sat/institutes/create.php"> <i class="ft-plus ft-md"></i> اضافة دوله
                                                جديد</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-content">
                                <div class="table-responsive">
                                    <table id="recent-orders" class="table table-hover table-xl mb-0">
                                        <thead>
                                            <tr>
                                                <th class="border-top-0">اسم الدوله</th>
                                             
                                                <th class="border-top-0">اكشن</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($country as $coun )
                                            <tr>
                                                <td> {{$coun->name_ar}}</td>
                                              
                                                <td>
                                                    <div class="btn-group mr-1 mb-1">
                                                        <button type="button" class="btn btn-primary dropdown-toggle"
                                                            data-toggle="dropdown" aria-haspopup="true"
                                                            aria-expanded="false">
                                                            <i class="ft-settings"></i>
                                                        </button>
                                                        <div class="dropdown-menu" x-placement="bottom-start"
                                                            style="position: absolute; transform: translate3d(0px, 40px, 0px); top: 0px; left: 0px; will-change: transform;">
                                                            <a href="#" class="dropdown-item"><i class="la la-eye"></i>
                                                                عرض</a>
                                                            <a href="/sat/institutes/edit.php" class="dropdown-item"><i
                                                                    class="la la-pencil"></i> تعديل</a>
                                                            <a href="#" class="dropdown-item"><i class="la la-plus"></i>
                                                                اضافة كورس</a>
                                                            <a href="#" class="dropdown-item"><i class="la la-trash"></i>
                                                                حذف</a>
                                                        </div>
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
