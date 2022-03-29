<template>
    <div class="row">
        <div id="recent-transactions" class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">المعاهد ({{this.institutes.total}})</h4>
                    <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                    <div class="heading-elements">
                        <ul class="list-inline mb-0">
                            <li>
                                <button data-toggle="modal" data-target="#exampleModalCenter" class="btn btn-sm btn-info box-shadow-2 round btn-min-width pull-right"><i class="ft-filter ft-md"></i> فلتر</button>
                            </li>
                            <li  v-if="create">
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
                                            <select v-model="selected" v-on:change="getcities()" id="country" class="form-control" name="country_id" required>
                                                <option value="">حدد الدولة</option>
                                                <option v-for="country in countries" :key="country.id" :value="country.id"> {{country.name_ar}} </option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="projectinput1">المدينة</label>

                                            <select v-model="selected_city" id="city" class="form-control" name="city_id" required>
                                                <option value="">حدد المدينة</option>
                                                <option v-for="city in cities" :key="city.id" :value="city.id"> {{city.name_ar}}</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="projectinput1">البحث بكلمات مفتاحية</label>
                                            <input v-model="name_ar" type="text" id="projectinput1" class="form-control" placeholder="ادخل كلمة مفتاحية" name="name_ar" />
                                        </div>
                                        <div class="form-group">
                                            <label for="projectinput1">غير منتهي (SEO)</label> <br />
                                            <input type="checkbox" data-size="sm" checked class="switchery" v-model="unfinished_seo" />
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-primary w-100" @click="filter_institutes(); pagination_pages_method(institutes.current_page)" data-dismiss="modal" aria-label="Close">بحث</button>
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
                                    <th class="border-top-0">الكاتب</th>
                                    <th class="border-top-0">الحاله</th>
                                    <th class="border-top-0">اكشن</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="institute in institutes.data" :key="institute.id">
                                    <td>{{institute.id}}</td>
                                    <td>
                                        <img style="max-width: 100px;" :src="institute.logo == 'null' ? path_logo+'storage/default_images.png' : path_logo+institute.logo" />
                                    </td>
                                    <td>{{institute.name_ar}}</td>
                                    <td>{{institute.country.name_ar}}</td>
                                    <td>{{institute.city.name_ar}}</td>
                                    <td class="text-truncate"> <a :href="dahsboard_url+'/courses?institute_id='+institute.id" target="_blank" >   {{ institute.courses.length }} كورسات   </a></td>
                                    <td  class="text-truncate"> 
                                          <rate :length="5"     :value="institute_rate(institute)"    disabled    />
                                    </td> 

                                    <td class="text-truncate">
                                        <span v-if="institute.rate_switch" > سات    </span>
                                        <span v-else> طلبه    </span>
                                        
                                    </td>
                                    <td>
                                        {{institute.creator.name}}
                                    </td>

                                    <td class="text-truncate">
                                        <input type="checkbox" id="checkbox" v-model="institute.approvement" @change="updateApprovement" @click="getInstitute_id(institute.id)" />
                                        <label for="checkbox">{{ (institute.approvement == 1) ? "مقبول":"غير مقبول" }}</label>
                                    </td>
                                    
                                    <td class="text-truncate">
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            <a v-if="edit" :href="institute_url_edit +'/'+ institute.id+'/edit'" class="btn btn-info btn-sm round">تعديل</a>
                                            <a :href="show_institute_url +'/'+ institute.id" class="btn btn-default btn-sm round">عرض</a>
                                            <form :action="institute_url_edit +'/'+ institute.id" method="post" class="btn-group">
                                                <input type="hidden" name="_token" :value="csrftoken" />
                                                <input type="hidden" name="_method" value="delete" />
                                                <button v-if="delete_pre" class="btn btn-danger btn-sm round" onclick="return confirm('هل انت متاكد من حذف هذا المعهد')">حذف</button>
                                            </form>
                                            <a  v-if="force_delete" :href="institute_url_edit +'/forceDelete/'+ institute.id"
                                             onclick="return confirm('سوف يتم حذف المعهد نهائيا .هل انت متاكد؟')"
                                             class="btn btn-dark btn-sm round" style="margin-right:3px;">حذف نهائي</a>

                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                        <ul dir="rtl" class="pagination d-flex justify-content-center p-0">
                            <li class="page-item">
                                <button
                                    :style="!institutes.prev_page_url ? 'background: #e4e4e4!important;color: #b5b5b5!important;cursor: not-allowed;' : ''"
                                    @click="pagination(prev_page_url);pagination_pages_method(institutes.current_page-1)"
                                    :disabled="!institutes.prev_page_url"
                                    class="page-link"
                                >
                                    <i class="la la-angle-right"></i>
                                </button>
                            </li>
                            <li style="margin:0 5px;" class="page-item" v-for="(page, index) in pagination_pages" :key="index" :class="institutes.current_page == page ? 'active' : ''">
                                <a style="border-radius: 10px;" class="page-link" @click="pagination(institutes.path+'?page='+page);pagination_pages_method(page)">{{ page }}</a>
                            </li>
                            

                            <li class="page-item">
                                <button
                                    :style="!institutes.next_page_url ? 'background: #e4e4e4!important;color: #b5b5b5!important;cursor: not-allowed;' : ''"
                                    @click="pagination(next_page_url);pagination_pages_method(institutes.current_page +1 )"
                                    :disabled="!institutes.next_page_url"
                                    class="page-link"
                                >
                                    <i class="la la-angle-left"></i>
                                </button>
                            </li>
                        </ul>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: [
                "institute_url_edit", 
                "csrftoken", 
                "aprove_route", 
                "path_logo", 
                "route_create", 
                "countries_from_blade",
                "dahsboard_url", 
                "url_filtier", 
                "show_institute_url",
                "create",
                "edit",
                "delete_pre",
                "force_delete",
                "get_institute_url",
            ],
        data() {
            return {
                institutes: {},
                next_page_url: "",
                prev_page_url: "",
                perPage: 10,
                currentPage: 1,
                paginate: {},
                institute_id: "",
                aproveRoute: this.aprove_route,
                selected: "",
                selected_city: "",
                countries: this.countries_from_blade,
                cities: {},
                newCity: "",
                citySelectForUpdate: "",
                name_ar: "",
                pagination_pages: [1,2,3,4,5],
                unfinished_seo : false,
            };
        },
        methods: {
            pagination_pages_method: function(current_page){
                
                if(current_page <= 4){
                    this.pagination_pages = [1,2,3,4,5]
                }else if(current_page > (this.institutes.last_page-2) ){
                    this.pagination_pages = [this.institutes.last_page -4 , this.institutes.last_page -3 , this.institutes.last_page -2 , this.institutes.last_page - 1 , this.institutes.last_page]
                }else{
                    this.pagination_pages = [current_page -2 , current_page - 1 , current_page , current_page + 1 , current_page + 2]
                }

                if(this.institutes.last_page < 5){
                    this.pagination_pages = Array.from({length: this.institutes.last_page}, (_, i) => i + 1)
                    console.log(this.institutes.last_page)
                }
                
                
            },
            pagination: function (url) {
                this.get_institute_url = url;
                this.get_institutes();
            },
            get_institutes: function () {
                axios
                    .get(this.get_institute_url, {
                        params: this.params().filter_params,
                    })
                    .then((response) =>{
                        this.institutes = response.data.institutes
                        this.next_page_url = response.data.institutes.next_page_url
                        this.prev_page_url = response.data.institutes.prev_page_url
                        if(this.institutes.last_page < 5){
                            this.pagination_pages = Array.from({length: this.institutes.last_page}, (_, i) => i + 1)
                        }
                    });
            },

            params: function () {
                var filter_params = {
                    country_id: this.selected, 
                    city_id: this.selected_city, 
                    name_ar: this.name_ar,
                    unfinished_seo:this.unfinished_seo
                };
                var pagination_params = "&keyword=" + this.keyword;
                return { filter_params: filter_params, pagination_params: pagination_params };
            },
            
            institutesPagination: function (url1) {
                this.url = url1;
                this.get_institutes();
            },

            updateApprovement: function (e) {
                const newValue = e.target.checked;
                axios.post(this.aproveRoute, { institute_id: this.institute_id, approvement: newValue }, { headers: { "X-CSRFToken": "{{ csrf_token()}}" } }).then((response) => {});
            },
            getInstitute_id: function (id) {
                return (this.institute_id = id);
            },

            getcities: function () {
                var country_id = this.selected;
                axios
                    .get(this.dahsboard_url + "/getcities", {
                        params: {
                            countryID: country_id,
                        },
                    })
                    .then((response) => {
                        this.cities = response.data.cities
                      this.selected_city='';
                    }
                        
                    );
            },
            get_id_for_cities: function () {
                return this.selected_city;
            },

            resetForm: function () {
                this.newCity = "";
                this.selected_city = "";
            },
            returnCountryCity: function () {
                if (this.country_id2) {
                    this.selected = this.country_id2;
                    this.citySelectForUpdate = this.city_id;
                    this.getcities();
                } else {
                }
            },
            filter_institutes: function () {
                    this.country_id = this.selected;
                    this.city_id = this.selected_city;
                    this.name_ar = this.name_ar;
                    this.get_institutes();
                },
            avargae:function(obj){
                    //  console.dir(obj);
var  str = JSON.stringify(obj);
console.log(str); // Logs output to dev tools console.
                var total=0;
              for( var rate in str){
                     total = rate.rate; 
                     alert(rate)
                    //  console.log(rate);
              }
              return total;
            },
            institute_rate: function (institute_obj) {
                if(institute_obj.rate_switch == 1){
                    return institute_obj.sat_rate
                }else{
                    if(institute_obj.rats[0] == null){
                        return 5
                    }else{
                        var students_rate = 0
                        var arr_length= institute_obj.rats.length
                        var rate_avg = 0
                        institute_obj.rats.forEach(element => {
                            students_rate += element.rate
                        });
                        rate_avg = students_rate/arr_length
                        return Math.round(rate_avg)

                    }
                }
                
            },
        },

        beforeMount() {
            this.get_institutes();
            this.returnCountryCity();
        },
    };
</script>
