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
                <li class="breadcrumb-item"><a href="/sat/courses">كل الدورات</a>
                </li>
                <li class="breadcrumb-item active">تعديل دورة (لغة انجليزية صباحي)
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
                  <h4 class="card-title" id="bordered-layout-card-center">تعديل دورة (لغة انجليزية صباحي)</h4>
                  <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                  
                </div>
                <div class="card-content collpase show">
                  <div class="card-body">
                  <form class="form">
                      <div class="form-body">
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="projectinput1">اسم الدورة</label>
                              <input type="text" id="projectinput1" class="form-control" value="لغة انجليزية صباحي" placeholder="ادخل اسم الدورة"
                              name="fname">
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="projectinput2">المعهد</label>
                              <select class="select2 form-control text-left">
                                <option value="">كابلان</option>
                                <option select value="1">ام اي تي</option>
                                <option value="3">هارفارد</option>
                                <option value="6">اي تي اي</option>
                            </select>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="projectinput1">الحد الأدنى للعمر </label>
                              <input type="number" id="projectinput1" min="1" value="17" class="form-control" placeholder="ادخل الحد الادني"
                              name="fname">
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="projectinput2">يبدأ الكورس كل</label>
                              <select class="form-control text-left">
                                <option value="">سبت</option>
                                <option value="1">احد</option>
                                <option selected value="3">اثنين</option>
                                <option value="6">ثلاثاء</option>
                                <option value="6">اربع</option>
                                <option value="6">خميس</option>
                                <option value="6">جمعة</option>
                            </select>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="projectinput1">العدد الأقصى للطلاب في الصف </label>
                              <input type="number" value="20" id="projectinput1" min="1" class="form-control" placeholder="ادخل العدد الأقصى للطلاب"
                              name="fname">
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="projectinput2">وقت الدراسة</label>
                              <select class="form-control text-left">
                                <option value="">صباحي</option>
                                <option selected value="1">مسائي</option>
                            </select>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="projectinput1">درس/الأسبوع </label>
                              <input type="number" value="20" id="projectinput1" min="1" class="form-control" placeholder="درس/الأسبوع"
                              name="fname">
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="projectinput1">ساعات/أسبوع </label>
                              <input type="number" value="13" id="projectinput1" min="1" class="form-control" placeholder="ساعات/أسبوع"
                              name="fname">
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="projectinput1">متوسط عدد الطلاب في الصف </label>
                              <input type="number"  value="17" id="projectinput1" min="1" class="form-control" placeholder="ادخل متوسط عدد الطلاب"
                              name="fname">
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="projectinput2">المستوى المطلوب</label>
                              <select class="form-control text-left">
                                <option value="">مبتدئ</option>
                                <option selected value="1">متوسط</option>
                                <option value="1">متقدم</option>
                            </select>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="projectinput3">وصف الدورة</label>
                              <textarea type="text" id="projectinput3" rows="20" class="form-control" placeholder="اضف وصف للدورة" name="desc">
                                Lorem ipsum, dolor sit amet consectetur adipisicing elit. Repellat nihil nesciunt quibusdam, unde consequuntur, blanditiis magnam magni aut officiis praesentium tempore asperiores explicabo voluptatibus eaque odio laboriosam, maiores consequatur soluta.
                              </textarea>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="projectinput4">صورة الدورة</label>
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
                        <div class="form-group col-12 mb-2 contact-repeater">
                          <label for="projectinput3">سعر الكورس</label>
                              <div data-repeater-list="repeater-group">
                                <div class="input-group mb-1" data-repeater-item>
                                  <input type="tel" value="5" placeholder="عدد الاسابيع" class="form-control" id="example-tel-input">
                                  <input type="tel" value="100" placeholder="السعر لكل اسبوع" class="form-control" id="example-tel-input">
                                  <span class="input-group-append" id="button-addon2">
                                    <button class="btn btn-danger" type="button" data-repeater-delete><i class="ft-x"></i></button>
                                  </span>
                                </div>
                              </div>
                              <div data-repeater-list="repeater-group">
                                <div class="input-group mb-1" data-repeater-item>
                                  <input value="10" type="tel" placeholder="عدد الاسابيع" class="form-control" id="example-tel-input">
                                  <input value="90" type="tel" placeholder="السعر لكل اسبوع" class="form-control" id="example-tel-input">
                                  <span class="input-group-append" id="button-addon2">
                                    <button class="btn btn-danger" type="button" data-repeater-delete><i class="ft-x"></i></button>
                                  </span>
                                </div>
                              </div>
                              <button type="button" data-repeater-create class="btn btn-primary">
                                <i class="ft-plus"></i> اضافة سعر جديد
                              </button>
                          </div>

                          <div class="row">
                            <div class="col-md-12">
                              <div class="form-group">
                                <label for="projectinput3">التخفيض</label>
                                <input value="20" type="number" id="projectinput1" min="1" class="form-control" placeholder="00%" name="discount">
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





