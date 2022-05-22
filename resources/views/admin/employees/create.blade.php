@extends('admin.app') @section('admin.content')
<div class="app-content content vue-app">
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2">
                <h3 class="content-header-title">قسم الموظفين</h3>
                <div class="row breadcrumbs-top">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">لوحة التحكم</a></li>
                            <li class="breadcrumb-item"><a href="{{route('employees.index')}}"> الموظفين</a></li>
                            <li class="breadcrumb-item active">اضافة موظف</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">
            <!-- Recent Transactions -->
            <div class="row justify-content-md-center">
                <div class="col-lg-10">
                    <div class="card" style="zoom: 1;">
                        <div class="card-header">
                            <h4 class="card-title" id="bordered-layout-card-center">اضافة موظف جديد</h4>
                            <a href="/sat/courses/create.php" class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                        </div>
                        <div class="card-content collpase show">
                            <div class="card-body">
                                <form class="form" action="{{route('employees.store')}}" method="POST">
                                    @csrf @include('admin.includes.errors')

                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="projectinput1">اسم الموظف</label>
                                                    <input type="text" id="projectinput1" class="form-control" required placeholder="ادخل اسم الموظف" name="name" value="{{old('name')}}" />
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="projectinput2">قسم الموظف</label>
                                                    <select class="employee form-control text-left" required name="role" value="{{old('role')}}">
                                                        <option value="" onclick="admin_emp()">اختر</option>
                                                        <option value="admin" onclick="admin_emp()">ادمن</option>
                                                        <option value="employee" id="employee" >موظف</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="projectinput1">البريد الإلكتروني</label>
                                                    <input type="email" id="projectinput1" class="form-control" required placeholder="ادخل البريد الإلكتروني" name="email" value="{{old('email')}}" />
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="projectinput3">كلمه السر </label>
                                                    <input type="text" id="projectinput3" rows="20" class="form-control" required placeholder="كلمه السر" name="password" value="{{old('password')}}" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row" id="permiossn" style="display: none;">
                                            <div class="col-md-3 mb-3">
                                                <div class="checkbox">
                                                    <h5 for="">المعاهد</h5>
                                                    <label><input name="permession[]" type="checkbox" value="institutes-create" />انشاء</label>
                                                </div>
                                                <div class="checkbox">
                                                    <label><input name="permession[]" type="checkbox" value="institutes-update" />تعديل</label>
                                                </div>
                                                <div class="checkbox">
                                                    <label><input name="permession[]" type="checkbox" value="institutes-read" />عرض</label>
                                                </div>
                                                <div class="checkbox">
                                                    <label><input name="permession[]" type="checkbox" value="institutes-delete" />حذف</label>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="checkbox">
                                                    <h5 for="">الدورات</h5>

                                                    <label><input name="permession[]" type="checkbox" value="courses-create" />انشاء</label>
                                                </div>
                                                <div class="checkbox">
                                                    <label><input name="permession[]" type="checkbox" value="courses-update" />تعديل</label>
                                                </div>
                                                <div class="checkbox">
                                                    <label><input name="permession[]" type="checkbox" value="courses-read" />عرض</label>
                                                </div>
                                                <div class="checkbox">
                                                    <label><input name="permession[]" type="checkbox" value="courses-delete" />حذف</label>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="checkbox">
                                                    <h5 for="">الدول و المدن</h5>
                                                    <label><input name="permession[]" type="checkbox" value="cities-countries-create" />انشاء</label>
                                                </div>
                                                <div class="checkbox">
                                                    <label><input name="permession[]" type="checkbox" value="cities-countries-update" />تعديل</label>
                                                </div>
                                                <div class="checkbox">
                                                    <label><input name="permession[]" type="checkbox" value="cities-countries-read" />عرض</label>
                                                </div>
                                                <div class="checkbox">
                                                    <label><input name="permession[]" type="checkbox" value="cities-countries-delete" />حذف</label>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="checkbox">
                                                    <h5 for="">المقالات</h5>

                                                    <label><input name="permession[]" type="checkbox" value="articals-create" />انشاء</label>
                                                </div>
                                                <div class="checkbox">
                                                    <label><input name="permession[]" type="checkbox" value="articals-update" />تعديل</label>
                                                </div>
                                                <div class="checkbox">
                                                    <label><input name="permession[]" type="checkbox" value="articals-read" />عرض</label>
                                                </div>
                                                <div class="checkbox">
                                                    <label><input name="permession[]" type="checkbox" value="articals-delete" />حذف</label>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="checkbox">
                                                    <h5 for="">الخدمات</h5>
                                                    <label><input name="permession[]" type="checkbox" value="services-create" />انشاء</label>
                                                </div>
                                                <div class="checkbox">
                                                    <label><input name="permession[]" type="checkbox" value="services-update" />تعديل</label>
                                                </div>
                                                <div class="checkbox">
                                                    <label><input name="permession[]" type="checkbox" value="services-read" />عرض</label>
                                                </div>
                                                <div class="checkbox">
                                                    <label><input name="permession[]" type="checkbox" value="services-delete" />حذف</label>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="checkbox">
                                                    <h5 for="">الطلاب</h5>

                                                    <label><input name="permession[]" type="checkbox" value="students-create" />انشاء</label>
                                                </div>
                                                <div class="checkbox">
                                                    <label><input name="permession[]" type="checkbox" value="students-update" />تعديل</label>
                                                </div>
                                                <div class="checkbox">
                                                    <label><input name="permession[]" type="checkbox" value="students-read" />عرض</label>
                                                </div>
                                                <div class="checkbox">
                                                    <label><input name="permession[]" type="checkbox" value="students-delete" />حذف</label>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="checkbox">
                                                    <h5 for="">طلابات الطلابه</h5>
                                                    <label><input name="permession[]" type="checkbox" value="student-requests-create" />انشاء</label>
                                                </div>
                                                <div class="checkbox">
                                                    <label><input name="permession[]" type="checkbox" value="student-requests-update" />تعديل</label>
                                                </div>
                                                <div class="checkbox">
                                                    <label><input name="permession[]" type="checkbox" value="student-requests-read" />عرض</label>
                                                </div>
                                                <div class="checkbox">
                                                    <label><input name="permession[]" type="checkbox" value="student-requests-delete" />حذف</label>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="checkbox">
                                                    <h5 for="">الفيزا</h5>
                                                    <label><input name="permession[]" type="checkbox" value="visas-create" />انشاء</label>
                                                </div>
                                                <div class="checkbox">
                                                    <label><input name="permession[]" type="checkbox" value="visas-update" />تعديل</label>
                                                </div>
                                                <div class="checkbox">
                                                    <label><input name="permession[]" type="checkbox" value="visas-read" />عرض</label>
                                                </div>
                                                <div class="checkbox">
                                                    <label><input name="permession[]" type="checkbox" value="visas-delete" />حذف</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-actions center">
                                        <button type="submit" class="btn btn-primary w-100"><i class="la la-check-square-o"></i> حفظ</button>
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

@endsection @section('admin.custom-js-scripts')
<script>
    $(".employee").change(function(){
        if($(this).val() == 'employee'){
            $('#permiossn').show()
        }else{
            $('#permiossn').hide()
        }
    });
</script>
@endsection
