@extends('website.app') @section('website.content')
<div class="bg-sub-secondary-color">
    <!-- Contact Us -->
    <section class="institutes py-5">
        <div class="container-fluid">
            <!-- Section Heading -->
            <div class="row px-xl-5 mb-4">
                <div class="col-12">
                    <div class="heading-institutes">
                        <h3 class="text-main-color font-weight-bold">تواصل معنا</h3>
                        <p>في حال وجود اي ملاحظات أو استفسارات ,والحصول على نشرتنا الدورية من منح دراسية وأخر عروضنا والكثير يمكنك التواصل مع فريق سات على</p>
                    </div>
                </div>
            </div>
            <!-- ./Section Heading -->
            <div class="row px-xl-5 mb-5">
                <div class="col-xl-6 mb-4">
                    <div class="card rounded-10 shadow-sm border-0">
                        <div class="card-body">
                            <ul class="p-0">
                                <li class="mb-3">
<<<<<<< HEAD
                                    <span class="text-main-color font-weight-bold"><i class="fas fa-envelope"></i> البريد الألكتروني :</span> admission@sat-edu.com
                                </li>
                                <li class="mb-3">
                                    <span class="text-main-color font-weight-bold"><i class="fas fa-phone"></i> رقم الجوال :</span> +966 55 548 4931
                                </li>
                                <li class="mb-3">
                                    <span class="text-main-color font-weight-bold"><i class="fas fa-map-marker-alt"></i> العنوان :</span>شركة GMC, الدور الأول, مكتب ٧, المروج, Imam Saud Bin Abdulaziz Bin Mohammed Rd, عمارة جوار, Riyadh Saudi Arabia, السعودية
                                </li>
                                <li class="social-links-sm">
                                    <a class="bg-main-color d-inline-block text-center ml-3" target="_blank" href="https://www.snapchat.com/add/classat">
                                        <span class="text-white font-weight-bold"><i class="fab fa-snapchat-ghost"></i></span>
                                    </a>
                                    <a class="bg-main-color d-inline-block text-center ml-3" target="_blank" href="https://twitter.com/classat?s=21">
                                        <span class="text-white font-weight-bold"><i class="fab fa-twitter"></i></span>
                                    </a>
                                    <a class="bg-main-color d-inline-block text-center ml-3" target="_blank" href="https://twitter.com/classat?s=21">
=======
                                    <span class="text-main-color font-weight-bold"><i class="fas fa-envelope"></i> البريد الألكتروني :</span> arabic@SAT.com
                                </li>
                                <li class="mb-3">
                                    <span class="text-main-color font-weight-bold"><i class="fas fa-phone"></i> رقم الجوال :</span> 920023418 / 920023418
                                </li>
                                <li class="mb-3">
                                    <span class="text-main-color font-weight-bold"><i class="fas fa-map-marker-alt"></i> العنوان :</span> الطابق الثاني، مكتب B54 الرياض, السعودية
                                </li>
                                <li class="social-links-sm mb-3">
                                    <a class="bg-main-color d-inline-block text-center ml-3" href="#">
                                        <span class="text-white font-weight-bold"><i class="fab fa-facebook-f"></i></span>
                                    </a>
                                    <a class="bg-main-color d-inline-block text-center ml-3" href="#">
                                        <span class="text-white font-weight-bold"><i class="fab fa-twitter"></i></span>
                                    </a>
                                    <a class="bg-main-color d-inline-block text-center ml-3" href="#">
>>>>>>> e9858ac392546c1502337bc64f10143489fac1ea
                                        <span class="text-white font-weight-bold"><i class="fab fa-instagram"></i></span>
                                    </a>
                                </li>
                            </ul>
                            <!-- Map -->
                            <iframe
                                class="rounded-10"
<<<<<<< HEAD
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3623.2242723801482!2d46.67333431500068!3d24.75349848410446!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3e2f034b2bbfd471%3A0xf837198d4bb67fc6!2z2LPYp9iqINmE2YTYr9ix2KfYs9ipINmB2Yog2KfZhNiu2KfYsdis!5e0!3m2!1sen!2suk!4v1619352229759!5m2!1sen!2suk"
=======
                                src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d13809.8056215688!2d31.251190199999996!3d30.081255799999994!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sar!2seg!4v1614360247661!5m2!1sar!2seg"
>>>>>>> e9858ac392546c1502337bc64f10143489fac1ea
                                width="100%"
                                height="315"
                                style="border: 0;"
                                allowfullscreen=""
                                loading="lazy"
                            ></iframe>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="card rounded-10 shadow-sm border-0">
                        <div class="card-body">
                            @if (session()->has('alert_message'))
                                <div class="alert alert-success text-center">
                                    {{session()->get('alert_message')}}
                                </div>
                            @endif
                            <form method="post" action="{{route('send.contact.us.mail')}}">
                                @csrf @error('name')
                                <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                                <div class="form-group btn-light">
                                    <input value="{{old('name')}}" name="name" type="text" class="form-control rounded-10 bg-transparent @error('name') is-invalid @enderror" placeholder="الاسم بالكامل" />
                                </div>
                                @error('email')
                                <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                                <div class="form-group btn-light">
                                    <input value="{{old('email')}}" name="email" type="email" class="form-control rounded-10 bg-transparent @error('email') is-invalid @enderror" placeholder="الايميل" />
                                </div>
                                @error('message')
                                <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                                <div class="form-group btn-light">
                                    <textarea name="message" class="form-control rounded-10 bg-transparent @error('message') is-invalid @enderror" placeholder="اكتب رسالتك هنا" rows="12">{{old('message')}}</textarea>
                                </div>

                                <button type="submit" class="btn rounded-10 bg-secondary-color w-100 text-center mb-3 text-white">ارسال</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ./Contact Us -->
</div>

@endsection
