<template>
    <div @click="change_from_date" style="display: inline;">
        <!-- Cost -->
        <div class="bg-white py-4 rounded-10 mb-4">
            <div class="cost-heading border-bottom pb-2 px-3">
                <h5 class="font-weight-bold text-main-color">التكاليف</h5>
            </div>
            <div class="cost-body px-3 pt-3">
                <div>
                    <span class="d-block">{{course.name_ar}} </span>
                    <span class="font-weight-bold d-block">
                        <span  v-if="course.discount !=0" class="float-left bg-main-color p-2 round text-white rounded-10">%{{Math.round(course.discount*100)}} - </span>
                    </span>
                    <span  v-if="course.discount != 0" class="text-main-color"><del class="text-danger ml-2"> {{price_per_week}} </del>   {{Math.round(price_per_week*(1- course.discount))}} ر.س / الأسبوع </span>
                    <span  v-else class="text-main-color"> <span class="weight-bold">{{Math.round(price_per_week*weeks*(1- course.discount))}} ر.س </span>  <span class="h6 small text-success">({{weeks + ( weeks == 1 ? ' اسبوع ' : ' اسابيع ')}})</span> </span>
                    <hr />
                </div>
                <div v-if="course_summer_increase_weeks !=0 && course_summer_increase !=0">
                    <span class="d-block"><span class="font-weight-bold"> حجز خلال فترة الذروة: الرسوم الدراسية : زيادة بقيمة  : <br> <span class="text-main-color">{{course_summer_increase*course_summer_increase_weeks}} ر.س   </span> <span class="text-success">({{course_summer_increase_weeks + ( course_summer_increase_weeks == 1 ? ' اسبوع ' : ' اسابيع  ')}})</span>   </span> </span>
                    <hr />
                </div>
                <div v-if="course_booking_fees !=0">
                    <span class="d-block"><span class="font-weight-bold"> حجز الدورة : </span> <span class="text-main-color">{{course_booking_fees}} ر.س   </span></span>
                    <hr />
                </div>
                <div v-if="course_booking_fees !=0">
                    <span class="d-block"><span class="font-weight-bold"> رسوم الكتب الدراسية : </span> <span class="text-main-color">{{course_textboox_fees}} ر.س   </span></span>
                    <hr />
                </div>
                
                <div v-if="chosin_residence != null && chosin_residence.price !=0 && chosin_residence.price != '' && !isNaN(chosin_residence.price) ">
                    <span class="d-block"><span class="font-weight-bold"> السكن : </span> <span>{{chosin_residence.name_ar}}</span> </span>
                    <span class="text-main-color">{{chosin_residence.price*residence_weeks}} ر.س   <span class="h6 small text-success"> ({{residence_weeks + ( residence_weeks == 1 ? ' اسبوع ' : ' اسابيع  ')}}) </span> </span>
                    <hr />
                </div>
                <div v-if="residence_booking_fees !=0 && chosin_residence.price !=0 && chosin_residence.price != '' && !isNaN(chosin_residence.price) ">
                    <span class="d-block"><span class="font-weight-bold"> حجز السكن : </span> <span class="text-main-color">{{residence_booking_fees}} ر.س   </span></span>
                    
                    <hr />
                </div>
                <div v-if="residence_summer_increase_weeks !=0 && residence_summer_increase !=0">
                    <span class="d-block"><span class="font-weight-bold"> حجز خلال فترة الذروة: رسوم السكن : زيادة بقيمة  : <br> <span class="text-main-color">{{residence_summer_increase*residence_summer_increase_weeks}} ر.س   </span> <span class="text-success">({{residence_summer_increase_weeks + ( residence_summer_increase_weeks == 1 ? ' اسبوع ' : ' اسابيع  ')}})</span>   </span> </span>
                    <hr />
                </div>
                <div v-if="chosin_airport != null && !isNaN(chosin_airport.price) && chosin_airport.price !=0 && chosin_airport.price != ''">
                    <span class="d-block"><span class="font-weight-bold"> خدمة الاستقبال : </span> <span>{{chosin_airport.name_ar}}</span> </span>
                    <span class="text-main-color">{{chosin_airport.price}} ر.س </span>
                    <hr />
                </div>
                <div v-if="insurance_price_checker !=0">
                    <span class="d-block"><span class="font-weight-bold"> التامين الصحي : </span> <span class="text-main-color">{{insurance_price*weeks}} ر.س </span> </span>
                    
                    <hr />
                </div>
                <div>
                    <span class="d-block"><span class="font-weight-bold"> إجمالي السعر : </span> <span class="text-main-color">{{Math.round(total_price())}} ر.س </span> </span>
                    
                </div>
            </div>
        </div>
        <!-- ./Cost -->
        <!-- Reservation -->
        <div id="accordion" class="sticky-top pt-4">
            <div class="bg-white py-4 rounded-10">
                <div class="reservation-heading border-bottom pb-2 px-3">
                    <h5 class="font-weight-bold text-main-color">الحجز والتقديم</h5>
                </div>
                <div class="reservation-body px-3 pt-3">
                    <form :action="save_request_url" method="get" autocomplete="off">
                        <input type="hidden" name="_token" :value="csrf_token">
                        <input type="hidden" name="course_id" :value="course_id">
                        <label>تاريخ البداية</label>
                        <div class="input-group mb-0 border rounded-10 pl-3 pr-2 btn-light">
                            <input v-model="from_date"  name="from_date" autocomplete="off" type="text" :class="(from_date_error != '' ? 'is-invalid' : '') + ' datepicker-active-monday form-control border-0 bg-transparent' " data-toggle="datepicker" placeholder="تاريخ البداية">
                            <div class="input-group-append">
                                <span class="input-group-text border-0 bg-white p-0 bg-transparent" id="basic-addon2"><i class="far fa-calendar"></i></span>
                            </div>
                        </div>
                        <p class="h6 small text-danger">{{(from_date_error != '' ? from_date_error : '')}}</p>
                        
                        <div class="form-group">
                            <label>عدد اسابيع الدورة</label>
                            <select name="weeks" @change="get_price_per_week()" v-model="weeks" class="form-control rounded-10 border" data-live-search="true">
                                <option v-for="week_count in weeks_count" :value="week_count" :key="week_count"> {{week_count}} </option>
                            </select>
                        </div>

                        <div  v-if="residences[0]" class="form-group residence-box">
                            <label>السكن</label>
                            <select  v-model="chosin_residence" class="form-control selectpicker rounded-10 border" data-live-search="true">
                                <option :value="0" disabled>هل ترغب في السكن؟</option>
                                <option :value="0" selected>لا أحتاج إلى خدمة السكن </option>
                                <option v-for="residence in residences" :key="residence.id" :value="residence">{{residence.name_ar}} - {{residence.price}} (ر.س / الاسبوع)</option>
                            </select>
                            <input type="hidden" name="residence" :value="JSON.stringify(chosin_residence)">
                        </div>
                        <div v-if="chosin_residence != 0" class="form-group">
                            <label>عدد اسابيع السكن</label>
                            <select name="residence_weeks" v-model="residence_weeks" class="form-control rounded-10 border" data-live-search="true">
                                <option v-for="week_count in weeks_count" :value="week_count" :key="week_count"> {{week_count}} </option>
                            </select>
                        </div>
                        <div v-if="airports[0]" class="form-group">
                            <label>الاستقبال من المطار</label>
                            <select v-model="chosin_airport" class="form-control selectpicker rounded-10 border" data-live-search="true">
                                <option value="" disabled>الاستقبال من المطار</option>
                                <option selected :value="0"> لا احتاج خدمة الاستقبال</option>
                                <option v-bind:selected="airport.id == 3" v-for="airport in airports" :key="airport.id" :value="airport">{{airport.name_ar}} - {{airport.price}} ر.س</option>
                            </select>
                            <input type="hidden" name="airport" :value="JSON.stringify(chosin_airport)">
                        </div>
                        <div  v-if="insurance_price" class="row">
                            <div class="col-md-12"><label>هل تحتاج الي التامين الصحي</label> <br /></div>
                            <div class="col-md-6">
                                <div class="form-check form-check-inline mr-0 ml-4">
                                    <input v-model="insurance_price_checker"  name="insurance" type="radio" id="inlineCheckbox1" value="1" class="form-check-input mr-0 ml-3 bg-secondary" /> <label class="form-check-label">نعم ({{insurance_price*weeks}} ر.س)</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-check form-check-inline mr-0 ml-4">
                                    <input v-model="insurance_price_checker"  name="insurance" type="radio" id="inlineCheckbox1" value="0" class="form-check-input mr-0 ml-3 bg-secondary" /> <label class="form-check-label">لا</label>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Redirect to Confirm Reservation -->
                        <button class="btn rounded-10 bg-secondary-color text-white mb-2 w-100">حجز</button>
                    </form>
                </div>
            </div>
            <button @click="goToRelatedCourse()" id="related-courses" class="d-lg-none d-block btn rounded-10 btn-primary text-white mb-2 w-100 mt-5">خيارات الكورسات المتوفرة</button>
        </div>
        
        <!-- ./Reservation -->
    </div>
</template>

<script>
    export default {
        props: ["csrf_token" , "old" , "insurance" , "from_date_error" , "save_request_url" , "course_obj", "course_id", "course_for_institute_page_url", "get_course_price_url", "residence_obj", "airport_obj"],
        data() {
            return {
                course: JSON.parse(this.course_obj),
                residences: JSON.parse(this.residence_obj),
                airports: JSON.parse(this.airport_obj),
                chosin_residence: 0,
                chosin_airport: 0,
                insurance_price: this.insurance.price,
                insurance_price_checker: 0,
                weeks: 1,
                residence_weeks: 1,
                price_per_week: 0,
                weeks_count: 48,
                from_date: '',
                course_booking_fees: (JSON.parse(this.course_obj).institute.course_booking_fees == null ? 0 : JSON.parse(JSON.parse(this.course_obj).institute.course_booking_fees).price_in_sar) ,
                residence_booking_fees: (JSON.parse(this.course_obj).institute.residence_booking_fees == null ? 0 : JSON.parse(JSON.parse(this.course_obj).institute.residence_booking_fees).price_in_sar) ,
                course_textboox_fees: 0,
                course_summer_increase_weeks :0,
                course_summer_increase: (JSON.parse(this.course_obj).course_summer_increase == null ? 0 : JSON.parse(JSON.parse(this.course_obj).course_summer_increase).price_in_sar) ,
                residence_summer_increase_weeks :0,
                residence_summer_increase: 0 ,

            };
        },
        methods: {
            get_price_per_week() {
                axios
                    .get(this.get_course_price_url, {
                        params: { course_id: this.course_id, weeks: this.weeks },
                    })
                    .then((response) => (this.price_per_week = response.data.price_per_week));
            },
            total_price() {
                var totalPrice = (this.price_per_week*(1- this.course.discount))*this.weeks
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
                    totalPrice += Number(this.course_summer_increase*this.course_summer_increase_weeks)
                }
                if(this.residence_summer_increase_weeks !=0 && this.residence_summer_increase !=0){
                    totalPrice += Number(this.residence_summer_increase*this.residence_summer_increase_weeks)
                }
               return totalPrice
            },
            change_from_date(){
                this.from_date = $('.datepicker-active-monday').val() 
            },
            goToRelatedCourse(){
                $('html, body').animate({ scrollTop: $("#related-courses").offset().top -100}, 500);
            },
            calculate_summer_increase_weeks(weeks){
                let summer_increase_weeks = 0
                let currentYear = new Date().getFullYear()

                let start_date = Date.parse(this.from_date)
                let end_date = start_date + weeks*7*24*60*60*1000
                let summer_start_date = Date.parse(currentYear+'-'+this.course.institute.summer_start_date)
                let summer_end_date = Date.parse(currentYear+'-'+this.course.institute.summer_end_date)

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
                let textbooxFeesObj = JSON.parse(this.course.textbooks_fees);
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
            },
            residence_weeks: function (){
                this.residence_summer_increase_weeks = this.calculate_summer_increase_weeks(this.residence_weeks)
            },
            from_date: function (){
                this.course_summer_increase_weeks = this.calculate_summer_increase_weeks(this.weeks)
                this.residence_summer_increase_weeks = this.calculate_summer_increase_weeks(this.residence_weeks)
            },
            chosin_residence: function (){
                this.residence_summer_increase = (this.chosin_residence == null ? 0 : JSON.parse(this.chosin_residence.residence_summer_increase).price_in_sar)
            }
        },
        beforeMount() {
            let queryString = window.location.search;
            let savedParams = new URLSearchParams(queryString);
            let saved_weeks = savedParams.get('weeks')
            let saved_from_date = savedParams.get('from_date')
            let saved_residence = savedParams.get('residence')
            let saved_residence_weeks = savedParams.get('residence_weeks')
            let saved_airport = savedParams.get('airport')
            let saved_insurance = savedParams.get('insurance')

            if(this.old.length != 0){
                saved_weeks = this.old.weeks
                saved_from_date = this.old.from_date
                saved_residence = this.old.residence
                saved_residence_weeks = this.old.residence_weeks
                saved_airport = this.old.airport
                saved_insurance = this.old.insurance
            }
            
            if (saved_weeks != undefined) {
                this.weeks = saved_weeks;
            }
            if(saved_from_date != undefined){
                this.from_date = saved_from_date;
            }
            if(saved_residence != undefined){
                this.chosin_residence = JSON.parse(saved_residence);
            }
            if(saved_residence_weeks != undefined){
                this.residence_weeks = saved_residence_weeks;
            }
            if(saved_airport != undefined){
                this.chosin_airport = JSON.parse(saved_airport);
            }
            if(saved_insurance != undefined){
                this.insurance_price_checker = saved_insurance;
            }



            this.chose_course_textboox_fees()


            

            this.get_price_per_week();

            window.setInterval(() => {
                this.change_from_date()
            }, 500)
           
        },
    };
</script>

