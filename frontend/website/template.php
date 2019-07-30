<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="<?=webCdn;?>/bootstrap/bootstrap.min.css">
    <title><?=appName;?></title>
</head>

<body>

    <!-- Header -->
    <nav class="navbar navbar-expand-lg navbar-light" style="background:#44fcd5">
        <a class="navbar-brand" href="#">Menu</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
            aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">About Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Circulars</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Institute</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Results</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Online Admissions</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Downloads</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Enquiry</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Contact Us</a>
                </li>
            </ul>
        </div>
    </nav>
    <!-- End Header -->

    <!-- Page contents -->
    <?php require_once appRoot."/frontend/website/pages/".$array['path'].".php"; ?>
    <!-- End Page contents -->

    <!-- Footer -->

    <!-- End Footer -->
    <script src="<?=webCdn;?>/bootstrap/jquery.min.js"></script>
    <script src="<?=webCdn;?>/bootstrap/popper.min.js"></script>
    <script src="<?=webCdn;?>/bootstrap/bootstrap.bundle.min.js"></script>
</body>

</html>