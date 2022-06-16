<?php $__env->startSection('website.content'); ?>



<h1 class="d-none">المعاهد</h1>
<institutes-pgae-component
    :get_courses_url="<?php echo e(json_encode(route('vue.get.courses'))); ?>"
    :get_student_favourite_courses_url="<?php echo e(json_encode(route('vue.get.student.favourite.courses'))); ?>"
    :public_path="<?php echo e(json_encode(asset('/'))); ?>"
    :search="<?php echo e(json_encode($search)); ?>"
    :student_check = "<?php echo e(json_encode(auth()->guard('student')->check())); ?>"
    <?php if(auth()->guard('student')->check()): ?>
    :student_id="<?php echo e(json_encode(auth()->guard('student')->user()->id)); ?>"
    <?php endif; ?>
    get_countries_url = "<?php echo e(route('vue.get.countries')); ?>"
    get_cities_url = "<?php echo e(route('vue.get.cities')); ?>"
>
</institutes-pgae-component>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('website.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\classat_laravel\resources\views/website/institute/institutes.blade.php ENDPATH**/ ?>