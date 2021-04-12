@extends('admin.app') @section('admin.content')
<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2">
                <h3 class="content-header-title">قسم الدول</h3>
                <div class="row breadcrumbs-top">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">لوحة التحكم</a></li>
                            <li class="breadcrumb-item active">كل المدن</li>
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
                            <h4 class="card-title">المدن ({{count($cities)}})</h4>
                            <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                            <div class="heading-elements">
                                <ul class="list-inline mb-0">
                    @if(auth()->user()->hasPermission('cities-countries-create'))

                                    <li>
                                        <a class="btn btn-sm btn-success box-shadow-2 round btn-min-width pull-right" href="{{route('cities.create')}}"> <i class="ft-plus ft-md"></i> اضافة مدينه جديده</a>
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
                                            <th class="border-top-0">الدوله</th>
                                            <th class="border-top-0">المدينه</th>

                                            <th class="border-top-0">اكشن</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($cities as $city )
                                        <tr>
                                            <td>{{$city->country->name_ar}}</td>
                                            <td>{{$city->name_ar}}</td>

                                            <td class="text-truncate">
                    @if(auth()->user()->hasPermission('cities-countries-update'))

                                                <a href="{{route('cities.edit' , $city->id)}}"><i class="la la-pencil"></i></a>
                                               @endif
                    @if(auth()->user()->hasPermission('cities-countries-delete'))

                                                <form action="{{route('cities.destroy' , $city->id)}}" method="POST">
                                                    @csrf @method("DELETE")
                                                    <button class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')"><i class="la la-trash"></i></button>
                                                </form>
                                                @endif
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
