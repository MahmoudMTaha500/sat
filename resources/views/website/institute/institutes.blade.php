@extends('website.app')

@section('website.content')




<institutes-pgae-component
    :get_courses_url="{{ json_encode(route('vue.get.courses')) }}"
    :public_path="{{ json_encode(asset('/')) }}"
    :search="{{ json_encode($search) }}"
    :student_check = "{{ json_encode(auth()->guard('student')->check()) }}"
    @if (auth()->guard('student')->check())
    :student_id="{{ json_encode(auth()->guard('student')->user()->id) }}"
    @endif
    get_countries_url = "{{route('vue.get.countries')}}"
    get_cities_url = "{{route('vue.get.cities')}}"
>
</institutes-pgae-component>
@endsection