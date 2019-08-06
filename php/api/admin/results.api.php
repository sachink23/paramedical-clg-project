<?php
    $this->accessLevelRequired('access_results');
    $db = new db;
    $resultsTable = "results";
    $examsTable = "exams";
    // function to delete directories recurssively
    function rrmdir($dir) { 
        if (is_dir($dir)) { 
          $objects = scandir($dir); 
          foreach ($objects as $object) { 
            if ($object != "." && $object != "..") { 
              if (is_dir($dir."/".$object))
                rrmdir($dir."/".$object);
              else
                unlink($dir."/".$object); 
            } 
          }
          rmdir($dir); 
        } 
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

        case "delete-exam" :
        {
            if(!isset($_POST['exam-id'])) {
                $this->badReqeust();
            }

        }
    }