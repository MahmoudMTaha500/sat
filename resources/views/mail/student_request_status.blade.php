
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
                text-align:right;
                font-family: system-ui;
            }
        </style>
    </head>
    <body>
        <div dir="rtl" class="email-content">
            <div style=";margin-bottom:40px;text-align:center">
                <img width="150px" src="https://classat.netlify.app/imgs/logo.png">
                
            </div>
            <p style="color: #006fff;font-size:25px;text-align:center">{{$request_status}}</p>
            <p style="margin-bottom: 20px; font-size:20px"> هذه حالة الطلب الخاص بكم</p>
            <ul>
                <li><strong>دورة :</strong> {{$course_name}}</li>
                <li><strong>معهد:</strong> {{$institute_name}}</li>
                <li><strong>دولة :</strong> {{$country_name}}</li>
                <li><strong>مدينة :</strong> {{$city_name}}</li>
            </ul>
            <p style="margin-bottom: 20px; font-size:15px"> يُمكنكم متابعة الطلب عن طريق موقع "كلاسات".</p>
            <p style="margin-bottom: 20px; font-size:15px">او تواصل معنا عن طريق الارقام التالية:</p>
            <div dir="ltr">
                <p><a style="font-size: 17px" href="tel:+966555484931">+966 55 548 4931</a></p>
                <p> <a style="font-size: 17px" href="tel:+96655934849">+966 55 593 4849</a> </p>
            </div>
        </div>
        
    </body>
</html>