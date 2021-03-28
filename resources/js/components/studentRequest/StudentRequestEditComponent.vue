<template>


    <div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="projectinput1"> عدد الاسابيع </label>
                <input type="number"  v-model="weeks" id="projectinput1" min="1" class="form-control"   @change=" get_courses_price()" placeholder="ادخل  عدد الاسابيع" name="weeks"  required />
            </div> 
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="projectinput1"> سعر الاسبوع الواحد </label>

                <input type="number" id="projectinput1" min="1" disabled class="form-control" placeholder="   سعر الاسبوع الواحد" name="price_per_week" v-model="price_per_week" required />
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="projectinput2"> السكن </label>
                <select v-model="residenece_model" class="form-control text-left"  name="residence" required>
                    <option value="0">لا اريد سكن </option>
                    <option v-for="  obj in residence_obj1" :key="obj.id" :value="obj.price">{{obj.price}} دينار -  {{ obj.name_ar}}  </option>
                </select>
            </div>
        </div>
 <div class="col-md-6">
            <div class="form-group">
                <label for="projectinput2"> المطارات </label>
                <select   v-model="airport_model" class="form-control text-left"     name="airport" required>
                    <option value="0">لا اريد مطار </option>

                    <option v-for="  obj in airport_obj2" :key="obj.id" :value="obj.price">  {{obj.price}} دينار -  {{ obj.name_ar}} </option>
                </select>
            </div>
        </div>
            
    </div>
        <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="projectinput4">  اريد تامين</label>
                <input type="checkbox"  v-model="insurance" id="switchery" class="switchery"  @change="get_insuranec_price()" :value="insurance_val"  name="insurance_id" />
            </div>
        </div>
    </div>
    <div class="row">
       

        <div class="col-md-6">
            <div class="form-group">
                <label for="projectinput2"> الاجمالي </label>
                <input type="number"    v-model="total_price_all"  min="1" disabled class="form-control" placeholder="   " name="total_price" />
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="projectinput2"> احسب الاجمالي </label> <br> 
                <a    @click="getPrice()"  class="btn btn-primary"  > احسب الاجمالي  </a>
            </div>
        </div>
    </div>


</div>

</template>

<script>
    import ClassicEditor from '@ckeditor/ckeditor5-build-classic';
    export default {
        props: ["student_requests_url", "dahsboard_url",'request_student2','residence_obj','airport_obj2','courses_price'],
        data() {
            return {
                studentsRequests: {},
                url: this.student_request_url,
                name_ar: "",
                request_id: 0,
                request_student:this.request_student2,
                residence_obj1:this.residence_obj,
                residenece_model:0,
                airport_model:0,
                weeks:this.request_student2.weeks,
                id:this.request_student2.id,
                total_price:0,
                total_price_all: this.request_student2.total_price,
                insurance :'',
                insurance_val :0,
                institute_id:this.request_student2.course.institute_id,
                total_insurance:0,
                price_per_week: this.request_student2.price_per_week ,
                discount:this.request_student2.course.discount,

            };
        },
        methods: {
            get_courses_price: function () {
                axios.get(this.student_requests_url+'/getprice' , {params:{'weeks':this.weeks ,'id':this.id}  }).then((response) => (this.total_price_all = response.data.total_price));
            },
            get_insuranec_price: function () {
                axios.get(this.student_requests_url+'/getinsurance' , {params:{ 'weeks':this.weeks ,'id':this.institute_id}  }).then((response) => (this.total_insurance = response.data.total_price));
            },
            getrequest_id: function (id) {
                return (this.request_id = id);
            },
            getPrice: function(){


        this.get_courses_price();
        // if(this.discount){
        // var disc = this.total_price_all  * this.discount;
        // this.total_price_all  = this.total_price_all  - disc;
        // // alert( this.total_price_all);
        // }   
        //  this.total_price_all =  this.total_price_all * this.weeks;
       

                axios.get(this.student_requests_url+'/calc_total' , {params:{'price_weeks':this.total_price_all ,
                "residenece":this.residenece_model,
                "airport":this.airport_model,
                "insurance":this.total_insurance,
                "discount":this.discount,
                'id':this.id}  }).then((response) => (this.total_price_all2 = response.data.total_price));
     



//           this.total_price_all =   parseInt(this.total_price_all );
//         if(this.residenece_model){  
//              this.total_price_all +=  parseInt(this.residenece_model);
//               }
//   if(this.airport_model){
//        this.total_price_all +=    parseInt(this.airport_model);

//         }
//                  alert( this.total_price_all);
// die()
      

//        if(this.insurance ){
//                 axios.get(this.student_requests_url+'/getinsurance' , {params:{ 'weeks':this.weeks ,'id':this.institute_id}  })
//                 .then((response) => {
//                     this.total_insurance = response.data.total_price;
//                    var priceInsurance =this.total_insurance;
//             this.total_price_all +=    priceInsurance  ;
                
//                 });
//        } 
//   alert( this.total_price_all);

            }

           
        },
        beforeMount() {
        },
    };
</script>
