<template>
    <div>
        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">البحث في المدن</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="projectinput1">المعهد</label>
                            <select v-model="selected_institute" id="" class="form-control" name="institute_id" required>
                                <option value="">حدد المعهد</option>
                                <option v-for="institute in institutes" :key="institute.id" :value="institute.id"> {{institute.name_ar}} </option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="projectinput1">الدولة</label>
                            <select v-model="selected" v-on:change="getcities()" id="country" class="form-control" name="country_id" required>
                                <option value="">حدد الدولة</option>
                                <option v-for="country in countries" :key="country.id" :value="country.id"> {{country.name_ar}} </option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="projectinput1">المدينة</label>

                            <select v-model="selected_city" id="city" class="form-control" name="city_id" required>
                                <option value="">حدد المدينة</option>
                                <option v-for="city in cities" :key="city.id" :value="city.id"> {{city.name_ar}}</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="projectinput1">البحث بكلمات مفتاحية</label>
                            <input v-model="name_ar" type="text" id="projectinput1" class="form-control" placeholder="ادخل كلمة مفتاحية" name="name_ar" />
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary w-100" @click="filterCoureses()" data-dismiss="modal" aria-label="Close">بحث</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div id="recent-transactions" class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">الدورات ({{this.courses.total}})</h4>
                        <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                        <div class="heading-elements">
                            <ul class="list-inline mb-0">
                                <li>
                                    <button data-toggle="modal" data-target="#exampleModalCenter" class="btn btn-sm btn-info box-shadow-2 round btn-min-width pull-right"><i class="ft-filter ft-md"></i> فلتر</button>
                                </li>
                                <li>
                                    <a class="btn btn-sm btn-success box-shadow-2 round btn-min-width pull-right" :href="this.dahsboard_url+'/courses/create'"> <i class="ft-plus ft-md"></i> اضافة دورة جديدة</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-content">
                        <div class="table-responsive">
                            <table id="recent-orders" class="table table-hover table-xl mb-0">
                                <thead>
                                    <tr>
                                        <th class="border-top-0">اسم الدورة</th>
                                        <th class="border-top-0">اسم المعهد</th>
                                        <th class="border-top-0">المدينة</th>
                                        <th class="border-top-0">عدد الطلابات</th>
                                        <th class="border-top-0">الحالة</th>
                                        <th class="border-top-0">اكشن</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="course in courses.data" :key="course.id">
                                        <td class="text-truncate">{{course.name_ar}}</td>
                                        <td class="text-truncate">{{course.institute.name_ar}}</td>
                                        <td class="text-truncate">{{course.institute.city.name_ar}}</td>
                                        
                                        <td class="text-truncate">5 طلابات</td>
                                        <td class="text-truncate">
                                            <input type="checkbox" id="checkbox" v-model="course.approvment" @change="updateApprovment" @click="getCourse_id(course.id)" />
                                            <label for="checkbox">{{ (course.approvment == 1) ? "مقبول":"غير مقبول" }}</label>
                                        </td>
                                        <td>
                                            <div class="btn-group" role="group" aria-label="Basic example">
                                                <a :href="dahsboard_url+'/courses/'+course.id+'/edit'" class="btn btn-info btn-sm round"> تعديل</a>
                                                <a href="#" class="btn btn-default btn-sm round">عرض</a>

                                                <form :action="dahsboard_url+'/courses/'+course.id" method="POST">
                                                    <input type="hidden" name="_token" :value="csrftoken" />
                                                    <input type="hidden" name="_method" value="delete" />
                                                    <button class="btn btn-danger btn-sm round" onclick="return confirm('هل انت متاكد من حذف هذه الدورة')">حذف</button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>

                            <div class="pagination">
                                <button class="btn btn-default" @click="coursesPagination(courses.prev_page_url)" :disabled="!courses.prev_page_url">
                                    Previos
                                </button>
                                <span> page {{courses.current_page}} of {{courses.last_page }} </span>
                                <button class="btn btn-default" @click="coursesPagination(courses.next_page_url)" :disabled="!courses.next_page_url">
                                    Next
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ["course_url", "dahsboard_url", "course_url", "countries_from_blade", "institutes", "csrftoken"],
        data() {
            return {
                courses: {},
                url_course: this.course_url,
                selected: "",
                selected_city: "",
                countries: this.countries_from_blade,
                cities: {},
                selected_institute: "",
                name_ar: "",
                course_id: "",
            };
        },
        methods: {
            getcourses: function () {
                axios.get(this.url_course).then((response) => (this.courses = response.data.courses));
            },
            coursesPagination: function (url) {
                this.url_course = url
                this.getcourses();
            },
            getcities: function () {
                var country_id = this.selected;
                axios
                    .get(this.dahsboard_url + "/getcities", {
                        params: {
                            countryID: country_id,
                        },
                    })
                    .then((response) => (this.cities = response.data.cities));
                    if(this.country_id == null){
                        this.selected_city = ''
                    }
            },
            filterCoureses: function () {
                axios
                    .get(this.dahsboard_url + "/filtercourses", { params: { institute_id: this.selected_institute, country_id: this.selected, city_id: this.selected_city, name_ar: this.name_ar } })
                    .then((response) => (
                        this.courses = response.data.courses,
                        this.courses.prev_page_url += '&institute_id='+this.selected_institute+'&country_id='+this.selected+'&city_id='+this.selected_city+'&name_ar='+this.name_ar,
                        this.courses.next_page_url += '&institute_id='+this.selected_institute+'&country_id='+this.selected+'&city_id='+this.selected_city+'&name_ar='+this.name_ar
                    ));
            },
            updateApprovment: function (e) {
                const newValue = e.target.checked;
                axios.post(this.dahsboard_url + "/update-course-aprovement", { course_id: this.course_id, approvment: newValue }, { headers: { "X-CSRFToken": "{{ csrf_token()}}" } }).then((response) => {});
            },
            getCourse_id: function (id) {
                return (this.course_id = id);
            },
        },
        beforeMount() {
            this.getcourses();
        },
    };
</script>
