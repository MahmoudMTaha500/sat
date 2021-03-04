@extends('admin.app') @section('admin.content')
<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2">
                <h3 class="content-header-title">قسم الخدمات</h3>
                <div class="row breadcrumbs-top">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">لوحة التحكم</a></li>
                            <li class="breadcrumb-item active">الخدمات</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">
            <airport-component
                :dahsboard_url="{{ json_encode(url('/dashboard')) }}"
                :csrftoken="{{ json_encode(csrf_token()) }}"
                :institutes="{{ json_encode($institutes) }}"
            >
            <airport-component>
                
        </div>
    </div>
</div>
@endsection
