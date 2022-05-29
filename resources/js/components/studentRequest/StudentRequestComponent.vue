<template>
    <div>
        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">البحث في الطلبات</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="projectinput1">الدولة</label>
                            <select v-model="filterCountryId" v-on:change="getcities(); get_institutes(); " id="country" class="form-control" name="country_id" required>
                                <option value="">حدد الدولة</option>
                                <option v-for="country in countries" :key="country.id" :value="country.id"> {{country.name_ar}} </option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="projectinput1">المدينة</label>

                            <select v-model="filterCityId" id="city" v-on:change="get_institutes();" class="form-control" name="city_id" required>
                                <option value="">حدد المدينة</option>
                                <option v-for="city in cities" :key="city.id" :value="city.id"> {{city.name_ar}}</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="projectinput1">المعهد</label>
                            <select v-model="filterInstituteId" id="" class="form-control" v-on:change="get_filter_courses();" name="institute_id" required>
                                <option value="">حدد المعهد</option>
                                <option v-for="institute in institutes" :key="institute.id" :value="institute.id"> {{institute.name_ar +' | '+ institute.city.name_ar}} </option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="projectinput2">الدورات</label>
                            <select v-model="filterCourseId" class="form-control t" name="course_id">
                                <option value="">اختر الدورة</option>
                                <option v-for="course in courses" :key="course.id" :value="course.id"> {{course.name_ar}}</option>
                            </select>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="projectinput1">من</label>
                                    <input v-model="filterFromDate" type="date" id="projectinput1" class="form-control" placeholder="ادخل كلمة مفتاحية" name="from_date" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="projectinput1">الي</label>
                                    <input v-model="filterToDate" type="date" id="projectinput1" class="form-control" placeholder="ادخل كلمة مفتاحية" name="to_date" />
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="projectinput1">حالة الدراسة</label>
                                    <select v-model="filterStudyingStatus" style="height:auto" class="form-control text-left" width="180px">
                                        <option value=""> الكل</option>
                                        <option value="جديد"> جديد</option>
                                        <option value="تم التواصل وبانتظار المستندات">تم التواصل وبانتظار المستندات</option>
                                        <option value="حصل علي قبول"> حصل علي قبول </option>
                                        <option value="بداء الدراسة"> بداء الدراسة</option>
                                        <option value="مرفوض"> مرفوض</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="projectinput1">حالة الدفع</label>
                                    <select v-model="filterPaymentStatus" style="height:auto" class="form-control text-left" width="180px">
                                        <option value=""> الكل</option>
                                        <option value="0"> لم يتم الدفع</option>
                                        <option value="2"> مدفوع جزئيا  </option>
                                        <option value="1"> تم الدفع بالكامل</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary w-100" @click="filterRequests()" data-dismiss="modal" aria-label="Close">بحث</button>
                    </div>
                </div>
            </div>
        </div>


        <div class="row">
            <div id="recent-transactions" class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">الطلبات ({{this.studentsRequests.total}})</h4>
                        <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                        <div class="heading-elements">
                            <ul class="list-inline mb-0">
                                <li>
                                    <button data-toggle="modal" data-target="#exampleModalCenter" class="btn btn-sm btn-info box-shadow-2 round btn-min-width pull-right"><i class="ft-filter ft-md"></i> فلتر</button>
                                </li>
                                <li>
                                    <!-- <a class="btn btn-sm btn-success box-shadow-2 round btn-min-width pull-right" :href="this.dahsboard_url+'/courses/create'"> <i class="ft-plus ft-md"></i> اضافة دورة جديدة</a> -->
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-content">
                        <div class="table-responsive">
                            <table id="recent-orders" class="table table-hover table-xl mb-0">
                                <thead>
                                    <tr>
                                        <th class="border-top-0">اسم الطالب</th>
                                        <th class="border-top-0">الهاتف</th>
                                        <th class="border-top-0">البر يد الالكتروني</th>
                                        <th class="border-top-0">المعهد</th>
                                        <th class="border-top-0">الدولة</th>
                                        <th class="border-top-0">الميدنة</th>
                                        <th class="border-top-0">حالة الدراسة</th>
                                        <th class="border-top-0">حالة الدفع</th>
                                        <th class="border-top-0">التاريخ</th>
                                        <th class="border-top-0">تحكم</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="request in studentsRequests.data" :key="request.id">
                                        <td class="text-truncate border-top-0 p-1">{{request.student.name}}</td>
                                        <td class="text-truncate border-top-0 p-1">{{request.student.phone}}</td>
                                        <td class="text-truncate border-top-0 p-1">{{request.student.email}}</td>
                                        <td class="text-truncate border-top-0 p-1">{{request.course.institute.name_ar}}</td>
                                        <td class="text-truncate border-top-0 p-1">{{request.course.institute.country.name_ar}}</td>
                                        <td class="text-truncate border-top-0 p-1">{{request.course.institute.city.name_ar}}</td>


                                        <td class="text-truncate border-top-0 p-1">
                                            
                                            <div style="width:180px" class="d-flex align-items-baseline">
                                                <p class="d-inline" v-if="request.status == 'جديد' ">
                                                    <i class="la la-dot-circle-o text-warning"></i>
                                                </p>
                                                <p class="d-inline" v-if="request.status == 'تم التواصل وبانتظار المستندات' ">
                                                    <i class="la la-dot-circle-o text-dark"></i>
                                                </p>
                                                <p class="d-inline" v-else-if="request.status == 'حصل علي قبول' ">
                                                    <i class="la la-dot-circle-o text-primary"></i>
                                                </p>
                                                <p class="d-inline" v-else-if="request.status == 'بداء الدراسة' ">
                                                    <i class="la la-dot-circle-o text-success"></i>
                                                </p>
                                                <p class="d-inline" v-else-if="request.status == 'مرفوض' ">
                                                    <i class="la la-dot-circle-o text-danger"></i>
                                                </p>

                                                <select @change="updateStatus($event,'studying-status',request)" style="height:auto" class="form-control text-left" width="180px">
                                                    <option :selected="request.status == 'جديد' ? true : false " value="جديد"> جديد</option>
                                                    <option :selected="request.status == 'تم التواصل وبانتظار المستندات' ? true : false " value="تم التواصل وبانتظار المستندات">تم التواصل وبانتظار المستندات</option>
                                                    <option :selected="request.status == 'حصل علي قبول' ? true : false " value="حصل علي قبول"> حصل علي قبول </option>
                                                    <option :selected="request.status == 'بداء الدراسة' ? true : false " value="بداء الدراسة"> بداء الدراسة</option>
                                                    <option :selected="request.status == 'مرفوض' ? true : false " value="مرفوض"> مرفوض</option>
                                                </select>
                                            </div>
                                        </td>
                                        <td class="text-truncate border-top-0 p-1">
                                            <div style="width:150px" class="d-flex align-items-baseline">
                                                <p v-if="request.payment_status == '0' ">
                                                    <i class="la la-dot-circle-o text-danger"></i>
                                                </p>
                                                <p v-else-if="request.payment_status == '1' ">
                                                    <i class="la la-dot-circle-o text-success"></i>
                                                </p>
                                                <p v-else-if="request.payment_status == '2' ">
                                                    <i class="la la-dot-circle-o text-warning"></i>
                                                </p>
                                                <select @change="updateStatus($event,'payment-status',request)" style="height:auto" class="form-control text-left" width="180px">
                                                    <option :selected="request.payment_status == '0' ? true : false " value="0"> لم يتم الدفع</option>
                                                    <option :selected="request.payment_status == '2' ? true : false " value="2"> مدفوع جزئيا  </option>
                                                    <option :selected="request.payment_status == '1' ? true : false " value="1"> تم الدفع بالكامل</option>
                                                </select>
                                            </div>
                                        </td>
                                        <td class="text-truncate border-top-0 p-1">{{new Intl.DateTimeFormat('en-GB').format(new Date(request.created_at))}}</td>

                                        <td class="text-truncate border-top-0 p-1">
                                            <div class="btn-group" role="group" aria-label="Basic example">
                                                <a v-if="edit" :href="dahsboard_url+'/student-requests/'+request.id+'/edit'" class="btn btn-info btn-sm round"> تعديل</a>

                                                <form :action="dahsboard_url+'/student-requests/'+request.id" method="POST" class="btn-group">
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
                                <button class="btn btn-default" @click="studentsRequestsPagination(studentsRequests.prev_page_url)" :disabled="!studentsRequests.prev_page_url">
                                    Previos
                                </button>
                                <span> page {{studentsRequests.current_page}} of {{studentsRequests.last_page }} </span>
                                <button class="btn btn-default" @click="studentsRequestsPagination(studentsRequests.next_page_url)" :disabled="!studentsRequests.next_page_url">
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
    import ClassicEditor from "@ckeditor/ckeditor5-build-classic";
    export default {
        props: ["student_request_url", "dahsboard_url", "course_url", "countries_from_blade", "institutes", "csrftoken", "create", "edit", "delete_pre", "update_classat_note_route", "get_courses_url", "get_institutes_url"],
        data() {
            return {
                studentsRequests: {},
                url: this.student_request_url,
                url_course: this.course_url,
                filterCountryId: "",
                filterCityId: "",
                countries: this.countries_from_blade,
                cities: {},
                courses: {},
                filterInstituteId: "",
                filterCourseId: "",
                filterFromDate: "",
                filterToDate: "",
                filterStudyingStatus: "",
                filterPaymentStatus: "",

                name_ar: "",
                news: "",
                got_accepted: "",
                study_started: "",
                rejected: "",

                request_id: 0,
                discount_offers: true,
                non_discount_offers: true,
                serviceObj: {},
                course_Obj: {},
                airport_Obj: {},
                insurance_Obj: {},
                residence_Obj: {},
                institute_name: "",
                institute_message: "",
                editor: ClassicEditor,
                editorData: "<p>Content of the editor.</p>",
                editorConfig: {
                    // The configuration of the editor.
                },
                notes: "",
                classat_notes: "",
            };
        },
        methods: {
            update_classat_note: function (obj) {
                axios.post(this.update_classat_note_route, { request_id: this.request_id, classat_notes: this.classat_notes }, { headers: { "X-CSRFToken": "{{ csrf_token()}}" } }).then((response) => {
                    alert("تم حفظ الملاحظة بنجاح");
                });
            },
            getstudentsRequests: function () {
                axios.get(this.url).then((response) => (this.studentsRequests = response.data.studentsRequests));
            },
            studentsRequestsPagination: function (url1) {
                this.url = url1;
                this.getstudentsRequests();
            },
            get_institutes() {
                axios
                    .get(this.get_institutes_url, {
                        params: {
                            country_id: this.filterCountryId,
                            city_id: this.filterCityId,
                        },
                    })
                    .then((response) => (this.institutes = response.data));
            },
            getcities: function () {
                var country_id = this.filterCountryId;
                axios
                    .get(this.dahsboard_url + "/getcities", {
                        params: {
                            countryID: country_id,
                        },
                    })
                    .then((response) => (this.cities = response.data.cities));
                if (this.filterCountryId == "") {
                    this.filterCityId = "";
                }
            },

            filterRequests: function () {
                // alert(this.news);
                var filter_params = {
                    institute_id: this.filterInstituteId,
                    course_id: this.filterCourseId,
                    country_id: this.filterCountryId,
                    city_id: this.filterCityId,
                    from_date: this.filterFromDate,
                    to_date: this.filterToDate,
                    studying_status: this.filterStudyingStatus,
                    payment_status: this.filterPaymentStatus,
                };
                var pagination_params = "&institute_id=" + this.filterInstituteId + "&country_id=" + this.filterCountryId + "&city_id=" + this.filterCityId;
                axios
                    .get(this.dahsboard_url + "/student-requests/filterstudentsRequests", {
                        params: filter_params,
                    })
                    .then((response) => {
                        console.log(response)
                        this.studentsRequests = response.data.studentsRequests
                        this.studentsRequests.prev_page_url += pagination_params
                        this.studentsRequests.next_page_url += pagination_params
                    });
            },
            updateStatus: function (event, statusType, request) {
                axios.put(this.dahsboard_url + "/student-requests/"+request.id, 
                        {api_request:true, status_type: statusType,request_id: request.id, status: event.target.value }, 
                        { headers: { "X-CSRFToken": "{{ csrf_token()}}" } })
                    .then((response) => {
                        if(response.data.status == 'success'){
                            if( statusType =='studying-status'){request.status = event.target.value}
                            if( statusType =='payment-status'){request.payment_status = event.target.value}
                            
                        }
                    });
            },
            getrequest_id: function (id) {
                return (this.request_id = id);
            },

            getcourses: function () {
                axios.get(this.url_course).then((response) => (this.courses = response.data.courses.data));
            },
            get_filter_courses() {
                axios
                    .get(this.get_courses_url, {
                        params: {
                            institute_id: this.filterInstituteId,
                        },
                    })
                    .then((response) => (this.courses = response.data));
            },
        },
        beforeMount() {
            const queryString = window.location.search;
            const urlParams = new URLSearchParams(queryString);
            const course_id_url = urlParams.get("course_id");

            if (course_id_url) {
                this.course_id = course_id_url;
                this.filterRequests();
            } else {
                this.getstudentsRequests();
                this.get_filter_courses();
            }
        },
    };
</script>
