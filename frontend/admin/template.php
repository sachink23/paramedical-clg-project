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
    <div class="features-boxed">
        <div class="container">
            <div class="row justify-content-center features">
                <div class="col-sm-6 col-md-5 col-lg-4 item" data-toggle="modal" data-target="#noticeManagementModal">
                    <div class="box"><i class="fa fa-retweet icon" style="color: rgb(255,15,15);"></i>
                        <h3 class="name">Manage Notice Board</h3>
                        <p class="description">In this section user can manage Notice Board, Circulars, and Downloads.
                        </p><a href="#" class="learn-more">Manage Notice Board »</a>
                    </div>
                </div>
                <div class="col-sm-6 col-md-5 col-lg-4 item">
                    <div class="box"><i class="fa fa-retweet icon" style="color: #ff0f0f;"></i>
                        <h3 class="name">Manage Circulars / Downloads</h3>
                        <p class="description">This section is to manage circulars and downloads.</p><a href="#"
                            class="learn-more">Manage Circulars / Downloads »</a>
                    </div>
                </div>
                <div class="col-sm-6 col-md-5 col-lg-4 item">
                    <div class="box"><i class="fa fa-graduation-cap icon" style="color: #ff0f0f;"></i>
                        <h3 class="name">Manage Admissions</h3>
                        <p class="description">This section is to manage admissions received through website.</p><a
                            href="#" class="learn-more">Manage Admissions »</a>
                    </div>
                </div>
                <div class="col-sm-6 col-md-5 col-lg-4 item">
                    <div class="box"><i class="fa fa-bar-chart-o icon" style="color: #ff0f0f;"></i>
                        <h3 class="name">Manage Results</h3>
                        <p class="description">In this section user can manage results, which can be showed on website.
                        </p><a href="#" class="learn-more">Manage Results »</a>
                    </div>
                </div>
                <div class="col-sm-6 col-md-5 col-lg-4 item">
                    <div class="box"><i class="fa fa-users icon" style="color: #ff0f0f;"></i>
                        <h3 class="name">Manage Users</h3>
                        <p class="description">In this section admin can manage users, add users, reset their passwords
                            or remove them.</p><a href="#" class="learn-more">Manage Users »</a>
                    </div>
                </div>
                <div class="col-sm-6 col-md-5 col-lg-4 item">
                    <div class="box"><i class="fa fa-gears icon" style="color: #ff0f0f;"></i>
                        <h3 class="name">Settings</h3>
                        <p class="description">In settings user can edit basic information on the website.</p><a
                            href="#" class="learn-more">Settings »</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- modals -->

    <!-- Modal -->
    <div class="modal fade" id="noticeManagementModal" tabindex="-1" role="dialog" aria-labelledby="noticeBoardTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="noticeBoardTitle">Manage Notice / Circulars / Downloads </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <form name="notifiSendForm" action="javascript:void(0)" id="notifiSendForm" onsubmit="admin.submitNotifForm()" class="row">
                            <div class="col-lg-6 col-xl-6 col-md-12 col-sm-12 form-group">
                                <label for="selectTypeOfNotif">Select Type <big class="text-danger">*</big></label>
                                <select class="form-control" required name="selectTypeOfNotif" id="selectTypeOfNotif">
                                    <option value="" selected>Select Type</option>
                                    <option value="N">Notification</option>
                                    <option value="C">Circular</option>
                                    <option value="D">Download</option>
                                </select>
                                <small id="selectTypeOfNotifHelp"></small>
                            </div>
                            <div class="col-lg-6 col-xl-6 col-md-12 col-sm-12 form-group">
                                <label for="batchForNotif">Select Label <big class="text-danger">*</big></label><br />
                                <div class="form-check form-check-inline">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="radio" name="batchForNotif"
                                            id="batchForNotif" value="new" checked required> <span
                                            class="badge badge-danger">New</span>&nbsp;&nbsp;
                                        <input class="form-check-input" type="radio" name="batchForNotif" value="imp">
                                        <span class="badge badge-secondary">Important</span>&nbsp;&nbsp;
                                        <input class="form-check-input" type="radio" name="batchForNotif" value="na">
                                        None&nbsp;&nbsp;
                                    </label>
                                </div>
                                <small id="batchForNotifHelp"></small>
                            </div>
                            <div class="col-12 form-group">
                                <label for="notifText">Enter Notification / Circular / Download Text <big
                                        class="text-danger">*</big></label>
                                <textarea rows="3" class="form-control" id="notifText" name="notifText"
                                    required></textarea>
                            </div>
                            <div class="col-12 form-group">
                                <label for="notifUrl">Notification Link (Optional)</label>
                                <input type="url" placeholder="https://www.exapmle.com" class="form-control" id="notifUrl"
                                    name="notifUrl">
                                <small id="notifUrlHelp">Here you can add the link for the Notification, if you dont want to upload file</small>
                            </div>
                            <div class="col-12 form-group">
                                <label for="notifFileSelect">Select File (Optional)</label>
                                <input type="file" class="form-control" style="border:none" id="notifFileSelect"
                                    name="notifFileSelect">
                                <small id="notifFileSelectHelp">Select file if you wish to add its link to
                                    notification</small>
                            </div>
                            <div class="col-12 form-group text-right">
                                <button id="notifSendBtn" type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
                <!--div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div-->
            </div>
        </div>
    </div>

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
</body>

</html>