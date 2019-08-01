<?php
    $loginError = false;
    if(isset($_POST['username']) && isset($_POST['password'])) {
        require_once(contrDir.'/adminAuth.php');
        $auth = new adminAuth;
        $login = $auth->loginAdmin($_POST['username'], $_POST['password']);
        if($login[0] == true) {
            header("Location: /admin/");
            exit;
        }
        else {
            $loginError = true;
            $loginMsg = $login[1];
            goto s;
        }
    }
    if(isset($_GET['logout'])) {
        if($_GET['logout'] == true) {
            require_once(contrDir.'/adminAuth.php');
            $auth = new adminAuth;
            if($auth->isLoginAdmin()) {
                $auth->logOutAdmin();
                $loginError = true;
                $loginMsg = "Logged Out Successfully.";
            }
        }
    }
    s:
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Admin Login</title>
    <link rel="stylesheet" href="<?=webCdn ?>/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?=webCdn ?>/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="<?=webCdn ?>/css/login.min.css">
    <script>
        function forgot_pass() {

        }
    </script>
</head>

<body style="background:#F1F7FC">
    <div class="login-clean">
        <form method="post" action="">
            <h2 class="text-center">Admin Login</h2><br/>
            <div class="form-group"><input class="form-control" type="name" title="Admin Username" name="username" required=""
                    placeholder="Username" maxlength="50" minlength="3"></div>
            <div class="form-group"><input class="form-control" type="password"  title="Admin Password" name="password" required=""
                    placeholder="Password"></div>
            <?php
                if($loginError) { 
                    echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>'.$loginMsg.'</strong> 
                    </div><script>
                    $(".alert").alert();
                </script>';
                }
            ?>
            
            <div class="form-group"><button class="btn btn-primary btn-block" title="Click to Login" type="submit"
                    style="background-color: rgb(130,44,62);">Log In</button></div>
            <a href="javascript:void(0)" onclick="forgot_pass()"class="forgot">Forgot your email or password?</a>
        </form>
    </div>
    <script src="<?=webCdn ?>/js/jquery.min.js"></script>
    <script src="<?=webCdn ?>/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>