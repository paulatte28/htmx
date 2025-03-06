

<?php $__env->startSection('content'); ?>
<div class="container d-flex justify-content-center">
    <div class="card shadow-lg p-4 w-50">
        <div class="card-body text-center">
            <h1 class="card-title text-primary"><?php echo e($diary->title); ?></h1>
            <hr>
            <p class="card-text text-secondary" style="white-space: pre-wrap;"><?php echo e($diary->content); ?></p>
            <div class="mt-4">
                <a href="<?php echo e(route('dashboard')); ?>" class="btn btn-secondary">Back</a>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\xampp\htdocs\Laravel_Coretico - Copy\resources\views/diary/show.blade.php ENDPATH**/ ?>