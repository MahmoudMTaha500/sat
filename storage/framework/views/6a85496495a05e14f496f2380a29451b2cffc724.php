
<?php $__env->startSection('admin.content'); ?>

    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <h3 class="content-header-title">لوحة التحكم</h3>
                </div>
            </div>
            <div class="content-body">
                <div id="crypto-stats-3" class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">الطلبات</h4>
                            </div>
                            <div class="card-content collapse show">
                                <div class="card-body">
                                    <student-request-component
                                        update_classat_note_route = "<?php echo e(route('update_classat_note')); ?>"
                                        :course_url="<?php echo e(json_encode(url('/dashboard/getcourses'))); ?>"
                                        :student_request_url="<?php echo e(json_encode(url('/dashboard/student-requests/getStudentRequests'))); ?>"
                                        :dahsboard_url="<?php echo e(json_encode(url('/dashboard'))); ?>"   
                                        :countries_from_blade="<?php echo e(json_encode($countries)); ?>"
                                        :institutes="<?php echo e(json_encode($institutes)); ?>"
                                        :csrftoken="<?php echo e(json_encode(csrf_token())); ?>"
                                        :create="<?php echo e(json_encode(auth()->user()->hasPermission('student-requests-create') )); ?>"
                                        :edit="<?php echo e(json_encode(auth()->user()->hasPermission('student-requests-update') )); ?>"
                                        :delete_pre="<?php echo e(json_encode(auth()->user()->hasPermission('student-requests-delete') )); ?>"
                                        :get_courses_url="<?php echo e(json_encode(route('blog.get.courses.vue'))); ?>"
                                        :get_institutes_url="<?php echo e(json_encode(route('blog.get.institutes.vue'))); ?>"
                        
                                    ></student-request-component>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\classat_laravel\resources\views//admin/dashboard.blade.php ENDPATH**/ ?>