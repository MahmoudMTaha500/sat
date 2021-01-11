<?php include_once('../includes/header.php') ?>
  <!-- ////////////////////////////////////////////////////////////////////////////-->
  <div class="app-content content">
    <div class="content-wrapper">
      <div class="content-header row">
        <div class="content-header-left col-md-6 col-12 mb-2">
          <h3 class="content-header-title">قسم الدورات</h3>
          <div class="row breadcrumbs-top">
          <div class="row breadcrumbs-top">
            <div class="breadcrumb-wrapper col-12">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/sat<?php include('../role_route.php') ?>">لوحة التحكم</a>
                </li>
                <li class="breadcrumb-item"><a href="/courses/">كل الدورات</a>
                </li>
                <li class="breadcrumb-item active">الارشيف
                </li>
              </ol>
            </div>
          </div>
          </div>
        </div>
      </div>
      <?php include_once('../includes/sidebar.php') ?>
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
                      href="/sat/courses/create.php" > <i class="ft-plus ft-md"></i> اضافة دورة جديدة</a></li>
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
                        <th class="border-top-0">اكشن</th>
                      </tr>
                    </thead>
                    <tbody>
                      <style>
                       

                      </style>
                      <tr>
                        <td class="text-truncate">دورة انجليزية صباحي</td>
                        <td class="text-truncate">كابلان</td>
                        <td class="text-truncate">مانشيستر</td>
                        <td class="text-truncate"> 5 الطلابات</td>
                      
                       
                        <td>
                            <a href="/sat/institutes/comments.php"><button type="button" class="btn btn-sm btn-outline-danger round">حذف نهائي</button></a>
                            <a href="/sat/institutes/comments.php"><button type="button" class="btn btn-sm btn-outline-success round">اعدة التخزين</button></a>
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
<?php include_once('../includes/footer.php') ?>