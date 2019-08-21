<?php 
    switch($array["path"]) {
        case "home": {
            $page_name = "Homepage";
            break;
        }
        case "about": {
            $page_name = "About Us";
            break;
        }
        case "circulars": {
            $page_name = "Circulars";
            break;
        }
        case "courses": {
            $page_name = "Courses";
            break;
        }
        case "legal-documents": {
            $page_name = "Legal Documents";
            break;
        }
        case "result": {
            $page_name = "Online Results";
            break;
        }
        
        case "online-adm": {
            $page_name = "Online Admissions";
            break;
        }
        
        case "downloads": {
            $page_name = "Downloads";
            break;
        }
        
        case "contact": {
            $page_name = "Contact Us";
            break;
        }
        
        case "default": {
            $page_name = "Website";
            break;
        }
    }
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
        $notices = "<marquee>Welcome to the offiial website of ".ucfirst(strtolower(appName)).". Best Board of Maharashtra.</marquee>";
    }

    $res = $db->select("website_basic_info", "*");
    if($res[0] == true) {
        while($row = mysqli_fetch_assoc($res[1])) {
            $bs = $row;
        }
    }
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title><?=$page_name?> : <?= ucfirst(strtolower(appName)) ?></title>
    <link rel="stylesheet" href="<?=webCdn ?>/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic">
    <link rel="stylesheet" href="<?=webCdn ?>/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="<?=webCdn ?>/css/styles.min.css">
    <script src="<?=webCdn ?>/js/jquery.min.js"></script>

</head>

<body id="page-top">

    <div id="preloader"><i></i></div>

    <div class="navbar text-right" style="background: lightgray;">
        <a class="text-right" href="mailto:<?= $bs['college_email'] ?>" style="color: black; width: 100%"><i
                class="fa fa-envelope-open text-primary"></i> &nbsp; <?= $bs['college_email'] ?></a>
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

    <img src="<?=webCdn ?>/img/header.jpg" width="100%">
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
                            href="/courses/">Courses</a></li>
                    <li class="nav-item mx-0 mx-lg-1" role="presentation"><a
                            class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="/results/">Results</a>
                    </li>
                    <li class="nav-item mx-0 mx-lg-1" role="presentation"><a
                            class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger"
                            href="/online-admissions/">Admission</a></li>
                    <li class="nav-item mx-0 mx-lg-1" role="presentation"><a
                            class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger"
                            href="/circulars/">Circulars</a></li>
                    <li class="nav-item mx-0 mx-lg-1" role="presentation"><a
                            class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger"
                            href="/downloads/">Downloads</a>
                    </li>
                    <li class="nav-item mx-0 mx-lg-1" role="presentation"><a
                            class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger"
                            href="/legal-documents/">Legal Documents</a>
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
                    <div class="jumbotron carousel-hero" style="background-image: url(<?= $bs['ss_img_1_url'] ?>);">
                        <h1 class="hero-title slide-title glow"><?= $bs['ss_img_1_title'] ?></h1>
                        <p class="hero-subtitle slide-info glow"><?= $bs['ss_img_1_info'] ?></p>
                        <!--p><a class="btn btn-primary btn-lg hero-button" role="button" href="#">Learn more</a></p-->
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="jumbotron carousel-hero" style="background-image: url(<?= $bs['ss_img_2_url'] ?>);">
                        <h1 class="hero-title glow"><?= $bs['ss_img_2_title'] ?></h1>
                        <p class="hero-subtitle glow"><?= $bs['ss_img_2_info'] ?></p>
                        <p><a class="btn btn-warning btn-lg hero-button" role="button" href="/about/">About Us</a></p>

                    </div>
                </div>
                <div class="carousel-item">
                    <div class="jumbotron carousel-hero" style="background-image: url(<?= $bs['ss_img_3_url'] ?>);">
                        <h1 class="hero-title glow"><?= $bs['ss_img_3_title'] ?></h1>
                        <p class="hero-subtitle"><?= $bs['ss_img_3_info'] ?></p>
                        <p><a class="btn btn-warning btn-lg hero-button" role="button" href="/courses/">View Courses</a></p>
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
                    <p><?= $bs['address_line_1'] ?><br><?= $bs['address_line_2'] ?><br><a style="color:white" href="tel:<?= $bs['college_contact_no_1'] ?>"><i class="fa fa-phone"></i> <?= $bs['college_contact_no_1'] ?></a><br><a style="color:white" href="mailto:<?= $bs['college_email']; ?>"><i class="fa fa-envelope-open"></i>&nbsp; <?= $bs['college_email']; ?></a>  </p>
                </div>
                <div class="col-lg-8 col-sm-12"><iframe allowfullscreen="" frameborder="0" width="100%" height="200"
                        src="https://www.google.com/maps/embed/v1/place?key=AIzaSyCsfYDDOQ1ZZ6ktnSafPQAm5_91bK7JntU&amp;q=<?= urlencode($bs['address_line_3'])?>&amp;zoom=11"></iframe>
                </div>

            </div>
        </div>
    </footer>
    <div class="copyright py-4 text-center text-white">
        <div class="container">
            <div class="row">
                <div class="col-12">

                </div>
                <div class="col-sm-12 col-lg-8 col-xl-8 col-md-8"><span style="word-spacing: 20px"><a href="/">Home</a>
                        <a href="/about/">About</a> <a href="/contact/">Contact</a>
                        <a href="/results/">Results</a> </span></div>
                <div class="col-sm-12 col-lg-4 col-md-4 col-xl-4">Copyright &copy; <?= ucfirst(strtolower(appName)) ?></div>
            </div>
        </div>
    </div>
    <div class="scroll-to-top position-fixed rounded"><a
            class="d-block js-scroll-trigger text-center text-white rounded" title="Back to Top" href="#page-top"><i
                class="fa fa-chevron-up"></i></a></div>
    <script src="<?=webCdn ?>/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
    <script src="<?=webCdn ?>/js/script.min.js"></script>
</body>

</html>