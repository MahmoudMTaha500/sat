<?php if(session()->has('alert_message')): ?>
    <script>
        swal({
            title: "<?php echo e(session()->get('alert_message')['message']); ?>",
            text: "",
            icon: "<?php echo e(session()->get('alert_message')['icon']); ?>",
            button: "اغلاق",
        });
    </script>
    <?php echo e(session()->forget('alert_message')); ?>

<?php endif; ?><?php /**PATH C:\wamp64\www\classat_laravel\resources\views/admin/includes/alerts.blade.php ENDPATH**/ ?>