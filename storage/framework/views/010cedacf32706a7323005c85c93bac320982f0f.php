

<?php $__env->startSection('content'); ?>
<div class="sidebar" id="sidebar">
            <div class="sidebar-inner slimscroll">
                <div class="sidebar-menu">
                    <ul>
                        <li>
                            <a href="index.html"><i class="fa fa-home back-icon"></i> <span>Back to Home</span></a>
                        </li>
                        <li class="menu-title">Settings</li>
                        <li>
                            <a href="settings.html"><i class="fa fa-building"></i> <span>Company Settings</span></a>
                        </li>
                        <li>
                            <a href="localization.html"><i class="fa fa-clock-o"></i> <span>Localization</span></a>
                        </li>
                        <li>
                            <a href="theme-settings.html"><i class="fa fa-picture-o"></i> <span>Theme Settings</span></a>
                        </li>
                        <li>
                            <a href="roles-permissions.html"><i class="fa fa-key"></i> <span>Roles & Permissions</span></a>
                        </li>
                        <li>
                            <a href="email-settings.html"><i class="fa fa-envelope-o"></i> <span>Email Settings</span></a>
                        </li>
                        <li>
                            <a href="invoice-settings.html"><i class="fa fa-pencil-square-o"></i> <span>Invoice Settings</span></a>
                        </li>
                        <li>
                            <a href="salary-settings.html"><i class="fa fa-money"></i> <span>Salary Settings</span></a>
                        </li>
                        <li>
                            <a href="notifications-settings.html"><i class="fa fa-globe"></i> <span>Notifications</span></a>
                        </li>
                        <li>
                            <a href="change-password.html"><i class="fa fa-lock"></i> <span>Change Password</span></a>
                        </li>
                        <li class="active">
                            <a href="leave-type.html"><i class="fa fa-cogs"></i> <span>Leave Type</span></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="page-wrapper">
            <div class="content">
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <h4 class="page-title">Add Leave Type</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <form>
                            <div class="form-group">
                                <label>Leave Type <span class="text-danger">*</span></label>
                                <input class="form-control" type="text">
                            </div>
                            <div class="form-group">
                                <label>Number of days <span class="text-danger">*</span></label>
                                <input class="form-control" type="text">
                            </div>
                            <div class="m-t-20 text-center">
                                <button class="btn btn-primary submit-btn">Add Leave Type</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.mainlayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\preclinic_laravel\resources\views/add-leave-type.blade.php ENDPATH**/ ?>