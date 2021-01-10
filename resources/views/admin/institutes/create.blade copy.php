@extends('admin.app') @section('admin.content')
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
                                                    <label for="institute-name">اسم المعهد</label>
                                                    <input type="text" id="institute-name" class="form-control" placeholder="ادخل اسم المعهد" name="name_ar" />
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="institute-about">نبذة عن المعهد</label>
                                                    <textarea type="text" id="institute-about" class="form-control" placeholder="نبذة عن المعهد" name="about_ar"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="country">الدولة</label>
                                                    <select id="country" class="select2 form-control text-left">
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
                                                    <label for="city">المدينة </label>
                                                    <div class="d-flex input-group">
                                                        
                                                        <span class="input-group-append w-100" id="button-addon2">
                                                            <select id="city" class="select2 form-control">
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
                                                            <button type="button" data-toggle="modal" data-target="#create-new-city" class="btn btn-success btn-sm"><i class="ft-plus"></i></button>
                                                        </span>
                                                    </div>
                                                    
                                                    <!-- Create New City Form -->   
                                                    
                                                    <div class="modal fade" id="create-new-city"  role="dialog" aria-labelledby="create-new-city-modal" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                            <h5 class="modal-title" id="create-new-city-modal">انشاء مدينة جديدة</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="row">
                                                                    <div class="col-12">
                                                                        <div class="form-group">
                                                                            <label>اختر الدولة</label>

                                                                            <h2 v-text="message"></h2>
                                                                            <select class=" select2 form-control text-left" > 
                                                                                    
                                                                            <option  v-for="country in countries"  :key="country.id"  :value="country.id" :text=""> @{{country.name_ar}} </option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-12">
                                                                        <div class="form-group">
                                                                            <label>المدينة</label>
                                                                            <input class="form-control" type="text" placeholder="ادخل اسم المدينة">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                            <button type="button" class="btn btn-success w-100">انشاء</button>
                                                           
                                                            </div>
                                                        </div>
                                                        </div>
                                                    </div>

                                                    
                                           
                                           
                                                    {{-- <cities-component></cities-component> --}}


                                                  
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="form-group col-12 mb-2 contact-repeater">
                                                <label>الاسئلة الخاصة بالمعهد</label>
                                                <div data-repeater-list="repeater-group">
                                                    <div class="input-group mb-1" data-repeater-item>
                                                        <input type="tel" placeholder="السؤال" class="form-control"/>
                                                        <input type="tel" placeholder="الاجابة" class="form-control"/>
                                                        <span class="input-group-append" id="button-addon2">
                                                            <button class="btn btn-danger" type="button" data-repeater-delete><i class="ft-x"></i></button>
                                                        </span>
                                                    </div>
                                                </div>
                                                <button type="button" data-repeater-create class="btn btn-success btn-sm"><i class="ft-plus"></i> اضافة سؤال جديد</button>
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
                                                    <div class="mt-1">
                                                        <img class="w-100" src="{{url('/admin')}}/app-assets/images/crop-pic.jpg" alt="">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group image-box-input">
                                                    <label for="projectinput4">صورة المعهد</label>
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input image-input" id="inputGroupFile01" />
                                                        <label class="custom-file-label" for="inputGroupFile01">اختر الصورة</label>
                                                    </div>
                                                    <div class="mt-1 image-box">
                                                        <img class="w-100" src="{{url('/admin')}}/app-assets/images/crop-pic.jpg" alt="">
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
<script src="https://cdn.jsdelivr.net/npm/vue@2"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js" integrity="sha512-bZS47S7sPOxkjU/4Bt0zrhEtWx0y0CRkhEp8IckzK+ltifIIE9EMIMTuT/mEzoIMewUINruDBIR/jJnbguonqQ==" crossorigin="anonymous"></script>
<script>

        Vue.component("countries-component",{
        data: function(){
          return {
      
    }
        },
        props:["name_ar"],
        template:'<p>@{{name_ar}} </p> '
        });

var app = new Vue({
  el: '#app',
  data: {
    message: 'Hello Vue!',
    countries :{},
    items:['a','b','q','a']

  },
  methods: {
    getCountry(){
        axios.get("country").then( response => this.countries = response.data.country);
return this.countries;
         }
},
created() {

  this.getCountry()  
  console.log(this.getCountry());
  },
})
// alert(1111)

</script>


@endsection
