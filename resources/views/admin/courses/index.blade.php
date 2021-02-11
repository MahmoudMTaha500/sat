@extends('admin.app') @section('admin.content')

<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2">
                <h3 class="content-header-title">قسم الدورات</h3>
                <div class="row breadcrumbs-top">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">لوحة التحكم</a></li>
                            <li class="breadcrumb-item active">الدورات</li>
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
                            <h4 class="card-title">الدورات ({{$count_courses}})</h4>
                            <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                            <div class="heading-elements">
                                <ul class="list-inline mb-0">
                                    <li>
                                        <a class="btn btn-sm btn-success box-shadow-2 round btn-min-width pull-right" href="/sat/institutes/create.php"> <i class="ft-plus ft-md"></i> اضافة دورة جديدة</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-content">
                            <div class="table-responsive">
                              <table id="recent-orders" class="table table-hover table-xl mb-0">
                                <thead>
                                    <tr>
                                        <th class="border-top-0">اسم الدورة</th>
                                        <th class="border-top-0">اسم المعهد</th>
                                        <th class="border-top-0">المدينة</th>
                                        <th class="border-top-0">عدد الطلابات</th>
                                        <th class="border-top-0">الحالة</th>
                                        <th class="border-top-0">اكشن</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <style></style>
                                    @foreach($courses as $course)
                                    <tr>
                                        <td class="text-truncate"> {{$course->name_ar}}</td>
                                        <td class="text-truncate">{{$course->institute->name_ar}}</td>
                                        <td class="text-truncate">{{$course->institute->city[0]->name_ar}}</td>
                                        <td class="text-truncate">مقبول او مرفوض</td>
                                        <td class="text-truncate">5 طلابات</td>

                                        <td>
                                           
                                                    <a href="{{route('courses.edit',$course->id)}}" class="dropdown-item"><i class="la la-pencil"></i> تعديل</a>
                                                    <form action="{{route('courses.destroy',$course->id)}}" method="POST">
                                                        @csrf
                                                        @method('delete')
                                                        <button href="" class="dropdown-item"><i class="la la-trash"></i> حذف</button>

                                                    </form>
                                                
                                            
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
            {{$courses->links()}}
            <!--/ Recent Transactions -->
        </div>
    </div>
</div>
@endsection







