<?php
    $db = new db;
    $res = $db->select("website_basic_info", "*");
    if($res[0] == true) {
        while($row = mysqli_fetch_assoc($res[1])) {
            $bs = $row;
        }
    }
?>
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
            <div class="col-sm-6 col-md-5 col-lg-4 item" data-toggle="modal" data-target="#resultManageModal">
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
            <div class="col-sm-6 col-md-5 col-lg-4 item" data-toggle="modal" data-target="#settingsModal">
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

<!-- Modal notice management -->
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
                        <a class="nav-link active" onclick="document.getElementById('infoNotifManage').innerHTML = '';" data-toggle="tab" href="#add">Add</a>
                        <a class="nav-link" onclick="document.getElementById('infoNotifManage').innerHTML = '';" data-toggle="tab" href="#edit">Delete</a>
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
                                <table class="table table-striped table-responsive table-inverse">
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


<!-- Modal settings-->
<div class="modal fade" id="settingsModal" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
                <div class="modal-header">
                        <h5 class="modal-title">Website Settings</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                    </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <nav class="nav nav-tabs nav-stacked">
                        <a class="nav-link active" onclick="document.getElementById('infoSettingsDialog').innerHTML = '';" data-toggle="tab" href="#editAboutForm">About Us</a>
                    </nav>
                   
                    <div class="tab-content">
                        <div class="container" id="infoSettingsDialog"></div>
                        <div id="about-edit" class="tab-pane show fade in active">
                            <h3>Edit About</h3>
                            <form class="row" id="editAboutForm" onsubmit="admin.editAboutInfo()" action="javascript:void(0)">
                                <div class="col-lg-6 col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <label for="aboutPara1">About Paragraph 1</label>
                                        <textarea class="form-control" required name="aboutPara1" id="aboutPara1" rows="10"><?=$bs['about_para_1'] ?></textarea>
                                    </div>
                                </div>  
                                <div class="col-lg-6 col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <label for="aboutPara2">About Paragraph 2</label>
                                        <textarea class="form-control" name="aboutPara2" id="aboutPara2" rows="10"><?=$bs['about_para_2'] ?></textarea>
                                    </div>
                                </div>
                                <div class="col-12 text-right">
                                    <button type="submit" name="editAboutBtn" required id="editAboutBtn" class="btn btn-primary">Edit About</button>
                                </div>
                            </form>
                        </div>
                        <div id="menu1" class="tab-pane fade">
                            <h3>Menu 1</h3>
                            <p>Some content in menu 1.</p>
                        </div>
                        <div id="menu2" class="tab-pane fade">
                            <h3>Menu 2</h3>
                            <p>Some content in menu 2.</p>
                        </div>
                    </div>
                </div>
            </div>
            <!--div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save</button>
            </div-->
       
    </div>
</div></div>


<!-- Modal manage results -->
<div class="modal fade" id="resultManageModal" tabindex="-1" role="dialog" aria-labelledby="modalTItleForResultManagement`" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
                <div class="modal-header">
                        <h5 class="modal-title" id="modalTItleForResultManagement`">Result Management</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                    </div>
            <div class="modal-body">
                <div class="container-fluid">
                <div class="container-fluid">
                    <nav class="nav nav-tabs nav-stacked">
                        <a class="nav-link active" onclick="document.getElementById('infoResultDialog').innerHTML = '';" data-toggle="tab" href="#add-exam">Add Exam</a>
                        <a class="nav-link" onclick="document.getElementById('infoResultDialog').innerHTML = '';" data-toggle="tab" href="#delete-exam">Delete Exam</a>
                        <a class="nav-link" onclick="document.getElementById('infoResultDialog').innerHTML = ''; res.getExams(res.getExamsInSelect,['selectExamInResultUpload','selectExamInResultUpload']);" data-toggle="tab" href="#add-result">Add Result</a>
                        <a class="nav-link" onclick="document.getElementById('infoResultDialog').innerHTML = '';" data-toggle="tab" href="#delete-result">Delete Result</a>
                    </nav>
                   
                    <div class="tab-content">
                        <div class="container" id="infoResultDialog"></div>
                        <div id="add-exam" class="tab-pane show fade in active">
                            <form class="row" id="addExamForm" onsubmit="admin.addExam()" action="javascript:void(0)">
                                <div class="form-group col-12">
                                  <label for="examName">Exam Name</label>
                                  <input type="text" name="examName" id="examName" class="form-control" placeholder="For Ex - Winter 2019" aria-describedby="examNameHelp">
                                  <small id="examNameHelp" class="text-muted">Enter the name of the exam, for which result is to be declared</small>
                                </div>
                                <div class="form-group col-12 text-right">
                                    <button type="submit" id="createExamBtn" class="btn btn-primary">Create Exam</button>
                                </div>
                            </form>
                            <p class="text-info">In this section user can add the exam which can be used to declare the results seperately for the examination, keep in mind that exam name is a unique parameter.</p>
                        </div>
                        <div id="add-result" class="tab-pane fade">
                            <form action="javascript:void(0)" class="row" enctype="multipart/form-data">
                                <div class="form-group col-12">
                                  <label for="selectExamInResultUpload">Select Exam</label>
                                  <select name="selectExamInResultUpload" id="selectExamInResultUpload" class="form-control" aria-describedby="examInResHelp">
                                  
                                  </select>
                                  <small id="examInResHelp" class="text-muted">Select The Exam For Which Result Is To Be Uploaded</small>
                                </div>
                                <div class="form-group col-lg-6 col-md-12 col-sm-12">
                                  <label for="rollNoInRes">Enter Roll Number</label>
                                  <input type="text" name="rollNoInRes" id="rollNoInRes" class="form-control" placeholder="Enter Roll Number Of Student" aria-describedby="rollNoInResHelp">
                                  <small id="rollNoInResHelp" class="text-muted">Enter Roll Number Of Student</small>
                                </div>
                                <div class="form-group col-lg-6 col-md-12 col-sm-12">
                                  <label for="dobInRes">Enter DOB</label>
                                  <input type="text" name="dobInRes" id="dobInRes" class="form-control" placeholder="Format should be dd/mm/yyyy" aria-describedby="dobInResHelp">
                                  <small id="dobInResHelp" class="text-muted">Enter date of birth in dd/mm/yyyy</small>
                                </div>
                                <div class="form-group col-lg-12 col-md-12 col-sm-12">
                                  <label for="selectResFile">Select Result File</label>
                                  <input type="file" name="selectResFile" style="border:none" id="selectResFile" class="form-control" placeholder="" aria-describedby="selectResFileHelp">
                                  <small id="selectResFileHelp" class="text-muted">Allowed files are JPG, JPEG, PDF, PNG</small>
                                </div>
                                <div class="form-group col-lg-12 col-md-12 col-sm-12 text-right">
                                    <button type="submit" class="btn btn-primary">Add Result</button>
                                </div>
                            </form>
                            <p class="text-info">In this section user have to select the exam enter roll no and date of birth of student and upload the result.</p>
                        </div>
                        <div id="delete-result" class="tab-pane fade">
                            <h3>Menu 2</h3>
                            <p>Some content in menu 2.</p>
                        </div>
                        <div id="delete-exam" class="tab-pane fade">
                            <h3>Menu 2</h3>
                            <p>Some content in menu 2.</p>
                            <p class="text-danger">Deleting the exam will delele all the results associated with it.</p>                        
                        </div>
                    </div>
                </div>
                </div>
            </div>
            <!--div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save</button>
            </div-->
        </div>
    </div>
</div>


