<template>
  <div class="modal fade" id="create-new-city" tabindex="-1" role="dialog" aria-labelledby="create-new-city-modal" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                            <h5 class="modal-title" id="create-new-city-modal">انشاء مدينة جديدة</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="row">
                                                                    <div class="col-12">
                                                                        <div class="form-group">
                                                                            <label>اختر الدولة</label>
                                                                            <select class=" form-control text-left" > 
                                                                                <option  v-for="country in countries"  :key="country.id"  :value="country.id"> {{country.name_ar}} </option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-12">
                                                                        <div class="form-group">
                                                                            <label>المدينة</label>
                                                                            <input class="form-control" type="text" placeholder="ادخل اسم المدينة">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                            <button type="button" class="btn btn-success w-100">انشاء</button>
                                                           
                                                            </div>
                                                        </div>
                                                        </div>
                                                    </div>
   
</template>

<script>
export default  {
data() {
    return {
        countries :{},
    }
},

methods: {
    getCountry(){
        axios.get("country").then( response => this.countries = response.data.country);
return this.countries;
         }
},
created() {

  this.getCountry()  
//   console.log(this.getCountry());
  },

}

                
</script>