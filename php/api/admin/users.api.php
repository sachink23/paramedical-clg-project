<?php
    $this->accessLevelRequired('access_admin_creation');
    $db = new db;
    if(!isset($_POST['request'])) {
        $this->badRequest();
    }
    if(!isset($_POST["auth_pass"]))
        $this->badRequest("Password is Required");
    
    require_once(contrDir.'/adminAuth.php');
    $s2Auth = new adminAuth;
    $login = $s2Auth->loginAdmin($_SESSION['admin_username'], $_POST['auth_pass'], true);
    if($login[0] == false) {
        $this->accessDenied("Wrong Validation Password for : ".$_SESSION["admin_username"]);
        die();   
    }
    switch($_POST['request']) {
        case "admin-create-update": {
            if(!
                (
                    isset($_POST['fn']) && 
                    isset($_POST["ln"]) && 
                    isset($_POST['ps']) && 
                    isset($_POST['em']) &&
                    isset($_POST['access_website_basic']) &&
                    isset($_POST['access_circulars']) &&
                    isset($_POST['access_admissions']) &&
                    isset($_POST['access_results']) &&
                    isset($_POST['access_courses']) &&
                    isset($_POST['access_admin_creation']) &&
                    isset($_POST['action_type'])
                )
            ) {
                $this->badRequest("All Parameters Are Not Defined");
            }
            $admin_info = Array(
                "first_name" => $_POST['fn'],
                "last_name" => $_POST['ln'],
                "password" => $_POST['ps'],
                "email" => $_POST['em'],
                "access_website_basic" => $_POST['access_website_basic'],
                "access_circulars" => $_POST['access_circulars'],
                "access_admissions" => $_POST['access_admissions'],
                "access_results" => $_POST['access_results'],
                "access_courses" => $_POST['access_courses'],
                "access_admin_creation" => $_POST['access_admin_creation'],
                "created_by" => $_SESSION["admin_username"]
            );
            if($_POST['action_type'] == "add") {
                $admin_info["username"] = $_POST["un"];
                $act = $s2Auth->createAdmin($admin_info, ["new", 0]);

                if(is_array($act)) {
                    $response->code = 201;
                    $response->message = $act[1];
                    die(json_encode($response));
                }
                if($act == true) {
                    $response->code = 200;
                    $response->message = "Admin Creation Successful";
                    die(json_encode($response));
                } 
                else {
                    $response->code = 201;
                    if(is_string($act[1]))
                        $response->message = $act[1];
                    else {
                        $response->message = "Error ADMIN CREATION X001";
                        $response->ext = $act;
                        $response->func = "console.log(res)";
                    }
                }
            } else if($_POST['action_type'] == "edit") {
                if(!isset($_POST["id"])) 
                    $this->badRequest("All Parameters Are Not Defined");
                if(!is_numeric($_POST["id"]))
                    $this->badRequest("All Parameters Are Not Defined");
                $act = $s2Auth->createAdmin($admin_info, ["edit", $_POST["id"]]);
                
                if(is_array($act)) {
                    $response->code = 201;
                    $response->message = $act[1];
                    die(json_encode($response));
                }
                if($act == true) {
                    $response->code = 200;
                    $response->message = "Admin Updation Successful";
                    $response->func = "";
                } 
                else {
                    $response->code = 201;
                    if(is_string($act[1]))
                        $response->message = $act[1];
                    else {
                        $response->message = "Error ADMIN UPDATION X002, this might have happened if you havent changed anything and clicked on update button.";
                    }
                }
            }
            die(json_encode($response));
            break;
        }
        case "deactivateAdmin" : {
            if(!isset($_POST["id"]))
               $this->badRequest("Invalid User Selected");
            $act = $s2Auth->deactivateAdmin($_POST["id"], $_SESSION["admin_username"]);
            if($act[0] == true) {
                $response->code = 200;
                $response->message = "Successfully Deactivated Admin";
                $response->func = "admin.resetAddAdminUi()";
            }
            else {
                $response->code = 201;
                $response->message = $act[1];
            }
            die(json_encode($response));
            break;
        }
        case "fetch-admin": {
            $act = $s2Auth->selectAdmin();
            if($act[0] == true) {
                $response->code = 200;
                $response->message = "Successfully Fetched Data";
                $response->data = $act[1];
                $response->func = "admin.resetAddAdminUi();";
            } else {
                $response->code = 201;
                $response->func = "admin.resetAddAdminUi();";
                $response->message = $act[1];
            }
            die(json_encode($response));
        }
        default :
            $this->badRequest("Invalid Request");

    }
    $this->badRequest("Invalid Request");