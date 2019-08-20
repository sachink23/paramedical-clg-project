<?php
	class adminAuth extends db
	{
		private $table = 'admin';
		function __construct()
		{
			session_start();
		}

		function createAdmin($array, $type) {
			
			$array['first_name'] = trim($array['first_name']);
			$array['last_name'] = trim($array['last_name']);
			if($type[0] == "new")
            	$array['username'] = trim($array['username']);
			
			$array['email'] = trim($array['email']);
            $array['created_by'] = trim($array['created_by']);
             
			if(!(preg_match('/^[a-zA-Z ]*$/', $array['first_name']) && preg_match('/^[a-zA-Z ]*$/', $array['last_name'])) && !(isset($array['first_name']) && isset($array['last_name']))) {
				return array(false, 'Invalid First Name or Last Name');
            }
			if($type[0] == "new"){
				if(!$this->validateUsername($array['username'])) {
					return array(false, 'Invalid Username');
				}
			}
			if($type[0] == "edit" && strlen($array['password']) < 8)
				goto skip_pass_validation;
			if(strlen($array['password']) < 8) {
				return array(false, 'Short Password');
            }
            $array['password'] = $this->hashAdminPass($array['password']);
			skip_pass_validation:
			if (!filter_var($array['email'], FILTER_VALIDATE_EMAIL)) {
                return array(false, 'Invalid Email Format');
			}
			
			if(!
				(
					($array['access_courses']==1 || $array['access_courses']==0) && 
					($array['access_website_basic'] == 1 || $array['access_website_basic'] == 0) && 
					($array['access_circulars'] == 1 || $array['access_circulars'] == 0) && 
					($array['access_admissions'] == 1 || $array['access_admissions'] == 0) && 
					($array['access_results'] == 1 || $array['access_results'] == 0) && 
					($array['access_admin_creation'] == 1 || $array['access_admin_creation'] == 0)
				)
			) {
				return array(false, 'Admin Access Is Not Properly Defined');
            }
            
            

			$db = new db;
			if($type[0] == "new") { 
				$format = 'ssssiiiiiiss';
				$result = $db->insert($this->table, $array, $format);
				if($result[0] == true) {
					return true;
				}
				else {
					return $result;
				}
			}
			else if($type[0] == "edit") {
				if($array["password"] == "") {
					unset($array["password"]);
					$format = 'sssiiiiiis';
				}
				else
					$format = 'ssssiiiiiis';
				$result = $db->update($this->table, $array, $format, "admin_id=".$type[1]);
					if($result[0] == true) {
						return true;
					}
					else {
						return $result;
					}
			}
		}
		function deactivateAdmin($adminId, $by) {
			if(!is_numeric($adminId))
				return Array(0, "Invalid Admin Id");
			$db = new db;
			if($adminId == 1) 
				return Array(0, "Cannot Deactivate Superadmin");
			$res = $db->query("UPDATE admin SET admin_state = 0, created_by=".$by." WHERE admin_id=".$adminId);
			if($res[0] == true) {
				return Array(1, "Successfully Deactivatied Admin");
			}
			else 
				return Array(0, "Failed To Deactivate Admin");

		}
		function selectAdmin($adminId = 0) {
			if(!is_numeric($adminId))
				return Array(0, "Invalid Admin Id");
			$db = new db;
			if($adminId <> 0) {
				$res = $db->select($this->table, "*", "admin_state=1 and admin_id=".$adminId);
				if($res[0] == true && $res[1]->num_rows == 1) {
					while($row = mysqli_fetch_assoc($res[1])) {
						$row["password"] = "";
						return Array(1, $row);
					}
				}
			}
			else {
				$res = $db->select($this->table, "*", "admin_state=1");
				$data = Array();
				if($res[0] == true && $res[1]->num_rows > 0) {
					while($row = mysqli_fetch_assoc($res[1])) {
						$row["password"] = "";
						$data [] = $row;
					}
					return Array(1, $data);
				}
			}
			return Array(0, "Failed To Select Admin");
		}
		function loginAdmin($username, $password, $verify = false) {
			if($verify == false)
				if($this->isLoginAdmin())
					$this->logOutAdmin();
			
			$username = trim($username);
			if(empty($username) || empty($password))
				return array(false, "username or password is empty");
			$password = $this->hashAdminPass($password);
			$db = new db;
			$whereStatement = "username = ? and password = ? and admin_state=1";
			$format = array('ss', $username, $password);
			$result = $db->select($this->table, '*', $whereStatement, $format);
			if($result[0] == true && $result[1]->num_rows == 1) {
				while ($row = $result[1]->fetch_assoc()) {
					if($username == $row['username'] && $password == $row['password']) {
						if($verify == true)
							return array(true);
						$_SESSION['admin_username'] = $row['username'];
						$_SESSION['admin_id'] = $row['admin_id'];
						$_SESSION['admin_f_name'] = $row['first_name'];
                        $_SESSION['admin_l_name'] = $row['last_name'];
                        $_SESSION['admin_access_website_basic'] = $row['access_website_basic'];
                        $_SESSION['admin_access_circulars'] = $row['access_circulars'];
                        $_SESSION['admin_access_admissions'] = $row['access_admissions'];
                        $_SESSION['admin_access_results'] = $row['access_results'];
                        $_SESSION['admin_access_courses'] = $row['access_courses'];
                        $_SESSION['admin_access_admin_creation'] = $row['access_admin_creation'];
					}
					else {
						if($verify == false)
							$this->logOutAdmin();
						return array(false, 'Invalid username or password');
					}
				}
				$row = NULL;
				$result = NULL;
				return array(true, 'Login Success');
			}
			else if($result[0] == true && $result[1]->num_rows == 0) {
 				return array(false, 'Invalid username or password');
			}
			else {
				return array(false, 'Something went wrong, please try again');
			}	
		}

		function isLoginAdmin() {
			if(!isset($_SESSION['admin_username'])) {
				return false;
				
			}
			if(!$this->validateUsername($_SESSION['admin_username'])) {
				return false;
			}
			$db = new db;

			$whereStatement = "admin_id = ".$_SESSION['admin_id'];
			$result = $db->select($this->table, "*", $whereStatement);
			if($result[0] == true && $result[1]->num_rows == 1) {
				while ($row = $result[1]->fetch_assoc()) {
					if($row['username'] == $_SESSION['admin_username']) {
						$_SESSION['admin_username'] = $row['username'];
						$_SESSION['admin_id'] = $row['admin_id'];
						$_SESSION['admin_f_name'] = $row['first_name'];
                        $_SESSION['admin_l_name'] = $row['last_name'];
                        $_SESSION['admin_access_website_basic'] = $row['access_website_basic'];
                        $_SESSION['admin_access_circulars'] = $row['access_circulars'];
                        $_SESSION['admin_access_admissions'] = $row['access_admissions'];
                        $_SESSION['admin_access_results'] = $row['access_results'];
                        $_SESSION['admin_access_courses'] = $row['access_courses'];
                        $_SESSION['admin_access_admin_creation'] = $row['access_admin_creation'];
						return true;
					}
				}
			}
			$this->logOutAdmin();
			return false;
		}

		function logOutAdmin() {
			$_SESSION['admin_username'] = NULL;
            $_SESSION['admin_id'] = NULL;
            $_SESSION['admin_f_name'] = NULL;
            $_SESSION['admin_l_name'] = NULL;
            $_SESSION['admin_access_website_basic'] = NULL;
            $_SESSION['admin_access_circulars'] = NULL;
            $_SESSION['admin_access_admissions'] = NULL;
            $_SESSION['admin_access_results'] = NULL;
            $_SESSION['admin_access_courses'] = NULL;
			$_SESSION['admin_access_admin_creation'] = NULL;
            session_unset();
            session_destroy();
			return true;
		}

		function hashAdminPass($password) {
			return hash_hmac('md5', hash_hmac('sha1', $password, appSecret), appSecret.'admin');
		}

		function validateUsername($username) {
			$username = trim($username);
			if((!empty($username) && (preg_match('/^[a-zA-Z0-9._]+$/', $username) && strlen($username) > 5)) && strlen($username) < 17)
				return true;
			else
				return false;
		}
	}





	// function is_boool is defined to by pass some errors
	function is_boool($val) {
		if($val == true || $val == "true" || $val == 1)
			return true;
		if($val === false || $val == "false" || $val == 0)
			return true;
		return false;
		}