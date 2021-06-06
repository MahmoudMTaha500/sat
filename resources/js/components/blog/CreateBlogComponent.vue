<template>
    <div>
        <div class="form-group">
            <label for="projectinput2">الدولة</label>
            <select v-model="country_id" v-on:change="getcities(); get_institutes();" id="country" class="form-control text-left" name="country_id">
                <option value="">حدد الدولة</option>
                <option v-for="country in countries" :key="country.id" :value="country.id"> {{country.name_ar}} </option>
            </select>
        </div>
        <div class="form-group">
            <label for="projectinput2">المدينة</label>
            <select v-model="city_id" v-on:change="get_institutes();" class="form-control text-left" name="city_id">
                <option value="">حدد المدينة</option>
                <option v-for="city in cities" :key="city.id" :value="city.id"> {{city.name_ar}} </option>
            </select>
        </div>
        <div class="form-group">
            <label for="projectinput2">المعهد</label>
            <select v-model="institute_id" v-on:change="get_courses();" class="form-control text-left" name="institute_id">
                <option value="">حدد المعهد</option>
                <option v-for="institute in institutes" :key="institute.id" :value="institute.id"> {{institute.name_ar + ' | ' + institute.city.name_ar}} </option>
            </select>
        </div>
        <div class="form-group">
            <label for="projectinput2">الدورات</label>
            <select v-model="course_id" class="form-control text-left" name="course_id">
                <option value="">اختر الدورة</option>
                <option v-for="course in courses" :key="course.id" :value="course.id"> {{course.name_ar}}</option>
            </select>
        </div>
    </div>
</template>

<script>
    export default {
        props: ["countries_from_blade", "getcities_url", "get_institutes_url", "get_courses_url"],
        data() {
            return {
                country_id: "",
                city_id: "",
                course_id: "",
                countries: this.countries_from_blade,
                cities: {},
                institute_id: "",
                institutes: {},
                courses: {},
            };
        },
        methods: {
            getcities: function () {
                var country_id = this.country_id;
                axios
                    .get(this.getcities_url, {
                        params: {
                            countryID: country_id,
                        },
                    })
                    .then((response) => (this.cities = response.data.cities));
            },
            get_institutes() {
                axios
                    .get(this.get_institutes_url, {
                        params: {
                            country_id: this.country_id,
                            city_id: this.city_id,
                        },
                    })
                    .then((response) => (this.institutes = response.data));
            },
            get_courses() {
                axios
                    .get(this.get_courses_url, {
                        params: {
                            institute_id: this.institute_id,
                        },
                    })
                    .then((response) => (this.courses = response.data));
            },
        },
        beforeMount() {
            this.returnCountryCity();
            this.get_institutes();
        },
    };
</script>
