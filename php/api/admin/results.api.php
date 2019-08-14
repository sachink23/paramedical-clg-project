<?php
    $this->accessLevelRequired('access_results');
    $db = new db;
    $resultsTable = "results";
    $examsTable = "exams";
    // function to delete directories recurssively
    function deleteDirectory($dir) {
        if (!file_exists($dir)) {
            return true;
        }
    
        if (!is_dir($dir)) {
            return unlink($dir);
        }
    
        foreach (scandir($dir) as $item) {
            if ($item == '.' || $item == '..') {
                continue;
            }
    
            if (!deleteDirectory($dir . DIRECTORY_SEPARATOR . $item)) {
                return false;
            }
    
        }
    
        return rmdir($dir);
    }
    if(!isset($_POST['request'])) {
        $this->badRequest();
    }
    switch($_POST['request']) {
        case "add-exam" : 
        {
            if(!isset($_POST['exam-name'])) {
                $this->badRequest("Fields Missing");
            }
            $examName = $_POST['exam-name'];
            $res = $db->insert($examsTable, array("exam_name"=>trim(htmlentities($examName)), "created_by"=>$_SESSION["admin_username"]), "ss");
            if($res[0] == true) {
                mkdir(appRoot."/assets/uploads/results/".$res[2]);
                $response->code = 200;
                $response->message = "New Exam Created Successfully.";
            } else {
                $response->code = 201;
                $response->message = "Database Error : Exam Name Already Exists, please use another name.";
            }
            die(json_encode($response));
            break;
        }

        case "deleteExam": {
            if(isset($_POST['examId'])) {
                if(!is_numeric($_POST['examId']))
                    $this->badRequest("Invalid Exam Id");
            } else {                
                $this->badRequest("Invalid Exam Id");
            }
            if(isset($_POST['conf'])) {
                if($_POST["conf"] <> 1) {
                    $this->badRequest("Confirmation Not Granted By User 1");
                }
            } else {
                $this->badRequest("Confirmation Not Granted By User 2");
            }
            $res = $db->query("DELETE FROM exams WHERE exam_id=".$_POST['examId']);
            if($res[0] == true) {
                if(is_dir(appRoot."/assets/uploads/results/".$_POST['examId'])) {
                    if(deleteDirectory(appRoot."/assets/uploads/results/".$_POST['examId'])) {
                        $response->message = "Exam Deleted Successfully by ".$_SESSION['admin_username'];
                    } else {
                        $response->message = "Exam Partially Deleted By ".$_SESSION['admin_username'];
                    }
                } else {
                    $response->message = "Exam Deleted Successfully by ".$_SESSION['admin_username'];
                }
                $response->code = 200;
            }
            else {
                $response->code = 201;
                $response->message = "Failed to delete results due to some error.";
            }
            die(json_encode($response));
            break;
        }
        case "addResult": {
            if(!(isset($_POST["examId"]) && isset($_POST["rollNo"]) && isset($_POST["dob"]))) {
                $this->badRequest("All fields are compulsory");
            }
            $exId = $_POST['examId'];
            $rn = $_POST['rollNo'];
            $dob = $_POST['dob'];
            $resDir = appRoot."/assets/uploads/results/".$exId."/";
            if(!is_dir($resDir)) {
                $this->badRequest("Exam Not Found");
            }
            if(strlen(trim($rn) < 3 && preg_match( "[a-zA-Z0-9]", $rn))) {
                $this->badRequest("Roll No is in invalid Format");
            }
            require_once classDir."/fileUpload.class.php";
            $upload = new fileUpload();
            $target_file = $resDir.basename($_FILES["file"]["name"]);
            $fileExt = pathinfo($target_file,PATHINFO_EXTENSION);
            $fileName = strtolower($rn."_".$dob.".".$fileExt);
            
            $exId = $_POST["examId"];
            $rn = $_POST["rollNo"];
            $dob = $_POST["dob"];
            $whF = "exam_id=? AND roll_no=? AND dob=?";
            $whV = array("sss", $exId, $rn, $dob);
            $res = $db->select("results", "result_url", $whF, $whV);  
            if($res[0] == true && $res[1]->num_rows == 1) {
                $response->code=201;
                $response->message="Result already uploaded.";
                die(json_encode($response));
            }


            $res = $upload->uploadFile("file", $resDir, array("pdf", "jpeg", "jpg", "png"), 100000000, $fileName);
            if($res[0]==true) {
                $url = explode(appRoot, $res[1])[1];
                $response->code = 200;
                $response->message = "Result uploaded <a href='".$url."' target='_blank'>Check Here</a>";
                $db = new db;
                $data = array("exam_id"=>$exId, "roll_no"=>$rn, "dob"=>$dob, "result_url"=>$url,"created_by"=>$_SESSION["admin_username"]);
                $format = "sssss";
                $table = "results";
                $resDb = $db->insert($table, $data, $format);
                if($resDb[0] <> true) {
                    unlink($res[1]);
                    $response->code = 201;
                    $response->message = "Failed due to database error";
                } 
            } else {
                $response->code = 400;
                $response->message = $res[1];
            }
            die(json_encode($response));
        }
    }
    $this->badRequest();