<!-- HEADER -->
<?php  
    if(session_status() == PHP_SESSION_NONE) {
        session_start(); // Session not started so start the session
    }

    if(!isset($_SESSION['user_id'])) { // if a user is not logged in 
        header("Location: access-denied.html");
    }
?>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Bootstrap Admin Theme</title>

    <!-- Include Editor style. -->
    <link href="../assets/convertedFromCDN/css/froala_editor.pkgd.min.css" rel="stylesheet" type="text/css" />
    <link href="../assets/convertedFromCDN/css/froala_style.min.css" rel="stylesheet" type="text/css" />

    <!-- Bootstrap Core CSS -->
    <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../assets/vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../assets/dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="../assets/vendor/morrisjs/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../assets/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- My CSS -->
    <link rel="stylesheet" type="text/css" href="../assets/css/myStyles.css">
    
    <!-- Cantora One Font -->
    <link href='https://fonts.googleapis.com/css?family=Cantora One' rel='stylesheet'>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>