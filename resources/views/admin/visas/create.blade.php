@extends('admin.app') @section('admin.content')
<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2">
                <h3 class="content-header-title">قسم التاشيرات</h3>
                <div class="row breadcrumbs-top">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">لوحة التحكم</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('visas.index') }}">التاشيرات</a></li>
                            <li class="breadcrumb-item active">اضافة تاشيرة</li>
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
                            <h4 class="card-title" id="bordered-layout-card-center">اضافة تاشيرة جديد</h4>
                            <a href="/sat/courses/create.php" class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                        </div>
                        <div class="card-content collpase show">
                            <div class="card-body">
                                <form class="form" method="post" action="{{route('visas.store')}}">
                                    @csrf
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="projectinput2"> تصنيف التاشيرة</label>
                                                    <select class="form-control text-left">
                                                        <option value="">سياحيه</option>
                                                        <option value="1">اقامه</option>
                                                        <option value="3">دراسيه</option>
                                                        <option value="6">انجلترا </option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="projectinput2"> الدوله</label>
                                                    <select class="select2 form-control text-left">
                                                        <option value="">المانيا</option>
                                                        <option value="1">السعوديه</option>
                                                        <option value="3">الامارات</option>
                                                        <option value="6">انجلترا </option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="form-group col-12 mb-2 contact-repeater">
                                                <label for="projectinput3">اضافة اسئله الي التاشيرة </label>
                                                <div class="repeated-dev-box">
                                                    <div class="repeated-dev">
                                                        <div class="repeated-el">
                                                            <div class="input-group mb-1">
                                                                <input type="tel" name="priority[]" placeholder="الاولوية" class="form-control visa-question" id="example-tel-input" />
                                                                <select name="visa_question_type[]" class="form-control text-left visa-question-type">
                                                                    <option value="">اختر نوع السؤال</option>
                                                                    <option value="name">اسم</option>
                                                                    <option value="email">بريد إلكتروني</option>
                                                                    <option value="phone">هاتف</option>
                                                                    <option value="text">نص </option>
                                                                    <option value="long_text">نص كبير </option>
                                                                    <option value="select">متعدد الخيارات </option>
                                                                    <option value="file">ملف </option>
                                                                </select>
                                                                <input style="display: none" name="visa_question_select[]" class="form-control visa-question-select" type="text" placeholder="قم بفصل الخيارات بعلامة الفاصلة (,)">
                                                                <input name="visa_question[]" type="tel" placeholder="اكتب السؤال" class="form-control visa-question" id="example-tel-input" />
                                                                <span class="input-group-append" id="button-addon2">
                                                                    <button class="btn btn-danger repeated-close-btn" type="button" data-repeater-delete><i class="ft-x"></i></button>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <button type="button" class="btn btn-primary visa-repeated-btn"><i class="ft-plus"></i> اضافة سؤال جديد</button>
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
            <!--/ Recent Transactions -->
        </div>
    </div>
</div>
@endsection
