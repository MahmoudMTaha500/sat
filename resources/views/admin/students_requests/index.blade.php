@extends('admin.app') @section('admin.content')

<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2">
                <h3 class="content-header-title">قسم الطلابات</h3>
                <div class="row breadcrumbs-top">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">لوحة التحكم</a></li>
                            <li class="breadcrumb-item active">الطلابات</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">


            <student-request-component
            :student_request_url="{{json_encode(url('/dashboard/student-requests/getStudentRequests'))}}"
            :dahsboard_url="{{ json_encode(url('/dashboard')) }}"   
            :countries_from_blade="{{ json_encode($countries) }}"
            :institutes="{{ json_encode($institutes) }}"
            :csrftoken="{{ json_encode(csrf_token()) }}"


            ></student-request-component>
            <!-- Recent Transactions -->
       
            {{-- {{$courses->links()}} --}}
            <!--/ Recent Transactions -->
        </div>
    </div>
</div>
@endsection







