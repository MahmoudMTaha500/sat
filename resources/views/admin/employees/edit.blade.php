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
                      <a  href="/sat/courses/create.php" class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                      
                    </div>
                    <div class="card-content collpase show">
                      <div class="card-body">
                      <form class="form"   action="{{route('employees.update',$user->id)}}" method="POST">
                        @csrf  
                        @method('put')
                        @include('admin.includes.errors')

                        <div class="form-body">
                            <div class="row">
                              <div class="col-md-6">
    
                                <div class="form-group">
                                  <label for="projectinput1">اسم الموظف</label>
                                  <input type="text" id="projectinput1" class="form-control" required placeholder="ادخل اسم الموظف"
                                  name="name" value="{{$user->name}}">
                                </div>
                              </div>
                              <div class="col-md-6">

                                <div class="form-group">
                                  <label for="projectinput2">قسم الموظف</label>
                                  <select class=" form-control text-left" required name="role"  value="{{$user->role}}">
                                      <option     value=""  onclick="admin_emp()">اختر</option>
                                      <option   @if($user->hasRole('admin')) selected   @endif  value="admin"  onclick="admin_emp()">ادمن</option>
                                      <option    @if($user->hasRole('employee')) selected   @endif value="employee"  id="employee" onclick="employee();"  >موظف</option>
                                   
                                  </select>
                                </div>
                              </div>
                              <div class="col-md-6">

                                <div class="form-group">
                                  <label for="projectinput1">البريد الإلكتروني</label>
                                  <input type="email" id="projectinput1" class="form-control" required placeholder="ادخل البريد الإلكتروني"
                                  name="email"  value="{{$user->email}}">
                                </div>
                              </div>
                              <div class="col-md-6">

                                <div class="form-group">
                                  <label for="projectinput3">كلمه السر </label>
                                  <input type="text" id="projectinput3" rows="20" class="form-control"  placeholder="كلمه السر" name="password"  value="{{old('password')}}">
                                </div>
                              </div>
                            </div>
                              <div class="row" id="permiossn"       @if($user->hasRole('employee'))  style="display: " @else   style="display: none"  @endif  >
                              <div class="col-md-3 mb-3"> 

                                <div class="checkbox">
                                    <h5 for=""> المعاهد</h5>
                                    <label><input      name="permession[]"     @if($user->hasPermission('institutes-create')) checked  @endif type="checkbox" value="institutes-create">انشاء</label>
                                  </div>
                                  <div class="checkbox">
                                    <label><input      name="permession[]"   type="checkbox"    @if($user->hasPermission('institutes-update')) checked  @endif value="institutes-update">تعديل</label>
                                  </div>
                                  <div class="checkbox  ">
                                    <label><input      name="permession[]"   type="checkbox"   @if($user->hasPermission('institutes-read')) checked  @endif  value="institutes-read"  >عرض</label>
                                  </div>
                                   <div class="checkbox  ">
                                    <label><input      name="permession[]"   type="checkbox"    @if($user->hasPermission('institutes-delete')) checked  @endif  value="institutes-delete"  >حذف</label>
                                  </div> 
                              </div>
                              <div class="col-md-3"> 

                                <div class="checkbox">
                                    <h5 for=""> الدورات</h5>

                                    <label><input     name="permession[]"    type="checkbox"   @if($user->hasPermission('courses-create')) checked  @endif value="courses-create">انشاء</label>
                                  </div>
                                  <div class="checkbox">
                                    <label><input     name="permession[]"    type="checkbox"   @if($user->hasPermission('courses-update')) checked  @endif value="courses-update">تعديل</label>
                                  </div>
                                  <div class="checkbox  ">
                                    <label><input      name="permession[]"   type="checkbox"    @if($user->hasPermission('courses-read')) checked  @endif value="courses-read"  >عرض</label>
                                  </div>
                                  <div class="checkbox  ">
                                    <label><input      name="permession[]"   type="checkbox"   @if($user->hasPermission('courses-delete')) checked  @endif value="courses-delete"  >حذف</label>
                                  </div> 
                              </div>  
                              <div class="col-md-3"> 

                                <div class="checkbox">
                                    <h5 for=""> الدول و المدن</h5>
                                    <label><input     name="permession[]"    type="checkbox"    @if($user->hasPermission('cities-countries-create')) checked  @endif value="cities-countries-create">انشاء</label>
                                  </div>
                                  <div class="checkbox">
                                    <label><input     name="permession[]"    type="checkbox"   @if($user->hasPermission('cities-countries-update')) checked  @endif value="cities-countries-update">تعديل</label>
                                  </div>
                                  <div class="checkbox  ">
                                    <label><input     name="permession[]"    type="checkbox"   @if($user->hasPermission('cities-countries-read')) checked  @endif  value="cities-countries-read"  >عرض</label>
                                  </div>
                                  <div class="checkbox  ">
                                    <label><input      name="permession[]"   type="checkbox"   @if($user->hasPermission('cities-countries-delete')) checked  @endif value="cities-countries-delete"  >حذف</label>
                                  </div> 
                              </div>
                              <div class="col-md-3"> 

                                <div class="checkbox">
                                    <h5 for=""> المقالات</h5>

                                    <label><input     name="permession[]"    type="checkbox"    @if($user->hasPermission('articals-create')) checked  @endif value="articals-create">انشاء</label>
                                  </div>
                                  <div class="checkbox">
                                    <label><input      name="permession[]"   type="checkbox"    @if($user->hasPermission('articals-update')) checked  @endif value="articals-update">تعديل</label>
                                  </div>
                                  <div class="checkbox  ">
                                    <label><input      name="permession[]"   type="checkbox"   @if($user->hasPermission('articals-read')) checked  @endif value="articals-read"  >عرض</label>
                                  </div>
                                  <div class="checkbox  ">
                                    <label><input     name="permession[]"    type="checkbox"   @if($user->hasPermission('articals-delete')) checked  @endif value="articals-delete"  >حذف</label>
                                  </div> 
                              </div>  
                              <div class="col-md-3"> 

                                <div class="checkbox">
                                    <h5 for=""> الخدمات</h5>
                                    <label><input      name="permession[]"   type="checkbox"   @if($user->hasPermission('services-create')) checked  @endif value="services-create">انشاء</label>
                                  </div>
                                  <div class="checkbox">
                                    <label><input     name="permession[]"    type="checkbox"   @if($user->hasPermission('services-update')) checked  @endif value="services-update">تعديل</label>
                                  </div>
                                  <div class="checkbox  ">
                                    <label><input     name="permession[]"    type="checkbox"   @if($user->hasPermission('services-read')) checked  @endif value="services-read"  >عرض</label>
                                  </div>
                                  <div class="checkbox  ">
                                    <label><input      name="permession[]"   type="checkbox"   @if($user->hasPermission('services-delete')) checked  @endif value="services-delete"  >حذف</label>
                                  </div> 
                              </div>
                              <div class="col-md-3"> 

                                <div class="checkbox">
                                    <h5 for=""> الطلاب</h5>

                                    <label><input      name="permession[]"   type="checkbox"   @if($user->hasPermission('students-create')) checked  @endif value="students-create">انشاء</label>
                                  </div>
                                  <div class="checkbox">
                                    <label><input      name="permession[]"   type="checkbox"   @if($user->hasPermission('students-update')) checked  @endif value="students-update">تعديل</label>
                                  </div>
                                  <div class="checkbox  ">
                                    <label><input     name="permession[]"   type="checkbox"    @if($user->hasPermission('students-read')) checked  @endif value="students-read"  >عرض</label>
                                  </div>
                                  <div class="checkbox  ">
                                    <label><input     name="permession[]"    type="checkbox"   @if($user->hasPermission('students-delete')) checked  @endif value="students-delete"  >حذف</label>
                                  </div> 
                              </div>  
                              <div class="col-md-3"> 

                                <div class="checkbox">
                                    <h5 for=""> طلابات الطلابه</h5>
                                    <label><input      name="permession[]"   type="checkbox"   @if($user->hasPermission('student-requests-create')) checked  @endif value="student-requests-create">انشاء</label>
                                  </div>
                                  <div class="checkbox">
                                    <label><input     name="permession[]"    type="checkbox"   @if($user->hasPermission('student-requests-update')) checked  @endif value="student-requests-update">تعديل</label>
                                  </div>
                                  <div class="checkbox  ">
                                    <label><input     name="permession[]"    type="checkbox"   @if($user->hasPermission('student-requests-read')) checked  @endif value="student-requests-read"  >عرض</label>
                                  </div>
                                  <div class="checkbox  ">
                                    <label><input     name="permession[]"    type="checkbox"    @if($user->hasPermission('student-requests-delete')) checked  @endif value="student-requests-delete"  >حذف</label>
                                  </div> 
                              </div>
                              <div class="col-md-3"> 

                                <div class="checkbox">
                                    <h5 for=""> الفيزا</h5>
                                    <label><input     name="permession[]"    type="checkbox"  @if($user->hasPermission('visas-create')) checked  @endif value="visas-create">انشاء</label>
                                  </div>
                                  <div class="checkbox">
                                    <label><input     name="permession[]"    type="checkbox"   @if($user->hasPermission('visas-update')) checked  @endif value="visas-update">تعديل</label>
                                  </div>
                                  <div class="checkbox  ">
                                    <label><input     name="permession[]"    type="checkbox"   @if($user->hasPermission('visas-read')) checked  @endif value="visas-read"  >عرض</label>
                                  </div>
                                  <div class="checkbox  ">
                                    <label><input      name="permession[]"   type="checkbox"   @if($user->hasPermission('visas-delete')) checked  @endif value="visas-delete"  >حذف</label>
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



@endsection

@section('admin.custom-js-scripts')
    <script>
function employee(){
var emp = document.getElementById('employee').value;
document.getElementById("permiossn").style.display = "";
// $("#permiossn").style('','');



}
function admin_emp(){
document.getElementById("permiossn").style.display = "none";

}
// if(emp == 3){
//     alert(emp)

// }

// $("#employee").click(function(){
//     alert(21321231);
// })


         function vaildate(){
$('form').submit(function(e) {
      var err = 0;
      $('.vaildate').each(function(e){
            // alert(this.value);
            if (!$(this).val()) {
              err = 1;
            }
        });
      if (err != 0) {
alert("يرجي ادخل اسعار الدورة");
        return false;
      }
    //   console.log('submitted');
    });
    }
    $(document).on('click' , '.test-btn' , function(){
      vaildate()
    })
    </script>
@endsection