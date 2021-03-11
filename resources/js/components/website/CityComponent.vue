<template>
    <div style="display:inline">
        <select :class="ele_class" ref = "city_id_ref">
            <option hidden value="">المدينة</option>
            <option value="all">كل المدن</option>
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
            };
        },
        methods: {
            get_cities(country_id){
               axios.get(this.get_cities_url , {params: { country_id: country_id,}}).then((response) => (this.cities = response.data));
            }
        },
        beforeMount() {
        },
    };
</script>
