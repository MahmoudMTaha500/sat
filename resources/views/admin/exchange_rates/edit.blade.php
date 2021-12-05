@extends('admin.app') @section('admin.content')
<div class="app-content content vue-app">
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2">
                <h3 class="content-header-title">قسم صرف العملات</h3>
                <div class="row breadcrumbs-top">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">لوحة التحكم</a></li>
                            <li class="breadcrumb-item"><a href="{{route('courses.index')}}"> صرف العملات</a></li>
                            <li class="breadcrumb-item active">اضافة صرف عملة</li>
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
                            <h4 class="card-title" id="bordered-layout-card-center">اضافة صرف عملة جديد</h4>
                            <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                        </div>
                        <div class="card-content collpase show">
                            <div class="card-body">
                                @include('admin.includes.errors')
                                <form class="form" method="POST" action="{{route('exchange-rate.update',$exchange_rate->id)}}">
                                    @csrf @method('put')
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="projectinput2">العملة الرئيسية</label>
                                                    <select disabled class="select2 form-control text-left" name="base_currency_code">
                                                        <option selected value="{{$exchange_rate->base_currency_code}}"> @lang('website_lang.'.$exchange_rate->base_currency_code)</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="projectinput2">العملة المحولة</label>
                                                    <select disabled class="select2 form-control text-left" name="currency_code">
                                                        <option selected value="{{$exchange_rate->currency_code}}"> @lang('website_lang.'.$exchange_rate->currency_code) </option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>سعر الصرف </label>
                                                    <input type="text"   class="form-control"  name="exchange_rates"  value="{{$exchange_rate->exchange_rates}}"  />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-actions center">
                                            <button type="submit" class="btn btn-primary w-100 test-btn"><i class="la la-check-square-o"></i> حفظ</button>
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
