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
        case "getResult": {
            if(!(isset($_POST["examId"]) && isset($_POST["rollNo"]) && isset($_POST["dob"])))
                $this->badRequest("Parameters Missing");
            $exId = $_POST["examId"];
            $rn = $_POST["rollNo"];
            $dob = $_POST["dob"];
            $whF = "exam_id=? AND roll_no=? AND dob=?";
            $whV = array("sss", $exId, $rn, $dob);
            $res = $db->select("results", "result_url", $whF, $whV);  
            if($res[0] == true && $res[1]->num_rows == 1) {
                while($row = mysqli_fetch_assoc($res[1])) {
                    $response->code = 200;
                    $response->message = $row["result_url"];
                }
            } else {
                $response->code = 201;
                $response->message = "No result Found";
            }
            die(json_encode($response));
        }
        case "getCourses": {
            $res = $db->select("courses", "course_id, course_name, eligibility, duration, exam_fees");
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