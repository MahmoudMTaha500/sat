@extends('admin.app') @section('admin.content')
<<<<<<< HEAD
=======

>>>>>>> 07813f2c31e649ad38d82a4eafa8bac26cf6052e
<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2">
                <h3 class="content-header-title">قسم المعاهد</h3>
                <div class="row breadcrumbs-top">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">لوحة التحكم</a></li>

                            <li class="breadcrumb-item"><a href="{{route('dashboard.institutes')}}"> المعاهد</a></li>
                            <li class="breadcrumb-item active">اضافة معهد</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">
            <div class="row justify-content-md-center">
                <div class="col-lg-10">
                    <div class="card" style="zoom: 1;">
                        <div class="card-header">
                            <h4 class="card-title" id="bordered-layout-card-center">اضافة معهد جديد</h4>
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
                                                    <input type="text" id="eventRegInput1" class="form-control" placeholder="ادخل اسم المعهد" name="fullname" />
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="projectinput3">نبذة عن المعهد</label>
                                                    <textarea type="text" id="projectinput3" class="form-control" placeholder="نبذة عن المعهد" name="desc"></textarea>
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
                                                        <option value="3">كندا</option>
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
                                        </div>

                                        <div class="row">
                                            <div class="form-group col-12 mb-2 contact-repeater">
                                                <label for="projectinput3">الاسئلة الخاصة بالمعهد</label>
                                                <div data-repeater-list="repeater-group">
                                                    <div class="input-group mb-1" data-repeater-item>
                                                        <input type="tel" placeholder="السؤال" class="form-control" id="example-tel-input" />
                                                        <input type="tel" placeholder="الاجابة" class="form-control" id="example-tel-input" />
                                                        <span class="input-group-append" id="button-addon2">
                                                            <button class="btn btn-danger" type="button" data-repeater-delete><i class="ft-x"></i></button>
                                                        </span>
                                                    </div>
                                                </div>
                                                <button type="button" data-repeater-create class="btn btn-primary"><i class="ft-plus"></i> اضافة سؤال جديد</button>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="projectinput4">لوجو المعهد</label>
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" id="inputGroupFile01" />
                                                        <label class="custom-file-label" for="inputGroupFile01">اختر الصورة</label>
                                                    </div>
                                                    <div class="mt-3">
<<<<<<< HEAD
                                                        <img class="w-100" src="../adminTheme-master/html/rtl/vertical-content-menu-template/../../../app-assets/images/crop-pic.jpg" alt="" />
=======
                                                        <img class="w-100" src="{{url('/admin')}}/app-assets/images/crop-pic.jpg" alt="" />
>>>>>>> 07813f2c31e649ad38d82a4eafa8bac26cf6052e
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="projectinput4">صورة المعهد</label>
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" id="inputGroupFile01" />
                                                        <label class="custom-file-label" for="inputGroupFile01">اختر الصورة</label>
                                                    </div>
                                                    <div class="mt-3">
<<<<<<< HEAD
                                                        <img class="w-100" src="../adminTheme-master/html/rtl/vertical-content-menu-template/../../../app-assets/images/crop-pic.jpg" alt="" />
=======
                                                        <img class="w-100" src="{{url('/admin')}}/app-assets/images/crop-pic.jpg" alt="" />
>>>>>>> 07813f2c31e649ad38d82a4eafa8bac26cf6052e
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-actions center">
                                            <button type="submit" class="btn btn-primary w-100"><i class="la la-check-square-o"></i> حفظ</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<<<<<<< HEAD
=======

>>>>>>> 07813f2c31e649ad38d82a4eafa8bac26cf6052e
@endsection
