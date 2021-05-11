

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Invoice</title>
</head>
<body>
    <style>
        body, html , .haeder, p, th , td{
            font-family: 'Cairo', sans-serif;
        }
        body, html{
            margin: 0;
            font-family: 'Cairo', sans-serif;
            direction: rtl;
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
            width: 50%;
            margin-top: 25px;
        }
        p{
            font-size: 18px;
            margin: 0;
            margin-bottom: 10px;
        }
        .intro{
            text-align: center;
            padding: 30px 70px;
        }
        .student-info{
            background-color: #f2f2f2;
            border: 1px dotted #f4c20d;
            border-width: 3px;
            border-radius: 10px;
            padding: 20px 50px;
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
            bottom:0;
            left: 0;
            width: 100%;
            height: 70px;
            background-color: #006fff;
            text-align: center;
            color: #fff;
            font-weight: bold;
            font-size: 20px;
            line-height: 70px;
        }
        .content{
            padding-top: 200px;
        }
    </style>


    <header class="haeder">
        <div class="left-section">
            <img class="classta-logo" src="https://classat.netlify.app/imgs/logo.png" alt="">
        </div>

        <div class="right-section">
            <p class="m-0"><span dir="ltr"> {{$data['request_id']}} :رقم العرض</span></p>
            <p class="m-0"><span>التاریخ :  {{ArabicDate($data['date'])}} </span></p>
            <p class="m-0"> {{$data['institute_name']}} , {{$data['country']}}, {{$data['city']}}</p>
        </div>
    </header>

    <section class="content">
        <div class="container">
            <p class="intro">


                شكراً لاستكمال إجراءات الحجز في معهد "{{$data['institute_name']}}".
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
                            <td></td>
                            <td></td>
                            <td></td>
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
                يُرجي ملاحظة أن هذه الأسعار متغيرة بشكل دوري.
            </p>
        </div>
    </section>

    <div class="footer" dir="ltr">
        <span>Sat@sat-edu.com  </span>   	&nbsp;	&nbsp;	&nbsp;	&nbsp;
        <img width="15px" src="https://icon-library.com/images/white-phone-icon-png/white-phone-icon-png-7.jpg" alt="">
        {{-- <img width="15px" src="{{asset('websit/img/phone-icon.png')}}" alt=""> --}}
        <span>0555484931 </span> 
        <img width="15px" src="https://www.pngkey.com/png/full/45-455131_white-internet-icon-png-clipart-library-library-internet.png" alt=""> 
        {{-- <img width="15px" src="{{asset('websit/img/earth-icon.png')}}" alt="">  --}}
    </div>
</body>
</html>































