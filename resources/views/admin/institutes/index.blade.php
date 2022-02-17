@extends('admin.app') @section('admin.content') {{$department_name='institutes'}} {{$page_name='institute'}}

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
                :get_institute_url="{{ json_encode(url('/dashboard/getinstitues')) }}"
                :institute_url_edit="{{ json_encode(url('/dashboard/institute/')) }}"
                :csrftoken="{{ json_encode(csrf_token()) }}"
                :aprove_route="{{json_encode(url('/dashboard/update-institute-aprovement'))}}"
                :path_logo="{{json_encode(asset('/'))}}"
                :route_create="{{json_encode(url('/dashboard/institute/create'))}}"
                :show_institute_url="{{json_encode(route('institute.index'))}}"
                :countries_from_blade="{{ json_encode($countries) }}"
                :dahsboard_url="{{ json_encode(url('/dashboard')) }}"
                :url_filtier="{{ json_encode(url('/dashboard/filter')) }}"
                :create="{{  json_encode(auth()->user()->hasPermission('institutes-create') )}}"
                :edit="{{  json_encode(auth()->user()->hasPermission('institutes-update') )}}"
                :delete_pre="{{  json_encode(auth()->user()->hasPermission('institutes-delete') )}}"
                :force_delete="{{  json_encode(auth()->user()->hasRole(['super-admin','admin']) )}}"                
            ></institutes-component>
        </div>
    </div>
</div>

@endsection
