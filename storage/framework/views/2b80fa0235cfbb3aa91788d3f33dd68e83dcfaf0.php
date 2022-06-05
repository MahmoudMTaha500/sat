<!DOCTYPE html>
<html lang="ar" dir="<?php echo e(LaravelLocalization::getCurrentLocaleDirection()); ?>">
    <?php echo $__env->make('website.includes.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <body class="bg-white">
        <!-- Header -->
        <?php echo $__env->make('website.includes.menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <!-- ./Header -->

        <div style="min-height: 52vh;" id="sat_app_vue">
            <?php echo $__env->yieldContent('website.content'); ?>
        </div>

        <!-- Footer -->
        <?php echo $__env->make('website.includes.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> 
        <?php echo $__env->yieldContent('website.includes.page_scripts'); ?>
        <?php echo $__env->make('website.includes.alerts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </body>
</html>
<?php /**PATH C:\wamp64\www\classat_laravel\resources\views/website/app.blade.php ENDPATH**/ ?>