<template>
          
            <div class="row">
                <div id="recent-transactions" class="col-12">
                  <div class="card">
                    <div class="card-header">
                      <h4 class="card-title"> كل المطارات ({{airports.total }})</h4>
                      <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                      <div class="heading-elements">
                        <ul class="list-inline mb-0">
                    <li >
                                <button data-toggle="modal" data-target="#exampleModalCenter" class="btn btn-sm btn-info box-shadow-2 round btn-min-width pull-right"><i class="ft-filter ft-md"></i> فلتر</button>
                            </li>
                         <li  v-if="create" >
                                <a   class="btn btn-sm btn-success box-shadow-2 round btn-min-width pull-right" :href="dahsboard_url+'/airports/create'"> <i class="ft-plus ft-md"></i> اضافة مطار جديد</a>
                            </li>
                        </ul> 


      <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLongTitle">البحث في المطارات</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        
                                             <div class="form-group">
                                                <label for="projectinput1">المعهد</label>
                                                <select v-model="selected_institute" id="" class="form-control" name="institute_id" >
                                                <option  selected >حدد المعهد</option>
                                                <option v-for="institute in institutes" :key="institute.id" :value="institute.id"> {{institute.name_ar}} </option>
                                                </select>
                                                </div>
                                        <div class="form-group">
                                            <label for="projectinput1">البحث بكلمات مفتاحية</label>
                                            <input v-model="name_ar" type="text" id="projectinput1" class="form-control" placeholder="ادخل كلمة مفتاحية" name="name_ar" />
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-primary w-100" @click="filterAirports()" data-dismiss="modal" aria-label="Close">بحث</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                      </div>
                    </div>
                    <div class="card-content">
                      <div class="table-responsive">
                        <table id="recent-orders" class="table table-hover table-xl mb-0">
                          <thead>
                            <tr>
                              <th class="border-top-0"> #</th>
                              <th class="border-top-0">اسم المعهد</th>
                              <th class="border-top-0"> المطار</th>
                              <th class="border-top-0">السعر</th>
                              <th class="border-top-0">تحكم</th>
                            </tr>
                          </thead>
                          <tbody>
                            
                            <tr v-for="airport in airports.data" :key="airport.id">
                              <td class="text-truncate">{{airport.id}}</td>
                              <td class="text-truncate">{{airport.institute.name_ar}}</td>
                              <td class="text-truncate">{{airport.name_ar}}</td>

                            
                              <td class="text-truncate">{{airport.price}}</td>

                             
                              <td class="text-truncate">

                                <a  v-if="edit" :href="dahsboard_url+'/airports/'+'edit/'+airport.id"><button type="button" class="btn btn-sm btn-outline-primary round">تعديل</button></a>
                                <a   v-if="delete_pre" :href="dahsboard_url+'/airports/'+'delete/'+airport.id"><button type="button" class="btn btn-sm btn-outline-danger round"  onclick="return confirm('هل انت متاكد من حذف هذا المعهد')">حذف</button></a>
                              </td>
                            </tr>
                            
                           
                            
                          </tbody>
                        </table>
                            <div class="pagination">
                            <button class="btn btn-default" @click="fetchAirports(airports.prev_page_url)" :disabled="!airports.prev_page_url">
                                Previos
                            </button>
                            <span> page {{airports.current_page}} of {{airports.last_page }} </span>
                            <button class="btn btn-default" @click="fetchAirports(airports.next_page_url)" :disabled="!airports.next_page_url">
                                Next
                            </button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
          
           
               
                
</template>


<script>
export default {
    props:['dahsboard_url','csrftoken','institutes','create','edit','delete_pre'],
    data(){
        return{
        airports:{},
selected_institute:'',
name_ar:'',
url:this.dahsboard_url+'/airports/get',
        };
    },
    methods:{
        getAirports:function(){
            axios.get(this.url).then((response)=>this.airports =response.data.airports  );
        },
       
   filterAirports: function () {
                axios.get(this.dahsboard_url+'/airports/filter', { params: { institute_id: this.selected_institute,  name_ar: this.name_ar }}).then((response) => {
                    this.airports = response.data.airports,
                    this.airports.prev_page_url+="&institute_id="+this.selected_institute+"&name_ar"+this.name_ar,
                    this.airports.next_page_url+="&institute_id="+this.selected_institute+"&name_ar"+this.name_ar

                });
            },

            fetchAirports: function (url1) {
                this.url = url1;
                this.getAirports();
            }
    },
    beforeMount(){
        this.getAirports();
    }
}
</script>