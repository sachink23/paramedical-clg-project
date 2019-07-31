<?php
	class adminAuth extends db
	{
		private $table = 'admin';
		function __construct()
		{
			session_start();
		}

		function createAdmin($array) {
			$array['first_name'] = trim($array['first_name']);
			$array['last_name'] = trim($array['last_name']);
            $array['username'] = trim($array['username']);
            $array['email'] = trim($array['email']);
            $array['created_by'] = trim($array['created_by']);
             
			if(!(preg_match('/^[a-zA-Z ]*$/', $array['first_name']) && preg_match('/^[a-zA-Z ]*$/', $array['last_name'])) && !(isset($array['first_name']) && isset($array['last_name']))) {
				return array(false, 'Invalid Name');
            }
            
			if(!$this->validateUsername($array['username'])) {
				return array(false, 'Invalid Username');
			}
			if(strlen($array['password']) < 8) {
				return array(false, 'Short Password');
            }
            $array['password'] = $this->hashAdminPass($array['password']);
            if (!filter_var($array['email'], FILTER_VALIDATE_EMAIL)) {
                return array(false, 'Invalid Email Format');
            }
            if(!(((is_bool($array['access_website_basic']) && is_bool($array['access_circulars'])) && (is_bool($array['access_admissions']) && is_bool($array['access_results']))) && is_bool($array['access_admin_creation']))) {
                return array(false, 'Admin Access Is Not Properly Defined');
            }
            
            

			$db = new db;
			
			$format = 'ssssssiiiii';
			$result = $db->insert($this->table, $array, $format);
			if($result[0] == true) {
				return true;
			}
			else {
				return $result;
			}
		}

		function loginAdmin($username, $password) {
			if($this->isLoginAdmin())
				$this->logOutAdmin();
			
			$username = trim($username);
			if(empty($username) || empty($password))
				return array(false, "username or password is empty");
			$password = $this->hashAdminPass($password);
			$db = new db;
			$whereStatement = "username = ? and password = ?";
			$format = array('ss', $username, $password);
			$result = $db->select($this->table, '*', $whereStatement, $format);
			if($result[0] == true && $result[1]->num_rows == 1) {
				while ($row = $result[1]->fetch_assoc()) {
					if($username == $row['username'] && $password == $row['password']) {
						$_SESSION['admin_username'] = $row['username'];
						$_SESSION['admin_id'] = $row['admin_id'];
						$_SESSION['admin_f_name'] = $row['first_name'];
                        $_SESSION['admin_l_name'] = $row['last_name'];
                        $_SESSION['admin_access_website_basic'] = $row['access_website_basic'];
                        $_SESSION['admin_access_circulars'] = $row['access_circulars'];
                        $_SESSION['admin_access_admissions'] = $row['access_admissions'];
                        $_SESSION['admin_access_results'] = $row['access_results'];
                        $_SESSION['admin_access_admin_creation'] = $row['access_admin_creation'];
					}
					else {
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
			$result = $db->select($this->table, "username", $whereStatement);
			if($result[0] == true && $result[1]->num_rows == 1) {
				while ($row = $result[1]->fetch_assoc()) {
					if($row['username'] == $_SESSION['admin_username']) 
						return true;
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