<template>
     <div class="col-md-9">
                        <!-- Search Field -->
                        <input   v-model="search"  @keyup="get_suggestions_search()" id='searchform' name="keyword"  type="text" class="form-control rounded-10 mb-2 ml-sm-2 w-100 btn-light" placeholder="ادخل اسم المعهد او المدينة او الدولة او الدورة لبدء البحث" />
                        <!-- ./Search Field -->
                         <div v-if='institute_search' style="background:#fff">
                      <option   v-for='institute in institute_search' :key="institute.id" :value="institute.name_ar" @click='appendvalue(institute.name_ar)'> {{institute.name_ar}}</option>
                         </div>
        </div>
       

</template>
<script>
export default {
  props:['public_path'],
    data(){
     return{
         search:'',
         institute_search:{},

     }   
    },
    methods:{
        get_suggestions_search: function (){
              if(this.search.length >= 2){
            // alert(this.search);
            axios.get(this.public_path+'/api/search-form-institute',{params:{search:this.search }}).then( ( response) =>(this.institute_search=response.data.institutes))

        }
        },
        appendvalue:function(val){
            this.search = val;
            this.institute_search={};
        }

    }

}
</script>
