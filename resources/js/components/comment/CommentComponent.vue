<template>
    



     <div class="row">
                  <div id="recent-transactions" class="col-12">
                    <div class="card">
                      <div class="card-header">
                        <h4 class="card-title"> كل التعليقات (15)</h4>
                        <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                        <div class="heading-elements">
                          <ul class="list-inline mb-0">
                            <li><a class="btn btn-sm btn-info box-shadow-2 round btn-min-width pull-right"
                              href="/sat/institutes/create.php" > كل التعليقات</a></li>
                              <li><a class="btn btn-sm btn-primary box-shadow-2 round btn-min-width pull-right"
                              href="/sat/institutes/create.php" > الحالية</a></li>
                              <li><a class="btn btn-sm btn-success box-shadow-2 round btn-min-width pull-right"
                              href="/sat/institutes/create.php" > الجديدة</a></li>
                          </ul>
                        </div>
                      </div>
                      <div class="card-content">
                        <div class="table-responsive">
                          <table id="recent-orders" class="table table-hover table-xl mb-0">
                            <thead>
                              <tr>
                                <th class="border-top-0"> #</th>
                                <th class="border-top-0">اسم المعلق</th>
                                <th class="border-top-0">التعليق</th>
                                <th class="border-top-0">اسم المعهد</th>
                                <th class="border-top-0">موافقة</th>
                                <th class="border-top-0">حذف</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr v-for="comment in comments" :key="comment.id" >
                               <td> {{comment.id}} </td>
                               <td> {{comment.student.name}} </td>
                               <td>{{comment.comment}}</td>
                               <td>{{comment.institute.name_ar }}</td>

                                  <td class="text-truncate">
                                        <input type="checkbox" id="checkbox"       v-model="comment.approvement"   @change="updateApprovment" @click="getcomment_id(comment.id)" > 
                                        <label for="checkbox">{{  (comment.approvement == 1) ? "مقبول":"غير مقبول" }}</label>
                                        
                                    </td>
                                <td class="text-truncate">
                               <a :href="comment_route+'/'+comment.id+'/edit' "     ><i  class="btn btn-sm btn-outline-primary round">تعديل</i></a>

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
    props: ['url_comment','comment_route','aprove_route'],
  
    data() {
            return {
                comments:''  ,
             url:this.url_comment, 
             comment_id:'',
             aproveRoute: this.aprove_route,
               
            };
        },
    methods:{
           getComments:function(){

               axios.get(this.url).then((response) => this.comments = response.data.comments )
           },
           updateApprovment:function(e){
                          const newValue = e.target.checked;
                        //  alert(newValue);
                        //  alert(this.comment_id);
                        //  alert(this.aproveRoute);

         axios.post(this.aproveRoute, {"comment_id":  this.comment_id ,"approvment":newValue},
                          {headers:{"X-CSRFToken":"{{ csrf_token()}}"} } )
                          .then((response) => {
                          } )
           },

             getcomment_id:function(id){
                        return this.comment_id= id ;
                    }



    },
    beforeMount(){
        
this.getComments();
    }
};
</script>
