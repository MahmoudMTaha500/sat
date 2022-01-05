<template>
    <div>
        <div class="row">
            <div class="col-md-4 p-3">
                <div class="row mb-3">
                    <div class="col-5">
                        <strong>اسم الطالب :</strong>
                    </div>
                    <div class="col-7">
                        <span>{{student_name}}</span>
                    </div>
                </div>
                <hr>
                <div class="row my-3">
                    <div class="col-5">
                        <strong>اسم المعهد :</strong>
                    </div>
                    <div class="col-7">
                        <span>{{institute_name}}</span>
                    </div>
                </div>
                <hr>
                <div class="row my-3">
                    <div class="col-5">
                        <strong>اسم الدورة :</strong>
                    </div>
                    <div class="col-7">
                        <span>{{course_name}} <span class="text-primary">({{Math.round(course_price*weeks*(1-course_discount))}} ريال سعودي)</span></span>
                    </div>
                </div>
                <hr>
                <div class="row my-3">
                    <div class="col-5">
                        <strong>السعر الكلي :</strong>
                    </div>
                    <div class="col-7">
                        <span>{{totalPrice() }} ريال سعودي</span>
                    </div>
                </div>
                <hr>
                <div class="row my-3">
                    <div class="col-5">
                        <strong>المدفوع :</strong>
                    </div>
                    <div class="col-7">
                        <span>{{paid_price}} ريال سعودي</span>
                    </div>
                </div>
                <hr>
                <div class="row my-3">
                    <div class="col-5">
                        <strong>المتبقي :</strong>
                    </div>
                    <div class="col-7">
                        <span>{{totalPrice() - paid_price}} ريال سعودي</span>
                    </div>
                </div>
                <hr>
                <div class="row my-3">
                    <div class="col-5">
                        <strong>صورة ايصال الحوالة :</strong>
                    </div>
                    <div class="col-7">
                        <span v-if="bill_file != 0" ><a :href="bill_file" target="_blank">اضغط للعرض</a></span>
                        <span v-else >لم يتم رفع ملف لايصال الحوالة</span>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <form class="form" method="post" :action="student_requests_url+'/'+student_request.id">
                    <input type="hidden" name="_token" :value="csrf_token">
                    <input type="hidden" name="_method" value="put">
                    <input type="hidden" name="price_per_week" :value="course_price*(1-course_discount)">
                    <input type="hidden" name="insurance_price" :value="insurance_price">
                    <input type="hidden" name="course_discount" :value="course_discount">
                    <input type="hidden" name="total_price" :value="totalPrice()">
                    <div class="form-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="projectinput2">حالة القبول</label>
                                    <select class="form-control text-left" name="status">
                                        <option  value="">اختر الحاله</option>

                                        <option :selected="status == 'جديد' ? true : false " value="جديد"> جديد</option>
                                        <option :selected="status == 'حصل علي قبول' ? true : false " value="حصل علي قبول"> حصل علي قبول </option>
                                        <option :selected="status == 'بداء الدراسة' ? true : false " value="بداء الدراسة"> بداء الدراسة</option>
                                        <option :selected="status == 'مرفوض' ? true : false " value="مرفوض"> مرفوض</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="projectinput2">حالة الدفع</label>
                                    <select class="form-control text-left" name="payment_status">
                                        <option :selected="payment_status == '0' ? true : false " value="0"> لم يتم الدفع</option>
                                        <option :selected="payment_status == '2' ? true : false " value="2"> مدفوع جزئيا  </option>
                                        <option :selected="payment_status == '1' ? true : false " value="1"> تم الدفع بالكامل</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">

                                  
                                <div class="form-group">
                                    <label for="projectinput1"> عدد الاسابيع </label>
                                    <input @change="get_course_price() ; get_insurance_price()" type="number" v-model="weeks" id="projectinput1" min="1" class="form-control" placeholder="ادخل  عدد الاسابيع" name="weeks" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="projectinput2"> السكن ({{chosin_residence.price*weeks}} ريال سعودي)</label>
                                    <select v-model="chosin_residence" class="form-control text-left">
                                        <option :value="{price:0}">لا اريد سكن </option>
                                        <option :selected="residence_obj.id == chosin_residence.id ? true : false "  v-for="  residence_obj in residences" :key="residence_obj.id" :value="residence_obj">{{residence_obj.price}} ريال - {{ residence_obj.name_ar}} </option>
                                    </select>
                                    <input type="hidden" name="residence" :value="JSON.stringify(chosin_residence)">
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="projectinput1"> تاريخ البداية </label>
                                    <input type="text" v-model="from_date" id="projectinput1" min="1" class="form-control"   name="from_date" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="projectinput1"> تاريخ الانتهاء </label>
                                    <input type="text" v-model="to_date" id="projectinput1" min="1" class="form-control"   name="to_date" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="projectinput2"> الاستقبال ({{chosin_airport.price}} ريال سعودي)</label>
                                    <select v-model="chosin_airport" class="form-control text-left">
                                        <option :value="{price:0}">لا اريد استقبال </option>
                                        <option :selected="airport_obj.id == chosin_airport.id ? true : false "  v-for="  airport_obj in airports" :key="airport_obj.id" :value="airport_obj">{{airport_obj.price}} ريال - {{ airport_obj.name_ar}} </option>
                                    </select>
                                    <input type="hidden" name="airport" :value="JSON.stringify(chosin_airport)">
                                </div>
                            </div>
                            
                            
                            
                            
                           
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="projectinput2"> المدفوع </label>
                                    <input type="number" v-model="paid_price"  class="form-control" placeholder="المدفوع" name="paid_price" />
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="projectinput4"> اريد تامين ({{insurance_price*weeks}} ريال سعودي)</label>
                                    <input type="checkbox" v-model="insurance_price_checker" id="switchery" class="switchery" :value="insurance_val" name="insurance_checker" />
                                </div>
                            </div>
                            
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="projectinput3">رساله المعهد </label>
                                    <textarea v-html="institute_message" type="text" id="ckeditor" rows="20" class="form-control" placeholder="  رساله المعهد " name="institute_message"></textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="projectinput3">ملاحظات </label>
                                    <textarea :value="notes" type="text" rows="10" class="form-control" placeholder="  ملاحظات " name="note"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="form-actions center">
                            <button type="submit" class="btn btn-primary w-100 test-btn"><i class="la la-check-square-o"></i> حفظ</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ["csrf_token" , "get_course_price_url" , "get_insurance_price_url" , "student_request" , "student_requests_url" , "bill_file"],
        data() {
            return {
                student_name : this.student_request.student.name,
                institute_name : this.student_request.course.institute.name_ar,
                course_name : this.student_request.course.name_ar,
                course_discount : this.student_request.course.discount,
                total_price : this.student_request.total_price,
                paid_price : this.student_request.paid_price,
                remaining_price : this.student_request.remaining_price,
                status : this.student_request.status,
                payment_status : this.student_request.payment_status,
                weeks : this.student_request.weeks,
                notes : this.student_request.note,
                institute_message : this.student_request.institute_message,
                from_date : this.student_request.from_date,
                to_date : this.student_request.to_date,
                residences : this.student_request.course.institute.residence,
                chosin_residence :'',
                airports : this.student_request.course.institute.airport,
                chosin_airport :'',
                insurance_price_checker : this.student_request.insurance_price == 0 ? false : true,
                insurance_price :'',
                course_price :'',
            };
        },
        methods: {
            set_chosin_residence: function () {
                this.residences.forEach(res => {                    
                    if(res.id == this.student_request.residence_id ){
                        this.chosin_residence = res;
                    }
                });
            },
            set_chosin_airport: function () {
                this.airports.forEach(airp => {                    
                    if(airp.id == this.student_request.airport_id ){
                        this.chosin_airport = airp;
                    }
                });
            },
            
            get_insurance_price() {
                axios
                    .get(this.get_insurance_price_url, {
                        params: { course_id: this.student_request.course_id, weeks: this.weeks },
                    })
                    .then((response) => (this.insurance_price = response.data.insurance_price));
            },
            get_course_price() {
                axios
                    .get(this.get_course_price_url, {
                        params: { course_id: this.student_request.course_id, weeks: this.weeks },
                    })
                    .then((response) => (this.course_price = response.data.price_per_week));
            },
           
         
            totalPrice() {
                var total_price = this.course_price*(1- this.course_discount)*this.weeks
                if(this.insurance_price_checker){
                    total_price += this.insurance_price*this.weeks
                }
                if(!isNaN(this.chosin_airport.price)){
                    total_price += this.chosin_airport.price
                }
                if(!isNaN(this.chosin_residence.price)){
                    total_price += this.chosin_residence.price*this.weeks
                }
               return total_price
            },
        },
        
        beforeMount() {
            this.set_chosin_residence()
            this.set_chosin_airport()
            this.get_insurance_price()
            this.get_course_price()
        },
    };
</script>
