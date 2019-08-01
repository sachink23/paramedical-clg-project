<?php 
    $notifTable = "notifs_circus_downlds";
    $db = new db;
    $data = "text,flag,link"; 
    $whereStmt = "type = 'N'"; 
    $res = $db->select($notifTable, $data, $whereStmt, NULL, "ORDER BY id DESC");
    if($res[0] == true && $res[1]->num_rows > 0) {
        $notices = "<marquee>";
        $i = $res[1]->num_rows;
        $j=0;
        while($row = mysqli_fetch_assoc($res[1])) {
            $i--;
            $j++;
            if($j<=5) {
                if($row['flag'] == "new") {
                    $notices .= "<span class='badge badge-danger'>New</span>&nbsp;&nbsp;";
                } else if($row["flag"] == "imp") {
                    $notices .= "<span class='badge badge-secondary'>Important</span>&nbsp;&nbsp;";
                }
            }
            if($row["link"] <> "0") {
                $notices .="<a style='color:black' href='".$row['link']."'>".$row["text"]."</a>";
            } else {
                $notices .=$row['text'];
            }
            if($i>0) { 
                $notices .= "&nbsp | &nbsp";
            }
        }
        $notices .= "</marquee>";
    } else {
        $notices = "<marquee>Welcome to the offiial website of ".appName."</marquee>";
    }

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Homepage : ClgName</title>
    <link rel="stylesheet" href="<?=webCdn ?>/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleaspis.com/css?family=Montserrat:400,700">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic">
    <link rel="stylesheet" href="<?=webCdn ?>/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="<?=webCdn ?>/css/styles.min.css">
</head>

<body id="page-top">
    <div class="navbar text-right" style="background: lightgray;">
        <a class="text-right" href="mailto:clgemail@example.com" style="color: black; width: 100%"><i
                class="fa fa-envelope-open text-primary"></i> &nbsp; clgemail@example.com</a>
    </div>
    <div class="navbar bg-primary">
        <div class="" style="width:100%">
            <?= $notices; ?>
        </div>
    </div>
    <style>
    li.nav-item {
        font-size: 11px;
    }

    li.nav-item:hover {
        background: yellow;
    }
    </style>

    <img src="https://via.placeholder.com/1366x120?text=clgBanner" width="100%" height="70px">
    <nav class="navbar navbar-light navbar-expand-lg bg-secondary text-uppercase" id="mainNav">
        <div class="container">
            <a class="navbar-brand" href="#"></a>
            <button class="navbar-toggler navbar-toggler-right text-uppercase bg-primary text-white rounded"
                data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive"
                aria-expanded="false" aria-label="Toggle navigation"><i class="fa fa-bars"></i></button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="nav navbar-nav ml-auto mr-auto">
                    <li class="nav-item mx-0 mx-lg-1" role="presentation"><a
                            class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="/">Home</a></li>
                    <li class="nav-item mx-0 mx-lg-1" role="presentation"><a
                            class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="/about/">About Us</a>
                    </li>
                    <li class="nav-item mx-0 mx-lg-1" role="presentation"><a
                            class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger"
                            href="/circulars/">Circulars</a></li>
                    <li class="nav-item mx-0 mx-lg-1" role="presentation"><a
                            class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger"
                            href="/institute/">Institute</a></li>
                    <li class="nav-item mx-0 mx-lg-1" role="presentation"><a
                            class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="/results/">Results</a>
                    </li>
                    <li class="nav-item mx-0 mx-lg-1" role="presentation"><a
                            class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger"
                            href="/online-admissions/">Admission</a></li>
                    <li class="nav-item mx-0 mx-lg-1" role="presentation"><a
                            class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger"
                            href="/downloads/">Downloads</a>
                    </li>
                    <li class="nav-item mx-0 mx-lg-1" role="presentation"><a
                            class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="/enquiry/">Enquiry</a>
                    </li>
                    <li class="nav-item mx-0 mx-lg-1" role="presentation"><a
                            class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="/contact/">Contact Us</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <header class="bg-primary text-white text-center">
        <div class="carousel slide" data-ride="carousel" id="carousel-1">
            <div class="carousel-inner" role="listbox">
                <div class="carousel-item active">
                    <div class="jumbotron hero-nature carousel-hero">
                        <h1 class="hero-title">Some Title</h1>
                        <p class="hero-subtitle">Nullam id dolor id nibh ultricies vehicula ut id elit. Cras justo odio,
                            dapibus ac facilisis in, egestas eget quam.</p>
                        <!--p><a class="btn btn-primary btn-lg hero-button" role="button" href="#">Learn more</a></p-->
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="jumbotron hero-photography carousel-hero">
                        <h1 class="hero-title">Some Title</h1>
                        <p class="hero-subtitle">Nullam id dolor id nibh ultricies vehicula ut id elit. Cras justo odio,
                            dapibus ac facilisis in, egestas eget quam.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="jumbotron hero-technology carousel-hero">
                        <h1 class="hero-title">Some Title</h1>
                        <p class="hero-subtitle">Nullam id dolor id nibh ultricies vehicula ut id elit. Cras justo odio,
                            dapibus ac facilisis in, egestas eget quam.</p>
                    </div>
                </div>
            </div>
            <div><a class="carousel-control-prev" href="#carousel-1" role="button" data-slide="prev"><i
                        class="fa fa-chevron-left"></i><span class="sr-only">Previous</span></a><a
                    class="carousel-control-next" href="#carousel-1" role="button" data-slide="next"><i
                        class="fa fa-chevron-right"></i><span class="sr-only">Next</span></a></div>
            <ol class="carousel-indicators">
                <li data-target="#carousel-1" data-slide-to="0" class="active"></li>
                <li data-target="#carousel-1" data-slide-to="1"></li>
                <li data-target="#carousel-1" data-slide-to="2"></li>
            </ol>
        </div>
    </header>

    <?php require_once appRoot."/frontend/website/pages/".$array['path'].".php"; ?>

    <footer class="footer text-center">
        <div class="container">
            <div class="row">

                <div class="col-lg-4 col-sm-12">
                    <h4 class="text-uppercase">Address</h4>
                    <p>College Address<br>Phone, Email</p>
                </div>
                <div class="col-lg-8 col-sm-12"><iframe allowfullscreen="" frameborder="0" width="100%" height="200"
                        src="https://www.google.com/maps/embed/v1/place?key=AIzaSyCsfYDDOQ1ZZ6ktnSafPQAm5_91bK7JntU&amp;q=Parbhani&amp;zoom=11"></iframe>
                </div>

            </div>
        </div>
    </footer>
    <div class="copyright py-4 text-center text-white">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-lg-8 col-xl-8 col-md-8"><span style="word-spacing: 20px"><a href="/">Home</a>
                        <a href="/about/">About</a> <a href="/contact/">Contact</a>
                        <a href="/results/">Results</a> <a href="/enquiry/">Enquiry</a> </span></div>
                <div class="col-sm-12 col-lg-4 col-md-4 col-xl-4">Copyright &copy; clgName 2019</div>
            </div>
        </div>
    </div>
    <div class="d-lg-none scroll-to-top position-fixed rounded"><a
            class="d-block js-scroll-trigger text-center text-white rounded" href="#page-top"><i
                class="fa fa-chevron-up"></i></a></div>
    <script src="<?=webCdn ?>/js/jquery.min.js"></script>
    <script src="<?=webCdn ?>/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
    <script src="<?=webCdn ?>/js/script.min.js"></script>
</body>

</html>