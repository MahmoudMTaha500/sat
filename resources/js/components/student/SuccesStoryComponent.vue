<template>
    



     <div class="row">
                  <div id="recent-transactions" class="col-12">
                    <div class="card">
                      <div class="card-header">
                        <h4 class="card-title"> كل القصص ({{StudentSuccessStory.total }})</h4>
                        <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                        <div class="heading-elements">
                          <!-- <ul class="list-inline mb-0">
                            <li><a class="btn btn-sm btn-info box-shadow-2 round btn-min-width pull-right"
                              href="/sat/institutes/create.php" > كل التعليقات</a></li>
                              <li><a class="btn btn-sm btn-primary box-shadow-2 round btn-min-width pull-right"
                              href="/sat/institutes/create.php" > الحالية</a></li>
                              <li><a class="btn btn-sm btn-success box-shadow-2 round btn-min-width pull-right"
                              href="/sat/institutes/create.php" > الجديدة</a></li>
                          </ul> -->
                        </div>
                      </div>
                      <div class="card-content">
                        <div class="table-responsive">
                          <table id="recent-orders" class="table table-hover table-xl mb-0">
                            <thead>
                              <tr>
                                <th class="border-top-0"> #</th>
                                <th class="border-top-0">القصه</th>

                                <th class="border-top-0">اسم الطالب</th>
                                <th class="border-top-0">موافقة</th>
                                <th class="border-top-0">حذف</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr v-for="story in StudentSuccessStory.data" :key="story.id" >
                               <td> {{story.id}} </td>
                               <td> {{ story.story.substring(0,100) }} </td>
                               <td>{{story.student.name}}</td>

                                  <td class="text-truncate">
                                        <input type="checkbox" id="checkbox"       v-model="story.approvement"   @change="updateApprovment" @click="getstory_id(story.id)" > 
                                        <label for="checkbox">{{  (story.approvement == 1) ? "مقبول":"غير مقبول" }}</label>
                                        
                                    </td>
                                <td class="text-truncate">
                               <a :href="url_story+'/'+story.id+'/edit' "     ><i  class="btn btn-sm btn-outline-primary round">تعديل</i></a>

                                  <a href="#"><button type="button" class="btn btn-sm btn-outline-danger round">حذف</button></a>
                                </td>
                              </tr>
                        
                              
                            </tbody>
                          </table>
                                   <div class="pagination">
                            <button class="btn btn-default" @click="fetchstory(StudentSuccessStory.prev_page_url)" :disabled="!StudentSuccessStory.prev_page_url">
                                Previos
                            </button>
                            <span> page {{StudentSuccessStory.current_page}} of {{StudentSuccessStory.last_page }} </span>
                            <button class="btn btn-default" @click="fetchstory(StudentSuccessStory.next_page_url)" :disabled="!StudentSuccessStory.next_page_url">
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
    props: ['url_story','comment_route','aprove_route'],
  
    data() {
            return {
                StudentSuccessStory:{}  ,
             url:this.url_story+'/get', 
             story_id:'',
             aproveRoute: this.aprove_route,
               
            };
        },
    methods:{
           getStories:function(){

               axios.get(this.url).then((response) => this.StudentSuccessStory = response.data.StudentSuccessStory )
           },
           updateApprovment:function(e){
                          const newValue = e.target.checked;
                        //  alert(newValue);
                        //  alert(this.comment_id);
                        //  alert(this.aproveRoute);

         axios.post(this.url_story+'/approve', {"id":  this.story_id ,"approvment":newValue},
                          {headers:{"X-CSRFToken":"{{ csrf_token()}}"} } )
                          .then((response) => {
                          } )
           },

             getstory_id:function(id){
                        return this.story_id= id ;
                    },
                 fetchstory: function (url1) {
                this.url = url1;
                this.getStories();
            }



    },
    beforeMount(){
        
this.getStories();
    }
};
</script>
