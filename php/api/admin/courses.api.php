<?php
    $this->accessLevelRequired('access_courses');
    $db = new db;
    if(!isset($_POST['request'])) {
        $this->badRequest();
    }
    switch($_POST['request']) {
        case "delete-course": {
            if(!isset($_POST['cid']))
                $this->badRequest("Invalid Course Selected");
            if(!filter_var($_POST['cid'], FILTER_VALIDATE_INT)) 
                $this->badRequest("Invalid Course Selected");
            $res = $db->query("DELETE FROM courses WHERE course_id=".$_POST['cid']);
            if($res[0] == true) {
                $response->code = 200;
                $response->message = "Course Deleted Successfully";
                $response->func = "course.getCourses(course.getCoursesInSelect,['courseListInEditCourses','courseListInEditCourses']); admin.resetSelectedCourse();";
            } else {
                $response->code = 201;
                $response->message = "Failed To Delete Course";
            }
            die(json_encode($response));
        
        }
        case "edit-course" : {
            if(!(isset($_POST['cid']) && isset($_POST["cName"]) && isset($_POST["cElg"]) && isset($_POST["cDur"]) && isset($_POST["cFees"])))
                $this->badRequest("Incomplete Request");
            $cid = $_POST['cid'];         
            $cN = htmlentities(trim($_POST["cName"]));
            $cE = htmlentities(trim($_POST["cElg"]));
            $cD = trim($_POST["cDur"]);
            $cF = trim($_POST["cFees"]);
            if(!filter_var($cid, FILTER_VALIDATE_INT)) 
                $this->badRequest("Invalid Course Selected");
            if(!(strlen($cN) > 2 && strlen($cN) < 31))
                $this->badRequest("Course Name Should Have 3 to 30 Characters");
            if(!(strlen($cE) > 2 && strlen($cE) < 31))
                $this->badRequest("Course Eligibility Have 3 to 30 Characters");
            if(!filter_var($cD, FILTER_VALIDATE_INT)) 
                $this->badRequest("Course Duration Should be an Integer");
            if(!filter_var($cF, FILTER_VALIDATE_INT)) 
                $this->badRequest("Course Fees Should be an Integer");
            $data = array(
                "course_name" => $cN,
                "eligibility" => $cE,
                "duration" => $cD,
                "exam_fees" => $cF,
                "last_edited_by" => $_SESSION["admin_username"],
            );
            $table = "courses";
            $res = $db->update($table, $data, "sssis", "course_id=".$cid);
            if($res[0] == true) {
                $response->code = 200;
                $response->message = "Course Edited By ".$_SESSION["admin_username"];
                $response->func = "course.getCourses(course.getCoursesInSelect,['courseListInEditCourses','courseListInEditCourses'])"; 
            } else {
                $response->code = 201;
                $response->message = "Failed to edit course, The course with same name might already exists or you might not changed anything to edit.";
            }
            die(json_encode($response));
            break;
        }
        case "add-course" : {
            if(!(isset($_POST["cName"]) && isset($_POST["cElg"]) && isset($_POST["cDur"]) && isset($_POST["cFees"])))
                $this->badRequest("Incomplete Request");
            $cN = htmlentities(trim($_POST["cName"]));
            $cE = htmlentities(trim($_POST["cElg"]));
            $cD = trim($_POST["cDur"]);
            $cF = trim($_POST["cFees"]);
            if(!(strlen($cN) > 2 && strlen($cN) < 31))
                $this->badRequest("Course Name Should Have 3 to 30 Characters");
            if(!(strlen($cE) > 2 && strlen($cE) < 31))
                $this->badRequest("Course Eligibility Have 3 to 30 Characters");
            if(!filter_var($cD, FILTER_VALIDATE_INT)) 
                $this->badRequest("Course Duration Should be an Integer");
            if(!filter_var($cF, FILTER_VALIDATE_INT)) 
                $this->badRequest("Course Fees Should be an Integer");
            $data = array(
                "course_name" => $cN,
                "eligibility" => $cE,
                "duration" => $cD,
                "exam_fees" => $cF,
                "last_edited_by" => $_SESSION["admin_username"],
            );
            $table = "courses";
            $res = $db->insert($table, $data, "sssis");
            if($res[0] == true) {
                $response->code = 200;
                $response->message = "New Course Created By ".$_SESSION["admin_username"];
            } else {
                $response->code = 201;
                $response->message = "Failed to create new course, The course with same name might already exists.";
            }
            die(json_encode($response));
            break;
        } 

        default: 
            $this->badRequest("Invalid Request Parameters");
    }

