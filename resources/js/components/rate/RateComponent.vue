<template>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">كل التقييمات ({{rates.total}})</h4>
                    <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                    <div class="heading-elements">
                        <ul class="list-inline mb-0">
                            <li>
                                <div class="form-group mt-1">
                                   
                                    <select @change="filter" v-model="approvement" id="">
                                      <option selected value="all">الكل</option>
                                      <option value="1">مقبول</option>
                                      <option value="0">غير مقبول</option>
                                    </select>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="card-content">
                    <div class="table-responsive">
                        <table id="recent-orders" class="table table-hover table-xl mb-0">
                            <thead>
                                <tr>
                                    <th class="border-top-0">اسم الطالب</th>
                                    <th class="border-top-0">اسم المعهد</th>
                                    <th class="border-top-0">التقييم</th>
                                    <th class="border-top-0">التعليق</th>
                                    <th class="border-top-0">الحالة</th>
                                    <th class="border-top-0">حذف</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="rate in rates.data" :key="rate.id">
                                    <td class="text-truncate">{{rate.student.name}}</td>
                                    <td class="text-truncate">{{rate.institute.name_ar}}</td>
                                    <td class="text-truncate">
                                        <rate :length="5" :value="rate.rate" disabled :readonly="true" />
                                    </td>
                                    <td class="text-truncate">
                                        <textarea rows="7" cols="50" v-model="rate.review" @change="update_rate(rate)"></textarea>
                                    </td>
                                    <td class="text-truncate">
                                        <input type="checkbox" id="checkbox" v-model="rate.approvement" @change="update_rate(rate)" />
                                        <label for="checkbox">{{ (rate.approvement == 1) ? "مقبول":"غير مقبول" }}</label>
                                    </td>
                                    <td>
                                          <button @click="delete_rate(rate.id)" class="btn btn-danger btn-sm round" onclick="return confirm('هل انت متاكد من حذف هذا ')">حذف</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="pagination">
                            <button class="btn btn-default" @click="Pagination(rates.prev_page_url)" :disabled="!rates.prev_page_url">
                                Previos
                            </button>
                            <span> page {{rates.current_page}} of {{rates.last_page }} </span>
                            <button class="btn btn-default" @click="Pagination(rates.next_page_url)" :disabled="!rates.next_page_url">
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
        props: ["csrftoken", "get_rate_url", "update_rate_url" , 'delete_rate_url'],
        data() {
            return {
                rates: "",
                RateID: "",
                status: true,
                review: '',
                approvement:'all'
            };
        },
        methods: {
            getrates: function () {
                axios.get(this.get_rate_url).then((response) => (this.rates = response.data.rates));
            },
             update_rate: function (rate_obj) {
                axios.post(this.update_rate_url, rate_obj, { headers: { "X-CSRFToken": this.csrftoken } }).then(alert('تم التعديل بنجاح'));
            },
            delete_rate: function (rate_id) {
                axios.post(this.delete_rate_url, {rate_id:rate_id}, { headers: { "X-CSRFToken": this.csrftoken } }).then(
                  this.filter ,
                  alert('تم الحذف بنجاح')
                );
            },
            Pagination: function (url) {
                this.get_rate_url = url + "&approvement=" + this.approvement
                this.getrates();
            },
            filter: function () {
                axios
                    .get(this.get_rate_url , { params: { approvement: this.approvement} })
                    .then(
                        (response) => (
                            (this.rates = response.data.rates),
                            (this.rates.prev_page_url += "&approvement=" + this.approvement),
                            (this.rates.next_page_url += "&approvement=" + this.approvement)
                        )
                    );
            },
        },
        beforeMount() {
            this.getrates();
        },
    };


    // beforeMount() {
        //     const urlParams = new URLSearchParams(window.location.search);
        //     const myParam = urlParams.get("cat_id");
        //     //    alert(myParam);
        //     if (myParam) {
        //         this.cat_id = myParam;
        //         this.filter();
        //     } else {
        //         this.getBlogs();
        //     }
        // },
</script>


