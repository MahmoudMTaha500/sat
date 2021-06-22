<template>
    <div class="row">
        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">البحث في التاشيرات</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="projectinput1">حاله الدفع</label>
                            <select class="form-control" v-model="price_status" name="" id="">
                                <option value="" selected> اختر الحاله</option>
                                <option value="لم يتم الدفع"> لم يتم الدفع</option>
                                <option value="تم الدفع"> تم الدفع </option>
                                <option value="تم دفع جزء من المبلغ"> تم دفع جزء من المبلغ</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="projectinput1">حاله الطلب</label>
                            <select class="form-control" v-model="request_status" name="" id="">
                                <option value="" selected> اختر الحاله</option>

                                <option value="تم التقديم">تم التقديم</option>
                                <option value="تم التواصل"> تم التواصل </option>
                                <option value="الطلب مرفوض"> الطلب مرفوض </option>
                                <option value="طلب ملغي"> طلب ملغي </option>
                                <option value="جديد"> جديد </option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="projectinput1">حاله المستندات</label>

                            <select class="form-control" v-model="document_status" name="" id="">
                                <option value="" selected> اختر الحاله</option>

                                <option value="لم يتم الارسال"> لم يتم الارسال</option>
                                <option value="تم الارسال"> تم الارسال </option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="projectinput1">البحث بكلمات مفتاحية</label>
                            <input v-model="name_ar" type="text" id="projectinput1" class="form-control" placeholder="ادخل كلمة مفتاحية" name="name_ar" />
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary w-100" @click="filter()" data-dismiss="modal" aria-label="Close">بحث</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade text-left" id="institute_email_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel1">ملاحظه الطالب</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <textarea v-model="note" class="w-100" cols="30" rows="15"> </textarea>
                        <input type="hidden" v-model="visa_note_id" />
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-info w-100" data-dismiss="modal" aria-label="Close" @click="updatenote()">تعديل الملاحظه</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">التاشيرات ({{ visas.total }})</h4>
                    <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                    <div class="heading-elements">
                        <ul class="list-inline mb-0">
                            <li>
                                <button data-toggle="modal" data-target="#exampleModalCenter" class="btn btn-sm btn-info box-shadow-2 round btn-min-width pull-right"><i class="ft-filter ft-md"></i> فلتر</button>
                            </li>
                            <li v-if="create">
                                <a class="btn btn-sm btn-success box-shadow-2 round btn-min-width pull-right" :href="url_dashboard+'/visas/create'"> <i class="ft-plus ft-md"></i> اضافة مقال جديد</a>
                            </li>
                        </ul>

                        <!-- Modal -->
                    </div>
                </div>
                <div class="card-content">
                    <div class="table-responsive">
                        <table id="recent-orders" class="table table-hover table-xl mb-0">
                            <thead>
                                <tr>
                                    <th class="border-top-0">الاسم</th>
                                    <th class="border-top-0">البريد الاليكتروني</th>
                                    <th class="border-top-0">الهاتف</th>
                                    <th class="border-top-0">الدوله</th>
                                    <th class="border-top-0">نوع الفيزا</th>
                                    <th class="border-top-0">السعر</th>

                                    <th class="border-top-0">ملاحظات</th>
                                    <th class="border-top-0">طريقة الدفع</th>
                                    <th class="border-top-0">حاله الدفع</th>
                                    <th class="border-top-0">حاله المستندات</th>
                                    <th class="border-top-0">حاله الطلب</th>
                                    <th class="border-top-0">التاريخ</th>

                                    <th class="border-top-0">اكشن</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="visa in visas.data" :key="visa.id">
                                    <td>{{visa.name}}</td>
                                    <td>{{visa.email}}</td>
                                    <td>{{visa.phone}}</td>
                                    <td>{{visa.country}}</td>
                                    <td>{{visa.visa_type}}</td>
                                    <td>{{visa.price}}</td>
                                    <td class="text-truncate">
                                        <button type="button" class="btn btn-sm btn-outline-info round" @click="modelmessageInstitute(visa)">
                                            <i class="la la-eye"></i>
                                        </button>
                                    </td>
                                    <td>{{visa.payment_method}}</td>
                                    <td>
                                        <select v-model="visa.price_status" @change="updateStatus(type='price')" @click="getvisa_id(visa.id)" name="" id="">
                                            <option value="لم يتم الدفع"> لم يتم الدفع</option>
                                            <option value="تم الدفع"> تم الدفع </option>
                                            <option value="تم دفع جزء من المبلغ"> تم دفع جزء من المبلغ</option>
                                        </select>
                                    </td>
                                    <td>
                                        <select v-model="visa.document_status" @change="updateStatus(type='document')" @click="getvisa_id(visa.id)" name="" id="">
                                            <option value="لم يتم الارسال"> لم يتم الارسال</option>
                                            <option value="تم الارسال"> تم الارسال </option>
                                        </select>
                                    </td>
                                    <td>
                                        <select v-model="visa.request_status" @change="updateStatus(type='request')" @click="getvisa_id(visa.id)" name="" id="">
                                            <option value="تم التقديم">تم التقديم</option>
                                            <option value="تم التواصل"> تم التواصل </option>
                                            <option value="الطلب مرفوض"> الطلب مرفوض </option>
                                            <option value="طلب ملغي"> طلب ملغي </option>
                                            <option value="جديد"> جديد </option>
                                        </select>
                                    </td>

                                    <td>{{visa.created_at}}</td>

                                    <td>
                                        <div class="" role="group" aria-label="Basic example">
                                            <!-- <a v-if="edit" :href="url_dashboard+'/visas/'+visa.id+'/edit'" class="btn btn-info btn-sm round">تعديل</a> -->
                                            <form :action="url_dashboard+'/../order-visa/'+visa.id" method="POST" class="">
                                                <input type="hidden" name="_token" :value="csrftoken" />
                                                <input type="hidden" name="_method" value="delete" />
                                                <button v-if="delete_pre" class="btn btn-danger btn-sm round" onclick="return confirm('هل انت متاكد من حذف هذا المقال')">حذف</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="pagination">
                            <button class="btn btn-default" @click="Pagination(visas.prev_page_url)" :disabled="!visas.prev_page_url">
                                Previos
                            </button>
                            <span> page {{visas.current_page}} of {{visas.last_page }} </span>
                            <button class="btn btn-default" @click="Pagination(visas.next_page_url)" :disabled="!visas.next_page_url">
                                Next
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ["aprove_route", "dahsboard_url", "get_visa", "csrftoken", "categories", "users", "create", "edit", "delete_pre"],
        data() {
            return {
                visas: {},
                visa_id: "",
                url_dashboard: this.dahsboard_url,
                price_status: "",
                document_status: "",
                request_status: "",
                name_ar: "",
                status: true,
                note: "",
                visa_note_id: "",
            };
        },
        beforeMount() {
            this.getVisa();
        },

        methods: {
            getVisa() {
                axios.get(this.get_visa).then((response) => (this.visas = response.data.visas));
            },
            Pagination: function (url) {
                this.get_visa = url + "&user_id=" + this.user_id + "&cat_id=" + this.cat_id + "&keyword=" + this.keyword + "&status=" + this.status;
                this.getVisa();
            },
            updateApprovement: function (e) {
                const newValue = e.target.checked;
                axios.post(this.aprove_route, { blog_id: this.blog_id, approvement: newValue }, { headers: { "X-CSRFToken": "{{ csrf_token()}}" } }).then((response) => {});
            },
            getvisa_id: function (id) {
                return (this.visa_id = id);
            },
            updateStatus: function (type) {
                // alert(type);
                const newValue = event.target.value;
                // alert(newValue);
                axios.post(this.dahsboard_url + "/simple-visa/update-status", { visa_id: this.visa_id, status: newValue, type: type }, { headers: { "X-CSRFToken": "{{ csrf_token()}}" } }).then((response) => {});
            },
            filter: function () {
                axios
                    .get(this.dahsboard_url + "/simple-visa/filter", { params: { price_status: this.price_status, document_status: this.document_status, request_status: this.request_status, name_ar: this.name_ar } })
                    .then(
                        (response) => (
                            (this.visas = response.data.visas),
                            (this.visas.prev_page_url += "&price_status=" + this.price_status + "&document_status=" + this.document_status + "&document_status=" + this.document_status + "&name_ar=" + this.name_ar),
                            (this.visas.next_page_url += "&price_status=" + this.price_status + "&document_status=" + this.document_status + "&document_status=" + this.document_status + "&name_ar=" + this.name_ar)
                        )
                    );
            },
            modelmessageInstitute: function (obj) {
                this.note = obj.note;
                this.visa_note_id = obj.id;
                // this.editorData = obj.institute_message;
                //  console.log(this.institute_message);

                $("#institute_email_modal").modal("show");
            },
            updatenote: function () {
                // alert(type);
                // alert(newValue);
                axios.post(this.dahsboard_url + "/simple-visa/update-note", { visa_note_id: this.visa_note_id, note: this.note }, { headers: { "X-CSRFToken": "{{ csrf_token()}}" } }).then((response) => {
                    if (response.data == "success") {
                        alert("تم تعديل الملاحظه ");
                    }
                });
            },
        },
    };
</script>
