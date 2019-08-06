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