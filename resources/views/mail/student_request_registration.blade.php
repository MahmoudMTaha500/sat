
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Classat</title>
        @include('mail.mail_css')
    </head>
    <body>

        <table class="email-content-box">
            <tr>
                <td>
                    <a href="{{route('website.home')}}">
                        <img class="logo" width="150px" src="{{url('/')}}storage/icons/logo.png">
                    </a>
                </td>
            </tr>
            <tr>
                <td>
                    <table  dir="rtl" class="email-content" >
                        <tr>
                            <td>
                                <div style="margin-bottom:10px">
                                    <img width="90px" src="{{url('/')}}storage/icons/envolep.png">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <span class="main-color" style="font-size:25px">تم استلام طلبكم بنجاح!</span>
                        </tr>
                        <tr>
                            <span class="black-color" style="margin-bottom: 20px; font-size:20px"> يمكنك متابعة حالة الطلب عن طريق زيارة موقع  <br> ( كلاسات )</span>
                        </tr>
                        <tr>
                            <span class="main-color" style="font-size:18px"> {{$course_name}}</span><br>  <span style="color: #006fff;font-size:15px"> ( {{$institute_name}} - {{$country_name}} - {{$city_name}} ) </span>
                        </tr>
                        <tr>
                            <td>
                                @if ($institute_logo !="null")
                                    <img style="margin-top: 10px" width="120px" src="{{$institute_logo}}">
                                @endif
                            </td>
                        </tr>
                        @if (!auth()->guard('student')->check())
                        <tr class="user-login-info">
                            <div>
                                <p><strong>اسم المستخدم : </strong> {{$student_email}}</p>
                                <p><strong>كلمة المرور : </strong> {{$student_password}}</p>
                            </div>
                        </tr>
                        @endif
                        <tr>
                            <td>
                                <p><a class="go-websit-btn bg-secondary-color" href="{{route('student_invoice' , ['request_id' => $request_id ])}}">عرض السعر</a></p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p><a class="go-websit-btn" href="{{route('website.home')}}">الذهاب الي الموقع</a></p>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td>
                    <table class="footer" width="100%">
                        <tr class="social-links">
                            <td colspan="3">
                                <a href="https://www.snapchat.com/add/classat"><img width="30px" src="{{url('/')}}storage/icons/snapchat.png" alt=""> </a>
                                <a href="https://twitter.com/classat?s=21"><img width="30px" src="{{url('/')}}storage/icons/twitter.png" alt=""> </a>
                                <a href="https://www.instagram.com/class_at/"><img width="30px" src="{{url('/')}}storage/icons/instegram.png" alt=""> </a>
                            </td>
                        </tr>
                        <tr class="contact-info">
                            <td class="text-left">
                                <a href="tel:+966555484931"><img src="{{url('/')}}storage/icons/phone.png" alt=""></a>
                                <a class="main-color"  href="tel:+966555484931" dir="ltr">+966 55 548 4931</a>
                            </td>
                            <td width="15px">|</td>
                            <td class="text-right">
                                <a href="https://wa.me/+966555484931"><img src="{{url('/')}}storage/icons/whatsapp.png" alt=""></a>
                                <a class="main-color"  href="https://wa.me/+966555484931" dir="ltr"> +966 55 548 4931</a>
                            </td>
                        </tr>
                        <tr class="contact-info">
                            <td class="text-left">
                                <a class="main-color" href="{{route('website.terms_conditions')}}">الشروط و الاحكام</a> 
                            </td>
                            <td width="15px">|</td>
                            <td class="text-right">
                                <a class="main-color" href="{{route('website.refund_policy')}}">سياسة الاسترجاع</a>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>

        
    </body>
</html>