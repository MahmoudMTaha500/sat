@extends('admin.app') @section('admin.content')
<div class="app-content content vue-app">
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2">
                <h3 class="content-header-title">قسم المعاهد</h3>
                <div class="row breadcrumbs-top">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">لوحة التحكم</a></li>
                            <li class="breadcrumb-item"><a href="{{route('courses.index')}}"> الدورات</a></li>
                            <li class="breadcrumb-item active">اضافة دورة</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">
            @if ($message = Session::get('success'))
            <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ $message }}</strong>
            </div>
            @endif @if ($message = Session::get('error'))
            <div class="alert alert-danger alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ $message }}</strong>
            </div>
            @endif
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
                                                    <label for="projectinput1">اسم الدورة</label>
                                                    <input type="text" id="projectinput1" class="form-control" placeholder="ادخل اسم الدورة" name="fname" />
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="projectinput2">المعهد</label>
                                                    <select class="select2 form-control text-left">
                                                        <option value="">كابلان</option>
                                                        <option value="1">ام اي تي</option>
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
                                                    <input type="number" id="projectinput1" min="1" class="form-control" placeholder="ادخل الحد الادني" name="fname" />
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="projectinput2">يبدأ الكورس كل</label>
                                                    <select class="form-control text-left">
                                                        <option value="">سبت</option>
                                                        <option value="1">احد</option>
                                                        <option value="3">اثنين</option>
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
                                                    <input type="number" id="projectinput1" min="1" class="form-control" placeholder="ادخل العدد الأقصى للطلاب" name="fname" />
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="projectinput2">وقت الدراسة</label>
                                                    <select class="form-control text-left">
                                                        <option value="">صباحي</option>
                                                        <option value="1">مسائي</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="projectinput1">درس/الأسبوع </label>
                                                    <input type="number" id="projectinput1" min="1" class="form-control" placeholder="درس/الأسبوع" name="fname" />
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="projectinput1">ساعات/أسبوع </label>
                                                    <input type="number" id="projectinput1" min="1" class="form-control" placeholder="ساعات/أسبوع" name="fname" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="projectinput1">متوسط عدد الطلاب في الصف </label>
                                                    <input type="number" id="projectinput1" min="1" class="form-control" placeholder="ادخل متوسط عدد الطلاب" name="fname" />
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="projectinput2">المستوى المطلوب</label>
                                                    <select class="form-control text-left">
                                                        <option value="">مبتدئ</option>
                                                        <option value="1">متوسط</option>
                                                        <option value="1">متقدم</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="projectinput3">وصف الدورة</label>
                                                    <textarea type="text" id="projectinput3" rows="20" class="form-control" placeholder="اضف وصف للدورة" name="desc"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="projectinput4">صورة الدورة</label>
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" id="inputGroupFile01" />
                                                        <label class="custom-file-label" for="inputGroupFile01">اختر الصورة</label>
                                                    </div>
                                                    <div class="mt-3">
                                                        <img class="w-100" src="../adminTheme-master/html/rtl/vertical-content-menu-template/../../../app-assets/images/crop-pic.jpg" alt="" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group col-12 mb-2 contact-repeater">
                                            <label for="projectinput3">سعر الكورس</label>
                                            <div data-repeater-list="repeater-group">
                                                <div class="input-group mb-1" data-repeater-item>
                                                    <input type="tel" placeholder="عدد الاسابيع" class="form-control" id="example-tel-input" />
                                                    <input type="tel" placeholder="السعر لكل اسبوع" class="form-control" id="example-tel-input" />
                                                    <span class="input-group-append" id="button-addon2">
                                                        <button class="btn btn-danger" type="button" data-repeater-delete><i class="ft-x"></i></button>
                                                    </span>
                                                </div>
                                            </div>
                                            <button type="button" data-repeater-create class="btn btn-primary"><i class="ft-plus"></i> اضافة سعر جديد</button>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="projectinput3">التخفيض</label>
                                                        <input type="number" id="projectinput1" min="1" class="form-control" placeholder="00%" name="discount" />
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-actions center">
                                                <button type="submit" class="btn btn-primary w-100"><i class="la la-check-square-o"></i> حفظ</button>
                                            </div>
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

@endsection
