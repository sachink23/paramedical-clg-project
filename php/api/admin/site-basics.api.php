<?php
    $this->accessLevelRequired('access_website_basic');
    $db = new db;
    $table = "website_basic_info";
    if(!isset($_POST['request'])) {
        $this->badRequest();
    }
    if($_POST['request'] == "about-edit") {
        if(isset($_POST['abt1']) && isset($_POST['abt2'])) {
            if(!((strlen(trim($_POST['abt1'])) > 10) && (strlen(trim($_POST['abt2'])) > 10))) {
                $this->badRequest("Short length of about paragraphs");
            }
            $data = array("about_para_1"=>htmlentities($_POST['abt1']), "about_para_2"=>htmlentities($_POST['abt2']));
            $format = "ss";
            $whereFormat = "id=1";
            $res = $db->update($table, $data, $format, $whereFormat);
            if($res[0] == true) {
                $response->code = 200;
                $response->message = "Successfully Updated About Info";
            }
            else {
                $response->code = 201;
                $response->message = "Failed to update, check if you have updated the info";
                $response->extra = $res;
            }
            die(json_encode($response));

        }
        else {
            $this->badRequest("All required fields are not included");
        }
    }
    else if($_POST['request'] == "slideshow-edit") {
        if(!(isset($_POST["slide_1_url"]) && isset($_POST["slide_1_title"]) && isset($_POST["slide_1_info"]) && isset($_POST["slide_2_url"]) && isset($_POST["slide_2_title"]) && isset($_POST["slide_2_info"]) && isset($_POST["slide_3_url"]) && isset($_POST["slide_3_title"]) && isset($_POST["slide_3_info"])))
            $this->badRequest("Mallformed Request");
        $s1_url = trim($_POST['slide_1_url']);
        $s2_url = trim($_POST['slide_2_url']);
        $s3_url = trim($_POST['slide_3_url']);
        $s1_title = trim($_POST['slide_1_title']);
        $s2_title = trim($_POST['slide_2_title']);
        $s3_title = trim($_POST['slide_3_title']);
        $s1_info = trim($_POST['slide_1_info']);
        $s2_info = trim($_POST['slide_2_info']);
        $s3_info = trim($_POST['slide_3_info']);
        if(!(filter_var($s1_url, FILTER_VALIDATE_URL) && filter_var($s2_url, FILTER_VALIDATE_URL) && filter_var($s3_url, FILTER_VALIDATE_URL)))
            $this->badRequest("Url format invalid");
        if(!((strlen($s1_title) > 4 && strlen($s1_title) < 21) && (strlen($s2_title) > 4 && strlen($s2_title) < 21) && (strlen($s3_title) > 4 && strlen($s3_title) < 21)))
            $this->badRequest("Title Length should be between 5 to 20 Characters");
      #  if(!((strlen($s1_info) > 39 && strlen($s1_info) < 101) && (strlen($s2_info) > 39 && strlen($s2_info) < 101) && (strlen($s3_info) > 39 && strlen($s3_info) < 101)))
     #       $this->badRequest("Description should be between 40 to 100 Characters");   
        $db = new db;
        $data = array(
            "ss_img_1_url" => $s1_url, 
            "ss_img_2_url" => $s2_url,
            "ss_img_3_url" => $s3_url,
            "ss_img_1_title" => $s1_title,
            "ss_img_2_title" => $s2_title,
            "ss_img_3_title" => $s3_title,
            "ss_img_1_info" => $s1_info,
            "ss_img_2_info" => $s2_info,
            "ss_img_3_info" => $s3_info
        );
        $format = "sssssssss";
        $res = $db->update($table, $data, $format, "ID = 1");
        if($res[0] == true) {
            $response->code = 200;
            $response->message = "Successfully Updated Slide Show";
        } else {
            $response->code = 201;
            $response->message = "Failed to update slideshow, please check if you have changed the fields";
        }
        die(json_encode($response));
    } else {
        $this->badRequest("Invalid Request Parameters");
    }
    $this->badRequest();