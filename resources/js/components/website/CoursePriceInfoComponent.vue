<template>
    <div style="display:inline">
         <!-- Cost -->
                <div class="bg-white py-4 rounded-10 mb-4">
                    <div class="cost-heading border-bottom pb-2 px-3">
                        <h5 class="font-weight-bold text-main-color">التكاليف</h5>
                    </div>
                    <div class="cost-body px-3 pt-3">
                        <p class="text-dark"><span class="font-weight-bold">اللغة الإنجليزية العامة : </span> ٤٦
                            دولار أمريكي</p>
                        <p class="text-dark"><span class="font-weight-bold">تأمين الطلاب (في الأسبوع) : </span> ٤٦
                            دولار أمريكي</p>
                        <p class="text-dark"><span class="font-weight-bold">رسوم التسجيل : </span> ٤٦ دولار أمريكي
                        </p>
                        <p class="text-main-color"><span class="font-weight-bold">إجمالي تكاليف الحجز : </span> ٤٦
                            دولار أمريكي</p>
                    </div>
                </div>
                <!-- ./Cost -->
                <!-- Reservation -->
                <div class="bg-white py-4 rounded-10">
                    <div class="reservation-heading border-bottom pb-2 px-3">
                        <h5 class="font-weight-bold text-main-color">الحجز والتقديم</h5>
                    </div>
                    <div class="reservation-body px-3 pt-3">
                        <form action="">
                            <div class="input-group mb-3 border rounded-10 pl-3 pr-2 btn-light">
                                <input type="text" class="form-control border-0 bg-transparent datepicker"
                                    data-toggle="datepicker" disabled placeholder="تاريخ البداية"
                                    value="03/02/2021">
                                <div class="input-group-append ">
                                    <span class="input-group-text border-0 bg-white p-0 bg-transparent"
                                        id="basic-addon2"><i class="far fa-calendar"></i></span>
                                </div>
                            </div>
                            <div class="form-group">

                                <select @change="change_price_per_week()" v-model="weeks" class="form-control selectpicker rounded-10 border" data-live-search="true">
                                    <option value="">عدد الاسابيع</option>
                                    <option value="1"> 1 </option>
                                    <option value="2"> 2 </option>
                                    <option value="3"> 3 </option>
                                    <option value="4"> 4 </option>
                                    <option value="5"> 5 </option>
                                </select>
                            </div>
                            <div class="form-group">

                                <select class="form-control selectpicker rounded-10 border" data-live-search="true">
                                    <option value="" disabled>هل ترغب في السكن؟</option>
                                    <option selected>لا احتاج خدمة سكن</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                </select>
                            </div>
                            <div class="form-group">

                                <select class="form-control selectpicker rounded-10 border" data-live-search="true">
                                    <option value="" disabled>المستوي</option>
                                    <option selected> الاستقبال في مطار هيثرو - 240 دولار امريكي</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                </select>
                            </div>
                            <div class="form-group">

                                <select class="form-control selectpicker rounded-10 border" data-live-search="true">
                                    <option value="" disabled>التأمين الصحي</option>
                                    <option selected> لا احتاج لخدمة التأمين الصحي</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                </select>
                            </div>
                            <!-- Redirect to Confirm Reservation -->
                            <a href="confirm-reservation.html" class="btn rounded-10 bg-secondary-color text-white mb-2 w-100">حجز</a>
                            <!-- Remove Comment  -->
                            <!-- <button type="submit"
                                class="btn rounded-10 bg-secondary-color text-white mb-2 w-100">حجز</button> -->
                        </form>
                    </div>
                </div>
                <!-- ./Reservation -->
                <button @click="get_course">click</button>
    </div>
</template>

<script>
    export default {
        props:['course_id' , 'course_for_institute_page_url'],
        data() {
            return {
                weeks: 1,
                price_per_week:''
            };
        },
        methods: {
            change_price_per_week(){
                if(this.weeks == 1){
                    this.price_per_week = this.course.coursesPricePerWeek
                    alert(this.weeks)
                }
            }
        },
        beforeMount() {
           this.change_price_per_week()
        },
        
    };
</script>
