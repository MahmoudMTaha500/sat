<template>
    <div style="display: inline;">
        <!-- Institutes -->
        <section class="institutes py-5 bg-sub-secondary-color">
            <div class="container-fluid">
                <!-- Section Heading -->
                <div class="row px-xl-5">
                    <div class="col-12">
                        <div class="heading-institutes">
                            <h3 class="text-main-color font-weight-bold">المعاهد ( {{courses.total}} )</h3>
                            <p>تصفح جميع المعاهد الخاصة بدراسة اللغة حول العالم فقط اختر اللغة التي ترغب في دراستها</p>
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
                                <div class="card-header border-bottom bg-white rounded-10 border-0" id="headingOne">
                                    <h5 class="font-weight-bold text-main-color" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">فلتر بواسطة</h5>
                                </div>
                                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                                    <div class="card-body border-top">
                                        <!-- Filter Form -->

                                        <form action="">
                                            <div class="input-group mb-3 border rounded-10 pl-3 pr-2 btn-light">
                                                <input ref="keyword" type="text" class="form-control border-0 bg-transparent pr-1" placeholder="بحث" />
                                                <div class="input-group-append">
                                                    <span class="input-group-text border-0 p-0 bg-transparent" id="basic-addon2"><i class="fas fa-search"></i></span>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <country-component :get_countries_url="get_countries_url" ref="countries_component_ref" :ele_class="'form-control rounded-10'"> </country-component>
                                            </div>
                                            <div class="form-group">
                                                <city-component :get_cities_url="get_cities_url" ref="cities_component_ref" :ele_class="'form-control rounded-10'"> </city-component>
                                            </div>

                                            <div class="form-group">
                                                <select v-model="weeks" class="form-control selectpicker rounded-10" data-live-search="true">
                                                    <option v-for="week in 45" :key="week" :value="week">{{week}}</option>
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <select v-model="course_level" class="form-control selectpicker rounded-10" data-live-search="true">
                                                    <option value="" disabled selected>المستوي</option>
                                                    <option value="مبتدئ">مبتدئ</option>
                                                    <option value="متوسط">متوسط</option>
                                                    <option class="متقدم">متقدم</option>
                                                </select>
                                            </div>
                                            <div class="mb-4">
                                                <div class="form-check form-check-inline mr-0 ml-4">
                                                    <input class="form-check-input mr-0 ml-3 bg-secondary" type="checkbox" v-model="best_offers" />
                                                    <label class="form-check-label">افضل العروض</label>
                                                </div>
                                              
                                            </div>
                                            <button @click="filter_courses()" type="button" class="btn rounded-10 bg-secondary-color text-white mb-2 w-100">فلتر</button>
                                        </form>
                                        <!-- ./Filter Form -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- ./Filter Institute -->
                    </div>
                    <div class="col-xl-9">
                        <div class="institutes-list pt-4">
                            <div class="row">
                                <div v-for="course in courses.data" :key="course.id" class="col-lg-4 col-md-6">
                                    <!-- Institute -->
                                    <div class="card mx-xl-4 mx-2 shadow-sm offer border-0 institute-card rounded-10 mb-5">
                                        <!-- Offer Icon -->
                                        <div v-if="course.discount!=0"  class="offer-icon position-absolute bg-secondary-color text-white">
                                            - {{Math.round(course.discount*100)}} %
                                        </div>
                                        <!-- Offer Icon -->
                                        <!-- Add To Favourite Btn -->
                                        <div v-if="student_check" class="add-favourite position-absolute" :course-id="course.id">
                                            <i :class="heart_type(course) + ' fa-heart favourite-icon'"></i>
                                        </div>
                                        <!-- ./Add To Favourite Btn -->
                                        <!-- Institute Img -->
                                        <a :href="'/institute/'+course.institute.id+'/'+course.institute.slug+'/'+course.slug">
                                            <div class="institute-img d-inline-block position-relative">
                                                <img :src="public_path+course.institute.banner" :alt="course.institute.name_ar" class="card-img-top" />
                                            </div>
                                        </a>
                                        <!-- ./Institute Img -->
                                        <div class="card-body rounded-10 bg-white">
                                            <!-- Institute Title -->
                                            <h5 class="card-title"><a :href="'/institute/'+course.institute.id+'/'+course.institute.slug+'/'+course.slug" class="text-main-color"> معهد {{course.institute.name_ar}}</a></h5>
                                            <!-- ./Institute Title -->
                                            <!-- Institute Rate -->

                                            <p class="mb-0 d-flex"><rate :length="5" :value="institute_rate(course.institute)" disabled /> <span style="line-height: 39px;">{{institute_rate(course.institute)}}</span></p>
                                            <!-- ./Institute Rate -->
                                            <!-- Institute Location -->
                                            <p class="mb-0"><i class="fas fa-map-marker-alt text-main-color"></i> {{course.institute.country.name_ar}} , {{course.institute.city.name_ar}}</p>
                                            <!-- ./Institute Location -->
                                            <!-- Course Name -->
                                            <p class="mb-0"><i class="fas fa-graduation-cap text-main-color"></i> {{course.name_ar}}</p>
                                            <!-- ./Course Name -->
                                            <!-- Course Time And Level -->
                                            <p class="mb-0 overflow-hidden">
                                                <span class="float-right"><i class="fas fa-sun text-main-color"></i> {{course.study_period=='morning' ? 'صباحي' : 'مسائي'}}</span>
                                                <span class="float-left"> <i class="fas fa-signal text-main-color"></i> {{course.required_level}}</span>
                                            </p>
                                            <!-- ./Course Time And Level -->
                                        </div>
                                        <!-- Course Price -->
                                        <div class="card-footer bg-white overflow-hidden">
                                            <del class="text-muted del">{{course_price_per_week(course.courses_price)}} ريال / أسبوع </del>
                                            <span class="float-left text-main-color">{{Math.round(course_price_per_week(course.courses_price)*(1-course.discount)) }} ريال / أسبوع </span>
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
                            <ul class="pagination d-flex justify-content-end">
                                <li class="page-item">
                                    <button :style="!courses.prev_page_url ? 'background: #e4e4e4!important;color: #b5b5b5!important;cursor: not-allowed;' : ''"  @click="pagination(prev_page_url)" :disabled="!courses.prev_page_url" class="page-link rounded-10 mx-1 text-dark border-0" >
                                        <i class="fas fa-chevron-right"></i>
                                    </button>
                                </li>
                                <li class="page-item">
                                   
                                    <span>
                                        <span style="background:#F4C20D;" class="page-link rounded-10 mx-1 text-white border-0"> page {{courses.current_page}} of {{courses.last_page }} </span>
                                    </span>
                                </li>
                                
                                <li class="page-item">
                                    <button :style="!courses.next_page_url ? 'background: #e4e4e4!important;color: #b5b5b5!important;cursor: not-allowed;' : ''" @click="pagination(next_page_url)" :disabled="!courses.next_page_url" class="page-link rounded-10 mx-1 text-dark border-0" >
                                        <i class="fas fa-chevron-left"></i>
                                    </button>
                                </li>
                            </ul>
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
        props: ["get_courses_url", "public_path", "get_countries_url", "get_cities_url", "student_id", "student_check", "search"],
        data() {
            return {
                courses: {},
                next_page_url: "",
                prev_page_url: "",
                keyword: "",
                country_id: "",
                city_id: "",
                weeks: 1,
                best_offers: false,
                high_rated: false,
                use_params: false,
                course_level: '',
            };
        },
        methods: {
            get_courses: function () {
                axios
                    .get(this.get_courses_url, {
                        params: this.params().filter_params,
                    })
                    .then((response) => ((this.courses = response.data.courses), (this.next_page_url = response.data.courses.next_page_url), (this.prev_page_url = response.data.courses.prev_page_url)));
            },
            filter_courses: function () {
                this.country_id = this.$refs.countries_component_ref.$refs.country_id_ref.value;
                this.city_id = this.$refs.cities_component_ref.$refs.city_id_ref.value;
                this.get_courses_url = this.courses.first_page_url;
                this.keyword = this.$refs.keyword.value;
                this.get_courses();
            },
            pagination: function (url) {
                this.get_courses_url = url;
                this.get_courses();
            },
            heart_type: function (course_obj) {
                var heart_type = "far";
                course_obj.student_favourite.forEach((favourite) => {
                    if (favourite.student_id == this.student_id) {
                        console.log(favourite.student_id);
                        heart_type = "fas";
                        return false;
                    }
                });

                return heart_type;
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
            course_price_per_week(prices_obj){
                var price_per_week = 0;
                prices_obj.every(week_price => {
                    price_per_week = week_price.price;
                    if(this.weeks <= week_price.weeks){
                        price_per_week = week_price.price;
                        return false;
                    }else{
                            return true
                    }
                });
                return price_per_week
            },
            params: function () {
                var filter_params = {
                    keyword: this.keyword,
                    country_id: this.country_id,
                    city_id: this.city_id,
                    weeks: this.weeks,
                    best_offers: this.best_offers,
                    course_level: this.course_level,
                };
                var pagination_params = "&keyword=" + this.keyword;
                return { filter_params: filter_params, pagination_params: pagination_params };
            },
        },
        beforeMount() {
            
            if(this.search.length != 0){
                this.keyword = this.search.keyword
                if(this.search.country != undefined){this.country_id = this.search.country}
                if(this.search.city != undefined){this.city_id = this.search.city}
                if(this.search.weeks != undefined){this.weeks = this.search.weeks}
            }
            
            this.get_courses();
        },
        components: {
            CityComponent,
            CountryComponent,
        },
    };
</script>
