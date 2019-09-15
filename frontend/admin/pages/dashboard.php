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
        <!-- Button trigger modal -->
        <button type="button" class="mt-3 btn btn-primary btn-lg" data-toggle="modal" data-target="#infoRegardingStudyCent">
          Add Study Center
        </button>
        
        
        <div class="row justify-content-center features">
            <div class="col-sm-6 col-md-5 col-lg-4 item" data-toggle="modal" data-target="#noticeManagementModal">
                <div class="box"><i class="fa fa-retweet icon" style="color: rgb(255,15,15);"></i>
                    <h3 class="name">Manage Notice Board</h3>
                    <p class="description">In this section user can manage Notice Board, Circulars, and Downloads and legal documents section on website.
                    </p><a href="#" class="learn-more">Manage Notice Board »</a>
                </div>
            </div>
            <div class="col-sm-6 col-md-5 col-lg-4 item" data-toggle="modal" data-target="#courseManageModal">
                <div class="box"><i class="fa fa-book icon" style="color: #ff0f0f;"></i>
                    <h3 class="name">Manage Courses</h3>
                    <p class="description">From here user can add or delete courses.</p><a href="#"
                        class="learn-more">Manage Courses »</a>
                </div>
            </div>
            <div onclick="window.location.href='/admin/admissions/'" class="col-sm-6 col-md-5 col-lg-4 item">
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
            <div class="col-sm-6 col-md-5 col-lg-4 item" data-toggle="modal" data-target="#userManageModal">
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
                                        <option value="L">Legal Document</option>
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
                                    <label for="notifText">Enter Notification / Circular / Download / Legal Document Text <big
                                            class="text-danger">*</big></label>
                                    <textarea rows="3" class="form-control" id="notifText" name="notifText"
                                        required></textarea>
                                </div>
                                <div class="col-12 form-group">
                                    <label for="notifUrl">Notification Link (Optional)</label>
                                    <input type="url" placeholder="https://www.example.com" class="form-control"
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
                                                        else if($row['type'] == "L") {
                                                            $type = "Legal Doc";
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
                        <a class="nav-link active" onclick="document.getElementById('infoSettingsDialog').innerHTML = '';" data-toggle="tab" href="#about-edit">About Us</a>
                        <a class="nav-link" onclick="document.getElementById('infoSettingsDialog').innerHTML = '';" data-toggle="tab" href="#slideshow-edit">Edit Slides</a>
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
                        <div id="slideshow-edit" class="tab-pane fade">
                            <h3>Edit Slide Show on the website</h3>
                            <form class="row" action="javascript:void(0)" onsubmit="admin.editSlideShow()">
                                <div class="form-group col-lg-6 col-md-12 col-sm-12 col-xl-6">
                                  <label for="slide1Url">Slide 1 Url</label>
                                  <input type="url"
                                    class="form-control" name="slide1Url" id="slide1Url" aria-describedby="slide1UrlHelp" value='<?=$bs["ss_img_1_url"];?>'>
                                </div>
                                <div class="form-group col-lg-6 col-md-12 col-sm-12 col-xl-6">
                                  <label for="slide1Title">Slide 1 title</label>
                                  <input type="text" name="slide1Title" id="slide1Title" value='<?=$bs["ss_img_1_title"];?>' class="form-control" aria-describedby="slide1TitleHelp">
                                </div>
                                <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xl-12">
                                  <label for="slide1Desc">Slide 1 description</label>
                                  <textarea name="slide1Desc" id="slide1Desc" class="form-control" aria-describedby="slide1DescHelp"><?=$bs["ss_img_1_info"];?></textarea>
                                </div>
                                <div class="form-group col-lg-6 col-md-12 col-sm-12 col-xl-6">
                                  <label for="slide2Url">Slide 2 Url</label>
                                  <input type="text"
                                    class="form-control" name="slide2Url" id="slide2Url" aria-describedby="slide2UrlHelp" value='<?=$bs["ss_img_2_url"];?>'>
                                </div>
                                <div class="form-group col-lg-6 col-md-12 col-sm-12 col-xl-6">
                                  <label for="slide2Title">Slide 2 title</label>
                                  <input type="text" name="slide2Title" id="slide2Title" class="form-control" value='<?=$bs["ss_img_2_title"];?>' aria-describedby="slide2TitleHelp">
                                </div>
                                <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xl-12">
                                  <label for="slide2Desc">Slide 2 description</label>
                                  <textarea name="slide2Desc" id="slide2Desc" class="form-control" aria-describedby="slide2DescHelp"><?=$bs["ss_img_2_info"];?></textarea>
                                </div>
                                <div class="form-group col-lg-6 col-md-12 col-sm-12 col-xl-6">
                                  <label for="slide3Url">Slide 3 Url</label>
                                  <input type="text"
                                    class="form-control" name="slide3Url" id="slide3Url" aria-describedby="slide3UrlHelp" value='<?=$bs["ss_img_3_url"];?>'>
                                </div>
                                <div class="form-group col-lg-6 col-md-12 col-sm-12 col-xl-6">
                                  <label for="slide3Title">Slide 3 title</label>
                                  <input type="text" name="slide3Title" id="slide3Title" class="form-control" value='<?=$bs["ss_img_3_title"];?>' aria-describedby="slide3TitleHelp">
                                </div>
                                <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xl-12">
                                  <label for="slide3Desc">Slide 2 description</label>
                                  <textarea name="slide3Desc" id="slide3Desc" class="form-control" aria-describedby="slide3DescHelp"><?=$bs["ss_img_3_info"];?></textarea>
                                </div>
                                <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xl-12 text-right">
                                    <button type="submit" class="btn btn-primary" id="editSlidesBtn">Save Changes</button>
                                </div>
                                
                            </form>        
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
<!-- Modal Manage Courses -->
<div class="modal fade" id="courseManageModal" tabindex="-1" role="dialog" aria-labelledby="modalTItleForCourseManagement`" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
                <div class="modal-header">
                        <h5 class="modal-title" id="modalTItleForCourseManagement`">Result Management</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                    </div>
            <div class="modal-body">
                <div class="container-fluid">
                <div class="container-fluid">
                    <nav class="nav nav-tabs nav-stacked">
                        <a class="nav-link active" onclick="document.getElementById('infoCourseDialog').innerHTML = '';" data-toggle="tab" href="#add-course">Add Course</a>
                        <a class="nav-link" onclick="document.getElementById('infoCourseDialog').innerHTML = ''; res.getCourses(res.getCoursesInSelect,['courseListInEditCourses','courseListInEditCourses']); admin.resetSelectedCourse();"  data-toggle="tab" href="#edit-course">Edit Course</a>
                    </nav>
                   
                    <div class="tab-content">
                        <div class="container" id="infoCourseDialog"></div>
                        <div id="add-course" class="tab-pane show fade in active">
                            <form action="javascript:void(0)" class="row" onsubmit="admin.addCourse()">
                                <div class="form-group col-xl-6 col-lg-6 col-md-12 col-sm-12">
                                  <label for="addCourseName">Course Name</label>
                                  <input type="text"
                                    class="form-control" name="addCourseName" id="addCourseName" aria-describedby="addCourseNameHelp" placeholder="Ex : M.Sc (Zoology)" required="">
                                  <small id="addCourseNameHelp" class="form-text text-muted">Every Course has a unique name.</small>
                                </div>
                                <div class="form-group col-xl-6 col-lg-6 col-md-12 col-sm-12">
                                  <label for="addCourseEligibility">Course Eligibility</label>
                                  <input type="text"
                                    class="form-control" name="addCourseEligibility" id="addCourseEligibility" aria-describedby="addCourseEligibilityHelp" placeholder="Ex : SSC" required="">
                                  <small id="addCourseEligibilityHelp" class="form-text text-muted">Eligibility required to take admission.</small>
                                </div>
                                <div class="form-group col-xl-6 col-lg-6 col-md-12 col-sm-12">
                                  <label for="addCourseDuration">Course Duration (In Months)</label>
                                  <input type="number"
                                    class="form-control" name="addCourseDuration" id="addCourseDuration" aria-describedby="addCourseDurationHelp" placeholder="Ex : 12" required="">
                                  <small id="addCourseDurationHelp" class="form-text text-muted">Duration of course in months.</small>
                                </div>
                                <div class="form-group col-xl-6 col-lg-6 col-md-12 col-sm-12">
                                  <label for="addExamFees">Exam Fees</label>
                                  <input type="number"
                                    class="form-control" name="addExamFees" id="addExamFees" aria-describedby="addExamFeesHelp" placeholder="Ex : 1200" required="">
                                  <small id="addExamFeesHelp" class="form-text text-muted">Exam fees should be an integer.</small>
                                </div>
                                <div class="form-group col-12 text-right">
                                    <button type="submit" id="addCourseBtn" class="btn btn-primary">Add Course</button>
                                </div>
                            </form>
                        </div>
                        <div id="edit-course" class="tab-pane fade">
                            <form class="row" action="javascript:void(0)" onsubmit="admin.editCourse()">
                                <div class="form-group col-12">
                                  <label for="courseListInEditCourses">Select Course</label>
                                  <select class="form-control" onchange="admin.courseSelected(this.value)" name="courseListInEditCourses" id="courseListInEditCourses">
                                    
                                  </select>
                                </div>
                                <div class="form-group col-xl-6 col-lg-6 col-md-12 col-sm-12">
                                  <label for="editCourseName">Course Name</label>
                                  <input type="text"
                                    class="form-control" name="editCourseName" id="editCourseName" aria-describedby="editCourseNameHelp" placeholder="Ex : M.Sc (Zoology)" required="" disabled>
                                  <small id="editCourseNameHelp" class="form-text text-muted">Every Course has a unique name.</small>
                                </div>
                                <div class="form-group col-xl-6 col-lg-6 col-md-12 col-sm-12">
                                  <label for="editCourseEligibility">Course Eligibility</label>
                                  <input type="text"
                                    class="form-control" name="editCourseEligibility" id="editCourseEligibility" aria-describedby="editCourseEligibilityHelp" placeholder="Ex : SSC" required="" disabled>
                                  <small id="editCourseEligibilityHelp" class="form-text text-muted">Eligibility required to take admission.</small>
                                </div>
                                <div class="form-group col-xl-6 col-lg-6 col-md-12 col-sm-12">
                                  <label for="editCourseDuration">Course Duration (In Months)</label>
                                  <input type="number"
                                    class="form-control" name="editCourseDuration" id="editCourseDuration" aria-describedby="editCourseDurationHelp" placeholder="Ex : 12" required="" disabled>
                                  <small id="editCourseDurationHelp" class="form-text text-muted">Duration of course in months.</small>
                                </div>
                                <div class="form-group col-xl-6 col-lg-6 col-md-12 col-sm-12">
                                  <label for="editExamFees">Exam Fees</label>
                                  <input type="number"
                                    class="form-control" name="editExamFees" id="editExamFees" aria-describedby="editExamFeesHelp" placeholder="Ex : 1200" required="" disabled>
                                  <small id="editExamFeesHelp" class="form-text text-muted">Exam fees should be an integer.</small>
                                </div>
                                <div class="form-group col-6 text-left">
                                    <button type="button" disabled id="deleteCourseBtn" onclick="admin.deleteCourse()" class="btn btn-danger">Delete Course</button>
                                </div>
                                <div class="form-group col-6 text-right">
                                    <button type="submit" disabled class="btn btn-primary" id="editCourseBtn">Edit Course</button>
                                </div>
                            </form>
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
                        <a class="nav-link" onclick="document.getElementById('infoResultDialog').innerHTML = ''; res.getExams(res.getExamsInSelect,['selectExamInDel','selectExamInDel']);"  data-toggle="tab" href="#delete-exam">Delete Exam</a>
                        <a class="nav-link" onclick="document.getElementById('infoResultDialog').innerHTML = ''; res.getExams(res.getExamsInSelect,['selectExamInResultUpload','selectExamInResultUpload']);" data-toggle="tab" href="#add-result">Add Result</a>
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
                            <form action="javascript:void(0)" onsubmit="admin.addResult()" class="row" enctype="multipart/form-data">
                                <div class="form-group col-12">
                                  <label for="selectExamInResultUpload">Select Exam</label>
                                  <select reqired="" name="selectExamInResultUpload" id="selectExamInResultUpload" class="form-control" aria-describedby="examInResHelp">
                                  
                                  </select>
                                  <small id="examInResHelp" class="text-muted">Select The Exam For Which Result Is To Be Uploaded</small>
                                </div>
                                <div class="form-group col-lg-6 col-md-12 col-sm-12">
                                  <label for="rollNoInRes">Enter Roll Number</label>
                                  <input required type="text" pattern="[a-zA-Z0-9]+" title="Only alphanumeric Character without space for Roll No" name="rollNoInRes" minlength="3" id="rollNoInRes" class="form-control" placeholder="Enter Roll Number Of Student" aria-describedby="rollNoInResHelp">
                                  <small id="rollNoInResHelp" class="text-muted">Enter Roll Number Of Student</small>
                                </div>
                                <div class="form-group col-lg-6 col-md-12 col-sm-12">
                                  <label for="dobInRes">Enter DOB</label>
                                  <input min="1940-01-01" max="2019-12-31" required type="date" name="dobInRes" id="dobInRes" class="form-control" placeholder="Format should be dd/mm/yyyy" aria-describedby="dobInResHelp">
                                  <small id="dobInResHelp" class="text-muted">Enter date of birth in dd/mm/yyyy</small>
                                </div>
                                <div class="form-group col-lg-12 col-md-12 col-sm-12">
                                  <label for="selectResFile">Select Result File</label>
                                  <input  accept="image/jpg,image/png,image/jpeg,application/pdf" required type="file" name="selectResFile" style="border:none" id="selectResFile" class="form-control" placeholder="" aria-describedby="selectResFileHelp">
                                  <small id="selectResFileHelp" class="text-muted">Allowed files are JPG, JPEG, PDF, PNG</small>
                                </div>
                                <div class="form-group col-6 text-left">
                                    <button type="button" onclick="admin.deleteResult()" id="delResultBtn" class="btn btn-danger">Delete Result</button>
                                </div>
                                <div class="form-group col-6 text-right">
                                    <button type="submit" id="addResultBtn" class="btn btn-primary">Add Result</button>
                                </div>
                            </form>
                            <p class="text-info">In this section user have to select the exam enter roll no and date of birth of student and upload the result, to delete the result select exam and enter roll number and click on delete result</p>
                        </div>
                        <div id="delete-exam" class="tab-pane fade">
                            <form action="javascript:void(0)" onsubmit="admin.deleteExam()" class="row"  enctype="multipart/form-data">
                                <div class="form-group col-12">
                                  <label for="selectExamInDel">Select Exam</label>
                                  <select name="selectExamInDel" id="selectExamInDel" class="form-control" aria-describedby="examInDelHelp" required>
                                  
                                  </select>
                                  <small id="examInDelHelp" class="text-muted">Select The Exam to be deleted with all results.</small>
                                </div>
                                <div class="form-group col-lg-12 col-md-12 col-sm-12 text-right">
                                    <button type="submit" class="btn btn-danger" id="deleteExamBtn">Delete Exam</button>
                                </div>
                            </form>
                            <p class="text-danger">Deleting the exam will delele all the results associated with it.</p>                        
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- user management modal -->
<div class="modal fade" id="userManageModal" tabindex="-1" role="dialog" aria-labelledby="modalTItleForUserManagement`" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
                <div class="modal-header">
                        <h5 class="modal-title" id="modalTItleForUserManagement`">User Management</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                    </div>
            <div class="modal-body">
                <div class="container-fluid">
                <div class="container-fluid">
                    <nav class="nav nav-tabs nav-stacked">
                        <a class="nav-link active" onclick="document.getElementById('infoUserMgmDialog').innerHTML = '';" data-toggle="tab" href="#add-edit-remove-admin">User Management</a>
                    </nav>
                   
                    <div class="tab-content">
                        <div class="container" id="infoUserMgmDialog"></div>
                        <div id="add-edit-remove-admin" class="tab-pane show fade in active">
                            
                            <form action="javascript:void(0)" autocomplete="off" class="row">
                                <div class="form-group col-lg-6 col-md-12 col-sm-12">
                                   <label for="selectAdmin">Select Action</label>
                                  <select class="form-control" onchange="if(this.value == '') {admin.resetAddAdminUi()} else if(this.value == 0) {admin.addNewAdminUi()} else {admin.editAdminUi(this.value)}" name="selectAdmin" id="selectAdmin">
                                        
                                  </select>
                                </div>
                                <div class="form-group col-lg-6 col-md-12 col-sm-12">
                                  <label for="adminFirstName">First Name</label>
                                  <input type="text"
                                    class="form-control" name="adminFirstName" id="adminFirstName" aria-describedby="adminFirstNamehelp" placeholder="" disabled>
                                  <small id="adminFirstNamehelp" class="form-text text-muted">First Name</small>
                                </div>
                                <div class="form-group col-lg-6 col-md-12 col-sm-12">
                                  <label for="adminLastName">Last Name</label>
                                  <input type="text"
                                    class="form-control" name="adminLastName" id="adminLastName" aria-describedby="adminLastNamehelp" placeholder="" disabled>
                                  <small id="adminLastNamehelp" class="form-text text-muted">Last Name</small>
                                </div>
                                <div class="form-group col-lg-6 col-md-12 col-sm-12">
                                    <label for="adminEmail">Email</label>
                                    <input type="email"
                                        class="form-control" name="adminEmail" id="adminEmail" aria-describedby="adminEmailhelp" placeholder="" disabled>
                                    <small id="adminEmailhelp" class="form-text text-muted">Email Id For User</small>
                                </div>
                                <div class="form-group col-lg-6 col-md-12 col-sm-12">
                                    <label for="adminUsername">Username</label>
                                    <input type="text" pattern="/^[a-zA-Z0-9._]+$/" title="Username Can Only Have Numbers, Letters and Underscores (_)"
                                        class="form-control" name="adminUsername" id="adminUsername" aria-describedby="adminUsernamehelp" placeholder="" disabled>
                                    <small id="adminUsernamehelp" class="form-text text-muted">Username Can Only Have Numbers, Letters and Underscores (_)</small>
                                </div>

                                <div class="form-group col-lg-6 col-md-12 col-sm-12">
                                    <label for="adminPassword">Password</label>
                                    <input type="Password" class="form-control" name="Password" id="Password" aria-describedby="adminPasswordhelp" placeholder="" disabled>
                                    <small id="adminPasswordhelp" class="form-text text-muted">Password</small>
                                </div>
                                <div class="col-12">
                                    <p class="text-info">A user who can manage admission requests, can also manage affiliation requests</p>
                                   <table class="table">
                                       <thead>
                                           <tr>
                                               <th>Access Name</th>
                                               <th>#</th>
                                           </tr>
                                       </thead>
                                       <tbody>
                                           <tr>
                                               <td>Basic Website Details</td>
                                                <td><input type="checkbox" id="a1" disabled></td>
                                            </tr>
                                            <tr>
                                               <td>Result Management</td>
                                                <td><input type="checkbox" id="a2" disabled></td>
                                           </tr>
                                            <tr>
                                               <td>Admissions Management</td>
                                               <td><input type="checkbox" id="a3" disabled></td>
                                            </tr>
                                            <tr>
                                               <td>Courses Management</td>
                                               <td><input type="checkbox" id="a4" disabled></td>
                                            </tr>
                                            <tr>
                                               <td>User Management</td>
                                               <td><input type="checkbox" id="a5" disabled></td>
                                            </tr>
                                            <tr>
                                               <td>Circulars / Downloads / Notifications</td>
                                               <td><input type="checkbox" id="a6" disabled></td>
                                           </tr>
                                       </tbody>
                                       
                                   </table>
                                   <div id="userMgmBtn" class="form-group col-12 text-right">
                                            
                                    </div>   
                                </form>
                            </div>
                        </div>
                        
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal for add study center button -->
<div class="modal fade" id="infoRegardingStudyCent" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Instructions to add study center</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                    </div>
                    <div class="modal-body">
                        <p class="lead">
                            To add study centers go to <a href="/online-affiliation/">Online Affiliation</a> page, fill the form, and accept request in <a href="/admin/affiliations/">Manage Affiliation Requests</a> menu in admin panel, so that study center will be added automatically.
                        </p>
                        <p class="lead">
                            This approach has been designed intentionally so that whenever new study center affiliation request is accepted, it will be automatically added to the study centers page, and additional work of the admin to add the study center to the page can be skipped.
                        </p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>



