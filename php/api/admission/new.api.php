<?php 
    if(!isset($_POST["request"]))
        $this->badRequest();
    if(!isset($_POST["iAgree"])) 
       $this->badRequest("Please agree to the declaration");
    if(!($_POST["iAgree"] == true))
       $this->badRequest("Please agree to the declaration");
    // check if institute details are set
    if(!(isset($_POST["instituteDetails"]) && isset($_POST["selectCourse"])))
       $this->badRequest("Please fill admission details properly");
    if(strlen(trim($_POST["instituteDetails"])) < 3)
        $this->badRequest("Please fill institute details properly");
    if(!is_numeric($_POST["selectCourse"]))
        $this->badRequest("Please select course properly");        
    else { 
        $db=new db;
        $res = $db->select("courses", "course_id, course_name", "course_id=".$_POST["selectCourse"]);    
        if($res[0] == true && $res[1]->num_rows == 1) {
            while($row = mysqli_fetch_assoc($res[1])) {  
                $courseName = $row["course_name"];
            }
        } else {
            $this->badRequest("Please select course properly");        
        }
    }
    // validate personal details

    if(isset($_POST["gender"])) {
        if(!($_POST["gender"] == "male" || $_POST["gender"] == "female" || $_POST["gender"] == "other")) {
            goto gender;
        }
    } else {
        gender:
        $this->badRequest("Please select gender properly");
        
    }
    if(isset($_POST["fullname"])) {
        if(strlen(trim($_POST["fullname"])) < 5 && !preg_match("/[a-zA-Z\s]+/", $_POST["fullname"]))  {
            goto fullname;
        }
    } else {
        fullname:
        $this->badRequest("Please enter your candidates name correctly");
    }

    if(isset($_POST["fathersname"])) {
        if(strlen(trim($_POST["fathersname"])) < 1 && !preg_match("/[a-zA-Z\s]+/", $_POST["fathersname"]))  {
            goto fathersname;
        }
    } else {
        fathersname:
        $this->badRequest("Please enter your father's name correctly");
    }
    if(isset($_POST["fathersoccup"])) {
        if(strlen(trim($_POST["fathersoccup"])) < 1 && !preg_match("/[a-zA-Z\s]+/", $_POST["fathersoccup"]))  {
            goto fathersoccup;
        }
    } else {
        fathersoccup:
        $this->badRequest("Please enter your father's occupation correctly");
    }
    if(isset($_POST["mothersname"])) {
        if(strlen(trim($_POST["mothersname"])) < 1 && !preg_match("/[a-zA-Z\s]+/", $_POST["mothersname"]))  {
            goto mothersname;
        }
    } else {
        mothersname:
        $this->badRequest("Please enter your mother's name correctly");
    }
    if(isset($_POST["mothersoccup"])) {
        if(strlen(trim($_POST["mothersoccup"])) < 1 && !preg_match("/[a-zA-Z\s]+/", $_POST["mothersoccup"]))  {
            goto mothersoccup;
        }
    } else {
        mothersoccup:
        $this->badRequest("Please enter your mother's occupation correctly");
    }
    if(isset($_POST["dob"])) {
        $dob = $_POST["dob"];
        $dobs = explode("-", $dob);
        if(!($dobs[0] < 2019 && $dobs[0] > 1950)) {
            goto dob;
        }
        if(!($dobs[1] < 13 && $dobs[1] > 0)) {
            goto dob;
        }
        if(!($dobs[2] < 32 && $dobs[2] > 0)) {
            goto dob;
        }

    } else {
        dob:
        $this->badRequest("Please enter valid date of birth");
    }
    // validate communication details 

    if(isset($_POST["mob1"])) {
        if(!($_POST["mob1"] > 7000000000 && $_POST["mob1"] < 9999999999)) {
            goto mob1;
        }
    } else {
        mob1:
        $this->badRequest("Please enter your student's mobile number correctly");
        
    }
    if(isset($_POST["mob2"])) {
        if(!($_POST["mob2"] > 7000000000 && $_POST["mob2"] < 9999999999)) {
            goto mob2;
        }
    } else {
        mob2:
        $this->badRequest("Please enter your parent's mobile number correctly");
        
    }
    if(isset($_POST["email"])) {
        if(!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
            goto email;
        }
    } else {
        email:
        $this->badRequest("Please enter your email address correctly");
        
    }
    if(isset($_POST["localAdd"])) {
        if(strlen(trim($_POST["localAdd"])) < 3) {
            goto localAdd;
        }
    } else {
        localAdd:
        $this->badRequest("Enter valid local address");
    }
    if(isset($_POST["perAdd"])) {
        if(strlen(trim($_POST["perAdd"])) == 0) {
            $perAdd = $_POST["localAdd"];
            goto morePerAdd;
        }
        if(strlen(trim($_POST["perAdd"])) < 3) {
            goto perAdd;
        }
        $perAdd = $_POST["localAdd"];
        morePerAdd:
        $c = 0;
    } else {
        perAdd:
        $this->badRequest("Enter valid permanent address or leave it blank if same as local");
    }

    // validate educational details
    $otherEdu = 0; 
    $sscEdu = 0;
    $hscEdu = 0; 
    $gradEdu = 0; 
    if(isset($_POST["eduQual"])) {
        switch($_POST["eduQual"]) {
            case "7": {
                if(validateEdu("OTHER") == false)   
                    goto edu; 
                $otherEdu = 1;
                break;
            }
            case "SSC": {
                if(validateEdu("SSC") == false)
                    goto edu; 
                if(validateEdu("OTHER") == true) {
                    $otherEdu = 1; 
                    
                }
                $sscEdu = 1;
                break;
            } 
            case "HSC": {
                if(validateEdu("SSC") == false)
                    goto edu; 
                if(validateEdu("HSC") == false) {
                    goto edu;                     
                }
                if(validateEdu("OTHER") == true) {
                    // store other values to 
                    $otherEdu = 1;
                }
                $sscEdu = 1;
                $hscEdu = 1;
                break;
            } 
            case "GRADUATE": {
                
                if(validateEdu("SSC") == false) {
                    goto edu; 
                }

                if(validateEdu("HSC") == false) {
                    goto edu;                     
                }
                if(validateEdu("GRADUATE") == false) {
                    goto edu;                     
                }
                if(validateEdu("OTHER") == true) {
                    // store other values to 
                  $otherEdu = 1;  
                }
                $gradEdu = 1;
                $sscEdu = 1;
                $hscEdu = 1;
                break;
            } 
            case "OTHER": {
                if(validateEdu("SSC")) {
                    $sscEdu = 1;
                }

                if(validateEdu("HSC")) {
                    $hscEdu = 1;     
                }
                if(validateEdu("GRADUATE")) {
                    $gradEdu = 1;     
                }
                if(validateEdu("OTHER")) {
                    $otherEdu = 1;
                } else {
                    goto edu;
                }
                break;
            }

            
            default: {
                goto edu;
            }
        }
    } else {
        edu:
        $this->badRequest("Please input valid educational details");
    }
    // try to upload photograph to the server 
    require_once classDir."/fileUpload.class.php";
    $up = new fileUpload;
    if(!file_exists(appRoot."/assets/uploads/admission_photos/".date("Y"))) {
        if(mkdir(appRoot."/assets/uploads/admission_photos/".date("Y")) == false) {
            $response->code = 201;
            $response->message = "Server Error";
            $response->text = "Oops, unexpected server error occured please contact administrator.";
            die(json_encode($response));
        }

            
    }
    
    $target_file = appRoot."/assets/uploads/admission_photos/".date("Y")."/".basename($_FILES["photo"]["name"]);
    $fileExt = pathinfo($target_file,PATHINFO_EXTENSION);
    $fileName = strtolower(time()."_".rand(1000000,9999999).".".$fileExt);
    $upl = $up->uploadFile("photo", appRoot."/assets/uploads/admission_photos/".date("Y"), ["jpg", "jpeg", "png"], 1700000, $fileName);
    if($upl[0] == true) {
        $uplUrl = $upl[1];
    } else {
        $response->code = 400;
        $response->message = "File Upload Error";
        $response->text = $upl[1];
        die(json_encode($response));
    }
    $photoUrl = explode(appRoot, $uplUrl)[1];
    $data = array(
        "application_date" => date("Y-m-d"),
        "course_name" => $courseName,
        "perm_add" => $perAdd,
        "photo_url"=>$photoUrl,
        "creation_ip"=>$_SERVER["REMOTE_ADDR"],
        "institute_details" => htmlentities($_POST["instituteDetails"]),
        "candidate_name" => htmlentities($_POST["fullname"]),
        "father_name" => htmlentities($_POST["fathersname"]),
        "mother_name" => htmlentities($_POST["mothersname"]),
        "dob" => $_POST["dob"],
        "gender" => htmlentities($_POST["gender"]),
        "edu_qual" => $_POST["eduQual"],
        "local_add" => htmlentities($_POST["localAdd"]),
        "father_occupation" => htmlentities($_POST["fathersoccup"]),
        "mother_occupation" => htmlentities($_POST["mothersoccup"]),
        "mob_1" => $_POST["mob1"],
        "mob_2" => $_POST["mob2"],
        "email_id" => $_POST["email"]
    );
    $format = "ssssssssssssssssss";

    if($otherEdu == 1) {
        $data["other"] = 1;
        $data["other_course_name"] = htmlentities($_POST["otherCourseName"]);
        $data["other_pass_status"] = $_POST["isPass_OTHER"];
        $data["other_year"] = $_POST["month_OTHER"];
        $data["other_college"] = htmlentities($_POST["col_OTHER"]);
        $data["other_div"] = htmlentities($_POST["div_OTHER"]);
        $data["other_per"] = $_POST["per_OTHER"];
        $data["other_uni"] = htmlentities($_POST["board_OTHER"]);
        $format.="isisssds";
    }
    if($gradEdu == 1) {
        $data["grad"] = 1;
        $data["grad_passed_status"] = $_POST["isPass_GRADUATE"];
        $data["grad_year"] = $_POST["month_GRADUATE"];
        $data["grad_college"] = htmlentities($_POST["col_GRADUATE"]);
        $data["grad_div"] = htmlentities($_POST["div_GRADUATE"]);
        $data["grad_per"] = $_POST["per_GRADUATE"];
        $data["grad_uni"] = htmlentities($_POST["board_GRADUATE"]);
        $format.="iisssds";
    }
    if($sscEdu == 1) {
        $data["ssc"] = 1;
        $data["ssc_passed_status"] = $_POST["isPass_SSC"];
        $data["ssc_year"] = $_POST["month_SSC"];
        $data["ssc_school"] = htmlentities($_POST["col_SSC"]);
        $data["ssc_div"] = htmlentities($_POST["div_SSC"]);
        $data["ssc_per"] = $_POST["per_SSC"];
        $data["ssc_board"] = htmlentities($_POST["board_SSC"]);
        $format.="iisssds";
    }
    if($hscEdu == 1) {
        $data["hsc"] = 1;
        $data["hsc_passed_status"] = $_POST["isPass_HSC"];
        $data["hsc_year"] = $_POST["month_HSC"];
        $data["hsc_college"] = htmlentities($_POST["col_HSC"]);
        $data["hsc_div"] = htmlentities($_POST["div_HSC"]);
        $data["hsc_per"] = $_POST["per_HSC"];
        $data["hsc_board"] = htmlentities($_POST["board_HSC"]);
        $format.="iisssds";
    }
    $db = new db;
    $res = $db->insert("admissions", $data, $format);
    if($res[0] == true) {
        $response->code = 200;
        $response->message = "Admission form submitted successfully.";
        $response->text="Your admission request Id is : ".$res[2]. ". <br><a href='/online-admissions/download/?id=".$res[2]."&dob=".$_POST["dob"]."&mob=".$_POST["mob1"]."'>Click here to download your form.</a>";
        $response->func = "document.getElementById('adm_form_id').reset();";
        die(json_encode($response));
    }
    else {
        $response->code = 201;
        $response->message = "Server Error";
        $response->text = "Failed to submit admission form due to server error, please contact administrator";
        die(json_encode($response));
    }
function validateEdu($edu) {
    if($edu == "OTHER") {
        if(!(isset($_POST["otherCourseName"]) && strlen(trim($_POST["otherCourseName"])) > 1))
            return false;
    }
    if(!isset($_POST["isPass_".$edu]))
        return false;
    if(!($_POST["isPass_".$edu] == 1 || $_POST["isPass_".$edu] == 0)) 
        return false;
    if(isset($_POST["month_".$edu])) {
        $months = explode("-", $_POST["month_".$edu]);
        if(!($months[0] <= date("Y") && $months[0] > 1950)) {
            return false;
        }
        if(!($months[1] < 13 && $months[1] > 0)) {
            return false;
        }
    } else {
        return false;
    }
    if(isset($_POST["per_".$edu]) && ($_POST["per_".$edu] >= 0 && $_POST["per_".$edu] <=100)) {

    } else {
        return false;
    }
    if(isset($_POST["div_".$edu]) && strlen(trim($_POST["div_".$edu])) > 1) {

    } else {
        return false;
    }
    if(isset($_POST["col_".$edu]) && strlen(trim($_POST["col_".$edu])) > 1) {

    } else {
        return false;
    }
    if(isset($_POST["board_".$edu]) && strlen(trim($_POST["board_".$edu])) > 1) {

    } else {
       return false;
    }
    return true;
} 



