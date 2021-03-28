@extends('admin.app') @section('admin.content')
<div class="app-content content vue-app">
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2">
                <h3 class="content-header-title">قسم الطلابات</h3>
                <div class="row breadcrumbs-top">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">لوحة التحكم</a></li>
                            <li class="breadcrumb-item active"> تعديل الطلب</li>
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
                            <h4 class="card-title" id="bordered-layout-card-center">تعديل الطلب </h4>
                            <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                        </div>
                        <div class="card-content collpase show">
                            <div class="card-body">
                                <form class="form" method="POST" action="{{route('student-requests.update',$request_student->id)}}">
                                    @csrf
                                    @method('put')
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="projectinput2">الحاله</label>
                                                    <select class="select2 form-control text-left" name="status" required>
                                                        <option value=""  >اختر الحاله</option>

                                                        <option    @if($request_student->status == 'جديد') selected @endif  value="جديد"> جديد</option>
                                                        <option       @if($request_student->status == 'حصل علي قبول') selected @endif  value="حصل علي قبول">  حصل علي قبول </option>
                                                        <option       @if($request_student->status == 'بداء الدراسة') selected @endif   value="بداء الدراسة"> بداء الدراسة</option>
                                                        <option      @if($request_student->status == 'مرفوض') selected @endif   value="مرفوض"> مرفوض</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="projectinput3">رساله المعهد </label>
                                                    <textarea type="text" id="projectinput3" rows="20" class="form-control" placeholder="  رساله المعهد " name="desc" required>{{$request_student->institute_message}}</textarea>
                                                </div>
                                            </div>
                                        
                                        </div>
                                     <student-request-edit-component
                                     :student_requests_url="{{json_encode( url('/dashboard/student-requests'))}}"
                                     :request_student2="{{json_encode($request_student)}}"
                                     :residence_obj="{{json_encode($request_student->course->institute->residence)}}"
                                     :airport_obj2="{{json_encode($request_student->course->institute->airport)}}"
                                     :courses_price="{{$request_student->course->coursesPrice}}"
                                     ></student-request-edit-component>
                                    





                                    <div class="form-actions center">
                                    <button type="submit" class="btn btn-primary w-100  test-btn"><i class="la la-check-square-o"></i> حفظ</button>
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
@section('admin.custom-js-scripts')
    <script>
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
