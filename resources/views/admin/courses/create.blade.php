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
                            <h4 class="card-title" id="bordered-layout-card-center">اضافة دورة جديد</h4>
                            <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                        </div>
                        <div class="card-content collpase show">
                            <div class="card-body">
                                @include('admin.includes.errors')
                                <form class="form" method="POST" action="{{route('courses.store')}}">
                                    @csrf
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="projectinput1">اسم الدورة</label>
                                                    <input type="text" id="projectinput1" class="form-control" placeholder="ادخل اسم الدورة" name="name_ar" value="{{old('name_ar')}}" />
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="projectinput2">المعهد</label>
                                                    <select class="select2 form-control text-left" name="institute_id" value="{{old('institute_id')}}">
                                                        <option value="">اختر المعهد</option>

                                                        @foreach($institutes as $institute)

                                                        <option value="{{$institute->id}}"    @if($institute->id == old('institute_id') )selected @endif>{{$institute->name_ar.' | '.$institute->city->name_ar}}</option>

                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        
                                  
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="projectinput1">الحد الأدنى للعمر </label>
                                                    <input type="number" id="projectinput1" min="1" class="form-control" placeholder="ادخل الحد الادني" name="min_age"  value="{{old('min_age')}}"/>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="projectinput2">وقت الدراسة</label>
                                                    <select class="form-control text-left" name="study_period">
                                                        <option value="">اختر</option>
                                                        <option  @if("صباحي" == old('study_period') )selected @endif  value=" صباحي">صباحي</option>
                                                        <option @if( "مسائي"== old('study_period') )selected @endif value="مسائي">مسائي</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="projectinput1">درس/الأسبوع </label>
                                                    <input type="number"  id="projectinput1" min="1" class="form-control" placeholder="درس/الأسبوع" name="lessons_per_week"  value="{{old('lessons_per_week')}}"  />
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="projectinput1">ساعات/أسبوع </label>
                                                    <input type="number" step="any" id="projectinput1" min="1" class="form-control" placeholder="ساعات/أسبوع" name="hours_per_week"  value="{{old('hours_per_week')}}"  />
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="projectinput2">المستوى المطلوب</label>
                                                    <select class="form-control text-left" name="required_level">
                                                        <option value="">اختر</option>
                                                        <option    @if("مبتدئ" == old('required_level') )selected @endif  value=" مبتدئ ">مبتدئ</option>
                                                        <option   @if("متوسط" == old('required_level') )selected @endif value="     متوسط ">متوسط</option>
                                                        <option    @if("متقدم" == old('required_level') )selected @endif value="  متقدم  ">متقدم</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="projectinput3">وصف الدورة</label>
                                                    <textarea type="text" id="ckeditor" rows="5" class="form-control" placeholder="اضف وصف للدورة" name="desc">{{old('desc')}}</textarea>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="projectinput2">اختر العمله</label>
                                                    <select class="currency_exchange form-control text-left" name="currency_exchange" value="{{old('currency_exchange')}}">
                                                        <option value="">الريال السعودي</option>
                                                        <option value="GBP"> الجنيه الاسترليني</option>
                                                        <option value="USD"> الدولار</option>

                                                  
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="projectinput1"> سعر الصرافه</label>
                                                    <input type="text" id="projectinput1" class="currency_exchange_rate form-control" placeholder="ادخل  سعر الصرافه " name="exchange_money" value="0" />
                                                </div>
                                            </div>
                                            <div class="form-group col-12 mb-2 contact-repeater">
                                                <label for="projectinput3">سعر الكورس</label>
                                                <div data-repeater-list="coures_price">
                                                    <div class="input-group mb-1" data-repeater-item>
                                                        <input type="tel" placeholder="عدد الاسابيع" class="form-control vaildate" id="example-tel-input" name="num_of_weeks"  value="{{old('num_of_weeks')}}"/>
                                                        <input type="tel" placeholder="السعر لكل اسبوع" class="form-control vaildate" id="example-tel-input" name="preice_per_week"   value="{{old('preice_per_week')}}"/>
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
                                                            <input type="number" id="projectinput1" min="1" class="form-control" placeholder="00%" name="discount"   value="{{old('discount')}}" />
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-actions center">
                                                    <button type="submit" class="btn btn-primary w-100 test-btn"><i class="la la-check-square-o"></i> حفظ</button>
                                                </div>
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

@endsection @section('admin.custom-js-scripts')
<script>
    $('.currency_exchange').change(function(){
        if($(this).val() == 'GBP'){ $('.currency_exchange_rate').val('0.21')}
        else if($(this).val() == 'USD'){ $('.currency_exchange_rate').val('0')}
        else{ $('.currency_exchange_rate').val('0')}
    })
    function vaildate() {
        $("form").submit(function (e) {
            var err = 0;
            $(".vaildate").each(function (e) {
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
    $(document).on("click", ".test-btn", function () {
        vaildate();
    });
</script>
@endsection
