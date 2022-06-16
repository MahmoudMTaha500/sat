 <?php $__env->startSection('admin.content'); ?>
<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2">
                <h3 class="content-header-title">قسم السكن</h3>
                <div class="row breadcrumbs-top">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>">لوحة التحكم</a></li>
                            <li class="breadcrumb-item active">السكن</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">
            <residence-component
                :dahsboard_url="<?php echo e(json_encode(url('/dashboard'))); ?>"
                :csrftoken="<?php echo e(json_encode(csrf_token())); ?>"
                :institutes="<?php echo e(json_encode($institutes)); ?>"
                :create="<?php echo e(json_encode(auth()->user()->hasPermission('services-create') )); ?>"
                :edit="<?php echo e(json_encode(auth()->user()->hasPermission('services-update') )); ?>"
                :delete_pre="<?php echo e(json_encode(auth()->user()->hasPermission('services-delete') )); ?>"
            >
            <residence-component>
                
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\classat_laravel\resources\views/admin/residences/index.blade.php ENDPATH**/ ?>