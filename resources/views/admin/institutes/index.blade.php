@extends('admin.app')
 @section('admin.content')
 {{$department_name='institutes'}}
 {{$page_name='institute'}}

 <div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2">
                <h3 class="content-header-title">قسم المعاهد</h3>
                <div class="row breadcrumbs-top">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="dashboard">لوحة التحكم</a></li>
                            <li class="breadcrumb-item active">المعاهد</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">
            <institutes-component 
            :instutite_url="{{ json_encode(url('/dashboard/getinstitues')) }}"
            :instutite_url_edit="{{ json_encode(url('/dashboard/institute/')) }}"
            :csrftoken="{{ json_encode(csrf_token()) }}"
            :aprove_route="{{json_encode(url('/dashboard/updateAprovement'))}}"
            :path_logo="{{json_encode(asset('/'))}}"
            :route_create="{{json_encode(url('/dashboard/institute/create'))}}"

           
            ></institutes-component>
        </div>
    </div>
</div>





@endsection
