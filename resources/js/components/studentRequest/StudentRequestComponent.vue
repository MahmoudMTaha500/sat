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
                        <label for="projectinput1">الدولة</label>
                            <select v-model="country_id" v-on:change="getcities(); get_institutes(); " id="country" class="form-control" name="country_id" required>
                            <option value="">حدد الدولة</option>
                            <option v-for="country in countries" :key="country.id" :value="country.id"> {{country.name_ar}} </option>
                            </select>
                        </div>
                        <div class="form-group">
                        <label for="projectinput1">المدينة</label>

                            <select v-model="city_id" id="city"  v-on:change="get_institutes();"  class="form-control" name="city_id" required>
                            <option value="">حدد المدينة</option>
                            <option v-for="city in cities" :key="city.id" :value="city.id"> {{city.name_ar}}</option>
                            </select>
                        </div>


                        <div class="form-group">
                        <label for="projectinput1">المعهد</label>
                            <select v-model="institute_id" id="" class="form-control"  v-on:change="get_filter_courses();" name="institute_id" required>
                            <option value="">حدد المعهد</option>
                            <option v-for="institute in institutes" :key="institute.id" :value="institute.id">  {{institute.name_ar +' | '+ institute.city.name_ar}} </option>
                            </select>
                        </div>
                        <div class="form-group">
                        <label for="projectinput2">الدورات</label>
                            <select v-model="course_id" class="form-control t" name="course_id">
                            <option value="">اختر الدورة</option>
                            <option v-for="course in courses" :key="course.id" :value="course.id"> {{course.name_ar}}</option>
                            </select>
                        </div>

             <div class="form-group">
                            <label for="projectinput1">البحث بكلمات مفتاحية</label>
                            <input v-model="name_ar" type="text" id="projectinput1" class="form-control" placeholder="ادخل كلمة مفتاحية" name="name_ar" />
                        </div>
                        <div class="form-group" style="direction:rtl" >
                            <label for="projectinput1"> جديد</label>
                                <input v-model="news" type="checkbox" id="projectinput1" class="form-control"   value="جديد"/>
                            <label for="">  حصل علي قبول</label> 

                            <input v-model="got_accepted" type="checkbox" id="projectinput1" class="form-control"   value="حصل علي قبول"/>
                            <label for="">    بداء الدراسه</label> 

                            <input v-model="study_started" type="checkbox" id="projectinput1" class="form-control"   value="بداء الدراسة"/>
                            <label for="">    مرفوض</label> 

                            <input v-model="rejected" type="checkbox" id="projectinput1" class="form-control"   value="مرفوض"/>
                     
                        </div>
                     
          
                       
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary w-100" @click="filterCoureses()" data-dismiss="modal" aria-label="Close">بحث</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Request Details Modal -->

        <div class="modal fade text-left" id="request_details_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel1">تفاصيل الطلب</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div>
                            <strong>اسم الكورس</strong>
                            <div v-if="serviceObj =={}">
                                <!-- <p  > {{serviceObj.course.name_ar}}</p> -->
                                <p>aaaa</p>
                            </div>
                            <div v-else-if="serviceObj !=={} ">
                                <p>{{course_Obj.name_ar}}</p>
                            </div>
                            <hr />
                        </div>
                        <div>
                            <strong>المعهد</strong>
                            <p>{{institute_name }}</p>
                            <hr />
                        </div>
                        <div>
                            <strong>عدد الاسابيع</strong>
                            <p>{{serviceObj.weeks}} اسابيع</p>
                            <hr />
                        </div>
                        <div>
                            <strong>السكن</strong>
                            <p v-if="residence_Obj">
                                العنوان : {{residence_Obj.name_ar}} && السعر : {{residence_Obj.price}}
                            </p>
                            <p v-else>
                                لا يوجد سكن
                            </p>
                            <hr />
                        </div>
                        <div>
                            <strong>المطار</strong>
                            <p v-if="airport_Obj">
                                المطار : {{airport_Obj.name_ar}} && السعر : {{airport_Obj.price}}
                            </p>
                            <p v-else>
                                لا يوجد مطار
                            </p>
                            <hr />
                        </div>
                        <div>
                            <strong>التامين</strong>
                            <p v-if="insurance_Obj">
                                السعر : {{insurance_Obj.price}}
                            </p>
                            <p v-else>
                                لا يوجد تامين
                            </p>
                            <hr />
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn grey btn-outline-secondary w-100" data-dismiss="modal">غلق</button>
                    </div>
                </div>
            </div>
        </div>
        <!--  End  Request Details Modal -->

        <!-- Institute Email Modal -->
        <div class="modal fade text-left" id="institute_email_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
            <div class="modal-dialog modal-xl" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel1">رسالة الي معهد كابلان</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <!-- <textarea v-model="institute_message"   name="ckeditor" id="ckeditor" cols="30" rows="15" class="ckeditor">
                             asdasda
                    </textarea> -->
                        <ckeditor :editor="editor" v-model="editorData" :config="editorConfig" :cols="30" :rows="15"></ckeditor>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-info w-100">ارسال الايميل</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Institute Email Modal -->

        <!-- Request Details Modal -->

        <div class="modal fade text-left" id="notes" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel1">ملاحظات الطالب</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div>
                            <p>{{notes}}</p>
                            <hr />
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn grey btn-outline-secondary w-100" data-dismiss="modal">غلق</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade text-left" id="classat_notes" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel1">ملاحظات كلاسات</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div>
                            <textarea v-model="classat_notes"  class="w-100"></textarea>
                            <hr />
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" @click="update_classat_note()" class="btn grey btn-outline-success w-100" data-dismiss="modal">حفظ </button>
                    </div>
                </div>
            </div>
        </div>
        <!--  End  Request Details Modal -->

        <div class="row">
            <div id="recent-transactions" class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">الدورات ({{this.studentsRequests.total}})</h4>
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
                                        <th class="border-top-0">الكورس</th>
                                        <th class="border-top-0">تفاصيل الطلب</th>
                                        <th class="border-top-0">رسالة المعهد</th>
                                        <th class="border-top-0">ملاحظات الطالب</th>
                                        <th class="border-top-0">ملاحظات كلاسات</th>

                                        <th class="border-top-0">الحالة</th>
                                        <th class="border-top-0">التاريخ</th>
                                        <th class="border-top-0">تحكم</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="request in studentsRequests.data" :key="request.id">
                                        <td class="text-truncate">{{request.student.name}}</td>
                                        <td class="text-truncate">{{request.student.phone}}</td>
                                        <td class="text-truncate">{{request.student.email}}</td>
                                        <td class="text-truncate">{{request.course.institute.name_ar}}</td>
                                        <td class="text-truncate">{{request.course.name_ar}}</td>
                                        <td class="text-truncate">
                                            <button type="button" class="btn btn-sm btn-outline-info round" @click="modelService(request)">
                                                <i class="la la-eye"></i>
                                            </button>
                                        </td>
                                        <td class="text-truncate">
                                            <button type="button" class="btn btn-sm btn-outline-info round" @click="modelmessageInstitute(request)">
                                                <i class="la la-eye"></i>
                                            </button>
                                        </td>
                                        <td class="text-truncate">
                                            <button type="button" class="btn btn-sm btn-outline-info round" @click="notes_request(request)">
                                                <i class="la la-eye"></i>
                                            </button>
                                        </td>
                                        <td class="text-truncate">
                                            <button type="button" class="btn btn-sm btn-outline-info round" @click="classat_notes_request(request)">
                                                <i class="la la-eye"></i>
                                            </button>
                                        </td>

                                        <td class="text-truncate">
                                            <!-- <input type="checkbox" id="checkbox" v-model="request.approvment" @change="updateApprovment" @click="getrequest_id(request.id)" />
                                            <label for="checkbox">{{ (request.approvment == 1) ? "مقبول":"غير مقبول" }}</label> -->
                                            <select v-model="request.status" @change="updateStatus" @click="getrequest_id(request.id)" name="" id="">
                                                <option value="جديد"> جديد</option>
                                                <option value="حصل علي قبول"> حصل علي قبول </option>
                                                <option value="بداء الدراسة"> بداء الدراسة</option>
                                                <option value="مرفوض"> مرفوض</option>
                                            </select>
                                        </td>
                                        <td class="text-truncate">{{request.created_at}}</td>

                                        <td>
                                            <div class="btn-group" role="group" aria-label="Basic example">
                                                <a  v-if="edit" :href="dahsboard_url+'/student-requests/'+request.id+'/edit'" class="btn btn-info btn-sm round"> تعديل</a>
                                                <a href="#" class="btn btn-default btn-sm round">عرض</a>

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
        props: ["student_request_url", "dahsboard_url", "course_url", "countries_from_blade", "institutes", "csrftoken" ,'create','edit','delete_pre' , 'update_classat_note_route' , 'get_courses_url' ,'get_institutes_url'],
        data() {
            return {
                studentsRequests: {},
                url: this.student_request_url,
                  url_course: this.course_url,
                country_id: "",
                city_id: "",
                countries: this.countries_from_blade,
                cities: {},
                courses: {},
                institute_id: "",
                course_id:'',
            
                name_ar: "",
            news:'',
            got_accepted:'',
            study_started:'',
            rejected:'',

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
            update_classat_note: function () {
                axios.post(this.update_classat_note_route, { request_id: this.request_id, classat_notes: this.classat_notes }, { headers: { "X-CSRFToken": "{{ csrf_token()}}" } }).then((response) => {alert('تم حفظ الملاحظة بنجاح')});
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
                            country_id: this.country_id,
                            city_id: this.city_id,
                        },
                    })
                    .then((response) => (this.institutes = response.data));
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
                // alert(this.news);
                var filter_params = {
                    institute_id: this.institute_id,
                    course_id: this.course_id,
                    country_id: this.country_id,
                    city_id: this.city_id,
                    name_ar:this.name_ar,
                    new:this.news,
                    got_accepted:this.got_accepted,
                    study_started:this.study_started,
                    rejected:this.rejected,
                 
                };
                var pagination_params = "&institute_id=" + this.institute_id + "&country_id=" + this.country_id + "&city_id=" + this.city_id ;
                axios
                    .get(this.dahsboard_url + "/student-requests/filterstudentsRequests", {
                        params: filter_params,
                    } )
                    .then((response) => ((this.studentsRequests = response.data.studentsRequests), (this.studentsRequests.prev_page_url += pagination_params), (this.studentsRequests.next_page_url += pagination_params)));
            },
            updateStatus: function (e) {
                const newValue = e.target.value;
                axios.post(this.dahsboard_url + "/student-requests/update-status", { request_id: this.request_id, status: newValue }, { headers: { "X-CSRFToken": "{{ csrf_token()}}" } }).then((response) => {});
            },
            getrequest_id: function (id) {
                return (this.request_id = id);
            },

            modelService: function (obj) {
                this.serviceObj = obj;
                this.course_Obj = this.serviceObj.course;
                this.airport_Obj = this.serviceObj.airport;
                this.insurance_Obj = this.serviceObj.insurance;
                this.residence_Obj = this.serviceObj.residence;
                this.institute_name = this.course_Obj.institute.name_ar;
                $("#request_details_modal").modal("show");
            },
            modelmessageInstitute: function (obj) {
                this.institute_message = obj.institute_message;
                this.editorData = obj.institute_message;
                //  console.log(this.institute_message);

                $("#institute_email_modal").modal("show");
            },
            notes_request: function (obj) {
                this.notes = obj.note;

                $("#notes").modal("show");
            },
            classat_notes_request: function (obj) {
                this.classat_notes = obj.classat_note;
                this.request_id = obj.id;

                $("#classat_notes").modal("show");
            },
            getcourses: function () {
                axios.get(this.url_course).then((response) => (this.courses = response.data.courses.data));
            },
             get_filter_courses() {
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
             const queryString = window.location.search;
        const urlParams = new URLSearchParams(queryString);
        const course_id_url = urlParams.get('course_id');
        // alert(course_id_url);

          if(course_id_url){
            this.course_id = course_id_url;
             this.filterCoureses();
            //  alert(institute_id_url);
        } else{
            this.getstudentsRequests();
            this.get_filter_courses();


          }
        },
    };
</script>
