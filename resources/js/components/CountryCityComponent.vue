<template>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="country">الدولة</label>
                <select id="country" class="select2 form-control text-left">
                    <option value="">حدد الدولة</option>
                    <option value="1">أستراليا</option>
                    <option value="3">كندا</option>
                    <option value="6">فرنسا</option>
                    <option value="7">ألمانيا</option>
                    <option value="9">أيرلندا</option>
                    <option value="10">ماليزيا</option>
                    <option value="11">مالطا</option>
                    <option value="12">نيوزيلاندا</option>
                    <option value="13">الفلبين</option>
                    <option value="16">روسيا</option>
                    <option value="17">جنوب أفريقيا</option>
                    <option value="18">سويسرا</option>
                    <option value="21">المملكة المتحدة</option>
                    <option value="22">الولايات المتحدة الأمريكية</option>
                </select>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="city">المدينة </label>
                <div class="d-flex input-group">
                    <span class="input-group-append w-100" id="button-addon2">
                        <select id="city" class="select2 form-control vue-app">
                            <option value="">حدد المدينة</option>
                        </select>
                        <button type="button" data-toggle="modal" data-target="#create-new-city" class="btn btn-success btn-sm">
                            <i class="ft-plus"></i>
                        </button>
                    </span>
                </div>

                <!-- Create New City Form -->
                <div class="modal fade myModal" id="create-new-city" role="dialog" aria-labelledby="create-new-city-modal" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="create-new-city-modal">
                                    انشاء مدينة جديدة
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label>اختر الدولة</label>
                                            <select class="select2 form-control text-left">
                                                <option value="">حدد الدولة</option>
                                                <option value="1">أستراليا</option>
                                                <option value="3">كندا</option>
                                                <option value="6">فرنسا</option>
                                                <option value="7">ألمانيا</option>
                                                <option value="9">أيرلندا</option>
                                                <option value="10">ماليزيا</option>
                                                <option value="11">مالطا</option>
                                                <option value="12">نيوزيلاندا</option>
                                                <option value="13">الفلبين</option>
                                                <option value="16">روسيا</option>
                                                <option value="17">جنوب أفريقيا</option>
                                                <option value="18">سويسرا</option>
                                                <option value="21">المملكة المتحدة</option>
                                                <option value="22">الولايات المتحدة الأمريكية</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label>المدينة</label>
                                            <input class="form-control" type="text" placeholder="ادخل اسم المدينة" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-success w-100">
                                    انشاء
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {},
    };
</script>
