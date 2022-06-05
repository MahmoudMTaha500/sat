<!DOCTYPE html>
    <html class="loading" lang="en" data-textdirection="rtl">
        <?php echo $__env->make('admin.includes.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <body class="vertical-layout vertical-menu 2-columns   menu-expanded fixed-navbar" data-open="click" data-menu="vertical-menu" data-col="2-columns">
        <?php echo $__env->make('admin.includes.menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->make('admin.includes.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div id="sat_app_vue">
            <?php echo $__env->yieldContent('admin.content'); ?>                        
        </div>
        <?php echo $__env->make('admin.includes.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> 
        <?php echo $__env->make('admin.includes.alerts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->yieldContent('admin.custom-js-scripts'); ?>
    </body>
</html>


<?php /**PATH C:\wamp64\www\classat_laravel\resources\views/admin/app.blade.php ENDPATH**/ ?>