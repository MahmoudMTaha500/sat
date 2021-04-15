
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
            <p style="color: #006fff;font-size:25px">رسالة من عميل ! </p>
            <div>
                <p><strong>اسم الطالب : </strong> {{$name}}</p>
                <p><strong>البريد الالكتروني : </strong> {{$email}}</p>
                <p><strong>كلمه السر : </strong> {{$password}}</p>
            </div>
            
        </div>
        
    </body>
</html>