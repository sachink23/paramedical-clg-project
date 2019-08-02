
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
                <div class="box"><i class="fa fa-book icon" style="color: #ff0f0f;"></i>
                    <h3 class="name">Manage Courses</h3>
                    <p class="description">From here user can add or delete cources.</p><a href="#"
                        class="learn-more">Manage Courses »</a>
                </div>
            </div>
            <div class="col-sm-6 col-md-5 col-lg-4 item">
                <div class="box"><i class="fa fa-graduation-cap icon" style="color: #ff0f0f;"></i>
                    <h3 class="name">Manage Admissions</h3>
                    <p class="description">This section is to manage admissions received through website.</p><a href="#"
                        class="learn-more">Manage Admissions »</a>
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
                    <p class="description">In settings user can edit basic information on the website.</p><a href="#"
                        class="learn-more">Settings »</a>
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

                    <nav class="nav nav-tabs nav-stacked">
                        <a class="nav-link active" onclick="document.getElementById('infoNotifManage').innerHTML = '';" data-toggle="tab" href="#add">Add Notification</a>
                        <a class="nav-link" onclick="document.getElementById('infoNotifManage').innerHTML = '';" data-toggle="tab" href="#edit">Delete Notification</a>
                    </nav>
                    <div class="tab-content">
                        <div class="container" id="infoNotifManage">

                        </div>
                        <div id="add" class="tab-pane fade show in active">
                            <form enctype="multipart/form-data" id="notifSendForm" name="notifiSendForm" action="javascript:void(0)"
                                id="notifiSendForm" onsubmit="admin.submitNotifForm()" class="row">
                                <div class="col-lg-6 col-xl-6 col-md-12 col-sm-12 form-group">
                                    <label for="selectTypeOfNotif">Select Type <big class="text-danger">*</big></label>
                                    <select class="form-control" required name="selectTypeOfNotif"
                                        id="selectTypeOfNotif">
                                        <option value="" selected>Select Type</option>
                                        <option value="N">Notification</option>
                                        <option value="C">Circular</option>
                                        <option value="D">Download</option>
                                    </select>
                                    <small id="selectTypeOfNotifHelp"></small>
                                </div>
                                <div class="col-lg-6 col-xl-6 col-md-12 col-sm-12 form-group">
                                    <label for="batchForNotif">Select Label <big
                                            class="text-danger">*</big></label><br />
                                    <div class="form-check form-check-inline">
                                        <label class="form-check-label">
                                            <input class="form-check-input" type="radio" name="batchForNotif"
                                                id="batchForNotif" value="new" checked required> <span
                                                class="badge badge-danger">New</span>&nbsp;&nbsp;
                                            <input class="form-check-input" type="radio" name="batchForNotif"
                                                value="imp">
                                            <span class="badge badge-secondary">Important</span>&nbsp;&nbsp;
                                            <input class="form-check-input" type="radio" name="batchForNotif"
                                                value="na">
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
                                    <input type="url" placeholder="https://www.exapmle.com" class="form-control"
                                        id="notifUrl" name="notifUrl">
                                    <small id="notifUrlHelp">Here you can add the link for the Notification, if you dont
                                        want to upload file</small>
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
                        <div id="edit" class="tab-pane fade">
                            <div id="table-responsive">
                                <table class="table table-striped table-inverse">
                                    <thead class="thead-inverse">
                                        <tr>
                                            <th class='text-center'>#</th>
                                            <th class='text-center'>Text</th>
                                            <th class='text-center'>Link</th>
                                            <th class='text-center'>Type</th>
                                            <th class='text-center'>#</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php 
                                            $notifTable = "notifs_circus_downlds";
                                            $db = new db;
                                            $data = "text,flag,link,id,type";
                                            $res = $db->select($notifTable, $data, NULL, NULL, "ORDER BY id DESC");
                                            if($res[0] == true && $res[1]->num_rows > 0) {
                                                
                                                $i = $res[1]->num_rows;
                                                $j=0;
                                                while($row = mysqli_fetch_assoc($res[1])) {
                                                    echo "<tr>";
                                                        echo "<td class='text-center'>".$i."</td>";
                                                        if($row['flag'] == "new") {
                                                            $label = '<span class="badge badge-danger">New</span>&nbsp;&nbsp;';
                                                        } else if($row['flag'] == "imp") {
                                                            $label = '<span class="badge badge-secondary">Important</span>&nbsp;&nbsp;'; 
                                                        } else {
                                                            $label = '';
                                                        }
                                                        if($row['type'] == "N") {
                                                            $type = "Notification";
                                                        } else if($row['type'] == "D") {
                                                            $type = "Download";
                                                        } else if($row['type'] == "C") {
                                                            $type = "Circular";
                                                        }
                                                        echo "<td>".$label.$row['text']."</td>";
                                                        if($row['link'] == "0") {
                                                            echo "<td class='text-center'>NA</td>";
                                                        } else {
                                                            echo "<td><a target='_blank' href='".$row['link']."'>".$row['link']."</a></td>";
                                                        }
                                                        echo "<td class='text-center'>".$type."</td>";
                                                        echo "<td class='text-center'><i style='cursor:pointer' onclick='admin.deleteNotif(".$row['id'].")' class='fa text-danger fa-trash'></i></td>";
                                                    echo "</tr>";
                                                }
                                            } else {
                                                echo "<tr><td colspan='5'>No Notifications available yet</td></tr>";
                                            }
                                            echo "<tr><td colspan='5'  class='text-center'>Refresh the page if you have updated the notification</td></tr>"

                                        ?>
                                            
                                        </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <!--div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div-->
        </div>
    </div>
</div>