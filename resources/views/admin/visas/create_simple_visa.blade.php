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
                            <h4 class="card-title" id="bordered-layout-card-center">اضافة تاشيرة جديد</h4>
                            <a href="/sat/courses/create.php" class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                        </div>
                        <div class="card-content collpase show">
                            <div class="card-body">
                                <form class="form" action="{{route('simple-visa.store')}}" method="POST">
                                    @csrf
                                    <div class="form-body">

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="projectinput2"> الاسم </label>
                                                 <input type="text" class="form-control" name="name"  required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="projectinput2"> البريد الالكتروني </label>
                                                 <input type="email" class="form-control" name="email"  required>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="projectinput2"> الهاتف </label>
                                                 <input type="text" class="form-control" name="name"  required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="projectinput2"> الدوله</label>
                                                    <select class=" form-control text-left"  onchange="visatype(event)" name="country_id" required>
                                                        <option value="" selected disabled>اختر الدوله</option>
                                                        <option  value="England"  > England  </option>
                                                        <option value="USA"  > USA  </option>
                                                        <option value="Schengen"  > Schengen </option>
                                                 
                                                    </select>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="projectinput2"> تصنيف التاشيرة</label>
                                                    <select class="   form-control text-left "  name="category_id" required>
                                                        <option  value=""  selected disabled>اختر التاشيرة</option>
                                                        <option   onclick="visaprice(820)"  class="uk" value=" سياحي 6 شهور   "   >سياحي 6 شهور-السعر-820 </option>
                                                        <option  onclick="visaprice(820)"  class="uk" value=" دراسي 6 شهور   "   >دراسي 6 شهور-السعر-820 </option>
                                                        <option  onclick="visaprice(2480)"  class="uk" value="  سياحي سنتين "   > سياحي سنتين -السعر-2480</option>
                                                        <option  onclick="visaprice(4310)"  class="uk" value="  سياحي 5 سنوات"   >   سياحي 5 سنوات-4310</option>
                                                        <option   onclick="visaprice(5350)" class="uk" value="  سياحي 10 سنوات"   >   سياحي 10 سنوات-5350</option>
                                                        <option  onclick="visaprice(2260)"  class="uk" value=" تاشيره طالب اقل من سته شهور "   >تاشيره طالب اقل من سته شهور-السعر-2260 </option>
                                                        <option  onclick="visaprice(4900)"  class="uk" value=" تاشيره طالب سنه "   >تاشيره طالب سنه-السعر-4900 </option>
                                                        <option  onclick="visaprice(8960)"  class="uk" value="  تاشيره طالب سنتين"   > تاشيره طالب سنتين-السعر-8960 </option>
                                                        <option   onclick="visaprice(11640)" class="uk" value=" تاشيره طالب ثلاث سنوات"   >  تاشيره طالب ثلاث سنوات-السعر-11640</option>
                                                        <option  onclick="visaprice(14250)"  class="uk" value="  تاشيره طالب اربع سنوات"   >  تاشيره طالب اربع سنوات-السعر-14250</option>
                                                        <option   onclick="visaprice(3940)" class="uk" value="  دراسي 11 شهر"   >  دراسي 11 شهر-السعر-3940 </option>

                                                        <option  onclick="visaprice(2220)"  class="usa" value="  دراسي شامل السفيس"   >  دراسي شامل السفيس-السعر-2220</option>
                                                        <option  onclick="visaprice(838)"  class="usa" value=" مرافق"   > مرافق-السعر-838</option>
                                                        <option  onclick="visaprice(838)"  class="usa" value=" سياحي"   > سياحي-السعر-838</option>
                                                        <option   onclick="visaprice(730)"  class="schengen" value=" سياحي"   > سياحي-السعر-730</option>
                                                    </select>
                                                    <input type="hidden" id="price_visa" name="price">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="projectinput2"> الدوله</label>
                                                    <select class="select2 form-control text-left" name="country_id" required>
                                                        <option value="" selected disabled>اختر الدوله</option>
                                                 
                                                        </select>
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
<script>
function visatype(){
    // alert(1111);
var visa =event.target.value;
    if( visa =='England'){
    // alert(event.target.value);
     $('.usa').css('display','none');
     $('.schengen').css('display','none');

     $('.uk').css('display','');

    } 
     if(visa == 'USA'){
        $('.uk').css('display','none');
     $('.schengen').css('display','none'); 
     $('.usa').css('display','');

    } 
    
    if(visa == 'Schengen'){
        $('.uk').css('display','none');
     $('.usa').css('display','none'); 
     $('.schengen').css('display','');

    }

}

function visaprice(price){
// alert(price);
$("#price_visa").value(price);
}

</script>