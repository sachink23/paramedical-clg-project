<?php
    $this->accessLevelRequired('access_circulars');
    if(isset($_POST['request'])) {
        $table = "notifs_circus_downlds";
        if($_POST["request"] == "new") {
            if(isset($_POST['type'])) {
                $type = $_POST['type'];
                if(!(($type == "D" || $type == "C") || $type == "N")) 
                    $this->badRequest("Invalid Type Selected");
            } else {
                $this->badRequest("Please Select Notification Type");
            }
            if(isset($_POST['label'])) {
                $label = $_POST['label'];
                if(!(($label == "new" || $label == "imp") || $label == "na")) 
                    $this->badRequest("Invalid Label Selected");
            } else {
                $label ="na";
            }
            if(isset($_POST['text'])) {
                $text = $_POST['text'];
                if(strlen(trim($text)) < 7) {
                    $this->badRequest("Text too short for notifications");
                }
                $text = htmlentities($text);
            } else {
                $this->badRequest("Text is required for notifications.");
            }
            if(isset($_POST['isfile'])) {
                if($_POST['isfile'] == 1) {
                    require_once classDir."/fileUpload.class.php";
                    $upload = new fileUpload();
                    $res = $upload->uploadFile("file", appRoot."/assets/uploads", array("pdf", "jpeg", "jpg", "png", "doc", "docx", "xls", "xlsx", "ppt", "pptx", "txt", "zip", "rar"), 10000000);
                    if($res[0]==true) {
                        $url = explode(appRoot, $res[1])[1];
                    }
                }
            } else {
                if(isset($_POST['url'])) {
                    if(filter_var($_POST['url'], FILTER_VALIDATE_URL))
                        $url = $_POST['url'];
                    else 
                        $this->badRequest("Please enter valid Url");
                } else {
                    $url = "0";
                }  
            }
            $data = array(
                "text" => $text,
                "type" => $type,
                "link" => $url,
                "flag" => $label,
                "last_edited_by" => $_SESSION['admin_username']
            );
            $format = ('sssss');
            $db = new db; 
            $result = $db->insert($table, $data, $format);
            if($result[0] == true) {
                $response->code = 200;
                $response->message = "New Notification / Circular / Downloads have been successfully published to website";
                die(json_encode($response));
            } else {
                $response->code = 201;
                $response->message = "Failed to create new notification, please try again";
            }
        }
    }