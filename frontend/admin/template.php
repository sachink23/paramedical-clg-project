<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>dashboard</title>
    <link rel="stylesheet" href="<?=webCdn ?>/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?=webCdn ?>/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="<?=webCdn ?>/css/admin.min.css">
    <style>
        a.nav-link:hover {
            font-color: pink !important;
        }
    </style>
</head>

<body>
    <div>
        <nav class="navbar navbar-light navbar-expand-md navigation-clean-button" style="background-color: #2c3e50;">
            <div class="container"><span class="navbar-brand" style="color: #ffffff;">Company Name</span><button class="navbar-toggler" data-toggle="collapse" data-target="#navcol-1" style="color: rgb(255,255,255);"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
                <div
                    class="collapse navbar-collapse" id="navcol-1">
                    <ul class="nav navbar-nav mr-auto">
                        <li class="nav-item" role="presentation" style="color: rgb(255,255,255);"><a class="nav-link" href="/admin/" style="color: rgb(255,255,255);">Dashboard</a></li>
                        <li class="dropdown nav-item" style="color: rgb(255,255,255);"><a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false" href="#" style="color: rgb(255,255,255);">Menu</a>
                            <div class="dropdown-menu" role="menu"><a class="dropdown-item" role="presentation" href="#">First Item</a><a class="dropdown-item" role="presentation" href="#">Second Item</a><a class="dropdown-item" role="presentation" href="#">Third Item</a></div>
                        </li>
                        <li class="nav-item" role="presentation" style="color: rgb(255,255,255);"><a class="nav-link" style="color: rgb(255,255,255);">Hi, <?= ucfirst($_SESSION['admin_f_name'] . ' '. $_SESSION['admin_l_name']); ?></a></li>
                    </ul><span class="navbar-text actions"> <a class="btn btn-light action-button" role="button" href="/admin/login/?logout=true">Log Out</a></span></div>
    </div>
    </nav>
    </div>
    <div class="features-boxed">
        <div class="container">
            <div class="row justify-content-center features">
                <div class="col-sm-6 col-md-5 col-lg-4 item">
                    <div class="box"><i class="fa fa-sticky-note icon" style="color: rgb(255,15,15);"></i>
                        <h3 class="name">Manage Notice Board</h3>
                        <p class="description">In this section user can manage notice board on website.</p><a href="#" class="learn-more">Manage Website »</a></div>
                </div>
                <div class="col-sm-6 col-md-5 col-lg-4 item">
                    <div class="box"><i class="fa fa-retweet icon" style="color: #ff0f0f;"></i>
                        <h3 class="name">Manage Circulars / Downloads</h3>
                        <p class="description">This section is to manage circulars and downloads on the website.</p><a href="#" class="learn-more">Manage Admissions »</a></div>
                </div>
                <div class="col-sm-6 col-md-5 col-lg-4 item">
                    <div class="box"><i class="fa fa-graduation-cap icon" style="color: #ff0f0f;"></i>
                        <h3 class="name">Manage Admissions</h3>
                        <p class="description">This section is to manage admissions received through website.</p><a href="#" class="learn-more">Manage Admissions »</a></div>
                </div>
                <div class="col-sm-6 col-md-5 col-lg-4 item">
                    <div class="box"><i class="fa fa-bar-chart-o icon" style="color: #ff0f0f;"></i>
                        <h3 class="name">Manage Results</h3>
                        <p class="description">In this section user can manage results, which can be showed on website.</p><a href="#" class="learn-more">Manage Results »</a></div>
                </div>
                <div class="col-sm-6 col-md-5 col-lg-4 item">
                    <div class="box"><i class="fa fa-users icon" style="color: #ff0f0f;"></i>
                        <h3 class="name">Manage Users</h3>
                        <p class="description">In this section admin can manage users, add users, reset their passwords or remove them.</p><a href="#" class="learn-more">Manage Users »</a></div>
                </div>
                <div class="col-sm-6 col-md-5 col-lg-4 item">
                    <div class="box"><i class="fa fa-gears icon" style="color: #ff0f0f;"></i>
                        <h3 class="name">Settings</h3>
                        <p class="description">In settings user can edit basic information on the website.</p><a href="#" class="learn-more">Settings »</a></div>
                </div>
            </div>
        </div>
    </div>
    <script src="<?=webCdn ?>/js/jquery.min.js"></script>
    <script src="<?=webCdn ?>/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>