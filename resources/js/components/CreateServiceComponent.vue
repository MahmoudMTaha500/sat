<template>
    <div class="col-12">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="projectinput2">الدولة</label>
                    <select v-model="country_id" v-on:change="get_institutes();" id="country" class="form-control text-left" name="country_id">
                        <option value="">حدد الدولة</option>
                        <option v-for="country in countries" :key="country.id" :value="country.id"> {{country.name_ar}} </option>
                    </select>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="projectinput2">المعهد</label>
                    <select v-model="institute_id" class="form-control text-left" name="institute_id">
                        <option value="">حدد المعهد</option>
                        <option v-for="institute in institutes" :key="institute.id" :value="institute.id"> {{institute.name_ar + ' | ' + institute.city.name_ar}} </option>
                    </select>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ["countries_from_blade", "get_institutes_url",'old_country_id','old_institute_id'],
        data() {
            return {
                country_id: this.old_country_id,
                countries: this.countries_from_blade,
                institute_id: this.old_institute_id ,
                institutes: {},
            };
        },
        methods: {
            get_institutes() {
                axios
                    .get(this.get_institutes_url, {
                        params: {
                            country_id: this.country_id,
                            city_id: this.city_id,
                        },
                    })
                    .then((response) => (this.institutes = response.data));
            },
        },
        beforeMount() {
            this.get_institutes();
        },
    };
</script>
