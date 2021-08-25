<template>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">المقالات ({{ blogs.total }})</h4>
                    <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                    <div class="heading-elements">
                        <ul class="list-inline mb-0">
                            <li>
                                <button data-toggle="modal" data-target="#exampleModalCenter" class="btn btn-sm btn-info box-shadow-2 round btn-min-width pull-right"><i class="ft-filter ft-md"></i> فلتر</button>
                            </li>
                            <li v-if="create">
                                <a class="btn btn-sm btn-success box-shadow-2 round btn-min-width pull-right" :href="url_dashboard+'/blogs/create'"> <i class="ft-plus ft-md"></i> اضافة مقال جديد</a>
                            </li>
                        </ul>

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLongTitle">البحث في المقالات</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label class="font-medium-2 text-bold-600">الكاتب</label>
                                            <select v-model="user_id" class="form-control" name="fname">
                                                <option value="">اختر الكاتب</option>
                                                <option v-for="user in users" :key="user.id" :value="user.id"> {{user.name}}</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label class="font-medium-2 text-bold-600">التصنيف</label>
                                            <select v-model="cat_id" class="form-control" name="fname">
                                                <option value="">اختر التصنيف</option>
                                                <option v-for="cat in categories" :key="cat.id" :value="cat.id"> {{ cat.name_ar}}</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label class="font-medium-2 text-bold-600">الحالة</label>
                                            <div class="row">
                                                <div class="col-4 d-flex">
                                                    <div class="form-group mt-1">
                                                        <input checked type="checkbox" id="checkbox" v-model="status" />
                                                        <label for="checkbox">{{ (status == 1) ? "مقبول":"غير مقبول" }}</label>
                                                    </div>
                                                </div>
                                                <div class="col-2"></div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="font-medium-2 text-bold-600">البحث بكلمات مفتاحية</label>
                                            <input type="text" class="form-control" placeholder="البحث في عنوان او محتوى المقال بكلمة مفتاحية" v-model="keyword" name="fname" />
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" @click="filter" class="btn btn-primary w-100" data-dismiss="modal" aria-label="Close">بحث</button>
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
                                    <th class="border-top-0">العنوان</th>
                                    <th class="border-top-0">الكاتب</th>
                                    <th class="border-top-0">التصنيف</th>
                                    <th class="border-top-0">المعهد</th>
                                    <th class="border-top-0">الدوله</th>
                                    <th class="border-top-0">المدينه</th>

                                    <!-- <th class="border-top-0">التعليقات</th> -->
                                    <th class="border-top-0">التاريخ</th>
                                    <th class="border-top-0">الحاله</th>
                                    <th class="border-top-0">اكشن</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="blog in blogs.data" :key="blog.id">
                                    <td>{{blog.title_ar}}</td>
                                    <td>{{blog.creator.name}}</td>
                                    <td>{{blog.category.name_ar}}</td>
                                    <td>{{blog.institute.name_ar}}</td>
                                    <td>{{blog.country.name_ar}}</td>
                                    <td>{{blog.city.name_ar}}</td>

                                    <!-- <td>
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            <a href="" class="btn btn-outline-info btn-sm round">حالي</a>
                                            <a href="" class="btn btn-outline-success btn-sm round">جديد</a>
                                        </div>
                                    </td> -->
                                    <td>{{blog.created_at}}</td>
                                    <td class="text-truncate">
                                        <input type="checkbox" id="checkbox" v-model="blog.approvement" @change="updateApprovement" @click="getblog_id(blog.id)" />
                                        <label for="checkbox">{{ (blog.approvement == 1) ? "مقبول":"غير مقبول" }}</label>
                                    </td>
                                    <td>
                                        <div class="btn-group" role="group" aria-label="Basic example">

                                            <a  v-if="edit" :href="url_dashboard+'/blogs/'+blog.id+'/edit'" class="btn btn-info btn-sm round">تعديل</a>
                                            <a :href="public_url +'/article/'+ blog.id" class="btn btn-default btn-sm round" target="_blank">عرض</a>

                                            <form :action="url_dashboard+'/blogs/'+blog.id" method="POST" class="btn-group">
                                                <input type="hidden" name="_token" :value="csrftoken" />
                                                <input type="hidden" name="_method" value="delete" />
                                                <button v-if="delete_pre" class="btn btn-danger btn-sm round" onclick="return confirm('هل انت متاكد من حذف هذا المقال')">حذف</button>
                                            </form>
                                            <a  v-if="edit" :href="url_dashboard+'/blogs/forceDelete/'+blog.id" class="btn btn-dark btn-sm round">حذف نهائي</a>

                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="pagination">
                                <button class="btn btn-default" @click="Pagination(blogs.prev_page_url)" :disabled="!blogs.prev_page_url">
                                    Previos
                                </button>
                                <span> page {{blogs.current_page}} of {{blogs.last_page }} </span>
                                <button class="btn btn-default" @click="Pagination(blogs.next_page_url)" :disabled="!blogs.next_page_url">
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
        props: [
                "aprove_route", 
                "dahsboard_url", 
                'public_url',
                "get_blogs_url", 
                "csrftoken", 
                "categories", 
                "users",'create','edit','delete_pre'
                ],
        data() {
            return {
                blogs: {},
                blog_id: "",
                url_dashboard: this.dahsboard_url,
                cat_id: "",
                user_id: "",
                keyword: "",
                status: true,
            };
        },
       beforeMount(){
  const urlParams = new URLSearchParams(window.location.search);
           const myParam = urlParams.get('cat_id');
        //    alert(myParam);
           if(myParam){
               this.cat_id = myParam;
               this.filter();
           } else{
            this.getBlogs();

           }
            
        },
        mounted() {
           
        
             

         
        },

        methods: {
            getBlogs() {
                 axios.get(this.get_blogs_url).then((response) => (this.blogs = response.data));
            },
            Pagination: function (url) {
                this.get_blogs_url = url+'&user_id='+this.user_id+'&cat_id='+this.cat_id+'&keyword='+this.keyword+'&status='+this.status;
                this.getBlogs();
            },
            updateApprovement: function (e) {
                const newValue = e.target.checked;
                axios.post(this.aprove_route, { blog_id: this.blog_id, approvement: newValue }, { headers: { "X-CSRFToken": "{{ csrf_token()}}" } }).then((response) => {});
            },
            getblog_id: function (id) {
                return (this.blog_id = id);
            },
            filter: function () {
                axios.get(this.dahsboard_url + "/blog/filter", { params: { user_id: this.user_id, cat_id: this.cat_id, keyword: this.keyword, status: this.status } })
                .then((response) => (
                    this.blogs = response.data,
                    this.blogs.prev_page_url += '&user_id='+this.user_id+'&cat_id='+this.cat_id+'&keyword='+this.keyword+'&status='+this.status,
                    this.blogs.next_page_url += '&user_id='+this.user_id+'&cat_id='+this.cat_id+'&keyword='+this.keyword+'&status='+this.status
                ));
                
            },
        },

 
    };
</script>
