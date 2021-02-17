@extends('admin.app')
 @section('admin.content')
 {{$department_name='courses'}}
 {{$page_name='archive_course'}}

 <div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2">
                <h3 class="content-header-title">قسم المعاهد</h3>
                <div class="row breadcrumbs-top">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="dashboard">لوحة التحكم</a></li>
                            <li class="breadcrumb-item active">ارشيف الدورات </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
          <div id="recent-transactions" class="col-12">
              <div class="card">
                  <div class="card-header">
                      <h4 class="card-title">الدورات ({{count($courses)}})</h4>
                      <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                      <div class="heading-elements">
                          <ul class="list-inline mb-0">
                            
                              <li>
                                  <a class="btn btn-sm btn-success box-shadow-2 round btn-min-width pull-right" href="{{route('courses.create')}}"> <i class="ft-plus ft-md"></i> اضافة معهد جديد</a>
                              </li>
                          </ul>
  
                          <!-- Modal -->
                         
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
                                  <th class="border-top-0">اكشن</th>
                              </tr>
                          </thead>
                          <tbody>
                            @foreach($courses as $course )
                              <tr>  
                                  <td class="text-truncate"> {{$course->name_ar}}</td>
                                  <td class="text-truncate">{{$course->institute->name_ar}}</td>
                                  <td class="text-truncate">{{$course->institute->city->name_ar}}</td>
                               
                                  <td class="text-truncate">5 طلابات</td>

                                  <td>
                                  <div class="btn-group" role="group" aria-label="Basic example">
                                     
                                  <a href="{{url('/dashboard/courses/restor/'.$course->id)}}"   class="btn btn-default btn-sm round">استعاده</a>
                                            
                                          
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
