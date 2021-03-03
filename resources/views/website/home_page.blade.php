@extends('website.app')

@section('website.content')
    <div dir="rtl">
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
                <select name="">
                    <option hidden value="">عدد الاسابيع</option>
                    @for ($i = 1; $i <=100 ;$i++)
                        <option value="{{$i}}">{{$i}}</option>
                    @endfor
                </select>
                <div>
                    <label>افضل العروض</label>
                    <input type="checkbox" name="" id="">
                </div>
                <div>
                    <label>الاعلى تقيما</label>
                    <input type="checkbox" name="" id="">
                </div>
                <div>
                    <label>الاكثر استخداما</label>
                    <input type="checkbox" name="" id="">
                </div>
                <button type="submit">بحث</button>
            </form>
            <hr>
        </div>
    
        <div>
            <h1>افضل العروض</h1>
                @foreach ($best_offers as $offer)
                    <a href="{{url($offer->slug)}}">
                        <div style="width: 19.5%;display:inline-block">
                            <img width="100%" src="{{$offer->institute->banner}}" alt="{{$offer->institute->name_ar}}" >
                            <h3>معهد {{$offer->institute->name_ar}} </h3>
                            <p>{{institute_rate($offer->institute)}}</p>
                            <p>{{$offer->institute->country->name_ar}} , {{$offer->institute->city->name_ar}}</p>
                            <p>{{$offer->name}}</p>
                            <p>{{$offer->study_period=='morning' ? 'صباحي' : 'مسائي'}}</p>
                            <p>{{$offer->required_level}}</p>
                            <p>{{$offer->coursesPricePerWeek->price*(1-$offer->discount) }}</p>
                            <del>{{$offer->coursesPricePerWeek->price}}</del>
                            <p>{{$offer->discount*100}} %</p>
                        </div>
                    </a>
                @endforeach
            <hr>
        </div>
    
    
        <div>
            <h1>قصص النجاح</h1>
                @foreach ($success_stories as $story)
                    <div style="width: 19.5%;display:inline-block">
                        <img width="100%" src="{{$story->student->profile_image == null ? asset('storage/default_images.png') : $story->student->profile_image}}" alt="{{$story->student->name}}" >
                        <h3> {{$story->student->name}} </h3>
                        <p>{{$story->story}}</p>
                    </div>
                @endforeach
            <hr>
        </div>
    
        <div>
            <h1>قصص النجاح</h1>
                <div style="width: 49%;display:inline-block">
                    <img width="100%" src="{{$two_blogs[0]->banner == null ? asset('storage/default_images.png') : $two_blogs[0]->banner}}" alt="{{$two_blogs[0]->title_ar}}" >
                    <h2> {{$two_blogs[0]->title_ar}} </h2>
                    <p>{{$two_blogs[0]->content_ar}}</p>
                    <a href="{{$two_blogs[0]->country->id}}">عرض معاهد {{$two_blogs[0]->country->name_ar}}</a><br>
                    <a href="{{$two_blogs[0]->id}}">معرفة المزيد</a><br>
                    <a href="#">دول اخري</a>
                </div>
                <div style="width: 49%;display:inline-block">
                    <img width="100%" src="{{$two_blogs[1]->banner == null ? asset('storage/default_images.png') : $two_blogs[1]->banner}}" alt="{{$two_blogs[1]->title_ar}}" >
                    <h2> {{$two_blogs[1]->title_ar}} </h2>
                    <p>{{$two_blogs[1]->content_ar}}</p>
                    <a href="{{$two_blogs[1]->country->id}}">عرض معاهد {{$two_blogs[1]->country->name_ar}}</a><br>
                    <a href="{{$two_blogs[1]->id}}">معرفة المزيد</a><br>
                    <a href="#">دول اخري</a>
                </div>
            <hr>
        </div>
        <div>
            <h1>من وثقوا بنا</h1>
            @foreach ($partners as $partner)
                <div style="width: 16.5%;display:inline-block">
                    <img width="100%" src="{{$partner->logo == null ? asset('storage/default_images.png') : $partner->logo}}" alt="{{$partner->name}}" >
                </div>
            @endforeach
            <hr>
        </div>
        <div>
            <h1>أخر الأخبار و الموضوعات المهمة</h1>
            @foreach ($blogs as $blog)
                <a href="{{$blog->id}}">
                    <div style="width: 16.5%;display:inline-block">
                        <img width="24.8%" src="{{$blog->banner == null ? asset('storage/default_images.png') : $blog->banner}}" alt="{{$blog->title_ar}}" >
                        <a href="{{$blog->id}}"><h2> {{$blog->title_ar}} </h2></a>
                        <p>{{$blog->creator->name}}</p>
                        <p> {{ArabicDate($blog->created_at)}}</p>
                    </div>
                </a>
            @endforeach
            <hr>
        </div>
    </div>
@endsection