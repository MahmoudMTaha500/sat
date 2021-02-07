@extends('admin.app')
 @section('admin.content')
 

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
        <div class="content-body">
        
                <!-- Recent Transactions -->
                <div class="row">
                  <div id="recent-transactions" class="col-12">
                    <div class="card">
                      <div class="card-header">
                        <h4 class="card-title"> كل التعليقات (15)</h4>
                        <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                        <div class="heading-elements">
                          <ul class="list-inline mb-0">
                            <li><a class="btn btn-sm btn-info box-shadow-2 round btn-min-width pull-right"
                              href="/sat/institutes/create.php" > كل التعليقات</a></li>
                              <li><a class="btn btn-sm btn-primary box-shadow-2 round btn-min-width pull-right"
                              href="/sat/institutes/create.php" > الحالية</a></li>
                              <li><a class="btn btn-sm btn-success box-shadow-2 round btn-min-width pull-right"
                              href="/sat/institutes/create.php" > الجديدة</a></li>
                          </ul>
                        </div>
                      </div>
                      <div class="card-content">
                        <div class="table-responsive">
                          <table id="recent-orders" class="table table-hover table-xl mb-0">
                            <thead>
                              <tr>
                                <th class="border-top-0">اسم المعلق</th>
                                <th class="border-top-0">التعليق</th>
                                <th class="border-top-0">اسم المعهد</th>
                                <th class="border-top-0">موافقة</th>
                                <th class="border-top-0">حذف</th>
                              </tr>
                            </thead>
                            <tbody>
                              <style>
                               
        
                              </style>
                              <tr>
                                <td class="text-truncate">محمود سامي</td>
                                <td class="text-truncate">لقد كانت الدراسة ممتعة في معهد كابلان</td>
                                <td class="text-truncate">كابلان</td>
                                <td class="text-truncate">
                                  <input type="checkbox" id="switchery" class="switchery" checked/>
                                </td>
                                <td class="text-truncate">
                                  <a href="#"><button type="button" class="btn btn-sm btn-outline-danger round">حذف</button></a>
                                </td>
                              </tr>
                              
                             
                              
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
