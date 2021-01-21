<template>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="country">  الدولة</label>
                <select v-model="selected" v-on:change="getcities()"         id="country" class="form-control text-left" name="country_id" required>
                    <option value="">حدد الدولة</option>
                    <option v-for="country in countries" :key="country.id" :value="country.id"     > {{country.name_ar}} </option>
                </select>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="city">المدينة </label>
                <div class="d-flex input-group">
                    <span class="input-group-append w-100" id="button-addon2">
                        <!-- select2 -->
                        <select v-model="citySelectForUpdate" id="city"  class=" select2 form-control vue-app" name="city_id" required>
                            <option value="" >حدد المدينة</option>
                            <option v-for="city in cities" :key="city.id" :value="city.id"> {{city.name_ar}}</option>
                        </select>
                        <button type="button" data-toggle="modal" data-target="#create-new-city" class="btn btn-success btn-sm">
                            <i class="ft-plus"></i>
                        </button>
                    </span>
                </div>

                <!-- Create New City Form -->
                <div class="modal fade myModal" id="create-new-city" role="dialog" aria-labelledby="create-new-city-modal" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <form action="">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="create-new-city-modal">
                                        انشاء مدينة جديدة
                                    </h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label>اختر الدولة</label>
                                                <select v-model="selected_city" v-on:change="get_id_for_cities()" class="form-control text-left">
                                                    <option value="">حدد الدولة</option>
                                                    <option v-for="country in countries" :key="country.id" :value="country.id"> {{country.name_ar}} </option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label>المدينة</label>
                                                <input class="form-control" type="text" placeholder="ادخل اسم المدينة" v-model="newCity" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-success w-100" data-dismiss="modal" aria-label="Close" @click="addCity()">
                                        انشاء
                                    </button>
                                    <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button> -->
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['countries_from_blade' , 'dahsboard_url','country_id2','city_id'],
        data() {
            return {
                selected: "",
                selected_city: "",
                countries: this.countries_from_blade,
                cities: {},
                newCity: "",
                citySelectForUpdate:'',
               
            };
        },
        methods: {
            getcities: function () {
                var country_id = this.selected;
                //  alert( country_id);
                axios
                    .get(this.dahsboard_url+"/getcities", {
                        params: {
                            countryID: country_id,
                        },
                    })
                    .then((response) => (this.cities = response.data.cities));
            },
            get_id_for_cities: function () {
                return this.selected_city;

                //  axios.get("getcities" , {
                //      params:{
                //          countryID: country_id
                //      }
                //  }
                //  ).then(response => this.cities = response.data.cities)
            },

            addCity: function () {
                var country_id = this.get_id_for_cities();
                var city = this.newCity;
                if (city && country_id) {
                    axios.post(this.dahsboard_url+"/addCity", { name_ar: city, country_id: country_id }, { headers: { "X-CSRFToken": "{{ csrf_token }}" } }).then((response) => {
                        console.log(response.data.city);
                        // $('#success').html(response.data.message)
                        alert(response.data.success);
                        this.getcities();
                        this.resetForm();
                    });
                } else {
                    alert("برجاء اكمل البيانات ");
                }
            },
            resetForm: function () {
                this.newCity = "";
                this.selected_city = "";
            },
          returnCountryCity: function(){
              if(this.country_id2){
                  this.selected = this.country_id2; 
                   this.citySelectForUpdate = this.city_id;
                    this.getcities();

              }else{

              }
             
          }
        },
        beforeMount(){
       this.returnCountryCity();
        },
    };
</script>
