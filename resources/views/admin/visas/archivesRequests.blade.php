<?php include_once('../includes/header.php') ?>
  <!-- ////////////////////////////////////////////////////////////////////////////-->
  <div class="app-content content">
    <div class="content-wrapper">
      <div class="content-header row">
        <div class="content-header-left col-md-6 col-12 mb-2">
          <h3 class="content-header-title">قسم التاشيرات</h3>
          <div class="row breadcrumbs-top">
          <div class="row breadcrumbs-top">
            <div class="breadcrumb-wrapper col-12">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/sat<?php include('../role_route.php') ?>">لوحة التحكم</a>
                </li>
                <li class="breadcrumb-item"><a href="/sat/employees">كل التاشيرات</a>
                </li>
                <li class="breadcrumb-item active">الارشيف
                </li>
              </ol>
            </div>
          </div>
          </div>
        </div>
        <div class="content-header-right col-md-6 col-12">
          <div class="btn-group float-md-right" role="group" aria-label="Button group with nested dropdown">
            <button class="btn btn-info round dropdown-toggle dropdown-menu-right box-shadow-2 px-2"
            id="btnGroupDrop1" type="button" data-toggle="dropdown" aria-haspopup="true"
            aria-expanded="false"><i class="ft-settings icon-left"></i> Settings</button>
            <div class="dropdown-menu" aria-labelledby="btnGroupDrop1"><a class="dropdown-item" href="card-bootstrap.html">Cards</a><a class="dropdown-item"
              href="component-buttons-extended.html">Buttons</a></div>
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
                <h4 class="card-title"> التاشيرات (5)</h4>
                <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                <div class="heading-elements">
                  <ul class="list-inline mb-0">
                    <li><a class="btn btn-sm btn-success box-shadow-2 round btn-min-width pull-right"
                      href="/sat/visa/create.php" > <i class="ft-plus ft-md"></i> اضافة تاشيرة جديد</a></li>
                  </ul>
                </div>
              </div>
              <div class="card-content">
                <div class="table-responsive">
                  <table id="recent-orders" class="table table-hover table-xl mb-0">
                    <thead>
                      <tr>
                      <th class="border-top-0">اسم الطالب</th>
                        <th class="border-top-0"> مكان الاقامه </th>
                        <th class="border-top-0"> مكان الميلاد </th>
                        <th class="border-top-0">رقم الجوال</th>
                        <th class="border-top-0">تاريخ الانضمام</th>
                        <th class="border-top-0">اكشن</th>
                      </tr>
                    </thead>
                    <tbody>
                      <style>
                       

                      </style>
                      <tr>
                      <td class="text-truncate">محمد مجدي </td>
                        <td class="text-truncate">السعوديه</td>
                        <td class="text-truncate"> مصر</td>
                        <td class="text-truncate"> 010125457</td>
                        <td class="text-truncate"> 20/12/2020</td>
                      
                       
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