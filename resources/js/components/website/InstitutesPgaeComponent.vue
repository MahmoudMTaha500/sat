<template>
    <div style="display: inline;">
        <h1>المعاهد</h1>

        <div>
            <div>
                <input ref="keyword" type="text" />
                <country-component :get_countries_url = "get_countries_url" ref="countries_component_ref"> </country-component>
                <city-component :get_cities_url = "get_cities_url" ref="cities_component_ref"> </city-component>
                <button type="button" @click="filter_courses()">بحث</button>
            </div>
        </div>

        <a v-for="course in courses.data" :key="course.id" :href="course.slug">
            <div style="width: 33%; display: inline-block; margin-left: 0.2%;">
                <img width="100%" :src="public_path+course.institute.banner" :alt="course.institute.name_ar" />
                <h3>معهد {{course.institute.name_ar}}</h3>
                <p>{{institute_rate(course.institute)}}</p>
                <p>{{course.institute.country.name_ar}} , {{course.institute.city.name_ar}}</p>
                <p>{{course.name_ar}}</p>
                <p>{{course.study_period=='morning' ? 'صباحي' : 'مسائي'}}</p>
                <p>{{course.required_level}}</p>
                <p>{{course.courses_price_per_week.price*(1-course.discount) }}</p>
                <del>{{course.courses_price_per_week.price}}</del>
                <p>{{course.discount*100}} %</p>
            </div>
        </a>
        <div class="pagination">
            <button class="btn btn-default" @click="pagination(prev_page_url)" :disabled="!courses.prev_page_url">
                Previos
            </button>
            <span> page {{courses.current_page}} of {{courses.last_page }} </span>
            <button class="btn btn-default" @click="pagination(next_page_url)" :disabled="!courses.next_page_url">
                Next
            </button>
        </div>
    </div>
</template>

<script>
import CityComponent from "../../components/website/CityComponent.vue";
import CountryComponent from "../../components/website/CountryComponent.vue";
    export default {
        props: ["get_courses_url", "public_path" , "get_countries_url" , "get_cities_url"],
        data() {
            return {
                courses: {},
                country_id: "",
                next_page_url: "",
                prev_page_url: "",
                keyword: "",
                country_id: "",
                city_id: "",
                use_params: false,
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
                this.country_id = this.$refs.countries_component_ref.$refs.country_id_ref.value
                this.city_id = this.$refs.cities_component_ref.$refs.city_id_ref.value
                this.get_courses_url = this.courses.first_page_url;
                this.keyword = this.$refs.keyword.value;
                console.log(this.keyword);
                this.get_courses();
            },
            pagination: function (url) {
                this.get_courses_url = url;
                this.get_courses();
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
            params: function () {
                var filter_params = {
                    keyword: this.keyword,
                    country_id: this.country_id,
                    city_id: this.city_id,
                };
                var pagination_params = "&keyword=" + this.keyword;
                return { filter_params: filter_params, pagination_params: pagination_params };
            },
        },
        beforeMount() {
            this.get_courses();
        },
        components: {
            CityComponent,
            CountryComponent,
        }
    };
</script>
