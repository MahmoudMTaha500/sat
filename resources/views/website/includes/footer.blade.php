<!-- Footer -->

<footer>
    <div class="top-footer bg-main-color py-5">
        <div class="container-fluid">
            <div class="row px-xl-5">
                <div class="col-xl-5 col-12">
                    <img src="{{asset('website')}}/imgs/logo-white.png" alt="" class="img-fluid" />
                    <p class="text-white mt-4">أبدا رحلتك الأن و تعلم اللغة في أكبر المعاهد و مع أمهر المعلمين حول العالم نسعى من خلال عقودنا واتفاقياتنا مع المعاهد والجامعات والمؤسسات الأكاديمية لرفع مستوى التعاون</p>
                </div>
                <div class="col-xl-2 col-6">
                    <h6 class="text-secondary-color">الخدمات</h6>
                    <ul class="p-0">
                        <li><a href="{{route('website.institutes')}}" class="text-white">المعاهد</a></li>
                        <li><a href="{{route('order-visa.create')}}" class="text-white">طلب تأشيرة</a></li>
                        <li><a href="{{route('website.offers')}}" class="text-white">العروض</a></li>
                        <li><a href="{{route('website.articles')}}" class="text-white">المقالات</a></li>
                    </ul>
                </div>
                <div class="col-xl-2 col-6">
                    <h6 class="text-secondary-color">الشركة</h6>
                    <ul class="p-0">
                        <li><a href="{{route('website.about.us')}}" class="text-white">عن الشركة</a></li>
                        <li><a href="{{route('website.contact.us')}}" class="text-white">اتصل بنا</a></li>
                    </ul>
                </div>
                <div class="col-xl-3 col-12">
                    <h6 class="text-secondary-color">تواصل معنا</h6>
                    <ul class="p-0">
                        <li class="text-white"><i class="fas fa-envelope"></i> <a href="mailto:admission@sat-edu.com" class="text-white">admission@sat-edu.com</a></li>
                        <li class="text-white"><i class="fas fa-phone"></i> <a href="tel:966555484931" class="text-white">+966 55 548 4931</a></li>
                        <li class="text-white mb-4"><i class="fas fa-map-marker-alt"></i> المملكة العربية السعودية والمملكة المتحدة (نيوكاسل, يورك).                        </li>
                        <li class="social-links-sm">
                            <a class="bg-white d-inline-block text-center ml-3" target="_blank" href="https://www.snapchat.com/add/classat">
                                <span class="text-main-color font-weight-bold"><i class="fab fa-snapchat-ghost"></i></span>
                            </a>
                            <a class="bg-white d-inline-block text-center ml-3" target="_blank" href="https://twitter.com/classat?s=21">
                                <span class="text-main-color font-weight-bold"><i class="fab fa-twitter"></i></span>
                            </a>
                            <a class="bg-white d-inline-block text-center ml-3" target="_blank" href="https://twitter.com/classat?s=21">
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
        <span class="close-support position-absolute"><i class="fas fa-times"></i></span> هل تحتاج الي مساعدة؟ .. اطلب مستشارك <a href="support.html" class="float-left text-secondary-color bg-white"><i class="fas fa-arrow-left"></i></a>
    </p>

    @if (!isset($notUseVue)) 
    <script src="{{asset('js/app.js')}}"></script>
    @endif
    <script src="{{url('/admin')}}/app-assets/vendors/js/vendors.min.js" type="text/javascript"></script>
    <!-- Jquery, Popper and Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
    <!-- OWl slider  -->
    <script src="{{asset('website')}}/js/plugins/owl.carousel.min.js"></script>
    <!-- Starrr  -->
    <script src="{{asset('website')}}/js/plugins/starrr.js"></script>
    <!-- Select Search -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
    <!-- Custom js -->
    <script src="{{asset('website')}}/js/plugins/uploadImg.js"></script>
    <script src="{{asset('website')}}/js/shared/starr.call.js"></script>
    <script src="{{asset('website')}}/js/shared/owl.call.js"></script>
    <script src="{{asset('website')}}/js/shared/select-picker.call.js"></script>
    <script src="{{asset('website')}}/js/shared/sidemenu.js"></script>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="{{asset('website')}}/js/shared/support.js"></script>

    <script>
        $(".navbar-toggler").click(function () {
            $(".navbar-collapse").slideToggle(300);
        });
        $(".datepicker-active-monday").datepicker({
            beforeShowDay: function (date) {
                var day = date.getDay();
                return [day == 1];
            },
        });

    

        $(document).on('click' , '.add-favourite' , function(){
            $favourite_obj = $(this);
            axios
                .get('{{route("update.student.favorit")}}', {
                    params: {
                        course_id: $favourite_obj.attr("course-id"),
                    },
                })
                .then(function (response) {
                    if (response.data == "removed") {
                        $favourite_obj.find(".favourite-icon").addClass("far").removeClass("fas");
                    }
                    if (response.data == "added") {
                        $favourite_obj.find(".favourite-icon").addClass("fas").removeClass("far");
                    }
                    console.log(response.data);
                });
        })

           
    </script>
</div>
