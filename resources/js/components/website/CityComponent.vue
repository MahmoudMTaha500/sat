<template>
    <div style="display:inline">
        <select name="city" v-model="city_id" :class="ele_class" ref = "city_id_ref">
            <option hidden value="">المدينة</option>
            <option value="">كل المدن</option>
            <option v-for="city in cities" :key="city.id" :value="city.id">{{city.name}}</option>
            <option v-if="cities.length != null && cities.length != 0 && option_null" value=""> اخرى</option>
        </select>
    </div>
</template>

<script>
    export default {
        props:['get_cities_url' , 'option_null' , 'ele_class'],
        data() {
            return {
                cities: {},
                city_id: "",
            };
        },
        methods: {
            get_cities(country_id){
               axios.get(this.get_cities_url , {params: { country_id: country_id,}}).then((response) => (this.cities = response.data));
            }
        },
        beforeMount() {
            
            const queryString = window.location.search;
            const urlParams = new URLSearchParams(queryString);
            const country_id_url = urlParams.get('country');
            const city_id_url = urlParams.get('city');
            if(country_id_url != null){
                this.get_cities(country_id_url);
            }
            if(city_id_url != null){
                this.city_id = city_id_url
            }
            
            
        },
    };
</script>
