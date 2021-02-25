@extends('website.app')

@section('website.content')
    <div>
        <h1>فورم البحث الخاص بالهيدر</h1>
        <form action="">
            <input type="text" name="">
            <button type="submit">بحث</button>
        </form>
        <hr>
    </div>
    <div>
        <h1>الفيلتر المبدئ في تاني سيكشن</h1>
        <form action="">
            <country-component 
                ref="countries_ref"
                get_countries_url = "{{route('vue.get.countries')}}"
            >
            </country-component>
            <city-component 
                ref="cities_ref"
                get_cities_url = "{{route('vue.get.cities')}}"
            >
            </city-component>
            <button type="submit">بحث</button>
        </form>
        <hr>
    </div>
@endsection