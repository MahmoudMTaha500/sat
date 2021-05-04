<template>


  <div>

                <div class="form-group">
                <label for="projectinput2">الدولة</label>
                        <select v-model="selected" v-on:change="getcities()" id="country" class=" form-control text-left" name="country_id">
                        <option value="">حدد الدولة</option>
                        <option v-for="country in countries" :key="country.id" :value="country.id"> {{country.name_ar}} </option>
                        </select>
                </div>
                <div class="form-group">
                <label for="projectinput2">المدينة</label>
                        <select v-model="citySelectForUpdate" id="city" class="select2 form-control vue-app" name="city_id">
                        <option value="">حدد المدينة</option>
                        <option v-for="city in cities" :key="city.id" :value="city.id"> {{city.name_ar}}</option>
                        </select>
                </div>

  </div>




        
      
</template>

<script>
    export default {
        props: ["countries_from_blade", "dahsboard_url", "country_id2", "city_id"],
        data() {
            return {
                selected: "",
                selected_city: "",
                countries: this.countries_from_blade,
                cities: {},
                newCity: "",
                citySelectForUpdate: "",
            };
        },
        methods: {
            getcities: function () {
                var country_id = this.selected;
                axios
                    .get(this.dahsboard_url + "/getcities", {
                        params: {
                            countryID: country_id,
                        },
                    })
                    .then((response) => (this.cities = response.data.cities));
            },
            get_id_for_cities: function () {
                return this.selected_city;
            },

            addCity: function () {
                var country_id = this.get_id_for_cities();
                var city = this.newCity;
                if (city && country_id) {
                    axios.post(this.dahsboard_url + "/addCity", { name_ar: city, country_id: country_id }, { headers: { "X-CSRFToken": "{{ csrf_token }}" } }).then((response) => {
                        console.log(response.data.city);
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
            returnCountryCity: function () {
                if (this.country_id2) {
                    this.selected = this.country_id2;
                    this.citySelectForUpdate = this.city_id;
                    this.getcities();
                } else {
                }
            },
        },
        beforeMount() {
            this.returnCountryCity();
        },
    };
</script>
