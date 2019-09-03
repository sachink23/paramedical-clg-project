<?php
    if(!isset($_POST['request'])) {
        $this->badRequest("Malformed Request Detected, please try again.");
    }
    if(!isset($_POST["iAgree"])) {
        $this->badRequest("Please check terms and conditions...");
    }
    if($_POST["iAgree"] <> 1) {
        $this->badRequest("Please check terms and conditions...");
    }
    if(!isset($_POST["name"])) {
        name:
        $this->badRequest("कृपया संस्थेचे नाव तपासा");
    }
    if(strlen(trim($_POST["name"])) < 4 || strlen(trim($_POST["name"])) > 400 ) {
        goto name;
    }
    $data['application_date'] = date("Y-m-d");
    $format = "s";
    $data['name'] = strip_tags(strtolower(trim($_POST["name"])));
    $format .= "s";
    
    if(!isset($_POST["name_of_pres"])) {
        name_of_pres:
        $this->badRequest("कृपया संस्थेच्या अध्यक्ष्यांचे नाव तपासा");
    }
    if(strlen(trim($_POST["name_of_pres"])) < 3 || strlen(trim($_POST['name_of_pres'])) > 255) {
        goto name_of_pres;
    } 
    $data["pres_name"] = strip_tags(strtolower(trim($_POST["name_of_pres"])));
    $format .= "s";
    
    if(!isset($_POST["reg_no"])) {
        reg_no:
        $this->badRequest("कृपया संस्था नोंदणी क्रमांक तपासा");
    }
    if(strlen(trim($_POST["reg_no"])) < 3 || strlen(trim($_POST["reg_no"])) > 201) {
        goto reg_no;
    }
    $data["reg_no"] = strip_tags(trim($_POST["reg_no"]));
    $format .= "s";
    if(!isset($_POST["reg_no"])) {
        reg_date:
        $this->badRequest("कृपया संस्था नोंदणीची तारीख तपासा");
    }
    $dob = $_POST["reg_date"];
    $dobs = explode("-", $dob);
    if(!($dobs[0] < 2019 && $dobs[0] > 1850)) {
        goto reg_date;
    }
    if(!($dobs[1] < 13 && $dobs[1] > 0)) {
        goto reg_date;
    }
    if(!($dobs[2] < 32 && $dobs[2] > 0)) {
        goto reg_date;
    }
    $data["reg_date"] = $_POST["reg_date"];
    $format .= "s";
    if(!(isset($_POST["mob1"]) && isset($_POST["mob2"]))) {
        mob:
        $this->badRequest("कृपया दूरध्वनी क्रमांक तपासा");
    }
    $data["mob_1"] = $_POST["mob1"];
    $data["mob_2"] = $_POST["mob2"];
    $format .= "ss";
    if(!isset($_POST["email"])) {
        email:
        $this->badRequest("कृपया ईमेल आयडी तपासा");
    }
    if(!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
        goto email;
    }
    $data["email"] = trim($_POST["email"]);
    $format .= "s";

    if(!isset($_POST["website"])) {
        $data["website"] = "NA";
        $format.="s";
    } else {
        $data["website"] = strtolower(strip_tags(trim($_POST["website"])));
        $format.="s";
    }
    if(!isset($_POST["address"])) {
        address:
        $this->badRequest("कृपया संस्थेचा पूर्ण पत्ता तपासा");
    }
    if(strlen(trim($_POST["address"])) < 3 || strlen(trim($_POST["address"])) > 500) {
        goto address;
    }
    $data["address"] = strtolower(strip_tags(trim($_POST["address"])));
    $format .= "s";
    if(!isset($_POST["building_type"])) {
        building_type:
        $this->badRequest("कृपया संस्थेच्या इमारतीचा प्रकार निवडा");
    }
    if($_POST["building_type"] == 0 || $_POST["building_type"] == 1) {
        $data["is_building_owned"] = $_POST["building_type"];
        $format .= "i";
    } else {
        goto building_type;
    }
    if(!isset($_POST["employee_type"])) {
        employee_type:
        $this->badRequest("कृपया संस्थेच्या कर्मचाऱ्यांच्या प्रकार निवडा");
    }
    if($_POST["employee_type"] == 0 || $_POST["employee_type"] == 1) {
        $data["are_workers_permanent"] = $_POST["employee_type"];
        $format .= "i";
    } else {
        goto employee_type;
    }
    if(!isset($_POST["nos_of_emp"])) {
        nos_of_emp:
        $this->badRequest("कृपया संस्थेकडे उपलब्ध कर्मचारी संख्या तपासा");
    }
    if(!filter_vars($_POST["nos_of_emp"], FILTER_VALIDATE_INT)) {
        goto nos_of_emp;
    }
    $data["nos_of_workers"] = $_POST["nos_of_emp"];
    $format .= "i";
    if(!isset($_POST["are_comps_avlbl"])) {
        are_comps_avlbl:
        $this->badRequest("कृपया संस्थेकडे संगणक आणि इंटरनेट सुविधा आहे / नाही निवडा");
    }
    if($_POST["are_comps_avlbl"] == 0 || $_POST["are_comps_avlbl"] == 1) {
        $data["is_comp_available"] = $_POST["are_comps_avlbl"];
        $format .= "i";
    } else {
        goto are_comps_avlbl;
    }
    
    if(!isset($_POST["is_library_available"])) {
        is_library_available:
        $this->badRequest("कृपया संस्थेकडे वाचनालय सुविधा आहे / नाही निवडा");
    }
    if($_POST["is_library_available"] == 0 || $_POST["is_library_available"] == 1) {
        $data["is_library_available"] = $_POST["is_library_available"];
        $format .= "i";
        if($_POST["is_library_available"] == 0) {
            if(!isset($_POST["no_of_books"])) {
                no_of_books:
                $this->badRequest("कृपया संस्थेकडे एकूण किती पुस्तके उपलब्ध आहेत ते भरा");
                
            } 
            else {
                if(!is_numeric($_POST["no_of_books"])) {
                    goto no_of_books;
                } 
                $data["nos_of_books_in_lib"] = $_POST["no_of_books"];
                $format .= "i";
            }
        } else {
            $data["nos_of_books_in_lib"] = 0;
            $format .= "i";
        }
    } else {
        goto is_library_available;
    }
    if(!isset($_POST["other_act"])) {
        $data["other_activities"] = "NA";
        $format .= "s";
    } else {
        $data["other_activities"] = strtolower(stript_tags(trim($_POST["other_act"])));
        $format .= "s";    
    }

    
    if(!isset($_POST["sal_1"])) {
        sal_1:
        $this->badRequest("संस्था पदाधिकाऱ्यांची माहिती तपासा, तुम्ही संस्था पदाधिकाऱ्यांचे नाव / संबोधन विसरला आहात");
    }
    if($_POST["sal_1"] == 0 || $_POST["sal_1"] == 1) {
        $data["sal_1_officer"] = $_POST["sal_1"];
        $format .= "i";
    } else {
        goto sal_1;
    }
    if(!isset($_POST["sal_2"])) {
        goto sal_1;
    }
    if($_POST["sal_2"] == 0 || $_POST["sal_2"] == 1) {
        $data["sal_2_officer"] = $_POST["sal_2"];
        $format .= "i";
    } else {
        goto sal_1;
    }
    if(!isset($_POST["name_1"])) {
        goto sal_1;
    }
    $data["name_1_officer"] = strtolower(trim(strip_tags($_POST["name_1"])));
    $format .= "s";

    if(!isset($_POST["name_2"])) {
        goto sal_1;
    }
    $data["name_2_officer"] = strtolower(trim(strip_tags($_POST["name_2"])));
    $format .= "s";

    if(!isset($_POST["reged_cert_attached"])) {
        doc_1:
        $this->badRequest("संस्थेने सलंग्नता अर्ज सादर करताना कागदपत्रांच्या छायांकित प्रती जोडणे आवश्यक आहे. जी कागदपत्रे जोडली आहेत त्यासमोरील आहे / नाही वर क्लीक / टच करा.");
    }
    if($_POST["reged_cert_attached"] == 0 || $_POST["reged_cert_attached"] == 1) {
        $data["is_reg_certification_attached"] = $_POST["reged_cert_attached"];
        $format .= "i";
    } else {
        goto doc_1;
    }
    

    if(!isset($_POST["pan_attached"])) {
        goto doc_1;
    }
    if($_POST["pan_attached"] == 0 || $_POST["pan_attached"] == 1) {
        $data["is_pan_attached"] = $_POST["pan_attached"];
        $format .= "i";
    } else {
        goto doc_1;
    }


    if(!isset($_POST["Opan_attached"])) {
        goto doc_1;
    }
    if($_POST["Opan_attached"] == 0 || $_POST["Opan_attached"] == 1) {
        $data["is_id_attached"] = $_POST["Opan_attached"];
        $format .= "i";
    } else {
        goto doc_1;
    }

    if(!isset($_POST["building_proof_attached"])) {
        goto doc_1;
    }
    if($_POST["building_proof_attached"] == 0 || $_POST["building_proof_attached"] == 1) {
        $data["is_build_proof_attached"] = $_POST["building_proof_attached"];
        $format .= "i";
    } else {
        goto doc_1;
    }

    if(!isset($_POST["elect_attached"])) {
        goto doc_1;
    }
    if($_POST["elect_attached"] == 0 || $_POST["elect_attached"] == 1) {
        $data["is_elect_bill_attached"] = $_POST["elect_attached"];
        $format .= "i";
    } else {
        goto doc_1;
    }

    if(!isset($_POST["report_attached"])) {
        goto doc_1;
    }
    if($_POST["report_attached"] == 0 || $_POST["report_attached"] == 1) {
        $data["is_report_attached"] = $_POST["report_attached"];
        $format .= "i";
    } else {
        goto doc_1;
    }
    $data["client_ip"] = $_SERVER["REMOTE_ADDR"];
    $format .= "s";

    $db = new db;
    $res = $db->insert("study_center_aff_req", $data, $format);
    if($res[0] == true) {
        $response->code = 200;
        $response->message = "Affiliation Request Submitted Successfully With Id ".$res[2];
        $response->text="Your affiliation request Id is : ".$res[2]. ". <br><a href='/online-affiliation/download/?id=".$res[2]."&reg_date=".$_POST["reg_date"]."&mob=".$_POST["mob1"]."'>Click here to download your prefilled form.</a>";
        $response->func = "document.getElementById('adm_form_id').reset();";    
    } else {
        $response->code = 201;
        $response->message = "Server is unable to handle your response";
        $response->text = "Please try after some time, if error persists please contact administrator.";
    }
    die(json_encode($response));

?>