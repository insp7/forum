<!DOCTYPE html>
<html lang="en">

<?php
    if(session_status() == PHP_SESSION_NONE) {
        session_start(); // Session not started so start the session
    } 

    require_once("classes/Login.php");

    if(isset($_POST['login-email'])) {
        $email = $_POST['login-email'];
        $login = new Login();
        $result_set = $login->getCredentials($email);

        if($row = mysqli_fetch_assoc($result_set)) {
            extract($row); //  extract() expects parameter 1 to be array, null given; happens when you remove the if
            session_start();
            $_SESSION['user_id'] = $user_id;
            $_SESSION['user_name'] = $user_name;
            $_SESSION['user_email'] = $user_email;
            $_SESSION['user_role'] = $user_role;

            if($user_role === "admin") {
                header("Location: admin/index.php"); // Added relative path again
            } else if($user_role === "user") {
                header("Location: index.php"); // Added relative path again
            }
        }
    }
?>

<!-- HEADER -->
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Login or Signup</title>

    <!-- Bootstrap Core CSS -->
    <link href="node_modules/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="assets/dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="node_modules/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- My CSS -->
    <link rel="stylesheet" type="text/css" href="assets/css/myStyles.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Please Sign In</h3>
                    </div>
                    <div class="panel-body">
                        <form role="form" id="login-form" method="post">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="E-mail" id="login-email" name="login-email" type="email" autocomplete="off" autofocus>
                                    <div id="email-error-div" class="text-danger small hidden">Email cannot be empty!</div>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" id="login-password" name="login-password" type="password">
                                    <div id="password-error-div" class="text-danger small hidden">Password cannot be empty!</div>
                                    <div id="authentication-error-div" class="text-danger small hidden">Invalid email or password!</div>
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input name="remember" type="checkbox" value="Remember Me">Remember Me
                                    </label>
                                </div>
                                <div class="form-group">
                                    <button name="login" class="btn btn-outline btn-success-mine" onclick="loginButtonClicked(event);"><span class="fa fa-sign-in"></span> Login</button>
                                    <a href="register.php" name="sign_up" class="btn btn-outline btn-success"><i class="fa fa-user-plus"></i> Sign Up</a>
                                </div>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
        // FOR TESTING PURPOSES
        print_r($_SESSION);
    ?>

    <!-- FOOTER -->
    <!-- jQuery -->
    <script src="node_modules/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
        
    <!-- Custom Theme JavaScript -->
    <script src="assets/dist/js/sb-admin-2.js"></script>

    <!-- My Script -->
    <script src="assets/js/scripts.js"></script>

</body>
</html>
