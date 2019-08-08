<?php
    $db = new db;
    if(!isset($_POST['request']))
        $this->badRequest("Parameters Missing");
    switch($_POST['request']) {
        case "getExams": {
            $res = $db->select("exams", "exam_id,exam_name");
            if($res[0] == true) {
                $i=0;
                $response->data = Array();   
                while($row = mysqli_fetch_assoc($res[1])) {
                    $i++;
                    $response->data[] = $row;  
                }
                if($i == 0) {
                    $response->code = 201;
                    $response->message = "Database Error";
                } else {
                    $response->code = 200;
                }
            } else {
                $response->code = 201;
                $response->message = "Databse Error";
            }
            die(json_encode($response));
            break;
        }
        
        default: {
            $this->badRequest("Parameters Missing");
            break;
        }
    }
?>