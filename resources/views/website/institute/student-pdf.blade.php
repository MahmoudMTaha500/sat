<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title>Document</title>
        <style>
            html,
            body {
                direction: rtl;
            }
            .container {
                width: 1280px;
                margin: 0 auto;
                padding: 0;
                direction: rtl;
                font-family: XB Riyaz;
            }
            table{
                font-family: XB Riyaz;
            }
            .col {
                width: 33%;
                float: right;
            }
            .bold {
                font-weight: bold;
                margin: 0px;
                padding: 0px;
            }

            .table {

                width: 100%;
                text-align: right;
                margin-top: 20px;
                border: 1px solid #000;
            }

            .table .thead th{
                background: #c0c0c0;
            }
            .table .thead th , .table  tr td {
                padding: 10px;
                margin: 0px!important;
                text-align: center
            }
            td , th {
                padding: 10px;
            }
            .table  tr:nth-child(odd){
                background-color:beige
            }
            .table  tr:nth-child(even){
                background-color:#eee
            }
         
            

          
            .m-0 {
                margin: 0;
            }
            .mt-0 {
                margin-top: 0;
            }
            .mb-0 {
                margin-bottom: 0;
            }
            .mt-5 {
                margin-top: 5rem;
            }
            .mt-2 {
                margin-top: 2rem;
            }
            .mb-2 {
                margin-bottom: 2rem;
            }
            .text-center {
                text-align: center;
            }
            .text-right {
                text-align: right;
            }
            .text-left {
                text-align: left;
            }
            .w-100{
                width: 100%;
            }
            .student-table{
                font-size: 17px!important;
                border: 2px solid #000
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="col text-right">
                <h2 class="bold mb-2">عرض السعر</h2>
                <p class="m-0"><span dir="ltr"> 29/11/2020 :التاریخ</span></p>
                <p class="m-0"><span dir="ltr"> 4556 :رقم العرض</span></p>
                <h3>كلاسات</h3>
                <p class="m-0"><span dir="ltr">+966 55 548 4931</span></p>
                <p class="m-0">sat@sat-edu.com</p>
            </div>
            <div class="col text-center">
                <img width="100%" src="https://classat.netlify.app/imgs/logo.png" />
            </div>
            <div class="col text-left">
                <h3 class="log">
                    <img width="40%" src="https://kaplan.com/wp-content/uploads/2017/01/Kaplan_logo.png" />
                </h3>
                <h3 class="mb-0">معهد كابلان</h3>
                <p class="m-0">بريطانية, مانشيستر</p>
            </div>
            <div>
            <div class="sub mt-2 w-100">
                <span> شكرا لاستكمال الحجز في مركز اللغه معهد كابلان يرجي التاكد من تفاصيل الحجز المرفق بالفاتوره علي النحو التالي </span>
            </div>
            <table class="w-100 student-table">
                <tbody>
                    <tr>
                        <td class="student-id"><strong>رقم الطالب :</strong> 237038</td>
                        <td class="student-name"><strong>اسم الطالب : </strong> محمود سامي</td>
                    </tr>
                </tbody>
            </table>
                
            <table class="table">
                <thead class="thead">
                    <tr class="thead">
                        <th style="text-align: right">تفاصيل الحجز</th>
                        <th>من</th>
                        <th>الي</th>
                        <th>المده</th>
                        <th>المبلغ  | ريال سعودي</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td style="text-align: right">
                            انجليزي عام
                        </td>
                        <td>14/12/2020</td>
                        <td>18/12/2020</td>
                        <td> 4 اسابيع</td>
                        <td>900</td>
                    </tr>
                    <tr>
                        <td colspan="4" style="text-align: right">
                            السكن : سكن مع عائلة
                        </td>
                        <td>750</td>
                    </tr>
                    <tr>
                        <td colspan="4" style="text-align: right">
                            الاستقبال من مطار القاهرة
                        </td>
                        
                        <td>120</td>
                    </tr>
                    <tr>
                        <td colspan="4" style="text-align: right">
                            التامين الصحي 
                        </td>
                        
                        <td>450</td>
                    </tr>
                    <tr>
                        <td colspan="4" style="text-align: right">
                            الاجمالي 
                        </td>
                        <td style="font-size:30px">2220</td>
                    </tr>
                </tbody>
            </table> 
            <div class="sub mt-2 w-100">
                <span style="font-weight: bold"> يرجى ملاحظة ان هذه الاسعار متغيرة بشكل دوري </span>
            </div>
        </div>
    </body>
</html>
