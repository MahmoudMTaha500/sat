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
                        <span>{{course_name}} <span class="text-primary">({{Math.floor(course_price*weeks*(1-course_discount))}} ر.س)</span></span>
                    </div>
                </div>

                <hr v-if="course_booking_fees != 0">
                <div class="row" v-if="course_booking_fees != 0">
                    <div class="col-5">
                        <strong>حجز الدورة :</strong>
                    </div>
                    <div class="col-7">
                         <span class="text-primary">{{course_booking_fees}} ر.س</span>
                    </div>
                </div>

                <hr v-if="course_summer_increase != 0">
                <div class="row" v-if="course_summer_increase != 0">
                    <div class="col-5">
                        <strong>حجز خلال فترة الذروة: الرسوم الدراسية : زيادة بقيمة :</strong>
                    </div>
                    <div class="col-7">
                         <span class="text-primary">
                            {{course_summer_increase}} ر.س   
                            <span class="text-success">({{course_summer_increase_weeks + ( course_summer_increase_weeks == 1 ? ' اسبوع ' : ' اسابيع  ')}})</span>   
                        </span>
                    </div>
                </div>

                

                <hr v-if="chosin_residence != ''">
                <div class="row" v-if="chosin_residence != ''">
                    <div class="col-5">
                        <strong>السكن :</strong>
                    </div>
                    <div class="col-7">
                        <span>{{chosin_residence.name_ar}} <span class="text-primary">({{Math.floor(chosin_residence.price*residence_weeks)}} ر.س)</span></span>
                    </div>
                </div>

                <hr v-if="residence_booking_fees != 0">
                <div class="row" v-if="residence_booking_fees != 0">
                    <div class="col-5">
                        <strong>حجز السكن :</strong>
                    </div>
                    <div class="col-7">
                         <span class="text-primary">{{residence_booking_fees}} ر.س</span>
                    </div>
                </div>

                
                <hr v-if="residence_summer_increase != 0">
                <div class="row" v-if="residence_summer_increase != 0">
                    <div class="col-5">
                        <strong>حجز خلال فترة الذروة: رسوم السكن : زيادة بقيمة :</strong>
                    </div>
                    <div class="col-7">
                         <span class="text-primary">
                            {{residence_summer_increase}} ر.س   
                            <span class="text-success">({{residence_summer_increase_weeks + ( residence_summer_increase_weeks == 1 ? ' اسبوع ' : ' اسابيع  ')}})</span>   
                        </span>
                    </div>
                </div>

                <hr v-if="course_textboox_fees != 0">
                <div class="row" v-if="course_textboox_fees != 0">
                    <div class="col-5">
                        <strong>رسوم الكتب الدراسية :</strong>
                    </div>
                    <div class="col-7">
                         <span class="text-primary">{{course_textboox_fees}} ر.س</span>
                    </div>
                </div>



                <hr v-if="chosin_airport != ''">
                <div class="row" v-if="chosin_airport != ''">
                    <div class="col-5">
                        <strong>المطار :</strong>
                    </div>
                    <div class="col-7">
                        <span>{{chosin_airport.name_ar}} <span class="text-primary">({{Math.floor(chosin_airport.price)}} ر.س)</span></span>
                    </div>
                </div>
                <hr v-if="insurance_price_checker != 0">
                <div class="row" v-if="insurance_price_checker != 0">
                    <div class="col-5">
                        <strong>التامين :</strong>
                    </div>
                    <div class="col-7">
                        <span><span class="text-primary">{{Math.floor(insurance_price*weeks)}} ر.س</span></span>
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
                        <span><span class="text-success h4">{{Math.floor(totalPrice()) }}</span> ر.س</span>
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
                <hr>
                <div class="row">
                    <div class="col-12">
                        <button type="button" class="btn btn-primary w-100 mb-3" data-toggle="modal" data-target="#studentFiles"> ملفات الطالب</button>
                        <!-- Button trigger modal -->

                        
                    </div>

                </div>
            </div>
            <div class="col-md-8">
                <form class="form" method="post" :action="student_requests_url+'/'+student_request.id" enctype="multipart/form-data">
                    <input type="hidden" name="_token" :value="csrf_token">
                    <input type="hidden" name="_method" value="put">
                    <input type="hidden" name="price_per_week" :value="course_price*(1-course_discount)">
                    <input type="hidden" name="course_discount" :value="course_discount">
                    <input type="hidden" name="total_price" :value="totalPrice()">

                    <input type="hidden" name="course_booking_fees" :value="course_booking_fees">
                    <input type="hidden" name="residence_booking_fees" :value="residence_booking_fees">
                    <input type="hidden" name="course_summer_increase_weeks" :value="course_summer_increase_weeks">
                    <input type="hidden" name="course_summer_increase" :value="course_summer_increase">
                    <input type="hidden" name="residence_summer_increase_weeks" :value="residence_summer_increase_weeks">
                    <input type="hidden" name="residence_summer_increase" :value="residence_summer_increase">
                    <input type="hidden" name="course_textboox_fees" :value="course_textboox_fees">


                    <!-- Student Files Modal -->
                    <div class="modal fade" id="studentFiles" tabindex="-1" role="dialog" aria-labelledby="studentFilesTitle" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="studentFilesTitle">ملفات الطالب</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group mb-2 contact-repeater">
                                        <div data-repeater-list="student_files">
                                            <div class="input-group mb-1" data-repeater-item>
                                                <div class="form-control p-0">
                                                    <input type="file" class="form-control vaildate" name="student_file"/>
                                                </div>
                                                <span class="input-group-append" id="button-addon2">
                                                    <button class="btn btn-danger" type="button" data-repeater-delete><i class="ft-x"></i></button>
                                                </span>
                                            </div>
                                        </div>
                                        <button type="button" data-repeater-create class="btn btn-primary"><i class="ft-plus"></i> اضافة ملف جديد</button>
                                        <hr>
                                        <div v-for="student_file in student_request.student_files" :key="student_file.id" class="row mb-2">
                                            <div class="col-6">
                                                {{student_file.file_name}}
                                            </div>
                                            <div class="col-6 text-right">
                                                <a target="_blank" :href="'/storage/uploaded_media/'+student_file.id+'/'+student_file.file_name" class="btn btn-info btn-sm">  <i class="ft-eye"></i> فتح</a>
                                                <a :href="delete_student_file_url+'/'+student_file.id+'/'+student_file.model_id" class="btn btn-danger btn-sm">  <i class="ft-trash"></i> حذف</a>
                                            </div>
                                        </div>
                                        
                                        
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn w-100 btn-success">حفظ</button>
                                </div>
                            </div>
                        </div>
                    </div>


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
        props: ["csrf_token" , "delete_student_file_url" , "get_course_price_url" , "get_insurance_price_url" , "student_request" , "student_requests_url" , "bill_file"],
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
                course_booking_fees : Math.floor(this.student_request.course_booking_fees),
                residence_booking_fees : Math.floor(this.student_request.residence_booking_fees),
                course_summer_increase_weeks : Math.floor(this.student_request.course_summer_increase_weeks),
                course_summer_increase : Math.floor(this.student_request.course_summer_increase),
                residence_summer_increase_weeks : Math.floor(this.student_request.residence_summer_increase_weeks),
                residence_summer_increase : Math.floor(this.student_request.residence_summer_increase),
                course_textboox_fees : Math.floor(this.student_request.course_textboox_fees),
                total_price : Math.floor(this.student_request.total_price),
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

                var totalPrice = (this.course_price*(1- this.course_discount))*this.weeks
                if(this.chosin_airport != null && !isNaN(this.chosin_airport.price)){
                    totalPrice += this.chosin_airport.price
                }
                if(this.chosin_residence != null &&!isNaN(this.chosin_residence.price)){
                    totalPrice += this.chosin_residence.price*this.residence_weeks
                }
                if(this.insurance_price_checker == '1'){
                    totalPrice += this.insurance_price*this.weeks
                }
                if(Number(this.course_booking_fees) != 0){
                    totalPrice += Number(this.course_booking_fees)
                }
                if(Number(this.course_textboox_fees) != 0){
                    totalPrice += Number(this.course_textboox_fees)
                }
                if(Number(this.residence_booking_fees) != 0 && !isNaN(this.chosin_residence.price)){
                    totalPrice += Number(this.residence_booking_fees)
                }
                if(this.course_summer_increase_weeks !=0 && this.course_summer_increase !=0){
                    totalPrice += Number(this.course_summer_increase)
                }
                if(this.residence_summer_increase_weeks !=0 && this.residence_summer_increase !=0){
                    totalPrice += Number(this.residence_summer_increase)
                }
                return totalPrice
            },
            change_from_date(){
                let modified_date = (data, days) => {return new Intl.DateTimeFormat('en-US').format(new Date(new Date(data).getTime() + days*86400000))};
                this.from_date = $('.datepicker-default').val();
                this.to_date =  modified_date(this.from_date, this.weeks*7);
                this.residence_from_date =  modified_date(this.from_date, -1);
                this.residence_to_date =  modified_date(this.residence_from_date, this.residence_weeks*7);
            },
            calculate_summer_increase_weeks(weeks){
                    let summer_increase_weeks = 0
                    let currentYear = new Date().getFullYear()

                    let start_date = Date.parse(this.from_date)
                    let end_date = start_date + weeks*7*24*60*60*1000
                    let summer_start_date = Date.parse(currentYear+'-'+this.student_request.course.institute.summer_start_date)
                    let summer_end_date = Date.parse(currentYear+'-'+this.student_request.course.institute.summer_end_date)

                    if(end_date>=summer_end_date){
                        if(start_date>=summer_end_date){summer_increase_weeks = 0}
                        else if(start_date <= summer_end_date && start_date >=summer_start_date){
                            summer_increase_weeks = Math.floor((summer_end_date -start_date)/7/24/60/60/1000)
                        }
                        else{
                            summer_increase_weeks = Math.floor((summer_end_date -summer_start_date)/7/24/60/60/1000)
                        }
                    }
                    else if(end_date <= summer_end_date && end_date>= summer_start_date){
                        if(start_date >= summer_start_date){
                            summer_increase_weeks = Math.floor((end_date -start_date)/7/24/60/60/1000)
                        }
                        else{
                            summer_increase_weeks = Math.floor((end_date -summer_start_date)/7/24/60/60/1000)
                        }
                    }
                    else{summer_increase_weeks = 0}
                    return summer_increase_weeks;
                    
                },
                chose_course_textboox_fees(){
                    let textbooxFeesObj = JSON.parse(this.student_request.course.textbooks_fees);
                    if(textbooxFeesObj != null){
                        textbooxFeesObj.sort((a, b) => a.weeks - b.weeks)
                        let chosin = false
                        textbooxFeesObj.forEach(ele => {
                            if(Number(this.weeks) <= ele.weeks){
                                if(chosin == false){this.course_textboox_fees = ele.fees_in_sar;}
                                chosin = true;
                            }
                        });
                    }
                    return 0;
                }
            },
            watch:{
                weeks: function (){
                    this.chose_course_textboox_fees()
                    this.course_summer_increase_weeks = this.calculate_summer_increase_weeks(this.weeks)
                    this.course_summer_increase = (this.student_request.course.course_summer_increase == null ? 0 : JSON.parse(this.student_request.course.course_summer_increase).price_in_sar)*this.course_summer_increase_weeks
                },
                residence_weeks: function (){
                    this.residence_summer_increase_weeks = this.calculate_summer_increase_weeks(this.residence_weeks)
                    this.residence_summer_increase = (this.chosin_residence == null ? 0 : JSON.parse(this.chosin_residence.residence_summer_increase).price_in_sar)*this.residence_summer_increase_weeks
                },
                chosin_residence: function (){
                    this.residence_summer_increase = (this.chosin_residence == null ? 0 : JSON.parse(this.chosin_residence.residence_summer_increase).price_in_sar)*this.residence_summer_increase_weeks
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
