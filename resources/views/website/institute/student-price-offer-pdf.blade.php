

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>عرض السعر</title>
</head>
<body>
    <style>

        body, html{
            margin: 0;
            font-family: 'Cairo', sans-serif;
            direction: rtl;
            padding: 0;
        }
        
        .container{
            padding-right: 50px;
            padding-left: 50px;
        }
        .haeder{
            padding: 40px 50px 70px 50px ;
            background-color: #f2f2f2;
            position: absolute;
            width: 87.5%;
            top: 0;
            left: 0;
        }
        .left-section , .right-section{
            width: 45%;
            
        }
        .left-section{
            text-align: left;
            float: left;
        }
        .right-section{
            text-align: right;
            float: right;
        }
        .classta-logo{
            width: 70%;
            margin-top: 25px;
        }
        p{
            font-size: 18px;
            margin: 0;
            margin-bottom: 10px;
        }
        .intro{
            text-align: center;
            padding: 30px 10px;
        }
        .student-info{
            background-color: #f4c20d;
            border-width: 3px;
            border-radius: 10px;
            padding: 20px 50px;
            color: #000;
            font-size: 16px
        }

        th , td{
            font-size: 18px;
            padding: 15px 7px;
            text-align: center
        }
        .info-table-container{
            border: 1px solid #000;
            margin-top: 20px;
        }
        .info-table-container table{
            width: 100%;
        }
        .info-table-container .thead{
            background-color: #006fff;
            
        }
        .info-table-container .thead th{
            color: #fff;
        }
        tr:nth-child(odd){
            background-color: #f2f2f2
        }
        .total-price-row td{
            color: #f4c20d;
            font-size: 25px;
        }
        .note{
            color: #fc2222;
            text-align: center;
            margin : 30px 0 ;
        }

        .footer{
            position: absolute;
            width: 100%;
            left: 0;
            height: 170px;
            background-color: #f2f2f2;
            text-align: center;
            color: #fff;
            font-weight: bold;
            font-size: 20px;
            line-height: 70px;
            padding-top: 20px;
        }
        .content{
            padding-top: 200px;
        }
        .pb-1{
            padding-bottom: 1rem
        }
        .main-color{
            color: #006fff
        }
        .refund-policy .title{
            margin-top: 50px;
            padding-bottom: 20px;
            text-align: center;
            font-size: 30px;
            color: #006fff
        }

        .refund-policy .refund-policy-content{
            padding-bottom: 60px;
        }
    </style>


    <header class="haeder">
        <div class="left-section">
            <a href="{{route('website.home')}}" target="_blank">
                <img class="classta-logo" src="{{$data['base_url'].'/website/imgs/logo.png'}}" alt="">
            </a>
        </div>

        <div class="right-section">
            <p class="pb-1"><span style="font-weight: bold">رقم العرض: </span> <span dir="ltr" >{{$data['request_id']}}</span></p>
            <p class="pb-1"><span style="font-weight: bold">التاریخ: </span> <span dir="ltr" >{{ArabicDate($data['date'])}}</span></p>
            <p class="pb-1"><span style="font-weight: bold">المعهد: </span>   <span dir="ltr">{{$data['institute_name']}} , {{$data['country']}}, {{$data['city']}}</span></p>
        </div>
    </header>

    <section class="content">
        <div class="container">
            <p class="intro">

                @if ($data['institute_logo'] != "null")
                    <img width="30%" src="{{$data['base_url'].'/'.$data['institute_logo']}}" alt=""> <br><br><br>
                @endif
                شكراً لاستكمال إجراءات الحجز في معهد <br><br>
                {{$data['institute_name']}}<br><br>
                يُرجي التأكد من تفاصيل بيانات الحجز المرفقة بالفاتورة المبينة أدناه:
                

            </p>
        </div>
    
        <div class="student-info container">
             <div class="left-section">
                <strong>اسم الطالب : </strong> {{$data['student_name']}}
             </div>
             <div class="right-section">
                <strong>رقم الطالب :</strong> {{$data['student_id']}}
             </div>
        </div>
    
    
        <div>
            <div class="info-table-container">
                <table>
                    <tr class="thead">
                        <th>تفاصيل الحجز</th>
                        <th>من</th>
                        <th>الي</th>
                        <th>المدة</th>
                        <th>المبلغ ر.س</th>
                    </tr>
                    <tr class="table-row">
                        <td>{{$data['course_name']}}</td>
                        <td>{{ArabicDate($data['from_date'])}}</td>
                        <td>{{ArabicDate($data['to_date'])}}</td>
                        <td>{{$data['weeks']}} اسابيع</td>
                        <td>{{$data['course_price']*$data['weeks']}}</td>
                    </tr>
                    @if (isset($data['airport']['name_ar']))
                        <tr>
                            <td style="text-align: right">
                                {{$data['airport']['name_ar']}}
                            </td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>{{$data['airport']['price']}}</td>
                        </tr>
                    @endif
                    @if ( isset($data['residence']['name_ar']))
                        <tr>
                            <td style="text-align: right">
                                السكن : {{$data['residence']['name_ar']}}
                            </td>
                            <td>{{ArabicDate(date("m/d/Y", strtotime("$data[from_date] -1 day")))}}</td>
                            <td>{{ArabicDate(date("m/d/Y", strtotime("$data[residence_to_date] +1 day")))}}</td>
                            <td>{{$data['residence_weeks']}} اسابيع</td>
                            <td>{{$data['residence']['price']*$data['weeks']}}</td>
                        </tr>
                    @endif 
    
    
                    @if ($data['insurance_price'] != 0)
                        <tr>
                            <td style="text-align: right">
                                التامين الصحي 
                            </td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>{{$data['insurance_price']*$data['weeks']}}</td>
                        </tr>
                    @endif
                    <tr class="total-price-row">
                        <td style="text-align: right">
                            الإجمالي 
                        </td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>{{$data['total_price']}}</td>
                    </tr>
                </table>
            </div>
        </div>


        @if (isset($data['show_paid_price']))
            <div class="student-info container" style="margin-top: 30px">
                <div class="left-section">
                <strong>المتبقي : </strong> {{$data['remaining_price']}}
                </div>
                <div class="right-section">
                <strong>المدفوع :</strong> {{$data['paid_price']}}
                </div>
            </div>
        @endif

        
    
        <div>
            <p class="note">
                يُرجي ملاحظة أن هذه الأسعار غير ثابتة بسبب تغير أسعار الصرف للعملات الأجنبية مقابل الريال السعودي
            </p>
        </div>
    </section>

    <section class="refund-policy">
        <h2 class="title">
            سياسة الاسترداد
        </h2>
        <div class="refund-policy-content">
            {!! $data['refund_policy'] !!}
        </div>
    </section>

    <div class="footer" dir="ltr">
        <a style="text-decoration: none" href="https://www.snapchat.com/add/classat"><img width="40px" src="{{$data['base_url'].'/storage/icons/snapchat.png'}}" alt=""> </a>&nbsp;&nbsp;
        <a style="text-decoration: none" href="https://twitter.com/classat?s=21"><img width="40px" src="{{$data['base_url'].'/storage/icons/twitter.png'}}" alt=""> </a>&nbsp;&nbsp;
        <a style="text-decoration: none" href="https://www.instagram.com/class_at/"><img width="40px" src="{{$data['base_url'].'/storage/icons/instegram.png'}}" alt=""> </a>

        <div>
            <p class="main-color">
                
                
                <a class="main-color" style="text-decoration: none" href="tel:+966555484931"> <span dir="ltr">+966 55 548 4931 <img style="margin-bottom: -7px" width="30px" src="{{$data['base_url'].'/storage/icons/phone.png'}}" alt=""> </span> </a> | 
                <a class="main-color" style="text-decoration: none" href="https://wa.me/+966555484931">  <span dir="ltr">+966 55 548 4931 <img style="margin-bottom: -7px" width="30px" src="{{$data['base_url'].'/storage/icons/whatsapp.png'}}" alt=""></span>  </a>
            </p>
            <p class="main-color">
                <a class="main-color" style="text-decoration: none" href="{{route('website.terms_conditions')}}">الشروط و الأحكام </a> | 
                <a class="main-color" style="text-decoration: none" href="{{route('website.refund_policy')}}">سياسة الاسترجاع</a> |
                <a class="main-color" style="text-decoration: none" href="{{route('website.home')}}">موقع كلاسات</a> 
            </p>
        </div>

    </div>
</body>
</html>

