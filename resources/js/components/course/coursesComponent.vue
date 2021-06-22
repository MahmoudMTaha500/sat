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
                            <select v-model="institute_id" id="" class="form-control" name="institute_id" required>
                                <option value="">حدد المعهد</option>
                                <option v-for="institute in institutes" :key="institute.id" :value="institute.id"> {{institute.name_ar +' | '+ institute.city.name_ar}} </option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="projectinput1">الدولة</label>
                            <select v-model="country_id" v-on:change="getcities()" id="country" class="form-control" name="country_id" required>
                                <option value="">حدد الدولة</option>
                                <option v-for="country in countries" :key="country.id" :value="country.id"> {{country.name_ar}} </option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="projectinput1">المدينة</label>

                            <select v-model="city_id" id="city" class="form-control" name="city_id" required>
                                <option value="">حدد المدينة</option>
                                <option v-for="city in cities" :key="city.id" :value="city.id"> {{city.name_ar}}</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="projectinput1">الحالة</label>

                            <select v-model="status" id="city" class="form-control" name="city_id" required>
                                <option value="">حدد الحالة</option>
                                <option value=""> الكل</option>
                                <option value="1"> مقبول</option>
                                <option value="0"> غير مقبول</option>
                                <option v-for="city in cities" :key="city.id" :value="city.id"> {{city.name_ar}}</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-6">
                                    <label for="projectinput1">تخفيضات</label> <br />
                                    <input type="checkbox" data-size="sm" checked class="switchery" v-model="discount_offers" />
                                </div>
                                <div class="col-6">
                                    <label for="projectinput1">بدون تخفيضات</label> <br />
                                    <input type="checkbox" data-size="sm" checked class="switchery" v-model="non_discount_offers" />
                                </div>
                            </div>
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
                                <li v-if="create">
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
                                        <th class="border-top-0">العروض</th>
                                        <th class="border-top-0">الحالة</th>
                                        <th class="border-top-0">اكشن</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="course in courses.data" :key="course.id">
                                        <td class="text-truncate">{{course.name_ar}}</td>
                                        <td class="text-truncate">{{course.institute.name_ar}}</td>
                                        <td class="text-truncate">{{course.institute.city.name_ar}}</td>

                                        <td class="text-truncate">  <a :href="dahsboard_url+'/student-requests?course_id='+course.id" target="_blank">{{ course.student_request.length  }} طلابات </a> </td>
                                        <td class="text-truncate">{{ (course.discount != null) ? course.discount : "-" }}</td>
                                        <td class="text-truncate">
                                            <input type="checkbox" v-model="course.approvement" @change="updateApprovment" @click="getCourse_id(course.id)" />
                                            <label>{{ (course.approvement == 1) ? "مقبول":"غير مقبول" }}</label>
                                        </td>
                                        <td>
                                            <div class="btn-group" role="group" aria-label="Basic example">
                                                <a v-if="edit" :href="dahsboard_url+'/courses/'+course.id+'/edit'" class="btn btn-info btn-sm round"> تعديل</a>
                                                <a href="#" class="btn btn-default btn-sm round">عرض</a>

                                                <form :action="dahsboard_url+'/courses/'+course.id" method="POST" class="btn-group">
                                                    <input type="hidden" name="_token" :value="csrftoken" />
                                                    <input type="hidden" name="_method" value="delete" />
                                                    <button v-if="delete_pre" class="btn btn-danger btn-sm round" onclick="return confirm('هل انت متاكد من حذف هذه الدورة')">حذف</button>
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
        props: ["course_url", "dahsboard_url", "course_url", "countries_from_blade", "institutes", "csrftoken", "delete_pre", "create", "edit"],
        data() {
            return {
                courses: {},
                url_course: this.course_url,
                country_id: "",
                city_id: "",
                countries: this.countries_from_blade,
                cities: {},
                institute_id: "",
                name_ar: "",
                course_id: "",
                discount_offers: true,
                non_discount_offers: true,
                status:""
            };
        },
        methods: {
            getcourses: function () {
                axios.get(this.url_course).then((response) => (this.courses = response.data.courses));
            },
            coursesPagination: function (url) {
                this.url_course = url;
                this.getcourses();
            },
            getcities: function () {
                var country_id = this.country_id;
                axios
                    .get(this.dahsboard_url + "/getcities", {
                        params: {
                            countryID: country_id,
                        },
                    })
                    .then((response) => (this.cities = response.data.cities));
                if (this.country_id == "") {
                    this.city_id = "";
                }
            },
            filterCoureses: function () {
                var filter_params = {
                    institute_id: this.institute_id,
                    country_id: this.country_id,
                    city_id: this.city_id,
                    name_ar: this.name_ar,
                    discount_offers: this.discount_offers,
                    non_discount_offers: this.non_discount_offers,
                    status:this.status
                };
                var pagination_params = "&institute_id=" + this.institute_id + "&country_id=" + this.country_id + "&city_id=" + this.city_id + "&name_ar=" + this.name_ar;
                "&discount_offers=" + this.discount_offers;
                "&non_discount_offers=" + this.non_discount_offers;
                "&status=" + this.status;
                axios
                    .get(this.dahsboard_url + "/filtercourses", {
                        params: filter_params,
                    })
                    .then((response) => ((this.courses = response.data.courses), (this.courses.prev_page_url += pagination_params), (this.courses.next_page_url += pagination_params)));
            },
            updateApprovment: function (e) {
                const newValue = e.target.checked;
                axios.post(this.dahsboard_url + "/update-course-aprovement", { course_id: this.course_id, approvement: newValue }, { headers: { "X-CSRFToken": "{{ csrf_token()}}" } }).then((response) => {});
            },
            getCourse_id: function (id) {
                return (this.course_id = id);
            },
        },
        beforeMount() {
          
        const queryString = window.location.search;
        const urlParams = new URLSearchParams(queryString);
        const institute_id_url = urlParams.get('institute_id');
        if(institute_id_url){

            this.institute_id = institute_id_url;

             this.filterCoureses();
            //  alert(institute_id_url);
        } else{
              this.getcourses();
        }
        },
    };
</script>
