<template>
    <div style="display:inline">
        <select v-model="country_id" @change="get_cities" ref="test3" name="">
            <option hidden value="">الدولة</option>
            <option value="">برجاء اختيار المدينة</option>
            <option v-for="country in countries" :key="country.id" :value="country.id">{{country.name}}</option>
        </select>
    </div>
</template>

<script>
    export default {
        props:[
                'get_countries_url',
                'get_cities_url',
            ],
        data() {
            return {
                countries: {},
                country_id: '',
            };
        },
        methods: {
            get_countries(){
                axios.get(this.get_countries_url).then((response) => (this.countries = response.data));
            },
            get_cities(){
                console.log(this.$root.$refs.cities_ref.get_cities(this.country_id))
            }
        },
        beforeMount() {
            this.get_countries()
        },
        
    };
</script>
