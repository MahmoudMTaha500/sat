@extends('website.app') @section('website.content')

<!-- Profile -->
<section class="profile py-5 bg-sub-secondary-color">
    <div class="container-fluid">
        <div class="row px-xl-5 mb-4">
            <!-- Section Heading -->
            <div class="col-12 d-lg-block d-none">
                <h3 class="text-main-color font-weight-bold">الملف الشخصي</h3>
            </div>
            <!-- ./Section Heading -->
        </div>
        <div class="row px-xl-5">
            <!-- Side Nav -->
            <div class="col-lg-3 mb-4 d-lg-block d-none">
                @include('website.students.student-sidebar')
            </div>
            <!-- ./Side Nav -->
            @if (!empty($student->sucess_story))
                <div class="col-lg-9">
                    <!-- Section Heading -->
                    <h5 class="text-main-color font-weight-bold mb-4">قصة نجاحك {!! $student->sucess_story->approvement == 1 ? '<small class="text-success mx-3">(تم قبول قصتك)</small>' : '<small class="text-warning mx-3">(قصتك تحت المراجعة)</small>' !!}</h5>
                    <!-- ./Section Heading -->
                    <div class="bg-white shadow-sm p-xl-5 px-3 py-5 rounded-10">
                        @if (session()->has('alert_message'))
                            <div class="alert alert-success text-center">
                                {{session()->get('alert_message')}}
                            </div>
                        @endif
                        <div class="bg-white rounded-10 p-4 mb-4">
     

                            @if($student_request->isEmpty() ==null)

          <form  action="{{route('institutes.add.review')}}" method="POST">
            @csrf
            <input type="hidden" name="rate" class="add-rate-field" />
            
            <h5 class="text-main-color font-weight-bold">أضف تقييم</h5>
            <div class="row">
                <div class="col-3">

                    <div class="form-group rounded-10 border pl-3 pr-2 btn-light">
                        <select class="form-control visa-country border-0 bg-transparent" name="institute_id" id="">
                            @foreach($student_request as $request)
                           <option value="{{$request->course->institute->id}}">{{$request->course->institute->name_ar}}</option>
                           @endforeach
                       </select> 
                    </div>
                </div> 
                
            </div>
            <div class="row">
                <div class="col-3">
                <p class="starrr add-rate"></p>
                </div>
            </div>
            <div class="row">
                <div class="form-group btn-light rounded-10">
                    <textarea name="review" class="form-control bg-transparent rounded-10" placeholder="اكتب تعليقك" rows="5"></textarea>
                </div>

            </div>
            <div class="row">
                <div class="col-12  mb-4">
                    <div class="oveflow-hidden">
                        <button type="submit" class="btn rounded-10 bg-secondary-color text-center text-white float-right px-5">اضاف التقيم</button>
                    </div>
                </div>
            </div>

          </form>
          @endif



                           
                                  
                        <form action="{{route('student.update.success.story')}}" method="post"  enctype="multipart/form-data">
                            @csrf
                            {{-- <input type="hidden" name="institute_id" value="{{$student->id}}" /> --}}
                            <input type="hidden" name="rate" class="add-rate-field" />
                           
                        
                            <input type="hidden" value="{{$student->sucess_story->id}}" name="story_id">
                            <div class="row">
                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-lg-12">
                                                <textarea rows="10" type="text" class="form-control rounded-10 @error('story') is-invalid @enderror" name="story">{{$student->sucess_story->story}}</textarea>
                                                @error('story')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                        </div>
                                    
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-12 mt-3">
                                    <div class="oveflow-hidden">
                                        <button type="submit" class="btn rounded-10 bg-secondary-color text-center text-white float-left px-5">حفظ</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        </div>
                    </div>
                </div>
            @else
                <div class="col-lg-9">
                    <h5 class="text-main-color font-weight-bold mb-4">قصة نجاحك</h5>
                    <div class="bg-white shadow-sm p-xl-5 px-3 py-5 rounded-10">
                        @if (session()->has('alert_message'))
                            <div class="alert alert-success text-center">
                                {{session()->get('alert_message')}}
                            </div>
                        @endif
                        <div class="bg-white rounded-10 p-4 mb-4">

                        <h5 class="text-main-color font-weight-bold">أضف تقييم</h5>
                              <p class="starrr add-rate"></p>
                        <form action="{{route('student.update.success.story')}}" method="post"  enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-12">
                                    <div class="row">
                                        
                                        <input type="hidden" name="institute_id" value="{{$institute->id}}" />
                                        <input type="hidden" name="rate" class="add-rate-field" />
                                        <div class="col-lg-12">
                                            <label> قصتك</label>
                                                <textarea rows="10" type="text" class="form-control rounded-10 @error('story') is-invalid @enderror" name="story"></textarea>
                                                @error('story')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                        </div>
                                    
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-12 mt-3">
                                    <div class="oveflow-hidden">
                                        <button type="submit" class="btn rounded-10 bg-secondary-color text-center text-white float-left px-5">حفظ</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
</section>
<!-- ./Profile -->

@endsection
