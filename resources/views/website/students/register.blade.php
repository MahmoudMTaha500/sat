@extends('website.app')

@section('website.content')
<form class="text-center" method="POST" action="{{ route('student.register') }}">
    @csrf

    <input type="text" name="name" placeholder="الاسم">
    @error('name')
        <span style="color:red;display:block" class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror <br>
    <input type="email" name="email" placeholder="البريد الاليكتروني">
    @error('email')
        <span style="color:red;display:block" class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror <br>
    <input type="text" name="phone" placeholder="الهاتف">
    @error('phone')
        <span style="color:red;display:block" class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror <br>
    <country-component 
    ref="countries_component_ref"
    get_countries_url = "{{route('vue.get.countries')}}"
    option_null = "{{true}}"
    >
    </country-component><br>
    <city-component 
        ref="cities_component_ref"
        get_cities_url = "{{route('vue.get.cities')}}"
        option_null = "{{true}}"
    >
    </city-component><br>
    <input type="text" name="address" placeholder="العنوان">
    @error('address')
        <span style="color:red;display:block" class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror <br>
    <input type="text" name="nationality" placeholder="الجنسية">
    @error('nationality')
        <span style="color:red;display:block" class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror <br>
    <input type="password" name="password" placeholder="كلمة السر">
    @error('password')
        <span style="color:red;display:block" class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror <br>
    <input type="password" name="password_confirmation" placeholder="اعادة كلمة السر">
    @error('password_confirmation')
        <span style="color:red;display:block" class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror <br>
    <button>انشاء حساب جديد</button>
</form>
@endsection




