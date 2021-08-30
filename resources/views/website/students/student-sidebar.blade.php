<div class="bg-white rounded-10 py-4 shadow-sm">
    <div class="profile-img pt-4 text-center position-relative mx-auto">
        <img src="{{$student->profile_image == null ? asset('storage/default__user_image.jpg') : asset($student->profile_image)}}" alt="" class="img-fluid rounded-circle" />
        <h6 class="text-main-color font-weight-bold mt-2">{{$student->name}}</h6>
    </div>
    <ul class="list-group list-group-flush p-0 border-0">
        <li class="list-group-item py-3 border-bottom {{$page_identity['page_name'] == 'student-profile' ? 'active' : ''}}"><a href="{{route('student.profile')}}" class="{{$page_identity['page_name'] == 'student-profile' ? 'text-white' : ''}}">البيانات الشخصية</a></li>
        <li class="list-group-item py-3 border-bottom {{$page_identity['page_name'] == 'student-favourite' ? 'active' : ''}}"><a href="{{route('student.favourite')}}" class="{{$page_identity['page_name'] == 'student-favourite' ? 'text-white' : ''}}">المفضلة</a></li>
        <li class="list-group-item py-3 border-bottom {{$page_identity['page_name'] == 'student-reservation' ? 'active' : ''}}"><a href="{{route('student.reservation')}}" class="{{$page_identity['page_name'] == 'student-reservation' ? 'text-white' : ''}}">الحجوزات</a></li>
        <li class="list-group-item py-3 {{$page_identity['page_name'] == 'success-story' ? 'active' : ''}}"><a href="{{route('student.success.story')}}" class="{{$page_identity['page_name'] == 'success-story' ? 'text-white' : ''}}">قصص النجاح</a></li>
        {{-- <li class="list-group-item py-3 {{$page_identity['page_name'] == 'student-notification' ? 'active' : ''}}"><a href="{{route('student.notification')}}" class="{{$page_identity['page_name'] == 'student-notification' ? 'text-white' : ''}}">الاشعارات</a></li> --}}
    </ul>
</div>