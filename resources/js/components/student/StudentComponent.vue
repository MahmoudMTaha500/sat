<template>
    <div>
        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">البحث في الطلاب</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                      
                        <div class="form-group">
                            <label for="projectinput1">البحث بالاسم   </label>
                            <input  v-model="name" type="text" id="projectinput1" class="form-control" placeholder="ادخل الاسم " name="name" />
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary w-100" @click="filterStudents()" data-dismiss="modal" aria-label="Close">بحث</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div id="recent-transactions" class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">الطلاب ({{this.students.total}})</h4>
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
                                        <th class="border-top-0"> البريد الالكتروني</th>
                                        <th class="border-top-0"> الهاتف</th>
                                        <th class="border-top-0"> الدوله</th>
                                        <th class="border-top-0">المدينة</th>

                                        <th class="border-top-0"> الجنسيه</th>
                                        <th class="border-top-0">العنوان</th>
                                        <th class="border-top-0">اكشن</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="student in students.data" :key="student.id">
                                        <td class="text-truncate">{{student.name}}</td>
                                        <td class="text-truncate">{{student.email}}</td>
                                        <td class="text-truncate">{{student.phone}}</td>
                                        <td class="text-truncate">{{student.country.name_ar}}</td>
                                        <td class="text-truncate">{{student.city.name_ar}}</td>
                                        <td class="text-truncate">{{student.nationality}}</td>
                                        <td class="text-truncate">{{student.address}}</td>

                                        <td>
                                            <div class="btn-group" role="group" aria-label="Basic example">
                                                <a  class="btn btn-info btn-sm round"> تعديل</a>
                                                <a href="#" class="btn btn-default btn-sm round">عرض</a>

                                                <!-- <form :action="dahsboard_url+'/courses/'+course.id" method="POST" class="btn-group"> -->
                                                    <!-- <input type="hidden" name="_token" :value="csrftoken" /> -->
                                                    <!-- <input type="hidden" name="_method" value="delete" /> -->
                                                    <button class="btn btn-danger btn-sm round" onclick="return confirm('هل انت متاكد من حذف هذه الدورة')">حذف</button>
                                                <!-- </form> -->
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>

                            <div class="pagination">
                                <button class="btn btn-default" @click="studentsPagination(students.prev_page_url)" :disabled="!students.prev_page_url">
                                    Previos
                                </button>
                                <span> page {{students.current_page}} of {{students.last_page }} </span>
                                <button class="btn btn-default" @click="studentsPagination(students.next_page_url)" :disabled="!students.next_page_url">
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
        props: ["student_url", "dahsboard_url", "csrftoken"],
        data() {
            return {
                students: {},
                url:this.student_url+'/get',
                name:'',
            };
        },
        methods: {
            getstudents: function () {
                axios.get(this.url).then((response) => (this.students = response.data.students));
            },

            studentsPagination: function (url1) {
                this.url = url1;
                this.getstudents();
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
            filterStudents: function () {
                var filter_params = {
                   name:this.name
                }

                if(this.name==''){
this.getstudents();
                } else{

                var pagination_params = "&name=" + this.name ;
           

                axios
                    .get(this.student_url + "/filter", {
                        params: filter_params,
                    })
                    .then(
                        (response) => (
                            (this.students = response.data.students),
                            (this.students.prev_page_url += pagination_params),
                            (this.students.next_page_url += pagination_params)
                        )
                    );
                }

            },
           
        },
        beforeMount() {
            this.getstudents();
        },
    };
</script>
