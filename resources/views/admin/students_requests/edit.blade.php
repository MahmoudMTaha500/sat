@extends('admin.app') @section('admin.content')
<div class="app-content content vue-app">
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2">
                <h3 class="content-header-title">قسم الطلبات</h3>
                <div class="row breadcrumbs-top">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">لوحة التحكم</a></li>
                            <li class="breadcrumb-item active">تعديل الطلب</li>
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
                            <h4 class="card-title" id="bordered-layout-card-center">تعديل الطلب</h4>
                            <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                        </div>
                        <div class="card-content collpase show">
                            <div class="card-body">
                                @include('admin.includes.errors')
                                <student-request-edit-component
                                     :student_requests_url="{{json_encode( url('/dashboard/student-requests'))}}"
                                     :student_request="{{json_encode($student_request)}}"
                                     get_insurance_price_url = {{route('vue.get.insurance.price.per.week')}}
                                     get_course_price_url = {{route('vue.get.course.price.per.week')}}
                                     bill_file = {{empty($student_request->getFirstMedia('student_request_payment_bill_file')) ? '0' : $student_request->getFirstMedia('student_request_payment_bill_file')->getUrl()}}
                                     csrf_token =  "{{csrf_token()}}"
                                ></student-request-edit-component>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
