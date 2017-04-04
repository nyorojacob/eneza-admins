<?php $__env->startSection('content'); ?>

    <?php echo e(trans('quickadmin::admin.dashboard-title')); ?>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>