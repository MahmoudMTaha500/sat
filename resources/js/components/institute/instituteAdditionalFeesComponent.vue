<template>
    <div>
        <div v-if="old_fees == undefined">
            <div class="form-group" v-for="(row, index) in rows_index" :key="row">
                <div class="row">
                    <input type="hidden" :name="'fees_rows['+row+'][keyword]'"  :value="row == 1 ? 'booking' : ( row == 2 ? 'summer-supplementary' : 'fees-'+row )" class="form-control" :readonly="row==1 || row==2">
                    <div class="col-lg-2 col-md-3 col-sm-6 col-12 mb-2">
                        <label>اسم المصاريف</label>
                        <input type="text" :name="'fees_rows['+row+'][title]'" class="form-control" :readonly="row==1 || row==2" :value="row==1 ? 'مصاريف الحجز' : (row==2 ? 'الاضافة الصيفية' : '' ) ">
                    </div>
                    <div class="col-lg-2 col-md-3 col-sm-6 col-12 mb-2">
                        <label>السعر</label>
                        <input type="text" :name="'fees_rows['+row+'][price]'" class="form-control">
                    </div>
                    <div class="col-lg-2 col-md-3 col-sm-6 col-12 mb-2">
                        <label>نوع المصاريف</label>
                        <select type="text" :name="'fees_rows['+row+'][price-type]'" class="form-control">
                            <option value="overall">اجمالي الدراسة</option>
                            <option value="weekly">اسبوعي</option>
                        </select>
                    </div>
                    <div class="col-lg-2 col-md-3 col-sm-6 col-12 mb-2">
                        <label>التخفيض</label>
                        <input type="text" :name="'fees_rows['+row+'][discount]'" class="form-control" >
                    </div>
                    <div class="col-lg-2 col-md-3 col-sm-6 col-12 mb-2">
                        <label>نوع التخفيض</label>
                        <select type="text" :name="'fees_rows['+row+'][discount-type]'" class="form-control">
                            <option value="">اختر نوع التخفيض</option>
                            <option value="percentage">نسبة مئوية</option>
                            <option value="fixed">نسبة ثابتة</option>
                        </select>
                    </div>
                    <div class="col-lg-1 col-md-3 col-sm-6 col-12 mb-2">
                        <label>السعر الصيفي</label>
                        <input type="text" :name="'fees_rows['+row+'][summer-price]'" class="form-control">
                    </div>
                    <div class="col-lg-1 col-md-3 col-sm-6 col-12 mb-2">
                        <button class="btn btn-danger mt-2 w-100" @click="deleteRow(index)">حذف</button>
                    </div>                     
                </div>
                <hr>
            </div>
        </div>
        <div v-else>
            <div  class="form-group" v-for="(row, index) in rows_index" :key="row">
                <div class="row">
                    <input type="hidden" :name="'fees_rows['+row+'][keyword]'"  :value="old_fees[row-1].keyword" class="form-control" >
                    <div class="col-lg-2 col-md-3 col-sm-6 col-12 mb-2">
                        <label>اسم المصاريف القديمة</label>
                        <input type="text" :name="'fees_rows['+row+'][title]'" class="form-control"  :value="old_fees[row-1].title">
                    </div>
                    <div class="col-lg-2 col-md-3 col-sm-6 col-12 mb-2">
                        <label>السعر</label>
                        <input type="text" :name="'fees_rows['+row+'][price]'" class="form-control" :value="old_fees[row-1].price">
                    </div>
                    <div class="col-lg-2 col-md-3 col-sm-6 col-12 mb-2">
                        <label>نوع المصاريف</label>
                        <select type="text" :name="'fees_rows['+row+'][price-type]'" class="form-control">
                            <option :selected="old_fees[row-1]['price-type'] == 'overall' ? true : false" value="overall">اجمالي الدراسة </option>
                            <option :selected="old_fees[row-1]['price-type']== 'weekly' ? true : false" value="weekly">اسبوعي</option>
                        </select>
                    </div>
                    <div class="col-lg-2 col-md-3 col-sm-6 col-12 mb-2">
                        <label>التخفيض</label>
                        <input type="text" :name="'fees_rows['+row+'][discount]'" class="form-control" :value="old_fees[row-1].discount">
                    </div>
                    <div class="col-lg-2 col-md-3 col-sm-6 col-12 mb-2">
                        <label>نوع التخفيض</label>
                        <select type="text" :name="'fees_rows['+row+'][discount-type]'" class="form-control">
                            <option value="">اختر نوع التخفيض</option>
                            <option :selected="old_fees[row-1]['discount-type'] == 'percentage' ? true : false" value="percentage">نسبة مئوية</option>
                            <option :selected="old_fees[row-1]['discount-type'] == 'fixed' ? true : false" value="fixed">نسبة ثابتة</option>
                        </select>
                    </div>
                    <div class="col-lg-1 col-md-3 col-sm-6 col-12 mb-2">
                        <label>السعر الصيفي</label>
                        <input type="text" :name="'fees_rows['+row+'][summer-price]'" class="form-control" :value="old_fees[row-1]['summer-price']">
                    </div>
                    <div class="col-lg-1 col-md-3 col-sm-6 col-12 mb-2">
                        <button class="btn btn-danger mt-2 w-100" @click="deleteRow(index)">حذف</button>
                    </div>                     
                </div>
                <hr>
            </div>
        </div>
        
        

        <div class="row justify-content-center">
            <div class="col-md-6 col-12">
                <button class="btn btn-success mt-2 w-100" type="button" @click="additionalFees()">اضافة مصاريف جديدة</button>
            </div>
            <div class="col-md-3 col-12">
                <button data-dismiss="modal" aria-label="Close" class="btn btn-dark mt-2 w-100" type="button">اغلاق</button>
            </div>
        </div>

    </div>
</template>



<script>
    export default {
        props: ['csrf_token' , 'old_fees'],
        data() {
            return {
                rows_index: this.old_fees == undefined ? [1,2] : Array.from(Array(this.old_fees.length + 1).keys()).slice(1) ,
            };
        },
        methods: {
            additionalFees: function(){
                this.rows_index.push( Math.max(...this.rows_index) +1)
            },
            deleteRow: function(index){
                this.rows_index.splice(index, 1);
            },
        },

        beforeMount() {
           
        },
    };
</script>
