<template>
          
            <div class="row">
                <div id="recent-transactions" class="col-12">
                  <div class="card">
                    <div class="card-header">
                      <h4 class="card-title"> كل التقييمات (15)</h4>
                      <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                      <div class="heading-elements">
                        
                      </div>
                    </div>
                    <div class="card-content">
                      <div class="table-responsive">
                        <table id="recent-orders" class="table table-hover table-xl mb-0">
                          <thead>
                            <tr>
                              <th class="border-top-0"> #</th>
                              <th class="border-top-0">اسم الطالب</th>
                              <th class="border-top-0">اسم المعهد</th>
                              <th class="border-top-0">التقييم</th>
                              <th class="border-top-0">حذف</th>
                            </tr>
                          </thead>
                          <tbody>
                            
                            <tr v-for="rate in rates" :key="rate.id">
                              <td class="text-truncate">{{rate.id}}</td>
                              <td class="text-truncate">{{rate.student.name}}</td>
                              <td class="text-truncate">{{rate.institute.name_ar}}</td>
                              <td class="text-truncate"   >
                                <rate :length="5"     :value="rate.rate"  disabled  :readonly="true"   @before-rate="getid(rate.id)"  @after-rate="onAfterRate"  />
                              </td>
                              <td class="text-truncate">
                                <a href="#"><button type="button" class="btn btn-sm btn-outline-danger round">حذف</button></a>
                              </td>
                            </tr>
                            
                           
                            
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
          
           
               
                
</template>


<script>
export default {
    props:['get_rate_url','update_rate_url'],
    data(){
        return{
        rates:'',
        RateID: ''
        };
    },
    methods:{
        getrates:function(){
            axios.get(this.get_rate_url).then((response)=>this.rates =response.data.rates  );
        },
        getid:function(id){
                   return   this.RateID=id;    
        }, 
    onAfterRate (rate) {
axios.post(this.update_rate_url , {'rate_id':this.RateID,'rate':rate},{headers:{"X-CSRFToken":"{{csrf_token()}}"}})
.then((response)=>{

})
    }
    },
    beforeMount(){
        this.getrates();
    }
}
</script>