<?php
    function abortIt() {
        http_response_code(400);
        echo "No Affiliation Request Found With Given Details";
        echo "<br><a href='/'>Return to homepage</a>";
        exit;
    }
    if(!(isset($_GET['id']) && isset($_GET["mob"]))) {
        abortIt();
    } 
    $id = $_GET["id"];
    $mob = $_GET["mob"];
    if(!is_numeric($id)) 
        abortIt();
    if(!is_numeric($mob))
        abortIt();
    $db = new db;
    $mob = strval($mob);
    //$where = "(id = ".$id." AND dob = ".$dob.") AND (mob_1 = ".$mob." OR mob_2=".$mob.")";
   $where = "id = ".$id;
    $res = $db->select("study_center_aff_req", "*", $where);
    if($res[0] == true && $res[1]->num_rows == 1) {
        while($row = mysqli_fetch_assoc($res[1])) {
                       if(!($row["mob_1"] == $mob || $row["mob_2"] == $mob))
                abortIt();
            $d = $row;
        }
    } else {
        abortIt();
    }
    
    $d["application_date"] = date("d-m-Y", strtotime($d["application_date"]));
    $d["reg_date"] = date("d-m-Y", strtotime($d["dob"]));
    
    $btn = "";
    require_once contrDir.'/adminAuth.php';
			$auth = new adminAuth;
			if($auth->isLoginAdmin()) { if($d['is_accepted'] == 0 && $_SESSION["admin_access_admissions"] == 1){
                $btn = '&nbsp;&nbsp;&nbsp;<button onclick="acceptAff(1)" type="button" class="btn btn-lg" style="color:white; background:green" >Accept</button>
                &nbsp;&nbsp;<button type="button" onclick="acceptAff(0)" class="btn btn-lg" style="color:white; background:red" >Reject</button>
            ';
            echo "
                <script>
                    function acceptAff(acpt) {
                        if(acpt == 1)
                            url = '/admin/affiliation/accept/?ac=yes&id=".$d['id']."';
                        else if(acpt == 0)
                            url = '/admin/affiliation/accept/?ac=no&id=".$d['id']."';
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
    <title><?= appName ?> : Download Affiliation Form</title>
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
                background: white;
            }
            .print-candidate-signature {
                width: 30% !important;
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
        &nbsp;&nbsp;<!--button type="button" onclick="downloadPDF()" class="btn btn-lg" style="color:white; background:black" >Download</button-->
        <?= $btn ?>
    </div>
    <br />
    <page class="section-to-print" id="form-pg-1" size="A4">
        
            <div class="container">
                <img src="<?=webCdn ?>/img/header.jpg" width="100%">
            </div>

            <div class="container pt-0" >
                <h3 style="font-family: arial; " class="text-center">Affiliation Form</h3>               
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
                        <td colspan="5"><?=$d["name"] ?></td>
                    </tr>
                </table>
            </div>
    </page>
    <script src="<?=webCdn?>/js/jquery.min.js"></script>


</body>
</html>