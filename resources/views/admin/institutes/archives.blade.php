@extends('admin.app')
 @section('admin.content')
 {{$department_name='institutes'}}
 {{$page_name='institute'}}

 <div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2">
                <h3 class="content-header-title">قسم المعاهد</h3>
                <div class="row breadcrumbs-top">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="dashboard">لوحة التحكم</a></li>
                            <li class="breadcrumb-item active">المعاهد</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
          <div id="recent-transactions" class="col-12">
              <div class="card">
                  <div class="card-header">
                      <h4 class="card-title">المعاهد ({{count($institutes)}})</h4>
                      <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                      <div class="heading-elements">
                          <ul class="list-inline mb-0">
                            
                              <li>
                                  <a class="btn btn-sm btn-success box-shadow-2 round btn-min-width pull-right" :href="route_create"> <i class="ft-plus ft-md"></i> اضافة معهد جديد</a>
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
                                      <th class="border-top-0">#</th>
                                      <th class="border-top-0">لوجو المعهد</th>
                                      <th class="border-top-0">اسم المعهد</th>
                                      <th class="border-top-0">الدولة</th>
                                      <th class="border-top-0">المدينة</th>
                                      <th class="border-top-0">عدد الكورسات</th>
  
  
                                      <th class="border-top-0">الحاله</th>
  
                                      <th class="border-top-0">التعليقات</th>
  
                                      <th class="border-top-0">اكشن</th>
                                  </tr>
                              </thead>
                              <tbody>
                          @foreach($institutes as $institute)
                                <tr>
                                      <td>{{$institute->id}}</td>
                                      <td>  
                                          <img  style="max-width:100px"  src="   {{asset($institute->logo)}}  ">
                                      </td>
                                      <td>{{$institute->name_ar}}</td>
                                      <td>{{$institute->country[0]->name_ar}}</td>
                                      <td>{{$institute->city[0]->name_ar}}</td>
                                      <td class="text-truncate">5 كورسات</td>
                                      <td class="text-truncate">
                                          <div id="read-only-stars" data-score="1"></div>
                                      </td>
                                        
                                      
                                      
                                      <td class="text-truncate">
                                          <a href="/sat/institutes/comments.php"><button type="button" class="btn btn-sm btn-outline-success round">حالي (15)</button></a>
                                          <a href="/sat/institutes/comments.php"><button type="button" class="btn btn-sm btn-outline-info round">جديد (10)</button></a>
                                      </td>
                                      <td class="text-truncate">
                                          
                                          <div class="btn-group" role="group" aria-label="Basic example">
                                          <a href="{{url('/dashboard/institute/restor/'.$institute->id)}}"   class="btn btn-info btn-sm round">استعاده</a>
                                          <a href="#"   class="btn btn-default btn-sm round">عرض</a>
                                          <form :action="instutite_url_edit +'/'+ institute.id" method="post"  class="btn-group">
                                              <input type="hidden" name="_token" :value="csrftoken" />
                                              <input type="hidden" name="_method" value="delete">
                                              <button class="btn btn-danger btn-sm round" onclick="return confirm('هل انت متاكد من حذف هذا المعهد')">حذف</button>
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
