<template>
    <div class="col-md-9">
        <!-- Search Field -->
        <input v-model="search" @keyup="get_suggestions_search() ; toggle_result_box()" id="searchform" name="keyword" type="search" autocomplete="off" class="form-control rounded-10 mb-2 ml-sm-2 w-100 btn-light" placeholder="ادخل اسم المعهد " />
        <!-- ./Search Field -->
        <div v-if="toggle_result_box_checker" class="search-field-box">
            <span class="item" v-for="institute in institute_search" :key="institute.id" :value="institute.name_ar" @click="appendvalue(institute.name_ar)"> {{institute.name_ar}}</span>
        </div>
    </div>
</template>
<script>
    export default {
        props: ["public_path"],
        data() {
            return {
                search: "",
                toggle_result_box_checker : false,
                institute_search: {},
            };
        },
        methods: {
            get_suggestions_search: function () {
                if (this.search.length >= 1) {
                    axios.get(this.public_path + "/api/search-form-institute", { params: { search: this.search } }).then((response) => (this.institute_search = response.data.institutes));
                }
            },
            appendvalue: function (val) {
                this.search = val;
                this.institute_search = {};
                this.toggle_result_box_checker = false;
            },
            toggle_result_box: function () {
                if (this.search.length == 0) {
                    this.toggle_result_box_checker = false;
                    this.institute_search = {}
                }else if(this.institute_search[0] == undefined){
                    this.toggle_result_box_checker = false;
                }else{
                    this.toggle_result_box_checker = true
                }
            }
        },
    };
</script>
