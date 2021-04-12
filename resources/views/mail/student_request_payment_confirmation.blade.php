
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
            <p style="color: #006fff;font-size:25px">تم دفع المبلغ بنجاح ! </p>
            <p style="margin-bottom: 20px; font-size:20px"> سنقوم بالتواصل معكم قريبا</p>
            <p>يمكنكم الاطلاع علي العرض الخاص بكم من خلال هذا الرابط  <a style="color:#f4c20d " href="{{route('student_invoice' , ['request_id' => $request_id , 'student_id' => $student_id])}}">اطلاع</a></p>
        </div>
        
    </body>
</html>
