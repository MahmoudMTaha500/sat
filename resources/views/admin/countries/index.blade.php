@extends('admin.app') @section('admin.content') {{ $department_name = 'country'}} {{ $page_name = 'getcountries'}}
<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2">
                <h3 class="content-header-title">قسم الدول</h3>
                <div class="row breadcrumbs-top">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">لوحة التحكم</a></li>
                            <li class="breadcrumb-item active">كل الدول</li>
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
                            <h4 class="card-title">الدول ({{count($country)}})</h4>
                            <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                            <div class="heading-elements">
                                <ul class="list-inline mb-0">
                                    @if(auth()->user()->hasPermission('cities-countries-create'))

                                    <li>
                                        <a class="btn btn-sm btn-success box-shadow-2 round btn-min-width pull-right" href="{{url('/dashboard/addcountry')}}"> <i class="ft-plus ft-md"></i> اضافة دوله جديد</a>
                                    </li>
                                    @endif
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
                                            <td>{{$coun->name_ar}}</td>

<<<<<<< HEAD

                    <form action="{{route('countries.destroy' ,$coun->id)}}" method="POST">
                        @csrf
                        @method('delete')

                                                        <button    onclick="return confirm('Are you sure?')"  ><i class="la la-trash"></i></button>
                                                    </form>

                                                        @endif
                                                    
                                                </td>
                                            </tr>
=======
                                            <td class="text-truncate">
                                                <div class="btn-group" role="group" aria-label="Basic example">
                                                    @if(auth()->user()->hasPermission('cities-countries-update'))
                                                    <a href="{{route('countries.edit', $coun->id)}}" class="btn btn-info btn-sm round"> تعديل</a>
                                                    @endif @if(auth()->user()->hasPermission('cities-countries-delete'))
                                                    <form action="{{route('countries.destroy' ,$coun->id)}}" method="POST" class="btn-group">
                                                        @csrf @method('delete')
                                                        <button
                                                            v-if="delete_pre"
                                                            class="btn btn-danger btn-sm round"
                                                            onclick="return confirm('حذف هذه الدولة سيقوم بحذف جميع المعاهد و الدورات و الطلابات المتعلقة بهذه الدولة!! هل انت متاكد من الحذف ؟')"
                                                        >
                                                            حذف
                                                        </button>
                                                    </form>
                                                    @endif
                                                </div>
                                            </td>
                                        </tr>
>>>>>>> 50658f85d8460d53c376139464b81d3ca4150f0f
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
