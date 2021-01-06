<?php include_once '../includes/header.php'?>
  <!-- ////////////////////////////////////////////////////////////////////////////-->
  <div class="app-content content">
    <div class="content-wrapper">
      <div class="content-header row">
        <div class="content-header-left col-md-6 col-12 mb-2">
          <h3 class="content-header-title">قسم المعاهد</h3>
          <div class="row breadcrumbs-top">
          <div class="row breadcrumbs-top">
            <div class="breadcrumb-wrapper col-12">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/sat<?php include('../role_route.php') ?>">لوحة التحكم</a>
                <li class="breadcrumb-item"><a href="/sat/institutes">كل المعاهد</a>
                </li>
                <li class="breadcrumb-item active">تعديل معهد (كابلان)
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
                  <h4 class="card-title" id="bordered-layout-card-center">تعديل معهد (كابلان)</h4>
                  <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                  
                </div>
                <div class="card-content collpase show">
                  <div class="card-body">
                  <form class="form">
                      <div class="form-body">
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="projectinput1">اسم المعهد</label>
                              <input type="text" id="eventRegInput1" class="form-control" value="كابلان" placeholder="ادخل اسم المعهد" name="fullname">
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="projectinput3">نبذة عن المعهد</label>
                              <textarea type="text" id="projectinput3"  class="form-control" placeholder="نبذة عن المعهد" name="desc">
                                  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fugit consectetur eaque quidem libero. Qui perferendis eius voluptas corporis vero ipsam facere tenetur necessitatibus molestiae officia nobis voluptatum, magnam libero reprehenderit.
                              </textarea>
                            </div>
                          </div>
                          
                        </div>
                        <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                              <label for="projectinput2">الدولة</label>
                              <select class="select2 form-control text-left">
                                  <option value="">حدد الدولة</option>
                                  <option value="1">أستراليا</option>
                                  <option selected value="3">كندا</option>
                                  <option value="6">فرنسا</option>
                                  <option value="7">ألمانيا</option>
                                  <option value="9">أيرلندا</option>
                                  <option value="10">ماليزيا</option>
                                  <option value="11">مالطا</option>
                                  <option value="12">نيوزيلاندا</option>
                                  <option value="13">الفلبين</option>
                                  <option value="16">روسيا</option>
                                  <option value="17">جنوب أفريقيا</option>
                                  <option value="18">سويسرا</option>
                                  <option value="21">المملكة المتحدة</option>
                                  <option value="22">الولايات المتحدة الأمريكية</option>
                              </select>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="projectinput1">المدينة </label>
                              <select class="select2 form-control">
                                  <option value="">حدد المدينة</option>
                                  <option value="1">أستراليا</option>
                                  <option value="3">كندا</option>
                                  <option selected value="6">كونتريال</option>
                                  <option value="7">ألمانيا</option>
                                  <option value="9">أيرلندا</option>
                                  <option value="10">ماليزيا</option>
                                  <option value="11">مالطا</option>
                                  <option value="12">نيوزيلاندا</option>
                                  <option value="13">الفلبين</option>
                                  <option value="16">روسيا</option>
                                  <option value="17">جنوب أفريقيا</option>
                                  <option value="18">سويسرا</option>
                                  <option value="21">المملكة المتحدة</option>
                                  <option value="22">الولايات المتحدة الأمريكية</option>
                              </select>
                            </div>
                          </div>
                          
                        </div>

                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="projectinput4">التقييم</label>
                              <div id="default-star-rating"></div>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="projectinput4">التقييم بواسطة سات</label>
                              <input type="checkbox" id="switchery" class="switchery" checked/>
                            </div>
                          </div>
                        </div>


                        <div class="row">
                          <div class="form-group col-12 mb-2 contact-repeater">
                            <label for="projectinput3">الاسئلة الخاصة بالمعهد</label>
                                <div data-repeater-list="repeater-group">
                                  <div class="input-group mb-1" data-repeater-item>
                                    <input type="tel" placeholder="السؤال" class="form-control" value="" id="example-tel-input">
                                    <input type="tel" placeholder="الاجابة" class="form-control" value="" id="example-tel-input">
                                    <span class="input-group-append" id="button-addon2">
                                      <button class="btn btn-danger" type="button" data-repeater-delete><i class="ft-x"></i></button>
                                    </span>
                                  </div>
                                </div>
                                <div data-repeater-list="repeater-group">
                                  <div class="input-group mb-1" data-repeater-item>
                                    <input type="tel" placeholder="السؤال" class="form-control" value="السؤال" id="example-tel-input">
                                    <input type="tel" placeholder="الاجابة" class="form-control" value="الاجابة" id="example-tel-input">
                                    <span class="input-group-append" id="button-addon2">
                                      <button class="btn btn-danger" type="button" data-repeater-delete><i class="ft-x"></i></button>
                                    </span>
                                  </div>
                                </div>
                                <div data-repeater-list="repeater-group">
                                  <div class="input-group mb-1" data-repeater-item>
                                    <input type="tel" placeholder="السؤال" class="form-control" value="السؤال" id="example-tel-input">
                                    <input type="tel" placeholder="الاجابة" class="form-control" value="الاجابة" id="example-tel-input">
                                    <span class="input-group-append" id="button-addon2">
                                      <button class="btn btn-danger" type="button" data-repeater-delete><i class="ft-x"></i></button>
                                    </span>
                                  </div>
                                </div>
                                <div data-repeater-list="repeater-group">
                                  <div class="input-group mb-1" data-repeater-item>
                                    <input type="tel" placeholder="السؤال" class="form-control" value="السؤال" id="example-tel-input">
                                    <input type="tel" placeholder="الاجابة" class="form-control" value="الاجابة" id="example-tel-input">
                                    <span class="input-group-append" id="button-addon2">
                                      <button class="btn btn-danger" type="button" data-repeater-delete><i class="ft-x"></i></button>
                                    </span>
                                  </div>
                                </div>
                                <button type="button" data-repeater-create class="btn btn-primary">
                                  <i class="ft-plus"></i> اضافة سؤال جديد
                                </button>
                            </div>
                        </div>



                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="projectinput4">لوجو المعهد</label>
                              <div class="custom-file">
                                <input type="file" class="custom-file-input" id="inputGroupFile01">
                                <label class="custom-file-label" for="inputGroupFile01">اختر الصورة</label>
                              </div>
                              <div class="mt-3">
                                <img class="w-100" src="../adminTheme-master/html/rtl/vertical-content-menu-template/../../../app-assets/images/crop-pic.jpg" alt="">
                              </div>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="projectinput4">صورة المعهد</label>
                              <div class="custom-file">
                                <input type="file" class="custom-file-input" id="inputGroupFile01">
                                <label class="custom-file-label" for="inputGroupFile01">اختر الصورة</label>
                              </div>
                              <div class="mt-3">
                                <img class="w-100" src="../adminTheme-master/html/rtl/vertical-content-menu-template/../../../app-assets/images/crop-pic.jpg" alt="">
                              </div>
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





