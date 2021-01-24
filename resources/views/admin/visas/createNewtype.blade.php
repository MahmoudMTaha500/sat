<?php include_once '../includes/header.php'?>
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
                <li class="breadcrumb-item"><a href="/sat/employees">كل التصنيفات</a>
                </li>
                <li class="breadcrumb-item active">اضافة تصنيف
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
      <?php include_once '../includes/sidebar.php'?>
      <div class="content-body">

        <!-- Recent Transactions -->
        <div class="row justify-content-md-center">
            <div class="col-lg-10">
              <div class="card" style="zoom: 1;">
                <div class="card-header">
                  <h4 class="card-title" id="bordered-layout-card-center">اضافة تصنيف جديد</h4>
                  <a  href="/sat/visa/createNewtype.php" class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                  
                </div>
                <div class="card-content collpase show">
                  <div class="card-body">
                  <form class="form">
                      <div class="form-body">
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="projectinput1">اسم التصنيف</label>
                              <input type="text" id="projectinput1" class="form-control" placeholder="ادخل اسم التصنيف"
                              name="fname">
                            </div>
                          </div>
                         
                        </div>

                       
                       
                       
                   

                         

                          <div class="form-actions center">
                            <button type="submit" class="btn btn-primary w-100">
                              <i class="la la-check-square-o"></i> حفظ
                            </button>
                          </div>
                    </form>







                    
                    
                  </div>
                </div>
              </div>
            </div>
          </div>
        <!--/ Recent Transactions -->

      </div>
    </div>
  </div>
<?php include_once '../includes/footer.php'?>





