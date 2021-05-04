@extends('website.app')

@section('website.content')




<institutes-pgae-component
    :get_courses_url="{{ json_encode(route('vue.get.courses')) }}"
    :public_path="{{ json_encode(asset('/')) }}"
    get_countries_url = "{{route('vue.get.countries')}}"
    get_cities_url = "{{route('vue.get.cities')}}"
>
</institutes-pgae-component>
@endsection




