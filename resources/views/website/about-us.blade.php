@extends('website.app') @section('website.content')
<div class="bg-sub-secondary-color">
    <!-- intro  section -->
    <section class="intro position-relative" style="height:80vh;background-image: url('{{asset('website/imgs/about-us-banner.jpg')}}');">
        <div class="overlay" style="background-color: rgba(0, 0, 0, 0.6);"></div>
        <div class="container-fluid">
            <div class="row px-xl-5">
                <div class="col-lg-2 mx-auto text-center"></div>
                <div class="col-lg-8 py-5 text-center">
                    <h1 style="font-size: 70px;color: #f4c20d!important;" class="text-white font-weight-bold mb-4">عن كلاسات</h1>
                    <p style="font-size: 30px" class="lead text-white mb-4">مؤسسة للاستشارات التعليمية الدولية، تعمل على تقديم الاستشارات الأكاديمية والقانونية، يقع مقرها الرئيسي في الرياض.</p>
                </div>
                <div class="col-lg-2 mx-auto text-center"></div>
            </div>
        </div>
    </section>

    <section class="brief bg-white py-5">
        <div class="container-fluid">
            <div class="row px-xl-5">
                <div class="col-lg-4 mb-4 text-center">
                    <!-- Img Brief -->
                    <img src="{{asset('website')}}/imgs/brief.png" alt="" class="img-fluid rounded-10" />
                    <!-- ./Img Brief -->
                </div>
                <div class="col-lg-8 align-self-center">
                    <div class="heading-brief">
                        <h2 class="text-main-color font-weight-bold">من نحن</h2>
                        <p>سات" مؤسسة للاستشارات التعليمية الدولية، تعمل على تقديم الاستشارات الأكاديمية والقانونية، يقع مقرها الرئيسي في الرياض.</p>
                        <p>تهدف "سات" إلى مساعدة الطلبة الناطقين باللغة العربية الراغبين في الدراسة بالخارج، والالتحاق بالمدارس، والجامعات، والمعاهد الأجنبية.</p>
                        <p>
                            تأسست "سات" في عام 2015 بنيوكاسل ببريطانيا، حيث كان يُقيم ويدرس الشريك المؤسس لمدة خمس سنوات. عمل المؤسسون قبل تأسيس "سات" بالنوادي السعودية ببريطانيا؛ لمساعدة الطلبة المحتملين الجدد الذين كانوا على تواصل مستمر
                            فبل مغادرة البلاد وحتى بعد الوصول الى بريطانيا.
                        </p>
                        <p>عمل مؤسسو "سات" على توظيف وتكريس الخبرات المكتسبة خلال المسيرة الأكاديمية للنهوض بالمؤسسة، وقاموا بانتقاء فريق عمل "سات" بعناية تامة.</p>
                        <a href="{{route('website.institutes')}}" class="btn rounded-10 bg-secondary-color text-center mb-3 text-white">تصفح المعاهد</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ./Brief -->
    <!-- Team -->
    <section class="team py-5" id="team">
        <div class="container-fluid">
            <!-- our services -->
            <div class="mb-5 pb-5">
                <div class="row px-xl-5 mb-5">
                    <div class="col-lg-12">
                        <div class="heading-team text-center">
                            <h2 class="text-main-color font-weight-bold">ماذا نقدم</h2>
                        </div>
                    </div>
                </div>

                <div class="row px-xl-4">
                    <div class="col-md-6">
                        <div class="bg-white shadow-lg rounded-10 p-5 mb-4 h-100">
                            <h4 class="my-4 text-main-color" style="font-weight: bold">الدعم الأكاديمي</h4>
                            <ul style="list-style: inside arabic-indic;padding:0;">
                                <li class="mb-3">مساعدة الطلبة على تحديد التخصص الجامعي، والاختيار من بين أفضل الجامعات الدولية، ومعرفة الدورة التدريبية المناسبة سواء كانت: (عامة، أكاديمية، اختبار الآيلتس IELTS).</li>
                                <li class="mb-3">تقديم النّصائح والاستشارات فيما يتعلّق بالاختيار الأمثل للوجهة المُبتعث إليها بما يتناسب مع احتياجات الطلبة الخاصة.</li>
                                <li class="mb-3">تتقيد "سات" بقائمة تحتوي على عدداً من الجامعات، والمعاهد الموصي بها من قِبَل المُلحقية الثقافية السعودية ببريطانيا ووزارة التعليم السعودية.</li>
                                <li class="mb-3">تيسير إجراءات قبول الدراسة الجامعية بمستوياتها التعليمية المختلفة (دبلوم، بكالوريوس، ماجيستير، دكتوراه).</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="bg-white shadow-lg rounded-10 p-5 mb-4 h-100">
                            <h4 class="my-4 text-main-color" style="font-weight: bold">الدعم الاجتماعي والقانوني والمعنوي</h4>
                            <ul style="list-style: inside arabic-indic;padding:0;">
                                <li class="mb-3">تيسير كافة إجراءات حصول الطلبة على التأشيرة الدراسية.</li>
                                <li class="mb-3">تقديم كافة التأشيرات للدول: بريطانيا، المملكة العربية السعودية، أيرلندا، أستراليا، نيوزيلاندا، اليابان، منطقة شنغن.</li>
                                <li class="mb-3">تقديم الاستشارات التعليمية الدولية المتعلّقة بالإقامة، والدراسة بالخارج. </li>
                                <li class="mb-3">المساعدة على إنهاء إجراءات السفر، وترتيب استقبال الطلبة بالمطار. </li>
                                <li class="mb-3">توفير السكن المناسب بما يتناسب مع احتياجات الطلبة.</li>
                                <li class="mb-3">توفير أفضل الحلول للطلبة لإدارة وترشيد النفقات المالية. </li>
                                <li class="mb-3">مساعدة الطلبة على التواصل مع طلبة المعاهد والجامعات الدولية والخريجين منهم. </li>
                                <li class="mb-3">تقديم الدعم أثناء فترة الدراسة بالخارج، ومساعدة الطلبة على معرفة الأهداف طويلة الأجل.</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </section>
    <!-- ./Team -->
    <!-- Value & mission -->
    <section class="value-mission py-5 bg-white">
        <div class="container-fluid">
            <!-- Section Heading -->
            <div class="row px-xl-5 mb-4 text-center">
                <div class="col-12">
                    <div class="heading-team">
                        <h2 class="text-main-color font-weight-bold">إحصائيات عامي 2018 و2019</h2>
                        <p>
                            يوضح الرسم البياني التالي في عام 2018 بأن إجمالي عدد الطلبة المُسجَلين لدينا 569 طالباً فقط، بينما يُقدر عدد إجمالي الطلبة المُبتعثين 1285 طالبا في الفترة من يناير وحتى أكتوبر من العام الدراسي 2019.
                        </p>
                    </div>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-md-6">
                    <div class="shadow-lg rounded-10 p-0 h-100">
                        <img src="{{asset('website/imgs/statistics/1.jpg')}}" class="w-100" alt="">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="shadow-lg rounded-10 p-0 h-100">
                        <img src="{{asset('website/imgs/statistics/2.jpg')}}" class="w-100" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ./Value & mission -->

</div>

@endsection
