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
                            <li class="breadcrumb-item active">اضافة سكن</li>
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
                            <h4 class="card-title" id="bordered-layout-card-center">اضافة سكن جديده</h4>
                            <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                        </div>
                        <div class="card-content collpase show">
                            <div class="card-body">
                                <form class="form" action="{{route('residences.store')}}" method="POST">
                                @include('admin.includes.errors')

                                    @csrf
                                    <div class="form-body">
                                        <div class="row">
                                            <create-service-component
                                                :countries_from_blade="{{ json_encode($countries) }}" 
                                                :get_institutes_url="{{ json_encode(route('blog.get.institutes.vue')) }}"
                                                :old_country_id="{{json_encode(old('country_id'))}}"
                                                :old_institute_id="{{json_encode(old('institute_id'))}}"
                                            >
                                            </create-service-component>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="institute-name"> السكن</label>
                                                    <input type="text" class="form-control" placeholder="ادخل  السكن" name="name_ar"  value="{{old('name_ar')}}" />
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="institute-name"> السعر</label>
                                                    <input type="number" class="form-control" placeholder="ادخل  السعر" name="price"  value="{{old('price')}}" />
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
