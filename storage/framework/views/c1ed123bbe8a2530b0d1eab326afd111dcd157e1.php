
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">
    <title>Preclinic - Medical & Hospital - Bootstrap 4 Admin Template</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <!--[if lt IE 9]>
		<script src="assets/js/html5shiv.min.js"></script>
		<script src="assets/js/respond.min.js"></script>
	<![endif]-->
</head>

<body>
    <div class="main-wrapper error-wrapper">
        <div class="error-box">
            <form action="<?php echo e(route('page')); ?>">
                <div class="lock-user">
                    <img class="rounded-circle" src="img/user.jpg" alt="">
                    <h6>John Doe</h6>
                </div>
                <div class="form-group">
                    <input class="form-control" placeholder="Enter Password" type="password">
                </div>
                <div class="text-center">
                    <a href="<?php echo e(route('login')); ?>">Sign in as a different user?</a>
                </div>
            </form>
        </div>
    </div>
    <script src="js/jquery-3.2.1.min.js"></script>
	<script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>

</html><?php /**PATH C:\xampp\htdocs\blog1\resources\views/pages/lockscreen.blade.php ENDPATH**/ ?>