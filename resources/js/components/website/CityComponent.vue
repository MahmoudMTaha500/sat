<template>
    <div style="display:inline">
        <select name="">
            <option hidden value="">المدينة</option>
            <option value="">برجاء اختيار المدينة</option>
            <option v-for="city in cities" :key="city.id" :value="city.id">{{city.name}}</option>
        </select>
    </div>
</template>

<script>
    export default {
        props:['get_cities_url'],
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
