<template>
    <div class="row">
        <div id="recent-transactions" class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">المعاهد (15)</h4>
                    <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                    <div class="heading-elements">
                        <ul class="list-inline mb-0">
                            <li>
                                <button data-toggle="modal" data-target="#exampleModalCenter" class="btn btn-sm btn-info box-shadow-2 round btn-min-width pull-right"><i class="ft-filter ft-md"></i> فلتر</button>
                            </li>
                            <li>
                                <a class="btn btn-sm btn-success box-shadow-2 round btn-min-width pull-right" :href="route_create"> <i class="ft-plus ft-md"></i> اضافة معهد جديد</a>
                            </li>
                        </ul>

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLongTitle">البحث في المعاهد</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="projectinput1">الدولة</label>
                                            <select class="form-control" name="fname">
                                                <option value="" selected="" disabled="">اختر الدولة</option>
                                                <option value="">كل الدول</option>
                                                <option value="">دولة</option>
                                                <option value="">دولة</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="projectinput1">المدينة</label>
                                            <select class="form-control" name="fname">
                                                <option value="" selected="" disabled="">اختر المدينة</option>
                                                <option value="">كل المدن</option>
                                                <option value="">دولة</option>
                                                <option value="">دولة</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="projectinput1">البحث بكلمات مفتاحية</label>
                                            <input type="text" id="projectinput1" class="form-control" placeholder="ادخل كلمة مفتاحية" name="fname" />
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-primary w-100">بحث</button>
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
                                    <th class="border-top-0">#</th>
                                    <th class="border-top-0">لوجو المعهد</th>
                                    <th class="border-top-0">اسم المعهد</th>
                                    <th class="border-top-0">الدولة</th>
                                    <th class="border-top-0">المدينة</th>
                                    <th class="border-top-0">عدد الكورسات</th>

                                    <th class="border-top-0">التقييم</th>

                                    <th class="border-top-0">التقييم بواسطة</th>
                                    <th class="border-top-0">الحاله</th>

                                    <th class="border-top-0">التعليقات</th>

                                    <th class="border-top-0">اكشن</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="institute in institutes.data" :key="institute.id">
                                    <td>{{institute.id}}</td>
                                    <td>  
                                        <img  style="max-width:100px"  :src="path_logo+institute.logo ">
                                    </td>
                                    <td>{{institute.name_ar}}</td>
                                    <td>{{institute.country[0].name_ar}}</td>
                                    <td>{{institute.city.name_ar}}</td>
                                    <td class="text-truncate">5 كورسات</td>
                                    <td class="text-truncate">
                                        <div id="read-only-stars" data-score="1"></div>
                                    </td>
                                    <td class="text-truncate">
                                        سات
                                    </td>   
                                    
                                    <td class="text-truncate">
                                        <input type="checkbox" id="checkbox"       v-model="institute.approvment"   @change="updateApprovment" @click="getInstitute_id(institute.id)" > 
                                        <label for="checkbox">{{  (institute.approvment == 1) ? "مقبول":"غير مقبول" }}</label>
                                        
                                    </td>
                                    <td class="text-truncate">
                                        <a href="/sat/institutes/comments.php"><button type="button" class="btn btn-sm btn-outline-success round">حالي (15)</button></a>
                                        <a href="/sat/institutes/comments.php"><button type="button" class="btn btn-sm btn-outline-info round">جديد (10)</button></a>
                                    </td>
                                    <td class="text-truncate">
                                        
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                        <a :href="instutite_url_edit +'/'+ institute.id+'/edit'"   class="btn btn-info btn-sm round">تعديل</a>
                                        <a href="#"   class="btn btn-default btn-sm round">عرض</a>
                                        <form :action="instutite_url_edit +'/'+ institute.id" method="post"  class="btn-group">
                                            <input type="hidden" name="_token" :value="csrftoken" />
                                            <input type="hidden" name="_method" value="delete">
                                            <button class="btn btn-danger btn-sm round" onclick="return confirm('هل انت متاكد من حذف هذا المعهد')">حذف</button>
                                        </form>
                                        </div>

                                    </td>
                                </tr>
                             
                            </tbody>
                        </table>

                         <div class="pagination">
                     <button class="btn btn-default"  @click="fetchInstitutes(institutes.prev_page_url)" :disabled="!institutes.prev_page_url">
                         Previos
                     </button>
                            <span> page {{institutes.current_page}} of {{institutes.last_page }}  </span>
<button class="btn btn-default"  @click="fetchInstitutes(institutes.next_page_url)" :disabled="!institutes.next_page_url">
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
        props: ["instutite_url", "instutite_url_edit", "csrftoken","aprove_route",'path_logo','route_create'],
        data() {
            return {
                institutes: {}, 
                 perPage: 10,
              currentPage: 1,
              paginate: {},
              url: this.instutite_url,
              institute_id:'',
              aproveRoute: this.aprove_route,
            };
        },
        methods: {
                    getInstitutes: function () {

                            let $this = this;
                            axios.get(this.url).then((response) => (this.institutes = response.data.institutes));
                    },

                    fetchInstitutes: function (url1){
                            this.url = url1;
                            this.getInstitutes();
                    }, 
                  
    updateApprovment:function(e){
                          const newValue = e.target.checked;
                          axios.post(this.aproveRoute, {"institute_id":  this.institute_id ,"approvment":newValue},
                          {headers:{"X-CSRFToken":"{{ csrf_token()}}"} } )
                          .then((response) => {
                          } )
                    },
                    getInstitute_id:function(id){
                        return this.institute_id= id ;
                    }
                 },
     
        beforeMount() {
            this.getInstitutes();
        },
 
    };
</script>
