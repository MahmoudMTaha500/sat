
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

        <table class="email-content-box" style="background: url('{{url('/')}}/storage/icons/TEst.png') center;">
            <tr>
                <td>
                    <a href="{{route('website.home')}}">
                        <img class="logo" width="150px" src="{{url('/')}}/storage/icons/logo.png">
                    </a>
                </td>
            </tr>
            <tr>
                <td>
                    <table  dir="rtl" class="email-content" >
                        <tr>
                            <td>
                                <div style="margin-bottom:10px">
                                    <img width="90px" src="{{url('/')}}/storage/icons/check.png">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <span class="main-color" style="font-size:25px">تم اعادة تهيئة كلمة السر بنجاح</span>
                        </tr>
                        <tr class="user-login-info">
                            <div>
                                <p><strong>اسم الطالب : </strong> {{$name}}</p>
                                <p><strong>البريد الالكتروني : </strong> {{$email}}</p>
                                <p><strong>كلمه السر : </strong> {{$password}}</p>
                            </div>
                        </tr>
                        <tr>
                            <td>
                                <p><a class="go-websit-btn bg-secondary-color" href="{{route('student.login')}}">تسجيل الدخول</a></p>
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
                                <a href="https://www.snapchat.com/add/classat"><img width="30px" src="{{url('/')}}/storage/icons/snapchat.png" alt=""> </a>
                                <a href="https://twitter.com/classat?s=21"><img width="30px" src="{{url('/')}}/storage/icons/twitter.png" alt=""> </a>
                                <a href="https://www.instagram.com/class_at/"><img width="30px" src="{{url('/')}}/storage/icons/instegram.png" alt=""> </a>
                            </td>
                        </tr>
                        <tr class="contact-info">
                            <td class="text-left">
                                <a href="tel:+966555484931"><img src="{{url('/')}}/storage/icons/phone.png" alt=""></a>
                                <a class="main-color"  href="tel:+966555484931" dir="ltr">+966 55 548 4931</a>
                            </td>
                            <td width="15px">|</td>
                            <td class="text-right">
                                <a href="https://wa.me/+966555484931"><img src="{{url('/')}}/storage/icons/whatsapp.png" alt=""></a>
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



{{-- 


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Classat</title>

        <style>
            .email-content{
                direction: rtl;
                padding:30px; 
                border-radius:10px; 
                margin:auto;
                background-color:#eee; 
                width:300px;
                text-align:center;
                font-family: system-ui;
            }
            .email-content-box{
                direction: rtl;
                padding:30px; 
                margin:auto;
                text-align:center;
                font-family: system-ui;
            }

            .logo{
                width: 250px;
                margin-bottom: 30px
            }

            .footer{
                margin-top: 50px
            }
            .footer a{
                text-decoration: none;
                font-size: 30px;
                font-size: 20px;
                font-weight: 600;
            }
            .footer .contact-info img{
                width: 20px;
            }
            .email-content-box{
                width: 450px;
                background: url('https://www.linkpicture.com/q/TEst.png') center;
                background-size: cover;
            }

            .go-websit-btn{
                text-decoration: none;
                color: #fff!important;
                background-color: #006fff;
                padding: 10px;
                border-radius: 5px;
            }
            .bg-secondary-color{
                background-color: #f4c20d;
            }
            .mt-2{
                margin-top: 2rem
            }
        </style>
    </head>
    <body>
        
        <div class="email-content-box">
            <a href="{{route('website.home')}}">
                <img class="logo" width="150px" src="https://www.linkpicture.com/q/logo_304.png">
            </a>
            <div dir="rtl" class="email-content">
                <div style=";margin-bottom:20px">
                    <img width="70px" src="https://www.linkpicture.com/q/check_5.png">
                </div>
                <p style="color: #006fff;font-size:25px">تم اعادة تهيئة كلمة السر بنجاح</p>
                <div>
                    <p><strong>اسم الطالب : </strong> {{$name}}</p>
                    <p><strong>البريد الالكتروني : </strong> {{$email}}</p>
                    <p><strong>كلمه السر : </strong> {{$password}}</p>
                    <br>
                    <p class="mt-2"><a class="go-websit-btn bg-secondary-color" href="{{route('student.login')}}">لتسجيل الدخول اضغط هنا</a></p>
                    <p class="mt-2"><a class="go-websit-btn" href="{{route('website.home')}}">للذهاب الي الموقع اضغط هنا</a></p>
                </div>
                
            </div>
            <div class="footer">
                <a href="https://www.snapchat.com/add/classat"><img width="30px" src="https://www.linkpicture.com/q/snapchat_2.png" alt=""> </a>&nbsp;&nbsp;
                <a href="https://twitter.com/classat?s=21"><img width="30px" src="https://www.linkpicture.com/q/twitter_14.png" alt=""> </a>&nbsp;&nbsp;
                <a href="https://www.instagram.com/class_at/"><img width="30px" src="https://www.linkpicture.com/q/instegram.png" alt=""> </a>
                <div class="contact-info">
                    <p class="main-color">
                        <a class="main-color" href="tel:+966555484931"> <span dir="ltr">+966 55 548 4931 <img src="https://www.linkpicture.com/q/phone_9.png" alt=""> </span>  &nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp; </a> 
                        <a class="main-color" href="https://wa.me/+966555484931">  <span dir="ltr">+966 55 548 4931 <img src="https://www.linkpicture.com/q/whatsapp_64.png" alt=""></span>  </a>
                    </p>
                    <p class="main-color">
                        <a class="main-color" href="{{route('website.terms_conditions')}}">الشروط و الاحكام &nbsp;&nbsp;|&nbsp;&nbsp; </a> 
                        <a class="main-color" href="{{route('website.refund_policy')}}">سياسة الاسترجاع</a>
                    </p>
                </div>
            </div>
        </div>
        
    </body>
</html> --}}