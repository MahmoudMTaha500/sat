 <?php $__env->startSection('admin.content'); ?> <?php echo e($department_name='institutes'); ?> <?php echo e($page_name='institute'); ?>


<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2">
                <h3 class="content-header-title">قسم المعاهد</h3>
                <div class="row breadcrumbs-top">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="dashboard">لوحة التحكم</a></li>
                            <li class="breadcrumb-item active">المعاهد</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">
            <institutes-component
                :get_institute_url="<?php echo e(json_encode(url('/dashboard/getinstitues'))); ?>"
                :institute_url_edit="<?php echo e(json_encode(url('/dashboard/institute/'))); ?>"
                :csrftoken="<?php echo e(json_encode(csrf_token())); ?>"
                :aprove_route="<?php echo e(json_encode(url('/dashboard/update-institute-aprovement'))); ?>"
                :path_logo="<?php echo e(json_encode(asset('/'))); ?>"
                :route_create="<?php echo e(json_encode(url('/dashboard/institute/create'))); ?>"
                :show_institute_url="<?php echo e(json_encode(route('institute.index'))); ?>"
                :countries_from_blade="<?php echo e(json_encode($countries)); ?>"
                :dahsboard_url="<?php echo e(json_encode(url('/dashboard'))); ?>"
                :url_filtier="<?php echo e(json_encode(url('/dashboard/filter'))); ?>"
                :create="<?php echo e(json_encode(auth()->user()->hasPermission('institutes-create') )); ?>"
                :edit="<?php echo e(json_encode(auth()->user()->hasPermission('institutes-update') )); ?>"
                :delete_pre="<?php echo e(json_encode(auth()->user()->hasPermission('institutes-delete') )); ?>"
                :force_delete="<?php echo e(json_encode(auth()->user()->hasRole(['super-admin','admin']) )); ?>"                
            ></institutes-component>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\classat_laravel\resources\views/admin/institutes/index.blade.php ENDPATH**/ ?>