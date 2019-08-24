<?php
    
    function abortIt() {
        http_response_code(400);
        echo "No Admission Request Found With Given Details";
        exit;
    }
    if(!(isset($_GET['id']) && isset($_GET["dob"]) && isset($_GET["mob"]))) {
        abortIt();
    } 
    $id = $_GET["id"];
    $dob = $_GET["dob"];
    $mob = $_GET["mob"];
    if(!is_numeric($id)) 
        abortIt();
    $dobs = explode("-", $dob);
    if(!($dobs[0] < 2019 && $dobs[0] > 1950)) {
       
        abortIt();
    }
    if(!($dobs[1] < 13 && $dobs[1] > 0)) {
        abortIt();
    }
    if(!($dobs[2] < 32 && $dobs[2] > 0)) {
        abortIt();
    }
    if(!is_numeric($mob))
        abortIt();
    $db = new db;
    $dob = strval($dob);
    $mob = strval($mob);
    //$where = "(id = ".$id." AND dob = ".$dob.") AND (mob_1 = ".$mob." OR mob_2=".$mob.")";
   $where = "id = ".$id;
    $res = $db->select("admissions", "*", $where);
    if($res[0] == true && $res[1]->num_rows == 1) {
        while($row = mysqli_fetch_assoc($res[1])) {
            if($row["dob"] <> $dob) 
                abortIt();

            if(!($row["mob_1"] == $mob || $row["mob_2"] == $mob))
                abortIt();
            $d = $row;
        }
    } else {
        abortIt();
    }
    
    $d["application_date"] = date("d-m-Y", strtotime($d["application_date"]));
    $d["dob"] = date("d-m-Y", strtotime($d["dob"]));
    $table = "";
    if($d["ssc"] == 1) {
        if($d["ssc_passed_status"] == 1)
            $result = "PASS";
        else 
            $result = "FAIL";
        $table .="<tr>
                    <th>SSC</th>
                    <td>".$result."</td>
                    <td>".$d["ssc_year"]."</td>
                    <td>".$d["ssc_school"]."</td>
                    <td>".$d["ssc_board"]."</td>
                    <td>".$d["ssc_per"]." %</td>
                    <td>".$d["ssc_div"]."</td>
                    
                </tr>";
                            
    }
    if($d["hsc"] == 1) {
        if($d["hsc_passed_status"] == 1)
            $result = "PASS";
        else 
            $result = "FAIL";
        $table .="<tr>
                    <th>HSC</th>
                    <td>".$result."</td>
                    <td>".$d["hsc_year"]."</td>
                    <td>".$d["hsc_college"]."</td>
                    <td>".$d["hsc_board"]."</td>
                    <td>".$d["hsc_per"]." %</td>
                    <td>".$d["hsc_div"]."</td>
                    
                </tr>";
        
    }

    if($d["grad"] == 1) {
        if($d["grad_passed_status"] == 1)
            $result = "PASS";
        else 
            $result = "FAIL";
        $table .="<tr>
                    <th>GRADUATION</th>
                    <td>".$result."</td>
                    <td>".$d["grad_year"]."</td>
                    <td>".$d["grad_uni"]."</td>
                    <td>".$d["grad_college"]."</td>
                    <td>".$d["grad_per"]." %</td>
                    <td>".$d["grad_div"]."</td>
                    
                </tr>";
        
    }
    
    if($d["other"] == 1) {
        if($d["other_pass_status"] == 1)
            $result = "PASS";
        else 
            $result = "FAIL";
        $table .="<tr>
                    <th>".ucfirst($d['other_course_name'])."</th>
                    <td>".$result."</td>
                    <td>".$d["other_year"]."</td>
                    <td>".$d["other_college"]."</td>
                    <td>".$d["other_uni"]."</td>
                    <td>".$d["other_per"]." %</td>
                    <td>".$d["other_div"]."</td>
                    
                </tr>";
        
    }
    $btn = "";
    require_once contrDir.'/adminAuth.php';
			$auth = new adminAuth;
			if($auth->isLoginAdmin()) { if($d['is_accepted'] == 0 && $_SESSION["admin_access_admissions"] == 1){
                $btn = '&nbsp;&nbsp;&nbsp;<button onclick="acceptAdm(1)" type="button" class="btn btn-lg" style="color:white; background:green" >Accept</button>
                &nbsp;&nbsp;<button type="button" onclick="acceptAdm(0)" class="btn btn-lg" style="color:white; background:red" >Reject</button>
            ';
            echo "
                <script>
                    function acceptAdm(acpt) {
                        if(acpt == 1)
                            url = '/admin/admissions/accept/?ac=yes&id=".$d['id']."';
                        else if(acpt == 0)
                            url = '/admin/admissions/accept/?ac=no&id=".$d['id']."';
                        window.location.href=url;
                    }
                </script>
            ";
        
        }
            else {
                $btn = "<br>Admission Accepted by ".$d['accepted_by']."</br>";
            }
        }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= appName ?> : Download Admission Form</title>
    <meta name="viewport" content="width=device-width">
    <link rel="stylesheet" href="<?=webCdn;?>/bootstrap/css/bootstrap.min.css">
    <style>
        body {
           background: rgb(204,204,204); 
        }
        table.table {
            font-size: 12.5px;
        }
        .small-font-size {
            font-size: 12.5px;
        }
        page {
            background: white;
            display: block;
            margin: 0 auto;
            margin-bottom: 0.5cm;
            box-shadow: 0 0 0.5cm rgba(0,0,0,0.5);
        }
        page[size="A4"] {  
            width: 21cm;
            height: 29.7cm; 
        }
        page[size="A4"][layout="landscape"] {
            width: 29.7cm;
            height: 21cm;  
        }
        page[size="A3"] {
            width: 29.7cm;
            height: 42cm;
        }
        page[size="A3"][layout="landscape"] {
            width: 42cm;
            height: 29.7cm;  
        }
        page[size="A5"] {
            width: 14.8cm;
            height: 21cm;
        }
        page[size="A5"][layout="landscape"] {
            width: 21cm;
            height: 14.8cm;  
        }
        .the-fieldset {
            border: 1px solid #e0e0e0;
            padding: 10px;
            margin-bottom: 5px;
        }
        .the-legend {    
            border-style: none;
            border-width: 0;
            font-size: 14px;
            line-height: 20px;
            margin-bottom: 0;
            width: auto;
            padding: 0 10px;
            border: 1px solid #e0e0e0;
            font-weight: bolder;
        }
        .border-me {
            border: 1px solid #e0e0e0;

        }
        @media print {
            body * {
                visibility: hidden;
            }
            .section-to-print, .section-to-print * {
                visibility: visible;
            }
            .section-to-print {
                position: absolute;
                left: 0;
                top: 0;
            }   
        }
       /* @media print {
            page {
                margin: 0;
                box-shadow: 0;
            }
        } */
    </style>
</head>
<body>
    <div class="container text-center" id="buttons">
        <br/>
        <button type="button" onclick="print()" class="btn btn-lg" style="color:white; background:black" >Print</button>
        &nbsp;&nbsp;<button type="button" onclick="downloadPDF()" class="btn btn-lg" style="color:white; background:black" >Download</button>
        <?= $btn ?>
    </div>
    <br />
    <page class="section-to-print" id="form-pg-1" size="A4">
        
            <div class="container">
                <img src="<?=webCdn ?>/img/header.jpg" width="100%">
            </div>

            <div class="container pt-0" >
                <h3 style="font-family: arial; " class="text-center">Admission Form</h3>
                
            </div>
            
            <div class="container pt-1">
                <table class="table table-bordered">
                    <tr>
                        <th width="16.66%">Application Id</th>
                        <td width="16.66%"><?=$d["id"] ?></td>
                        <th width="16.66%">Status</th>
                        <td width="16.66%"><?php if($d["is_accepted"] == 1) echo "Accepted"; else echo "Pending"; ?></td>
                        <th width="16.66%">Date</th>
                        <td width="16.66%"><?=$d["application_date"] ?></td>
                    </tr>
                    <tr>
                        <th >Institute Details</th>
                        <td colspan="3"><?=$d["institute_details"] ?></td>
                        <th >Course Applied</th>
                        <td ><?=$d["course_name"] ?></td>
                    </tr>
                </table>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-9">
                        <table class="table table-bordered">
                            <tr>
                                <th width="10%">Name</th>
                                <td colspan="4"><?=ucfirst($d["candidate_name"]) ?></td>
                            </tr>
                            <tr>
                                <th>Gender</th>
                                <td><?=ucfirst($d["gender"]) ?></td>
                                <th colspan="2" class="text-right">Date of Birth</th>
                                <td><?=$d["dob"] ?></td>
                            </tr>
                            <tr>
                                <th colspan="2">Father's Name</th>
                                <td ><?=ucfirst($d["father_name"]) ?></td>
                                <th width="10%">Occupation</th>
                                <td><?=ucfirst($d["father_occupation"]) ?></td>
                            </tr>

                            <tr>
                                <th colspan="2">Mother's Name</th>
                                <td ><?=ucfirst($d["mother_name"]) ?></td>
                                <th>Occupation</th>
                                <td><?=ucfirst($d["mother_occupation"]) ?></td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-3">
                        <img src="<?=$d['photo_url']?>" height="160px" width="130px"/>
                    </div>
                    <div class="col-12">
                        <table class="table table-bordered">
                            <tr>
                                <td width="25%"><strong>Mobile : </strong><?=$d["mob_1"] ?></td>
                                <td width="33%"><strong>Parent's Mobile : </strong><?= $d["mob_2"]?></td>
                                <td width="42%"><strong>Email : </strong><?=strtolower($d["email_id"]) ?></td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-12">
                        <table class="table table-bordered">
                            <tr>
                                <th width="12%"><strong>Local Address</strong></td>
                                <td width="38%"><?=ucfirst($d["local_add"]) ?></td>
                                <td width="12%"><strong>Permanent Address</strong></td>
                                <td width="38%"><?=ucfirst($d["perm_add"]) ?></td>
                            </tr>
                        </table>   
                    </div>
                    <div class="col-12">
                        <p class="small-font-size"><strong>Highest Education Qualification :</strong> <?php if($d["edu_qual"] == "7") echo "7<sup>th</sup>"; else echo $d["edu_qual"];?></p>
                        <table class="table table-bordered">
                            <tr>
                                <th>Exam</th>
                                <th>Passed</th>
                                <th>Year</th>
                                <th>College / Institute</th>
                                <th>Board / University</th>
                                <th>%</th>
                                <th>Class</th>
                            </tr>
                            <?= $table ?>

                        </table>
                    </div>
                    <div class="col-12" class="small-font-size">
                        I agree that I have read all the instructions and provided the true and correct information as per my knowledge, I am aware that providing the incorrect information will be responsible for cancellation of my admission.
                    </div>
                    <div class="col-8"><br/></div>
                    <div class="col-4">
                        <div class="container border text-center">
                            <br/>
                            <br/>
                            <br/>
                            <p class="small-font-size">Candidates Signature</p>
                        </div>
                    </div>
            </div>
    </page>
    <script src="<?=webCdn?>/js/jquery.min.js"></script>


</body>
</html>