<!DOCTYPE html>
<html lang="en">

<?php 
    require_once("classes/Users.php");

    if(isset($_POST['signup'])){
        $first_name = $_POST['firstname'];
        $last_name = $_POST['lastname'];
        $user_name = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $user_branch = $_POST['user_branch'];
        $user_dob = $_POST['user_dob'];

        $users = new Users();
        $users->addUser($first_name, $last_name, $user_name, $email, $password, $user_dob, $user_branch);
    } 
?>

<!-- HEADER -->
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Sign up</title>

    <!-- Bootstrap Core CSS -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="assets/vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="assets/dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="assets/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

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
                        <h3 class="panel-title">Sign up</h3>
                    </div>

                    <div class="panel-body">
                        <form role="form" action="" method="POST" id="register_form">
                            <fieldset>
                                <div id="firstname_div" class="form-group">
                                    <input class="form-control" placeholder="First name" id="firstname" name="firstname" type="text" autocomplete="off" autofocus>
                                </div>
                                <div id="lastname_div" class="form-group">
                                    <input class="form-control" placeholder="Last name" id="lastname" name="lastname" type="text" autocomplete="off">
                                </div>
                                <div id="username_div" class="form-group">
                                    <input class="form-control" placeholder="Username" id="username" name="username" type="text" autocomplete="off">
                                </div>
                                <div id="email_div" class="form-group">
                                    <input class="form-control" placeholder="Email" id="email" name="email" type="email" autocomplete="off">
                                </div>
                                <div id="password_div" class="form-group">
                                    <input class="form-control" placeholder="Enter password" id="password" name="password" type="password" autocomplete="off">
                                </div>
                                <div id="confirm_password_div" class="form-group">
                                    <input class="form-control" placeholder="Confirm password" id="confirm_password" name="confirm_password" type="password" autocomplete="off">
                                </div>
                                <div id="user_branch_div" class="form-group">
                                    <input class="form-control" placeholder="User branch" id="user_branch" name="user_branch" type="text" autocomplete="off">
                                </div>
                                <div id="user_dob_div" class="form-group">
                                    <input class="form-control" placeholder="Date of Birth" id="user_dob" name="user_dob" type="date" autocomplete="off">
                                </div>
                                
                                <!-- &emsp = 4spaces, &ensp = 2spaces, &nbsp = 1spaces. -->
                                <div class="form-group">
                                    <p> 
                                        &emsp;Already A member?&ensp;
                                        <a href="login.php" name="login" class="btn btn-outline btn-primary"><span class="fa fa-sign-in"></span> Login</a>
                                        <button type="submit" name="signup" class="btn btn-outline btn-success"><span class="glyphicon glyphicon-user"></span> Sign Up</button>
                                    </p>
                                </div>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- FOOTER -->
    <!-- jQuery -->
    <script src="assets/vendor/jquery/jquery.min.js"></script>

    <!-- jquery Validation -->
    <script src="assets/convertedFromCDN/js/jquery.validate.min.js"></script>
    <script src="assets/convertedFromCDN/js/additional-methods.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="assets/vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="assets/vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="assets/dist/js/sb-admin-2.js"></script>
    
    <!-- Remember to remove this, bcoz its useless :P  -->
    <!-- Include Editor JS files. -->
    <script type="text/javascript" src="assets/convertedFromCDN/js/froala_editor.pkgd.min.js"></script>

    <!-- My Script -->
    <script src="assets/js/scripts.js"></script>

</body>
</html>
