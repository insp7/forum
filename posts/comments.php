<!DOCTYPE html>
<html lang="en">

<!-- HEADER -->
<?php 
    require_once("../ui-elements/header.php");
?>

    <link rel="stylesheet" type="text/css" href="styles.css">
    <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Wellfleet">
    <!--[if lt IE 9]>
        <script type="text/javascript" src="https://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <?php 
            require_once("../ui-elements/navigation.php");
        ?>

        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h3 class="page-header">Post Your Answer</h3>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->

                <!-- ***************** START FROM HERE ***************** -->
                <?php
                    if(isset($_GET['post_id'])) {
                        require_once("../classes/Posts.php");
                        $post_id = $_GET['post_id'];
                        $post_user_id = $_GET['post_user_id'];

                        $sql = "SELECT * FROM posts WHERE post_id = '$post_id'";
                        $result_set = $database->getConnection()->query($sql);
                        $row = mysqli_fetch_assoc($result_set);
                        $post_content = $row['post_content'];
                        $created_at = $row['created_at'];
                        $post_points = $row['post_points'];

                        $sql = "SELECT first_name, last_name, user_name FROM users WHERE user_id = '$post_user_id'";
                        $post_user_name = $database->getConnection()->query($sql);
                        extract(mysqli_fetch_assoc($post_user_name));

                        echo '<div class="panel panel-info">
                                <div class="panel-heading">
                                    <i class="fa fa-user" aria-hidden="true"> '.$user_name.'</i> 
                                    <i class="fa fa-clock-o" aria-hidden="true" style="float: right;"> Posted on '.$created_at.'</i> 
                                </div>
                                <div class="panel-body">
                                    '.$post_content.'
                                </div>
                            </div>';
                    }
                ?>
                <div class="well well-sm">
                    <h5><b>User name</b></h5>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                    proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                </div>
                
                <hr style="border-color: #A9A9A9;">
                <form role="form" action="">
                    <div class="form-group">
                        <label><?php echo $user_name; ?></label>
                        <textarea class="form-control" rows="3" placeholder="Write your answer"></textarea>
                    </div>
                </form>
                <div class="panel-footer">            
                    <a href="" class="btn btn-outline btn-success-mine btn-sm" name="post-comment" style="font-size: 13px;">Post Your Answer</a>
                    <a href="" class="btn btn-outline btn-success btn-sm" style="font-size: 13px;">Upvote Post</a>
                    <i class="fa fa-thumbs-up fa-2x" aria-hidden="true" style="float: right; color: #007bff;  letter-spacing:.25px;"> '.$post_points.'</i>
                </div>
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
    
    <!-- FOOTER -->
    <?php 
        require_once("../ui-elements/footer.php");
    ?>
    
</body>
</html>