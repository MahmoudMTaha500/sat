<template>
    <div style="display:inline">
        <select  v-model="country_id" @change="get_cities" ref = "country_id_ref" :class="ele_class">
            <option hidden value="">الدولة</option>
            <option value="all">كل الدول</option>
            <option v-for="country in countries" :key="country.id" :value="country.id">{{country.name}}</option>
            <option v-if="option_null" value="">اخرى</option>
        </select>
    </div>
</template>

<script>
    export default {
        props:[
                'get_countries_url',
                'option_null',
                'ele_class',
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
                console.log(this.$parent.$refs.cities_component_ref.get_cities(this.country_id))
            }
        },
        beforeMount() {
            this.get_countries()
        },
        
    };
</script>
