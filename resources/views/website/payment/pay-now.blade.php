<script src="https://cdnjs.cloudflare.com/ajax/libs/bluebird/3.3.4/bluebird.min.js"></script>
<script src="https://secure.gosell.io/js/sdk/tap.min.js"></script>

@extends('website.app') @section('website.content')
<!-- Confirm Reservation -->
<section class="confirm-reservation py-4 bg-sub-secondary-color">
    <div class="container-fluid">
        <!-- Section Heading -->
        <div class="row px-xl-5 mb-4">
            <div class="col-12">
                <div class="heading-institutes">
                    <h3 class="text-main-color font-weight-bold">تأكيد الحجز</h3>
                    <p class="mb-1">برجاء ادخل جميع البيانات لتأكيد حجزك وسيقوم فريق الموقع بالتواصل معك لتأكيد جميع التفاصيل لذا تأكد من صحة الجوال والبريد الإلكتروني</p>
                </div>
            </div>
        </div>
        <!-- ./Section Heading -->
        <div class="row px-xl-5">
            <div class="col-lg-8">
                <!-- Pay Now Form -->
                <div class="bg-white p-xl-5 p-3 rounded-10">
                    <p class="text-main-color">برجاء اختيار المبلغ الذي تريد دفعه الآن</p>
                    @include('admin.includes.errors')
                    <form id="form-container" method="post" action="{{route('checkout')}}">
                        @csrf
                        <input type="hidden" name="request_id" value="{{$request_id}}" />
                        <input type="hidden" name="token_id" id="token_input" />
                        <div class="row">
                            <div class="col-lg-6 mb-4">
                                <div class="custom-control custom-radio">
                                    <input required value="{{round($course_details['total_price']/2)}}" type="radio" id="deposit" name="paid_price" class="custom-control-input" />
                                    <label  class="custom-control-label" for="deposit">الحد الأدني {{round($course_details['total_price']/2)}} ريال سعودي ( قيمة العربون )</label>
                                </div>
                            </div>
                            <div class="col-lg-6 mb-4 text-left">
                                <div class="custom-control custom-radio">
                                    <input required value="{{round($course_details['total_price'])}}" type="radio" id="total_price" name="paid_price" class="custom-control-input" />
                                    <label class="custom-control-label" for="total_price">المبلغ بالكامل {{round($course_details['total_price'])}} ريال سعودي</label>
                                </div>
                            </div>

                            <div id="element-container" class="w-100"></div>
                            <div id="error-handler" role="alert"></div>
                            <div id="success" style="display: none; position: relative; float: left;">Success! Your token is <span id="token"></span></div>

                            <div class="col-12 mb-4">
                                <div class="custom-control custom-checkbox">
                                    <input {{ old('refund_policy') != null ? 'checked' : ''}} type="checkbox" class="custom-control-input" id="customCheck1" name="refund_policy" required>
                                    <label class="custom-control-label" for="customCheck1"><a data-toggle="modal" data-target="#successModal" href="#">أوافق على الشروط والأحكام و سياسة الاسترداد</a></label>
                                </div>
                            </div>
                            <!-- Modal of terms and conditions -->
                            <div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-body py-5 px-4 text-right">
                                            
                                            <div class="cheched-heading">
                                                <p>
                                                    <h5 class="mb-4 text-secondary-color">عزيزي "مقدم الطلب"، يُرجى العلم بأن "سياسة الاسترداد والاسترجاع " تحفظ حقوقك القانونية؛ لذا يُرجى الأخذ بعين الاعتبار النقاط التالية قبل الشروع في قراءتها.</h5>
    
                                                    <ul style="list-style: arabic-indic;">
                                                        <li class="mb-3">بمجرد ملء استمارة التسجيل؛ فان ذلك يعني موافقة (مقدم الطلب) على منح الحق لمزود الخدمة (مؤسسة سات) في توفير الخدمات الاستشارية الأكاديمية والتعليمية له، والتزام (مقدم الطلب) بسداد كافة الرسوم الإدارية والدراسية المُتفق عليها.</li>
                                                        <li class="mb-3">بمجرد التأكيد على عملية التسجيل، والانتهاء من كافة إجراءات الدفع، ووصول إخطار بتأكيد عملية السداد؛ فإنه من حق (مقدم الطلب) الحصول على خدمات مزود الخدمة (مؤسسة سات) المُتفق عليها.</li>
                                                        <li class="mb-3">تخضع كافة الرسوم المدفوعة من قِبَل مقدم الطلب لمؤسسة سات <u>لسياسة الاسترداد والاسترجاع،</u> والتي سيتم ذكرها لاحقاً.</li>
                                                        <li class="mb-3">يجب تسوية كافة الرسوم المتأخرة قبل الشروع في تقديم الخدمات المتفق عليها، وبمجرد قيام مقدم الطلب بالدفع وإخطاره بتأكيد عملية السداد عبر حسابه بالبريد الإلكتروني؛ سيبدأ فريق عمل &quot;سات&quot; بإجراءات التقديم، والتي لا يمكن إيقافها أو الرجوع عنها إلا في الحالات الواردة <u>بسياسة الاسترداد والاسترجاع،</u> والتي سيتم ذكرها لاحقاً.</li>
                                                        <li class="mb-3">ستعمل &quot;سات&quot; على تزويد مقدم الطلب بالنصائح والإرشادات قبل المغادرة البلاد؛ لضمان سلامة إجراءات السفر، ووصول مقدم الطلب سالماً إلى البلد محل الدراسة.</li>
                                                        <li class="mb-3">لا يقع على عاتق مؤسسة&quot;سات&quot; أي مسئولية تنتج عن تأخير أو إلغاء إصدار التأشيرة من قبل الحكومة أو السفارات؛ لأسباب أمنية أو سياسة، أو أي أسباب أخرى خارجة عن إرادة مؤسسة &quot;سات&quot;.</li>
                                                        <li class="mb-3">سيتم التوقف عن تزويد مقدم الطلب بالخدمات التي توفرها &quot;سات&quot;؛ بمجرد بدء مقدم الطلب في البرنامج الدراسي بالمعهد أو الجامعة في الخارج.</li>
                                                        <li class="mb-3">يجب على مقدم الطلب قراءة <u>سياسة الاسترداد والاسترجاع </u>الخاصة بمؤسسة &quot;سات&quot; جيداً، وإخطار المسؤولين بأنها واضحة بالنسبة له، ويلزم على (مقدم الطلب) الإقرار والموافقة عليها؛ وذلك قبل القيام بسداد الرسوم المستحقة.</li>
                                                        <li class="mb-3">في حال قبول طلب الاسترداد للرسوم المدفوعة؛ فإنه سيتم سداد المبلغ القابل للاسترداد حسب <u>سياسة الاسترداد والاسترجاع </u>الخاصة بالمعهد، وسوف يتم تحويل المبلغ للحساب البنكي خلال 5 ايام عمل.</li>
                                                    </ul>
                                                    
                                                    <h3 class="text-main-color text-center font-weight-bold my-4">سياسة الاسترداد والاسترجاع</h3>
                                                    <h5 class="mb-4 text-secondary-color">الحالات التي لا يحق فيها لمقدم الطلب استرداد الرسوم المدفوعة، أو جزء منها، بأي حال من الأحوال.</h5>
                                                    <strong><u>أولا: حالات عامة لرفض استرداد الرسوم المدفوعة.</u></strong>
                                                    <ul style="list-style: arabic-indic;">
                                                        <li class="mb-3">إذا تأخر أو تخلف مقدم الطلب عن سداد باقي المستحقات بحلول تاريخ السداد، ولم يتم تقديم اعتذار كتابي بالانسحاب عن البرنامج الدراسي قبل بدء الدراسة بـ (14 يوم)، فإن &quot;سات&quot; غير مسئولة عن فشل استكمال إجراءات تقديم الطلب؛ وعليه فلن يتم رد دفعة الحجز (غير قابلة للاسترداد)، وأي مصاريف أخرى قام بسدادها مقدم الطلب، تحت أي ظرف من الظروف.</li>
                                                        <li class="mb-3">في حالة تغيير الخطط الدراسية بالخارج لمقدم الطلب (لأسباب شخصية أو مهنية)، فجأة وبدون إخطار مُسبق، وذلك بعد بدء فريق العمل بإجراءات توفير الخدمات المتفق عليها، فلن يحق لمقدم الطلب المطالبة باسترداد أي مبالغ قد قام بدفعها لمؤسسة &quot;سات&quot;.</li>
                                                        <li class="mb-3">لن يتم إسترداد أي رسوم مدفوعة إذا تم الانسحاب بعد البدء في البرنامج الدراسي.وذلك حسب قوانين وشروط المؤسسات التعليمية.</li>
                                                        <li class="mb-3">لا يحق المطالبة باسترداد أي مبالغ قام بدفعها مقدم الطلب إلى أي مؤسسة تعليمية بدون علم مؤسسة &quot;سات&quot;.</li>
                                                        <li class="mb-3">يسقط حق العميل في استرداد الرسوم المدفوعة في حال الاستعانة بخدمات مؤسسات أكاديمية أخرى؛ مما قد يتسبب في تعطيل إجراءات تقديم الطلب، ويتعارض مع سياسات عمل مؤسسة &quot;سات&quot;، حيث تقع كامل مسؤولية قرارات تلك المؤسسات على عاتق مقدم الطلب.</li>
                                                        <li class="mb-3">لن تقوم مؤسسة &quot;سات&quot; برد الرسوم المدفوعة في حال حدوث تأخير من قِبل جهات خارجية، مثل الجهات الحكومية، أو السفارة، أو المؤسسات التعليمية، وغيرها من المؤسسات لأسباب خارجة عن إرادة &quot;سات&quot;؛ مما يتسبب في تعطيل أو فشل استكمال إجراءات تقديم الطلب.</li>
                                                        <li class="mb-3">في حال إنهاء إجراءات تقديم الطلب، وقبول مقدم الطلب في البرنامج الدراسي، فإن كافة الرسوم المدفوعة للمعاهد أو الجامعات المحلية أو الدولية، أو المصروفات المدفوعة لمُزودي خدمة توفير السكن الطلابي غير قابلة للاسترداد، ولا تُعد مؤسسة &quot;سات&quot; طرفاً ثالثاً لهما.</li>
                                                        <li class="mb-3"><u>في حالة قبول أي مبلغ مسترد لمقدم الطلب، فأنه سيتم استقطاع مبلغ 150 دولار أمريكي بما يعادل الكلفة التشغيلية، والرسوم الإدارية.</u></li>
                                                    </ul>
                                                    <strong><u>ثانياً: حالات خاصة بإصدار التأشيرة والسفر إلى الخارج يتم فيها رفض استرداد الرسوم المدفوعة</u></strong>
                                                    <ul style="list-style: arabic-indic;">
                                                        <li class="mb-3" >فشل مقدم الطلب في المقابلة الخاصة بإصدار التأشيرة.</li>
                                                        <li class="mb-3" >تقديم المستندات الخاصة بإصدار التأشيرة بعد الموعد المحدد لها.</li>
                                                        <li class="mb-3" >تقديم مستندات مزورة.</li>
                                                        <li class="mb-3" >عدم استيفاء مقدم الطلب للمتطلبات الخاصة بإصدار التأشيرة، وبدون توضيح تلك الأسباب لإدارة &quot;سات&quot;، أو القيام بطلب المساعدة من فريق عمل مؤسسة &quot;سات&quot;.</li>
                                                        <li class="mb-3" >رفض السفارة للوثائق والمستندات التي قدمها مقدم الطلب.</li>
                                                        <li class="mb-3" >إذا تم ترحيل مقدم الطلب من البلد محل الدراسة.</li>
                                                        <li class="mb-3" >رفض التأشيرة قرار يعود لمركز الهجرة وليس من مسؤولية سات ضمان قبول أو رفض التاشيرة.</li>
                                                    </ul>
                                                    <h5 class="mb-4 text-secondary-color">الحالات التي يحق فيها لمقدم الطلب استرداد الرسوم المدفوعة.</h5>
                                                    <ul style="list-style: arabic-indic;">
                                                        <li class="mb-3">الاعتذار عن الانضمام للبرنامج الدراسي قبل الشروع في تنفيذ إجراءات التقديم، شريطة تقديم اعتذار كتابي بالانسحاب عن البرنامج الدراسي قبل 14 يوم. سيتم استرداد الرسوم بالكامل بعد خصم مبلغ الرسوم الإدارية بما يعادل 150 دولار أمريكي.</li>
                                                        <li class="mb-3">أن تمنع المؤسسة التعليمية إلتحاق مقدم الطلب بالرنامج الدراسي.</li>
                                                        <li class="mb-3">في حال قيام المعهد أو الجامعة بإلغاء البرنامج الدراسي المراد الالتحاق به عند تقديم الطلب.</li>
                                                        <li class="mb-3">في حالة إثبات صحة شكوى مقدمة حول الخدمة التي تقدمها مؤسسة &quot;سات&quot;، بحيث يتم تقديم الشكوى كتابيًا في موعد لا يتجاوز&nbsp;&nbsp; &nbsp;(3) أيام بعد تلقي الخدمة المتفق عليها.</li>
                                                    </ul>
                                                    <h5 class="mb-4 text-secondary-color">سياسة الاسترداد والاسترجاع في حال الإلغاء من قِبَل المؤسسة، أو مقدم الطلب.</h5>
                                                    <strong><u>	في حال الإلغاء من قِبَل مؤسسة "سات". </u></strong><br>
                                                    <p>تحتفظ "سات" بالحق في إلغاء أو تعديل أو إعادة جدولة - أي أو كل من - الخدمات المُقدمة في الحالات التالية:</p>
                                                    <ul style="list-style: arabic-indic;">
                                                        <li class="mb-3">1.	يحق لمؤسسة "سات" إلغاء أو تعديل أو إعادة جدولة - أي أو كل من - الخدمات بسبب عوامل خارجة عن السيطرة، على سبيل المثال لا الحصر: الاضطرابات السياسية، أو الكوارث الطبيعية، أو الوباء، أو مخاوف تتعلق بالسلامة، وفقاً لتقدير مؤسسة سات، أو خطراً يهدد أمن وسلامة مقدم الطلب، أو أحداً من العاملين بمؤسسة "سات"؛ في مثل هذه الظروف، يحق لسات إخطار مقدم الطلب بالاختيار ما بين:
                                                            <ol>
                                                                <li>الالتحاق بنفس البرنامج الدراسي في معهد / جامعة أخرى بنفس البلد محل الدراسة، أو الدراسة في بلد أخر بمعهد / جامعة توفر نفس البرنامج الدراسي في ذات التخصص.</li>
                                                                <li>تمديد الخدمة المُقدمة من قِبَل "سات" لمدة عام دراسي؛ حتى يتمكن من استخدام الخدمة في وقت لاحق.</li>
                                                                <li>إلغاء البرنامج الدراسي، ورد كافة الرسوم التي دفعها مقدم الطلب بعد تفعيل البند الثامن من سياسة الاسترداد.</li>
                                                            </ol>
                                                        </li>
                                                        <li class="mb-3">	إذا قرر مقدم الطلب البقاء في البلد محل الدراسة بعد إلغاء البرنامج الدراسي، فإنه تقع على عاتق مقدم الطلب كامل المسؤولية، ويتحمل تبعات قراراته الشخصية، وما ينتج عن ذلك من عواقب.</li>
                                                    </ul>
                                                    <strong><u>	في حال الإلغاء من قِبَل مقدم الطلب.</u></strong><br>
                                                    <ul style="list-style: arabic-indic;">
                                                        <li class="mb-3">لن تقوم &quot;سات&quot; برد أي مبالغ على الإطلاق لمقدمي الطلب الذين قاموا بالإلغاء في حال ما إذا كانت الفترة المتبقية قبل بدء البرنامج الدراسي أقل من (14) يومًا.</li>
                                                        <li class="mb-3">بالنسبة لمقدمي الطلب الذين قاموا بالاعتذارعن الانضمام للبرنامج الدراسي قبل بدء الدراسة (14) يومًا، فإنه يتعين على &quot;سات&quot; القيام برد ما قيمته (75٪) من رسوم الدراسة واسترداد ماقميته (100%) من قيمة رسوم السكن المدفوعة لمقدمي الطلب، ولن تقوم &quot;سات&quot; برد أي مبالغ يقوم بدفعها مقدمي الطلب لأطراف أخرى، باستثناء النفقات المدفوعة من قِبَل فريق عمل &quot;سات&quot; لتلك الأطراف مع تفعيل البند الثامن من سياسة الاسترداد.</li>
                                                        <li class="mb-3">بالنسبة لمقدمي الطلب الذين قاموا بالاعتذار عن الانضمام للبرنامج الدراسي بعد بدء الدراسة، فإنه يخضع لسياسة وشروط المؤسسة التعليمية اللتي تم التقديم عليها.</li>
                                                        <li class="mb-3">في حال طلب مقدم الطلب العودة المبكرة للوطن بعد بدء البرنامج الدراسي لأسباب خاصة به؛ فإن جميع الرسوم التي دفعها مقدم الطلب، بما في ذلك تكاليف العودة المبكرة للوطن، غير قابلة للاسترداد.</li>
                                                    </ul>
                                                </p>
                                            </div>
                                            <div class="checked-btns">
                                                <button type="button" class="btn bg-white text-secondary-color border-secondary-color px-5 rounded-10 mb-4" data-dismiss="modal">اغلاق</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <button id="tap-btn" type="submit" class="btn bg-secondary-color text-white w-100 rounded-10">
                                    دفع
                                </button>
                            </div>
                        </div>
                    </form>
                </div>

                <!-- ./Pay Now Form -->
            </div>
            <div class="col-lg-4">
                <!-- Course Details -->
                <div class="bg-white py-4 rounded-10 mb-4">
                    <div class="cost-heading border-bottom pb-2 px-3">
                        <h5 class="font-weight-bold text-main-color">تفاصيل الكورس والحجز</h5>
                    </div>
                    <div class="cost-body px-3 pt-3">
                        <p class="text-dark"><span class="font-weight-bold">تكلفة الكورس الإجمالية : </span> {{round($course_details['total_price'])}} ريال سعودي</p>
                        <p class="text-dark"><span class="font-weight-bold">أسم المعهد : </span> {{$course_details['institute_name']}}</p>
                        <p class="text-dark"><span class="font-weight-bold">اسم الكورس : </span> {{$course_details['course_name']}}</p>
                        <p class="text-dark"><span class="font-weight-bold">الموقع : </span> {{$course_details['country']}} - {{$course_details['city']}}</p>
                        <p class="text-dark"><span class="font-weight-bold">تاريخ بداية الكورس : </span> {{ArabicDate($course_details['from_date'])}}</p>
                        <p class="text-dark"><span class="font-weight-bold">تاريخ نهاية الكورس : </span> {{ArabicDate($course_details['to_date'])}}</p>
                        @if (isset($course_details['airport']['name_ar']))
                        <p class="text-dark"><span class="font-weight-bold">الاستقبال : </span> {{$course_details['airport']['name_ar']}} - {{$course_details['airport']['price']}} ريال سعودي</p>
                        @endif @if ( isset($course_details['residence']['name_ar']))
                        <p class="text-dark"><span class="font-weight-bold">تفاصيل السكن : </span> {{$course_details['residence']['name_ar']}} - {{$course_details['residence']['price']*$course_details['weeks'] }} ريال سعودي</p>
                        @endif @if ($course_details['insurance_price'] != 0)
                        <p class="text-dark"><span class="font-weight-bold">التامين : </span> {{$course_details['insurance_price']*$course_details['weeks']}} ريال سعودي</p>
                        @endif
                        <p class="text-dark"><span class="font-weight-bold">عدد الأسابيع : </span> {{$course_details['weeks']}} أسابيع</p>
                        <p class="text-dark"><span class="font-weight-bold">عدد الدروس : </span> {{$course_details['lessons_per_week']}} درس / أسبوع</p>
                        <p class="text-dark"><span class="font-weight-bold">عدد الساعات : </span> {{$course_details['hours_per_week']}} ساعة في الأسبوع</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ./Confirm Reservation -->

<script>
    //pass your public key from tap's dashboard
    var tap = Tapjsli("pk_test_pu0ALqysgrz5UWKvjotBZTQY");

    var elements = tap.elements({});
    var style = {
        base: {
            color: "#535353",
            lineHeight: "18px",
            fontFamily: "sans-serif",
            fontSmoothing: "antialiased",
            fontSize: "16px",
            "::placeholder": {
                color: "rgba(0, 0, 0, 0.26)",
                fontSize: "15px",
            },
        },
        invalid: {
            color: "red",
        },
    };
    // input labels/placeholders
    var labels = {
        cardNumber: "Card Number",
        expirationDate: "MM/YY",
        cvv: "CVV",
        cardHolder: "Card Holder Name",
    };
    //payment options
    var paymentOptions = {
        currencyCode: ["KWD", "USD", "SAR"],
        labels: labels,
        TextDirection: "ltr",
    };
    //create element, pass style and payment options
    var card = elements.create("card", { style: style }, paymentOptions);
    //mount element
    card.mount("#element-container");
    //card change event listener
    card.addEventListener("change", function (event) {
        if (event.BIN) {
            console.log(event.BIN);
        }
        if (event.loaded) {
            console.log("UI loaded :" + event.loaded);
            console.log("current currency is :" + card.getCurrency());
        }
        var displayError = document.getElementById("error-handler");
        if (event.error) {
            displayError.textContent = event.error.message;
        } else {
            displayError.textContent = "";
        }
    });
    // Handle form submission
    var form = document.getElementById("form-container");
    form.addEventListener("submit", function (event) {
        event.preventDefault();

        tap.createToken(card).then(function (result) {
            console.log(result);
            if (result.error) {
                // Inform the user if there was an error
                var errorElement = document.getElementById("error-handler");
                errorElement.textContent = result.error.message;
            } else {
                // Send the token to your server
                function get_token_id(result , form_submition){
                    document.getElementById("token_input").value = result.id;
                    form_submition(form)
                }
                get_token_id(result , function(form){form.submit();})
            }
        });
    });
</script>
@endsection
