@extends('admin.app') @section('admin.content') {{$department_name='institutes'}} {{$page_name='institute'}}

<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2">
                <h3 class="content-header-title">قسم المعاهد</h3>
                <div class="row breadcrumbs-top">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="dashboard">لوحة التحكم</a></li>
                            <li class="breadcrumb-item active">ارشيف المعاهد</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div id="recent-transactions" class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">ارشيف المعاهد ({{count($institutes)}})</h4>
                        <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                        <div class="heading-elements">

                            <!-- Modal -->
                        </div>
                    </div>
                    <div class="card-content">
                        <div class="table-responsive">
                            <table id="recent-orders" class="table table-hover table-xl mb-0">
                                <thead>
                                    <tr>
                                        <th class="border-top-0">#</th>
                                        <th class="border-top-0">لوجو المعهد</th>
                                        <th class="border-top-0">اسم المعهد</th>
                                        <th class="border-top-0">الدولة</th>
                                        <th class="border-top-0">المدينة</th>
                                        <th class="border-top-0">الكاتب</th>
                                        <th class="border-top-0">اكشن</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($institutes as $institute)
                                        <tr>
                                            <td>{{$institute->id}}</td>
                                            <td>
                                                <img style="width: 100px;" src="{{$institute->logo == 'null' ? asset('storage/default_images.png') : asset($institute->logo)}}" />
                                            </td>
                                            <td>{{$institute->name_ar}}</td>
                                            <td>{{$institute->country->name_ar}}</td>
                                            <td>{{$institute->city->name_ar}}</td>
                                            <td>
                                                {{$institute->creator->name}}
                                            </td>
                                            
                                            <td class="text-truncate">
                                                <div class="btn-group" role="group" aria-label="Basic example">
                                                    <a href="{{route('institute_restore' , $institute->id)}}" class="btn btn-info btn-sm round">استعاده</a>
                                                    <a href="{{route('institute_force_delete' , $institute->id)}}"
                                                    onclick="return confirm('سوف يتم حذف المعهد نهائيا .هل انت متاكد؟')"
                                                    class="btn btn-dark btn-sm round" style="margin-right:3px;">حذف نهائي</a>
        
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

@endsection
