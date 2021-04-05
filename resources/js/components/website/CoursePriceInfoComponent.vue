<template>
    <div style="display: inline;">
        <!-- Cost -->
        <div class="bg-white py-4 rounded-10 mb-4">
            <div class="cost-heading border-bottom pb-2 px-3">
                <h5 class="font-weight-bold text-main-color">التكاليف</h5>
            </div>
            <div class="cost-body px-3 pt-3">
                <div>
                    <span class="font-weight-bold d-block">
                        اللغة الإنجليزية العامة :
                        <span class="float-left bg-main-color p-2 round text-white rounded-10">%{{Math.round(course.discount*100)}} -</span>
                    </span>
                    <span class="text-main-color"><del class="text-danger ml-2"> {{price_per_week}} </del> {{Math.round(price_per_week*(1- course.discount))}} ريال سعودي / الاسبوع</span>
                    <hr />
                </div>
                <div>
                    <span class="font-weight-bold d-block"> سعر الدورة : </span>
                    <span class="text-main-color"> {{Math.round(price_per_week*weeks*(1- course.discount))}} ريال سعودي</span>
                    <hr />
                </div>
                <div v-if="chosin_residence.price !=0 && chosin_residence.price != '' && !isNaN(chosin_residence.price) ">
                    <span class="d-block"><span class="font-weight-bold"> السكن : </span> <span>{{chosin_residence.name_ar}}</span> </span>
                    <span class="text-main-color">{{chosin_residence.price*weeks}} ريال سعودي </span>
                    <hr />
                </div>
                <div v-if="chosin_airport.price !=0 && chosin_airport.price != '' && !isNaN(chosin_airport.price) ">
                    <span class="d-block"><span class="font-weight-bold"> خدمة الاستقبال : </span> <span>{{chosin_airport.name_ar}}</span> </span>
                    <span class="text-main-color">{{chosin_airport.price}} ريال سعودي </span>
                    <hr />
                </div>
                <div v-if="insurance_price_checker !=0">
                    <span class="d-block"><span class="font-weight-bold"> التامين الصحي : </span> </span>
                    <span class="text-main-color">{{insurance_price*weeks}} ريال سعودي </span>
                    <hr />
                </div>
                <div>
                    <span class="d-block"><span class="font-weight-bold"> اجمالي السعر : </span> </span>
                    <span class="text-main-color">{{Math.round(total_price())}} ريال سعودي </span>
                </div>
            </div>
        </div>
        <!-- ./Cost -->
        <!-- Reservation -->
        <div class="bg-white py-4 rounded-10">
            <div class="reservation-heading border-bottom pb-2 px-3">
                <h5 class="font-weight-bold text-main-color">الحجز والتقديم</h5>
            </div>
            <div class="reservation-body px-3 pt-3">
                <form :action="save_request_url" method="get">
                    <input type="hidden" name="_token" :value="csrf_token">
                    <input type="hidden" name="course_id" :value="course_id">
                    <div class="input-group mb-3 border rounded-10 pl-3 pr-2 btn-light">
                        <input readonly="readonly" name="started_date" autocomplete="off" type="text" class="datepicker form-control border-0 bg-transparent" data-toggle="datepicker" placeholder="تاريخ البداية">
                        <div class="input-group-append">
                            <span class="input-group-text border-0 bg-white p-0 bg-transparent" id="basic-addon2"><i class="far fa-calendar"></i></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <select name="weeks" @change="get_price_per_week() ; get_insurance_price()" v-model="weeks" class="form-control selectpicker rounded-10 border" data-live-search="true">
                            <option value="">عدد الاسابيع</option>
                            <option v-for="week_count in weeks_count" :value="week_count" :key="week_count"> {{week_count}} </option>
                        </select>
                    </div>
                    <div class="form-group">
                        <select v-model="chosin_residence" class="form-control selectpicker rounded-10 border" data-live-search="true">
                            <option :value="0" disabled>هل ترغب في السكن؟</option>
                            <option :value="0" selected>لا احتاج خدمة سكن</option>
                            <option v-for="residence in residences" :key="residence.id" :value="residence">{{residence.name_ar}} - {{residence.price}}</option>
                        </select>
                        <input type="hidden" name="residence" :value="JSON.stringify(chosin_residence)">
                    </div>
                    <div class="form-group">
                        <select v-model="chosin_airport" class="form-control selectpicker rounded-10 border" data-live-search="true">
                            <option value="" disabled>الاستقبال من المطار</option>
                            <option selected :value="0"> لا احتاج خدمة الاستقبال</option>
                            <option v-for="airport in airports" :key="airport.id" :value="airport">{{airport.name_ar}} - {{airport.price}}</option>
                        </select>
                        <input type="hidden" name="airport" :value="JSON.stringify(chosin_airport)">
                    </div>
                    <div class="row">
                        <div class="col-md-12"><label>هل تحتاج الي التامين الصحي</label> <br /></div>
                        <div class="col-md-6">
                            <div class="form-check form-check-inline mr-0 ml-4">
                                <input v-model="insurance_price_checker"  name="insurance" type="radio" id="inlineCheckbox1" value="1" class="form-check-input mr-0 ml-3 bg-secondary" /> <label class="form-check-label">نعم ({{insurance_price*weeks}} ريال)</label>
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
        <!-- ./Reservation -->
    </div>
</template>

<script>
    export default {
        props: ["csrf_token" , "save_request_url" , "course_obj", "course_id", "course_for_institute_page_url", "get_course_price_url", "residence_obj", "airport_obj", "get_insurance_price_url"],
        data() {
            return {
                course: JSON.parse(this.course_obj),
                residences: JSON.parse(this.residence_obj),
                airports: JSON.parse(this.airport_obj),
                chosin_residence: 0,
                chosin_airport: 0,
                insurance_price: 0,
                insurance_price_checker: 0,
                weeks: 1,
                price_per_week: 0,
                weeks_count: 100,
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
            get_insurance_price() {
                axios
                    .get(this.get_insurance_price_url, {
                        params: { course_id: this.course_id, weeks: this.weeks },
                    })
                    .then((response) => (this.insurance_price = response.data.insurance_price));
            },
            total_price() {
                var totalPrice = (this.insurance_price + this.price_per_week*(1- this.course.discount))*this.weeks
                if(!isNaN(this.chosin_airport.price)){
                    totalPrice += this.chosin_airport.price
                }
                if(!isNaN(this.chosin_residence.price)){
                    totalPrice += this.chosin_residence.price*this.weeks
                }
               return totalPrice
            },
        },
        beforeMount() {
            this.get_price_per_week();
            this.get_insurance_price();
        },
    };
</script>
