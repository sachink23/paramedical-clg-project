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
    $d["reg_date"] = date("d-m-Y", strtotime($d["reg_date"]));
    
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
           background: white; 
        }
        table.table {
            font-size: 14px;
        }
        .small-font-size {
            font-size: 14px;
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
            font-size: 16px;
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
       @media print {
            page {
                margin: 0;
                box-shadow: 0;
            }
        }
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
                <h3 style="font-family: arial; " class="text-center">नवीन स्टडी सेंटर करीता सलंग्नता फॉर्म</h3>               
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
                        <th >संस्थेचे नाव</th>
                        <td colspan="2"><?=$d["name"] ?></td>
                        <th>नोंदणी क्रमांक</th>
                        <td colspan="2"><?=$d["reg_no"] ?></td>
                    </tr>
                    <tr>
                        <th>नोंदणीची तारीख</th>
                        <td><?=$d["reg_date"] ?></td>
                        <th>संस्थेचे अध्यक्ष</th>
                        <td colspan="3"><?=$d["pres_name"] ?></td>   
                    </tr>
                    <tr>
                        <th>दूरध्वनी क्रमांक</th>
                        <td colspan="2"><?=$d["mob_1"].", ". $d[mob_2]?></td>
                        <th>ईमेल आयडी</th>
                        <td colspan="2"><?=$d["email"] ?></td>
                    </tr>
                    <tr>
                        <th>संस्थेचा पूर्ण पत्ता</th>
                        <td colspan="3"><?=$d["address"] ?></td>
                        <td colspan="2"><strong>संस्थेकडील इमारत </strong>- <?php if($d["is_building_owned"] == 1) echo "संस्थेच्या मालकीची"; else echo "किरायाने घेतलेली"; ?> आहे </td>
                    </tr>
                    <tr>
                        <th colspan="">वेबसाईट (असल्यास)</th>
                        <td colspan="2"><?=$d["website"] ?></td>
                        <td colspan="3"><strong>संस्थेकडील कर्मचारी </strong> - <?php if($d["are_workers_permanent"] == 1) echo " नियमित आहेत"; else echo "कंत्राटी आहेत"; ?>&nbsp;&nbsp;&nbsp; <strong>कर्मचाऱ्यांची संख्या </strong>- <?=$d["nos_of_workers"] ?></td>
                    </tr>
                    <tr>
                        <td colspan="3"><strong>संस्थेकडे वाचनालय सुविधा </strong> - <?php if($d["is_library_available"] == 1) echo "आहे"; else echo "नाही"; ?>&nbsp; ( एकूण <?= $d["nos_of_books_in_lib"] ?> पुस्तके उपलब्ध आहेत )</td>
                        <td colspan="3"><strong>संस्थेकडे संगणक आणि इंटरनेट सुविधा </strong> - <?php if($d["is_comp_available"] == 1) echo "आहे"; else echo "नाही"; ?></td>
                    </tr>
                    <tr>
                        <th colspan="2">संस्थचे इतर शैक्षणिक उपक्रम चालू आहते काय ?</th>
                        <td colspan="4"><?= $d["other_activities"] ?></td>
                    </tr>                
                </table>
                <table class="table table-bordered">
                    <tr>
                        <th colspan="2">संस्थेने सलंग्नता अर्ज सादर करताना जोडलेल्या कागदपत्रांची सुची</th>
                    </tr>
                    <tr>
                        <td>संस्थेचे नोंदणी प्रमाणपत्र - <?php if($d["is_reg_certification_attached"] == 1) echo "आहे"; else echo "नाही"; ?></td>
                    
                        <td>संस्थचे पॅन कार्ड / टॅन कार्ड - <?php if($d["is_pan_attached"] == 1) echo "आहे"; else echo "नाही"; ?></td>
                    </tr>
                    <tr>
                        <td>अध्यक्ष / सचिव यांची ओळखपत्रे आधार कार्ड / पॅन कार्ड - <?php if($d["is_id_attached"] == 1) echo "आहे"; else echo "नाही"; ?></td>
                        <td>इमारत असल्याबाबत चे प्रमाणपत्र ८ अ / घरपट्टी पावती - <?php if($d["is_build_proof_attached"] == 1) echo "आहे"; else echo "नाही"; ?></td>
                    </tr>
                    <tr>    
                        <td>24 तास वीजपुरवठा आहे काय ? वीजबिल प्रत  - <?php if($d["is_elect_bill_attached"] == 1) echo "आहे"; else echo "नाही"; ?></td>
                        <td>संस्थेचे नियमित लेखापरीक्षण रिपोर्ट - <?php if($d["is_report_attached"] == 1) echo "आहे"; else echo "नाही"; ?></td>
                    </tr>
                </table>
                <div class="container">
                <p>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; आम्ही खाली सही करणार श्री / श्रीमती <strong><?=$d["pres_name"] ?></strong>, श्री / श्रीमती <strong><?=$d["name_1_officer"] ?></strong>, आणि श्री / श्रीमती <strong><?=$d["name_2_officer"] ?></strong> असून <strong><?=$d["name"] ?></strong> या संस्थेचे पदाधिकारी आहोत. आम्ही आर्यवर्त पॅरामेडीकल, व्यावसायिक, स्वयंरोजगार शिक्षण मंडळ यांच्या बोर्डाद्वारे चालवीत असलेल्या शिक्षण अभ्यासक्रम / व्यावसायिक आणि स्वयंरोजगार / आरोग्य अभ्यासक्रम साठीचे अभ्यासकेंद्र घेण्यासाठी अर्ज सादर करीत असून उपरोक्त माहिती पूर्णपणे सत्य आहे. यामध्ये काहीही असत्य आढळल्यास आमच्या स्टडी सेंटर ची मान्यता कोणत्याही पूर्वसूचनेशिवाय रद्द करण्याचे सर्व अधिकार आर्यवर्त पॅरामेडीकल, व्यावसायिक, स्वयंरोजगार शिक्षण मंडळ यांच्याकडे राखीव असल्याची पूर्ण कल्पना आम्हाला आहे.
                </p>
                <p>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; तसेच आम्हाला कोणत्याही कारणाशिवाय स्टडी सेंटर नाकारण्याचे अथवा नामंजूर करण्याचे अधिकार आर्यवर्त पॅरामेडीकल, व्यावसायिक, स्वयंरोजगार शिक्षण मंडळ यांच्याकडे राखीव असल्याची पूर्ण कल्पना आम्हाला आहे.
                </p>
                <p>दिनांक : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;/&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;/&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ठिकाण :</p>
                </div>
                <table class="table table-bordered">
                    <tr>
                        <td><br><br><br></td>
                        <td><br><br><br></td>
                        <td><br><br><br></td>
                    </tr>
                    <tr>
                        <th style="text-align: center">संस्था अध्यक्ष  </th>
                        <th style="text-align: center">संस्था सचिव</th>
                        <th style="text-align: center">संस्था उपाध्यक्ष</th>
                    </tr>
                </table>
                <hr />
                <div class="container">
                    <p style="font-size: 16px">
                        <strong>पावती (कार्यालयीन) </strong>   
                    </p>
                    <p>
                        आज दिनांक ___/___/_____ रोजी <?=$d["name"]; ?> या संस्थेचा सलंग्नता अर्ज प्राप्त झाला. नमूद कागदपत्रांच्या प्रति मिळाल्या / मिळाल्या नाही.

                    </p><br/><br/>
                    <p class="text-right">
                         अधिकृत शिक्का व स्वाक्षरी 
                    </p>
                </div>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                             
            </div>
    </page>
    <script src="<?=webCdn?>/js/jquery.min.js"></script>


</body>
</html>