<!DOCTYPE html>
<html lang="en">

<?php
    if(session_status() == PHP_SESSION_NONE) {
        session_start(); // Session not started so start the session
    }

    if(!isset($_SESSION['user_id'])) { // if a user is not logged in 
        header("Location: access-denied.html");
    }
?>

<!-- HEADER -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Welcome - Home Page</title>  

    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" type="text/css" href="node_modules/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link rel="stylesheet" type="text/css" href="assets/dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Font-awesome CSS -->
    <link rel="stylesheet" type="text/css" href="node_modules/font-awesome/css/font-awesome.min.css">
    
    <!-- My Styles -->
    <link rel="stylesheet" type="text/css" href="assets/css/myStyles.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
    <div id="wrapper">

        <!-- Navigation -->
        <?php 
            require_once("ui-elements/navigation.php");
        ?>

        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid container-fluid-mine effect8" style="">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header" style="text-align: center; font-weight: 500; text-transform: uppercase; letter-spacing: -1px;">User logged in</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->  
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
    
    <!-- FOOTER -->
    <!-- jQuery -->
    <script src="node_modules/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="assets/dist/js/sb-admin-2.js"></script>

    <!-- My Script -->
    <script type="text/javascript" src="assets/js/scripts.js"></script>
</body>
</html>
