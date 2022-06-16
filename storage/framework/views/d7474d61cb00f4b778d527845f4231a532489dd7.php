 <?php $__env->startSection('admin.content'); ?>
<div class="app-content content vue-app">
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2">
                <h3 class="content-header-title">قسم التامينات</h3>
                <div class="row breadcrumbs-top">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>">لوحة التحكم</a></li>
                            <li class="breadcrumb-item"><a href="<?php echo e(route('insurances.index')); ?>"> التامينات</a></li>
                            <li class="breadcrumb-item active">تعديل تامين</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">
            <?php if($message = Session::get('success')): ?>
            <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong><?php echo e($message); ?></strong>
            </div>
            <?php endif; ?> <?php if($message = Session::get('error')): ?>
            <div class="alert alert-danger alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong><?php echo e($message); ?></strong>
            </div>
            <?php endif; ?>
            <div class="row justify-content-md-center">
                <div class="col-lg-10">
                    <div class="card" style="zoom: 1;">
                        <div class="card-header">
                            <h4 class="card-title" id="bordered-layout-card-center">تعديل تامين </h4>
                            <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                        </div>
                        <div class="card-content collpase show">
                            <div class="card-body">
                                <form class="form" action="<?php echo e(route('insurances.update',$insurance->id)); ?>" method="POST">
                                <?php echo $__env->make('admin.includes.errors', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                   <?php echo method_field('put'); ?>
                                    <?php echo csrf_field(); ?>
                                    <input type="hidden" name="id" value="<?php echo e($insurance->id); ?>">
                                    <div class="form-body">
                                        <div class="row">
                                            <create-service-component
                                                :countries_from_blade="<?php echo e(json_encode($countries)); ?>" 
                                                :get_institutes_url="<?php echo e(json_encode(route('blog.get.institutes.vue'))); ?>"
                                                :old_country_id="<?php echo e(json_encode($insurance->institute->country->id)); ?>"
                                                :old_institute_id="<?php echo e(json_encode($insurance->institute_id)); ?>"
                                            >
                                            </create-service-component>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="institute-name"> السعر</label>
                                                    <input type="number" class="form-control" placeholder="ادخل  السعر" name="price"   value="<?php echo e($insurance->currency_amount); ?>" />
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="projectinput2">اختر العمله</label>
                                                    <select class="currency_exchange form-control text-left" name="currency_exchange" value="<?php echo e(old('currency_exchange')); ?>">
                                                        <?php $__currentLoopData = $exchange_rates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $exchange_rate): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <option <?php if($insurance->currency_code == $exchange_rate->currency_code): ?> selected <?php endif; ?> value="<?php echo e($exchange_rate->currency_code); ?>"><?php echo app('translator')->get('website_lang.'.$exchange_rate->currency_code); ?></option>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-actions center">
                                            <button type="submit" class="btn btn-primary w-100"><i class="la la-check-square-o"></i> حفظ</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\classat_laravel\resources\views/admin/insurances/edit.blade.php ENDPATH**/ ?>