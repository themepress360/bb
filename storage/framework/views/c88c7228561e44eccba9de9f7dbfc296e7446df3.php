

<?php $__env->startSection('content'); ?>
<div class="main-wrapper error-wrapper">
        <div class="error-box">
            <h1>500</h1>
            <h3><i class="fa fa-warning"></i> Oops! Something went wrong</h3>
            <p>The page you requested was not found.</p>
            <a href="index.html" class="btn btn-primary go-home">Go to Home</a>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.mainlayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\preclinic_laravel\resources\views/error-500.blade.php ENDPATH**/ ?>