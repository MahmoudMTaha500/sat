
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
        </style>
    </head>
    <body>
        <div dir="rtl" class="email-content">
            <div style=";margin-bottom:70px">
                <img width="150px" src="https://classat.netlify.app/imgs/logo.png">
                
            </div>
            <p style="color: #006fff;font-size:25px">تم اسلام طلبكم بنجاح ! </p>
            <p style="margin-bottom: 20px; font-size:20px"> يمكنكم متابعة الطلب عن طريق موقع كلاسات</p>
            <div>
                <p><strong>اسم المستخدم : </strong> {{$student_email}}</p>
                <p><strong>كلمة المرور : </strong> {{$student_password}}</p>
            </div>
        </div>
        
    </body>
</html>