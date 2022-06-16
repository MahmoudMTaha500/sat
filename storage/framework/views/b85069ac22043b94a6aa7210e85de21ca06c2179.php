 <?php $__env->startSection('admin.content'); ?>

<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2">
                <h3 class="content-header-title">قسم الدورات</h3>
                <div class="row breadcrumbs-top">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>">لوحة التحكم</a></li>
                            <li class="breadcrumb-item active">الدورات</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">


            <courses-component
            :get_courses_url="<?php echo e(json_encode(url('/dashboard/getcourses'))); ?>"
            :dahsboard_url="<?php echo e(json_encode(url('/dashboard'))); ?>"   
            :public_url="<?php echo e(json_encode(url('/'))); ?>"

            :countries_from_blade="<?php echo e(json_encode($countries)); ?>"
            :institutes="<?php echo e(json_encode($institutes)); ?>"
            :csrftoken="<?php echo e(json_encode(csrf_token())); ?>"

            :create="<?php echo e(json_encode(auth()->user()->hasPermission('courses-create') )); ?>"
            :edit="<?php echo e(json_encode(auth()->user()->hasPermission('courses-update') )); ?>"
            :delete_pre="<?php echo e(json_encode(auth()->user()->hasPermission('courses-delete') )); ?>"
            ></courses-component>
            <!-- Recent Transactions -->
       
            
            <!--/ Recent Transactions -->
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>








<?php echo $__env->make('admin.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\classat_laravel\resources\views/admin/courses/index.blade.php ENDPATH**/ ?>