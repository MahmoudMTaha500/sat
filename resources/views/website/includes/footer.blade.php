<!-- Footer -->

<footer>
    <div class="top-footer bg-main-color py-5">
        <div class="container-fluid">
            <div class="row px-xl-5">
                <div class="col-md-5 col-12">
                    <img src="{{asset('website')}}/imgs/logo-white.png" alt="Classat Logo" class="img-fluid" />
                    <p class="text-white mt-4">ابدأ رحلتك الآن، وتعلم اللغة في أكبر المعاهد الدولية على يد أمهر المعلمين وخبراء اللغة حول العالم. نسعى - من خلال عقودنا واتفاقياتنا مع المعاهد، والجامعات، والمؤسسات الأكاديمية - إلى رفع مستوى التعاون وخلق بيئة تنافسية</p>
                </div>
                <div class="col-md-2 col-6 mt-3 mt-md-0">
                    <h6 class="text-secondary-color">الخدمات</h6>
                    <ul class="p-0">
                        <li><a href="{{route('website.institutes')}}" class="text-white">المعاهد</a></li>
                        <li><a href="{{route('order-visa.create')}}" class="text-white">طلب تأشيرة</a></li>
                        <li><a href="{{route('website.offers')}}" class="text-white">العروض</a></li>
                        <li><a href="{{route('website.articles')}}" class="text-white">المقالات</a></li>
                    </ul>
                </div>
                <div class="col-md-2 col-6 mt-3 mt-md-0">
                    <h6 class="text-secondary-color">الشركة</h6>
                    <ul class="p-0">
                        <li><a href="{{route('website.about.us')}}" class="text-white">عن الشركة</a></li>
                        <li><a href="{{route('website.contact.us')}}" class="text-white">اتصل بنا</a></li>
                        <li><a href="{{route('website.terms_conditions')}}" class="text-white">الشروط والأحكام</a></li>
                        <li><a href="{{route('website.refund_policy')}}" class="text-white">شروط الاستردات</a></li>
                    </ul>
                </div>
                <div class="col-md-3 col-12 col-6 mt-3 mt-md-0">
                    <h6 class="text-secondary-color">تواصل معنا</h6>
                    <ul class="p-0">
                        <li class="text-white"><i class="fas fa-envelope"></i> <a href="mailto:admission@sat-edu.com" class="text-white">admission@sat-edu.com</a></li>
                        <li class="text-white"><i class="fas fa-phone"></i> <a dir="ltr" href="tel:966555484931" class="text-white">+966 55 548 4931</a></li>
                        <li class="text-white mb-4"><i class="fas fa-map-marker-alt"></i> المملكة العربية السعودية والمملكة المتحدة (نيوكاسل, يورك).                        </li>
                        <li class="social-links-sm">
                            <a class="bg-white d-inline-block text-center ml-3" target="_blank" href="https://www.snapchat.com/add/classat">
                                <span class="text-main-color font-weight-bold"><i class="fab fa-snapchat-ghost"></i></span>
                            </a>
                            <a class="bg-white d-inline-block text-center ml-3" target="_blank" href="https://twitter.com/classat?s=21">
                                <span class="text-main-color font-weight-bold"><i class="fab fa-twitter"></i></span>
                            </a>
                            <a class="bg-white d-inline-block text-center ml-3" target="_blank" href="https://www.instagram.com/class_at/">
                                <span class="text-main-color font-weight-bold"><i class="fab fa-instagram"></i></span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="bottom-footer py-2 bg-sub-main-color">
        <p class="text-center text-white">Copyright &copy; All rights reserve 2021</p>
    </div>
</footer>
<!-- ./Footer -->
<div class="support position-fixed p-3 d-md-none d-block">
    <p class="text-white mb-0">
        <span class="close-support position-absolute"><i class="fas fa-times"></i></span> هل تحتاج الي مساعدة؟ .. اطلب مستشارك <a href="tel:966555484931" class="float-left text-secondary-color bg-white"><i class="fas fa-arrow-left"></i></a>
    </p>
    @if ($page_identity['page_name'] != 'home')
        <script src="{{asset('website')}}/js/global.js"></script>
    @else
        <script src="{{asset('website')}}/js/home-scripts.js"></script>
        <script>
            // add-favourite
            $(document).on("click", ".add-favourite", function () {
                $favourite_obj = $(this)
                axios.get("/update-student-favorit", { params: { course_id: $favourite_obj.attr("course-id") } }).then(function (a) {
                    "removed" == a.data && $favourite_obj.find(".favourite-icon").addClass("far").removeClass("fas"), "added" == a.data && $favourite_obj.find(".favourite-icon").addClass("fas").removeClass("far"), console.log(a.data);
                });
            });
        </script>
    @endif
</div>
