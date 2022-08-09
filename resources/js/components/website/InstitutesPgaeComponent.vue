<template>
    <div style="display: inline;">
        <!-- Institutes -->
        <section class="institutes py-5 bg-sub-secondary-color institutes-page">
            <div class="container-fluid">
                <!-- Section Heading -->
                <div class="row px-xl-5">
                    <div class="col-12">
                        <div class="heading-institutes">
                            <h3 class="text-main-color font-weight-bold">المعاهد ( {{courses.total}} )</h3>
                            <p>تصفح جميع المعاهد الخاصة بدراسة اللغة حول العالم، واختر اللغة التي ترغب في دراستها</p>
                        </div>
                    </div>
                </div>
                <!-- ./Section Heading -->
                <!-- Institute List -->
                <div class="row px-xl-5 mb-5">
                    <div class="col-xl-3">
                        <!-- Filter Institute -->
                        <div id="accordion" class="sticky-top pt-4">
                            <div class="card rounded-10 shadow-sm mb-4">
                                <div class="card-header border-bottom bg-white rounded-10 border-0 d-flex justify-content-between" id="headingOne">
                                    <h5 class="font-weight-bold text-main-color" >ابحث عن معهد</h5>
                                    <button class="toggel-filter-btn btn rounded-10 bg-secondary-color text-white" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        اغلاق
                                    </button>
                                </div>
                                 
                                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                                    <div class="card-body border-top">
                                        <!-- Filter Form -->

                                        <form action="">
                                            <label>ادخل اسم المعهد</label>
                                            <div class="input-group mb-3 border rounded-10 pl-3 pr-2 btn-light">
                                                <input  v-model="keyword" ref="keyword" type="text" class="form-control border-0 bg-transparent pr-1" placeholder="بحث" />
                                                <div class="input-group-append">
                                                    <span class="input-group-text border-0 p-0 bg-transparent" id="basic-addon2"><i class="fas fa-search"></i></span>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label>اختر الدولة</label>
                                                <country-component  :get_countries_url="get_countries_url" ref="countries_component_ref" :ele_class="'form-control rounded-10'"> </country-component>
                                            </div>
                                            <div class="form-group">
                                                <label>اختر المدينة</label>
                                                <city-component  :get_cities_url="get_cities_url" ref="cities_component_ref" :ele_class="'form-control rounded-10'"> </city-component>
                                            </div>

                                            <div class="form-group">
                                                <label>عدد الأسابيع</label>
                                                <select @change="filter_courses()" v-model="weeks" class="form-control selectpicker rounded-10" data-live-search="true">
                                                    <option v-for="week in 45" :key="week" :value="week">{{week}}</option>
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label>المستوى المطلوب</label>
                                                <select v-model="course_level" class="form-control selectpicker rounded-10" data-live-search="true">
                                                    <option value="" disabled selected>المستوي</option>
                                                    <option value="">الكل</option>
                                                    <option value="مبتدئ A1">مبتدئ A1</option>
                                                    <option value="مبتدئ A2">مبتدئ A2</option>
                                                    <option value="المتوسط B1">المتوسط B1</option>
                                                    <option value="المتوسط B2">المتوسط B2</option>
                                                    <option value="متقدم C1">متقدم C1</option>
                                                    <option value="متقدم C2">متقدم C2</option>
                                                </select>


                                                
                                            </div>
                                        <div class="form-group">
                                                <label> ترتيب حسب </label>
                                                <select v-model="arrange_as" class="form-control  rounded-10" data-live-search="true">
                                                    <option value="">الكل</option>
                                                    <option value="highest_rates">التقييم من الأعلى إلى الأقل</option>
                                                    <option value="lowest_rates">  التقييم من الأعلى إلى الأقل    </option>
                                                    <option value="highest_prices">   السعر من الأعلى للأقل    </option>
                                                    <option value="lowest_prices">  السعر من الأقل للأعلى    </option>
                                                 
                                                </select>
                                            </div>
                                     
                                            <div class="mb-4">
                                                <div class="form-check form-check-inline mr-0 ml-4">
                                                    <input class="form-check-input mr-0 ml-3 bg-secondary" type="checkbox" v-model="best_offers" />
                                                    <label class="form-check-label">أفضل العروض</label>
                                                </div>
                                            </div>
                                            <button @click="filter_courses(); pagination_pages_method(courses.current_page)" type="button" class="btn rounded-10 bg-secondary-color text-white mb-2 w-100">بحث</button>
                                        </form>
                                        <!-- ./Filter Form -->
                                    </div>
                                </div>
                            </div>
                            <nav aria-label="Page navigation" class="d-lg-none d-block">
                                <div class="row" dir="ltr">
                                    <div class="col-md-auto col-12 order-md-1 order-2">
                                        <ul class="pagination d-flex justify-content-center p-0 m-0">
                                            <li class="m-0">
                                                <span>
                                                    <span  class="page-link rounded-10 mx-1 bg-dark text-white border-0"> page {{courses.current_page}} of {{courses.last_page }} </span>
                                                </span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </nav>
                        </div>
                        <!-- ./Filter Institute -->
                    </div>
                    <div class="col-xl-9">
                        <div class="institutes-list pt-4" id="institutes-box">
                            <div class="row">
                                <div v-for="course in courses.data" :key="course.course_id" class="col-lg-4 col-md-6">
                                    <!-- Institute -->
                                    <div class="card mx-xl-4 mx-2 shadow-sm offer border-0 institute-card rounded-10 mb-5">
                                        <!-- Offer Icon -->
                                        <div v-if="course.discount!=0" class="offer-icon position-absolute bg-secondary-color text-white">
                                            - {{Math.round(course.discount*100)}} %
                                        </div>
                                        <!-- Offer Icon -->
                                        <!-- Add To Favourite Btn -->
                                        <div class="add-favourite position-absolute" :course-id="course.course_id">
                                            <i v-if="course.favourite_course_id != null" class="fas fa-heart favourite-icon"></i>
                                            <i @click="student_login_message()" v-else class="far fa-heart favourite-icon"></i>
                                        </div>
                                         <!-- ./Add To Favourite Btn -->
                                        <!-- Institute Img -->
                                        <a target="_blank" :href="public_path+'institute/'+course.institute_id+'/'+course.institute_sulg+'/'+course.course_sulg+'?weeks='+weeks">
                                            <div class="institute-img d-inline-block position-relative">
                                                <img :src="course.institute_banner_id == null ? public_path+'storage/default_images.png' : public_path+'storage/uploaded_media/'+course.institute_banner_id+'/conversions/'+course.institute_banner_name.replace(/(\.[\w\d?=_-]+)$/i, '-thumb$1')" :alt="course.institute_name" class="card-img-top" />
                                            </div>
                                        </a>
                                        


                                        <!-- ./Institute Img -->
                                        <div class="card-body rounded-10 bg-white">
                                            <!-- Institute Title -->
                                            <h5 class="card-title institute-box-title"><a target="_blank" :href="public_path+'institute/'+course.institute_id+'/'+course.institute_sulg+'/'+course.course_sulg+'?weeks='+weeks" class="text-dark"> معهد {{course.institute_name}}</a></h5>
                                            <h6 class="card-title course-box-title"><a target="_blank" :href="public_path+'institute/'+course.institute_id+'/'+course.institute_sulg+'/'+course.course_sulg+'?weeks='+weeks" class="text-main-color"> {{course.course_name}}</a></h6>
                                            <!-- ./Institute Title -->
                                            <!-- Institute Rate -->

                                            <p class="mb-0 d-flex"><rate :length="5" :value="Math.round(course.institute_rate)" disabled /> <span style="line-height: 39px;">{{Math.round(course.institute_rate*10)/10}}</span></p>
                                            <!-- ./Institute Rate -->
                                            <!-- Institute Location -->
                                            <p class="mb-0"><i class="fas fa-map-marker-alt text-main-color"></i> {{course.country_name}} , {{course.city_name}}</p>
                                            <!-- ./Institute Location -->
                                            <!-- Course Name -->
                                            <!-- ./Course Name -->
                                            <!-- Course Time And Level -->
                                            <p class="mb-0 overflow-hidden">
                                                <span   v-if="course.courses_study_period " class="float-right"><i class="fas fa-sun text-main-color"></i> {{ (course.courses_study_period == 'مسائي')? 'مسائي' : 'صباحي'}}</span>
                                                <span class="float-left"> <i class="fas fa-signal text-main-color"></i> {{course.courses_required_level}}</span>
                                            </p>
                                            <!-- ./Course Time And Level -->
                                        </div>
                                        <!-- Course Price -->
                                        <div class="card-footer bg-white overflow-hidden">
                                            <del v-if="course.discount != 0" class="text-muted del">{{course.real_price*weeks}}  ر.س </del>
                                            <span class="float-left text-main-color">{{Math.round(course.discounted_price*weeks)}}  ر.س </span>
                                            <p></p>
                                        </div>
                                        <!-- ./Course Price -->
                                        
                                    </div>
                                    <!-- ./Institute -->  

                                </div>
                            </div>
                        </div>  
                    </div>
                </div>
                <!-- ./Institute List -->
                <!-- Pagination -->
                <div class="row px-xl-5">
                    <div class="col-12">
                        <nav aria-label="Page navigation  ">
                            <div class="row" dir="ltr">
                                
                                <div class="col-md-auto col-12 order-md-1 order-2">
                                    <ul class="pagination d-flex justify-content-center p-0">
                                        <li>
                                            <span>
                                                <span  class="page-link rounded-10 mx-1 bg-dark text-white border-0"> page {{courses.current_page}} of {{courses.last_page }} </span>
                                            </span>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-md-auto col-12 text-center order-md-2 order-1">
                                    <ul dir="rtl" class="pagination d-flex justify-content-center p-0">
                                        <li class="page-item">
                                            <button
                                                :style="!courses.prev_page_url ? 'background: #e4e4e4!important;color: #b5b5b5!important;cursor: not-allowed;' : ''"
                                                @click="pagination(prev_page_url);pagination_pages_method(courses.current_page-1)"
                                                :disabled="!courses.prev_page_url"
                                                class="page-link rounded-10 mx-1 text-dark border-0"
                                            >
                                                <i class="fas fa-chevron-right"></i>
                                            </button>
                                        </li>
                                        
                                        <li style="margin:0 5px;" class="page-item" v-for="(page, index) in pagination_pages" :key="index" :class="courses.current_page == page ? 'active' : ''">
                                            <a style="border-radius: 10px;" class="page-link" @click="pagination(courses.path+'?page='+page);pagination_pages_method(page)">{{ page }}</a>
                                        </li>
                                        

                                        <li class="page-item">
                                            <button
                                                :style="!courses.next_page_url ? 'background: #e4e4e4!important;color: #b5b5b5!important;cursor: not-allowed;' : ''"
                                                @click="pagination(next_page_url);pagination_pages_method(courses.current_page +1 )"
                                                :disabled="!courses.next_page_url"
                                                class="page-link rounded-10 mx-1 text-dark border-0"
                                            >
                                                <i class="fas fa-chevron-left"></i>
                                            </button>
                                        </li>
                                    </ul>
                                    
                                </div>
                                
                            </div>
                            <div class="text-center d-lg-none d-block">
                                <button @click="newFilter()" class="btn rounded-10 bg-secondary-color text-white">
                                    البحث من جديد
                                </button>
                            </div>
                        </nav>
                    </div>
                </div>
                <!-- ./Pagination -->
            </div>
        </section>
        <!-- Institutes -->
    </div>
</template>

<script>
    import CityComponent from "../../components/website/CityComponent.vue";
    import CountryComponent from "../../components/website/CountryComponent.vue";
    export default {
        props: ["get_courses_url", "public_path", "get_countries_url", "get_cities_url", "student_id", "student_check", "search", "get_student_favourite_courses_url"],
        data() {
            return {
                courses: {},
                next_page_url: "",
                prev_page_url: "",
                keyword: "",
                country_id: "",
                country_slug: "",
                city_id: "",
                weeks: 1,
                best_offers: false,
                high_rated: false,
                use_params: false,
                course_level: "",
                student_favourite_courses: {},
                arrange_as: "",
                total_linkes: 0,
                pagination_pages: [1,2,3,4,5]
            };
        },
        methods: {
            pagination_pages_method: function(current_page){
                if(current_page <= 4){
                    this.pagination_pages = [1,2,3,4,5]
                }else if(current_page > (this.courses.last_page-2) ){
                    this.pagination_pages = [this.courses.last_page -4 , this.courses.last_page -3 , this.courses.last_page -2 , this.courses.last_page - 1 , this.courses.last_page]
                }else{
                    this.pagination_pages = [current_page -2 , current_page - 1 , current_page , current_page + 1 , current_page + 2]
                }

                if(this.courses.last_page < 5){
                    this.pagination_pages = Array.from({length: this.courses.last_page}, (_, i) => i + 1)
                }

                
            },
            get_courses: function () {
                axios
                    .get(this.get_courses_url, {
                        params: this.params().filter_params,
                    })
                    .then((response) =>{
                        this.courses = response.data.courses
                        this.next_page_url = response.data.courses.next_page_url
                        this.prev_page_url = response.data.courses.prev_page_url
                        if(this.courses.last_page < 5){
                            this.pagination_pages = Array.from({length: this.courses.last_page}, (_, i) => i + 1)
                        }
                       
                    });
                    
            },
            filter_courses: function () {
                this.country_id = this.$refs.countries_component_ref.$refs.country_id_ref.value;
                this.city_id = this.$refs.cities_component_ref.$refs.city_id_ref.value;
                this.get_courses_url = this.courses.first_page_url;
                this.keyword = this.$refs.keyword.value;
                this.get_courses();

                if(screen.width <= 767){
                    $('html, body').animate({ scrollTop: $("#institutes-box").offset().top -950 }, 500);
                    $(".toggel-filter-btn").trigger('click')
                }


            },
            newFilter: function(){
                if($(".toggel-filter-btn").attr("aria-expanded") == "false"){
                    $(".toggel-filter-btn").trigger('click')
                    $('html, body').animate({ scrollTop: $("#institutes-box").offset().top -230 }, 500);
                }else{
                $('html, body').animate({ scrollTop: $("#institutes-box").offset().top - 920 }, 500);

                }
            },
            pagination: function (url) {
                this.get_courses_url = url;

                
                this.get_courses();
                $('html, body').animate({scrollTop: $("#institutes-box").offset().top -950 }, 500);
                if(screen.width <= 767){
                    if($(".toggel-filter-btn").attr("aria-expanded") == "true"){
                        $(".toggel-filter-btn").trigger('click')
                    }
                }
                
                    
            },
            student_login_message:function(){
                if(!this.student_check){
                    alert('يجب عليك تسجيل الدخول اولا')
                }
            },
     
            institute_rate: function (institute_obj) {
                if (institute_obj.rate_switch == 1) {
                    return institute_obj.sat_rate;
                } else {
                    if (institute_obj.rats[0] == null) {
                        return 5;
                    } else {
                        var students_rate = 0;
                        var arr_length = institute_obj.rats.length;
                        var rate_avg = 0;
                        institute_obj.rats.forEach((element) => {
                            students_rate += element.rate;
                        });
                        rate_avg = students_rate / arr_length;
                        return Math.round(rate_avg);
                    }
                }
            },
            course_price_per_week(prices_obj) {
                var price_per_week = 0;
                prices_obj.every((week_price) => {
                    price_per_week = week_price.price;
                    if (this.weeks <= week_price.weeks) {
                        price_per_week = week_price.price;
                        return false;
                    } else {
                        return true;
                    }
                });
                return price_per_week;
            },
            params: function () {
                var filter_params = {
                    keyword: this.keyword,
                    country_id: this.country_id,
                    country_slug: this.country_slug,
                    city_id: this.city_id,
                    weeks: this.weeks,
                    best_offers: this.best_offers,
                    course_level: this.course_level,
                    student_id: this.student_id,
                    arrange_as: this.arrange_as,
                };
                var pagination_params = "&keyword=" + this.keyword;
                return { filter_params: filter_params, pagination_params: pagination_params };
            },
        },
        computed:{

        },
        mounted(){
            
        },
        beforeMount() {
            

                 this.total_linkes = this.courses.last_page - this.courses.current_page;

            if (this.search.length != 0) {
                if (this.search.keyword != undefined) {
                    this.keyword = this.search.keyword;
                }
                if (this.search.country != undefined) {
                    this.country_id = this.search.country;
                }
                if (this.search.country_slug != undefined) {
                    this.country_slug = this.search.country_slug;
                }
                if (this.search.city != undefined) {
                    this.city_id = this.search.city;
                }
                if (this.search.weeks != undefined) {
                    this.weeks = this.search.weeks;
                }
                if(this.search.institute_name){
                    this.keyword = this.search.institute_name;
          
                }
                $( document ).ready(function() {
                    $('html, body').animate({scrollTop: $("#institutes-box").offset().top -1050 }, 500);
                     if(screen.width <= 767){
                        $(".toggel-filter-btn").trigger('click')
                    }
                    
                });
            }

            this.get_courses();
        },
        computed:{
            
        },
        components: {
            CityComponent,
            CountryComponent,
        },
    };
</script>