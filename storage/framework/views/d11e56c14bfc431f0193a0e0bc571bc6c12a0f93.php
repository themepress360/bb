

<?php $__env->startSection('content'); ?>
<div class="main-wrapper account-wrapper">
        <div class="account-page">
			<div class="account-center">
                <div class="account-box">
                    <form class="form-signin" action="#">
						<div class="account-logo">
                            <a href="demo"><img src="img/logo-dark.png" alt=""></a>
                        </div>
                        <div class="form-group">
                            <label>Current Password</label>
                            <input type="text" class="form-control" autofocus>
                        </div>
                        <div class="form-group text-center">
                            <button class="btn btn-primary account-btn" type="submit">Reset Password</button>
                        </div>
                        <div class="text-center register-link">
                            <a href="login">Back to Login</a>
                        </div>
                    </form>
                </div>
			</div>
        </div>
    </div>
    <div class="main-wrapper">
        <div class="account-page">
            <div class="container">
                <h3 class="account-title">Change Password</h3>
                <div class="account-box">
                    <div class="account-wrapper">
                        <div class="account-logo">
                            <a href="demo"><img src="img/logo.png" alt=""></a>
                        </div>
                        <form action="demo">
                            <div class="form-group form-focus">
                                <label class="focus-label">Current Password</label>
                                <input class="form-control floating" type="password">
                            </div>
                            <div class="form-group form-focus">
                                <label class="focus-label">New Password</label>
                                <input class="form-control floating" type="password">
                            </div>
                            <div class="form-group form-focus">
                                <label class="focus-label">New Repeat Password</label>
                                <input class="form-control floating" type="password">
                            </div>
                            <div class="form-group mb-0 text-center">
                                <button class="btn btn-primary btn-block account-btn" type="submit">Change Password</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.mainlayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\preclinic_laravel\resources\views/change-password2.blade.php ENDPATH**/ ?>