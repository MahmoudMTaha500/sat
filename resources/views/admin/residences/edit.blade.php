@extends('admin.app') @section('admin.content')
<div class="app-content content vue-app">
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2">
                <h3 class="content-header-title">قسم السكن</h3>
                <div class="row breadcrumbs-top">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">لوحة التحكم</a></li>
                            <li class="breadcrumb-item"><a href="{{route('residences.index')}}"> السكن</a></li>
                            <li class="breadcrumb-item active">تعديل سكن</li>
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
                            <h4 class="card-title" id="bordered-layout-card-center">تعديل سكن </h4>
                            <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                        </div>
                        <div class="card-content collpase show">
                            <div class="card-body">
                                <form class="form" action="{{route('residences.update',$residence->id)}}" method="POST">
                                @include('admin.includes.errors')
                                   @method('put')
                                    @csrf
                                    <input type="hidden" name="id" value="{{$residence->id}}">
                                    <div class="form-body">
                                        <div class="row">
                                        
                                            <create-service-component
                                                :countries_from_blade="{{ json_encode($countries) }}" 
                                                :get_institutes_url="{{ json_encode(route('blog.get.institutes.vue')) }}"
                                                :old_country_id="{{json_encode($residence->institute->country->id)}}"
                                                :old_institute_id="{{json_encode($residence->institute_id)}}"
                                            >
                                            </create-service-component>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="institute-name"> السكن</label>
                                                    <input type="text" class="form-control" placeholder="ادخل  السكن" name="name_ar" value="{{$residence->name_ar}}" />
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="institute-name"> السعر</label>
                                                    <input type="number" class="form-control" placeholder="ادخل  السعر" name="price"   value="{{$residence->price}}" />
                                                </div>
                                                <div class="row">
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
@endsection
