<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>dashboard</title>
    <link rel="stylesheet" href="<?=webCdn ?>/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?=webCdn ?>/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="<?=webCdn ?>/css/admin.min.css">
</head>

<body>
    <div id="preloader"><i></i></div>
    <div>
        <nav class="navbar navbar-light navbar-expand-md navigation-clean-button" style="background-color: #2c3e50;">
            <div class="container"><span class="navbar-brand" style="color: #ffffff;">Website Management</span><button
                    class="navbar-toggler bg-primary" data-toggle="collapse" data-target="#navcol-1"
                    style="color: rgb(255,255,255);"><span class="sr-only">Toggle navigation</span><span
                        class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navcol-1">
                    <ul class="nav navbar-nav mr-auto">
                        <li class="nav-item" role="presentation" style="color: rgb(255,255,255);"><a class="nav-link"
                                href="/admin/" style="color: rgb(255,255,255);">Dashboard</a></li>
                        <li class="dropdown nav-item" style="color: rgb(255,255,255);"><a
                                class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false" href="#"
                                style="color: rgb(255,255,255);">Menu</a>
                            <div class="dropdown-menu" role="menu"><a class="dropdown-item" role="presentation"
                                    href="#">First Item</a><a class="dropdown-item" role="presentation" href="#">Second
                                    Item</a><a class="dropdown-item" role="presentation" href="#">Third Item</a></div>
                        </li>
                        <li class="nav-item" role="presentation" style="color: rgb(255,255,255);"><a class="nav-link"
                                style="color: rgb(255,255,255);">Hi,
                                <?= ucfirst($_SESSION['admin_f_name'] . ' '. $_SESSION['admin_l_name']); ?></a></li>
                    </ul><span class="navbar-text actions"> <a class="btn btn-light action-button" role="button"
                            href="/admin/login/?logout=true">Log Out</a></span>
                </div>
            </div>
        </nav>
    </div>
    <?php require_once appRoot."/frontend/admin/pages/".$array['path'].".php"; ?>
    

    <script src="<?=webCdn ?>/js/jquery.min.js"></script>
    <script src="<?=webCdn ?>/js/admin.min.js"></script>
    <script src="<?=webCdn ?>/bootstrap/js/bootstrap.min.js"></script>
    <script>
    $('#noticeManagementModal').on('show.bs.modal', event => {
        var button = $(event.relatedTarget);
        var modal = $(this);

        // Use above variables to manipulate the DOM

    });
    </script>
    <script>
    $('#settingsModal').on('show.bs.modal', event => {
        var button = $(event.relatedTarget);
        var modal = $(this);
        // Use above variables to manipulate the DOM
        
    });
</script>
</body>

</html>