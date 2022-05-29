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
                <div class="row">
                    <div class="col-5">
                        <strong>اسم المعهد :</strong>
                    </div>
                    <div class="col-7">
                        <span>{{institute_name}}</span>
                        <hr>
                        <strong>{{`${country} + ${city}`}}</strong>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-5">
                        <strong>اسم الدورة :</strong>
                    </div>
                    <div class="col-7">
                        <span>{{course_name}} <span class="text-primary">({{Math.round(course_price*weeks*(1-course_discount))}} ر.س)</span></span>
                    </div>
                </div>
                <hr v-if="chosin_residence != ''">
                <div class="row" v-if="chosin_residence != ''">
                    <div class="col-5">
                        <strong>السكن :</strong>
                    </div>
                    <div class="col-7">
                        <span>{{chosin_residence.name_ar}} <span class="text-primary">({{Math.round(chosin_residence.price*residence_weeks)}} ر.س)</span></span>
                    </div>
                </div>
                <hr v-if="chosin_airport != ''">
                <div class="row" v-if="chosin_airport != ''">
                    <div class="col-5">
                        <strong>المطار :</strong>
                    </div>
                    <div class="col-7">
                        <span>{{chosin_airport.name_ar}} <span class="text-primary">({{Math.round(chosin_airport.price)}} ر.س)</span></span>
                    </div>
                </div>
                <hr v-if="insurance_price_checker != 0">
                <div class="row" v-if="insurance_price_checker != 0">
                    <div class="col-5">
                        <strong>التامين :</strong>
                    </div>
                    <div class="col-7">
                        <span><span class="text-primary">{{Math.round(insurance_price*weeks)}} ر.س</span></span>
                    </div>
                </div>
                <hr v-if="student_note != null">
                <div class="row" v-if="student_note != null">
                    <div class="col-5">
                        <strong>ملاحظات الطالب :</strong>
                    </div>
                    <div class="col-7">
                        <span>{{student_note}}</span>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-5">
                        <strong>السعر الكلي :</strong>
                    </div>
                    <div class="col-7">
                        <span><span class="text-success h4">{{totalPrice().toFixed(2) }}</span> ر.س</span>
                    </div>
                </div>
                <hr>
                <div class="row">
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
                                        <option :selected="status == 'جديد' ? true : false " value="جديد"> جديد</option>
                                        <option :selected="status == 'تم التواصل وبانتظار المستندات' ? true : false " value="تم التواصل وبانتظار المستندات">تم التواصل وبانتظار المستندات</option>
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
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label> عدد اسابيع الكورس </label>
                                    <input @change="get_course_price() ; get_insurance_price()" type="number" v-model="weeks" id="projectinput1" min="1" class="form-control" placeholder="ادخل  عدد الاسابيع" name="weeks" />
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label> عدد اسابيع السكن </label>
                                    <input @change="get_course_price() ; get_insurance_price()" type="number" v-model="residence_weeks" id="projectinput1" min="1" class="form-control" placeholder="ادخل  عدد الاسابيع" name="residence_weeks" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label> السكن  </label>
                                    <select v-model="chosin_residence" class="form-control text-left">
                                        <option value="">لا اريد سكن </option>
                                        <option :selected="residence_obj.id == chosin_residence.id ? true : false "  v-for="  residence_obj in residences" :key="residence_obj.id" :value="residence_obj">{{residence_obj.price}} ر.س - {{ residence_obj.name_ar}} </option>
                                    </select>
                                    <input type="hidden" name="residence" :value="JSON.stringify(chosin_residence)">
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label> تاريخ بداية الكورس </label>
                                    <input type="text" v-model="from_date" class="form-control datepicker-default" name="from_date" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label> تاريخ انتهاء الكورس </label>
                                    <input type="text" v-model="to_date" id="projectinput1" min="1" class="form-control"  readonly name="to_date" />
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label> تاريخ البداية السكن </label>
                                    <input type="text" v-model="residence_from_date" id="projectinput1" min="1" class="form-control"  disabled  />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label> تاريخ انتهاء السكن </label>
                                    <input type="text" :value="residence_to_date" id="projectinput1" min="1" class="form-control"  disabled />
                                </div>
                            </div>


                            <div v-if="chosin_airport[0] != null" class="col-md-6">
                                <div class="form-group">
                                    <label for="projectinput2"> الاستقبال ({{chosin_airport.price}} ر.س)</label>
                                    <select v-model="chosin_airport" class="form-control text-left">
                                        <option :value="{price:0}">لا اريد استقبال </option>
                                        <option :selected="airport_obj.id == chosin_airport.id ? true : false "  v-for="  airport_obj in airports" :key="airport_obj.id" :value="airport_obj">{{airport_obj.price}} ر.س - {{ airport_obj.name_ar}} </option>
                                    </select>
                                    <input type="hidden" name="airport" :value="JSON.stringify(chosin_airport)">
                                </div>
                            </div>
                            
                            
                            
                            
                           
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="projectinput2"> المدفوع (ر.س) </label>
                                    <input type="number" v-model="paid_price"  class="form-control" placeholder="المدفوع" name="paid_price" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label> المتبقي (ر.س) </label>
                                    <input type="text" :value="(totalPrice() - paid_price).toFixed(2)" id="projectinput1" min="1" class="form-control"  disabled />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label> المطار  </label>
                                    <select v-model="chosin_airport" class="form-control text-left">
                                        <option value="">لا اريد استقبال </option>
                                        <option :selected="airport_obj.id == chosin_airport.id ? true : false "  v-for="  airport_obj in airports" :key="airport_obj.id" :value="airport_obj">{{airport_obj.price}} ر.س - {{ airport_obj.name_ar}} </option>
                                    </select>
                                    <input type="hidden" name="airport" :value="JSON.stringify(chosin_airport)">
                                </div>
                            </div>

                            <div  v-if="insurance_price != 0"  class="col-md-6">
                                <label> التامين  </label>
                                <div class="form-group">
                                    <label> اريد تامين ({{insurance_price*weeks}} ر.س)</label>
                                    <input type="checkbox" v-model="insurance_price_checker" id="switchery" class="switchery" :value="insurance_price*weeks" name="insurance_price" />
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="projectinput3">ملاحظات </label>
                                    <textarea :value="classat_note" type="text" rows="10" class="form-control" placeholder="  ملاحظات " name="classat_note"></textarea>
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
                country : this.student_request.course.institute.country.name_ar,
                city : this.student_request.course.institute.city.name_ar,
                course_name : this.student_request.course.name_ar,
                course_discount : this.student_request.course.discount,
                total_price : this.student_request.total_price,
                paid_price : this.student_request.paid_price,
                remaining_price : this.student_request.remaining_price,
                status : this.student_request.status,
                payment_status : this.student_request.payment_status,
                weeks : this.student_request.weeks,
                residence_weeks : this.student_request.residence_weeks,
                classat_note : this.student_request.classat_note,
                student_note : this.student_request.note,
                institute_message : this.student_request.institute_message,
                from_date : this.student_request.from_date,
                to_date : this.student_request.to_date,
                residences : this.student_request.course.institute.residence,
                chosin_residence :'',
                airports : this.student_request.course.institute.airport,
                chosin_airport :'',
                insurance_price_checker : this.student_request.insurance_price == 0 ? false : true,
                insurance_price : (this.student_request.course.institute.insurance == null ? 0 : this.student_request.course.institute.insurance.price),
                course_price :'',
                residence_from_date :'',
                residence_to_date :'',
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
                    total_price += this.chosin_residence.price*this.residence_weeks
                }
               return total_price
            },
            change_from_date(){
                let modified_date = (data, days) => {return new Intl.DateTimeFormat('en-US').format(new Date(new Date(data).getTime() + days*86400000))};
                this.from_date = $('.datepicker-default').val();
                this.to_date =  modified_date(this.from_date, this.weeks*7);
                this.residence_from_date =  modified_date(this.from_date, -1);
                this.residence_to_date =  modified_date(this.residence_from_date, this.residence_weeks*7);
            }
        },

        
        
        beforeMount() {

            window.setInterval(() => {
                this.change_from_date()
            }, 500)

            this.set_chosin_residence()
            this.set_chosin_airport()
            this.get_insurance_price()
            this.get_course_price()
        },
    };
</script>
