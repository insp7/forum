<!DOCTYPE html>
<html lang="en">

<!-- HEADER -->
<?php 
    require_once("../ui-elements/header.php");
?>

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
                        <h3 class="page-header">View all posts</h3>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->

                <!-- ***************** START FROM HERE ***************** -->
                <?php
                    require_once("../classes/Posts.php");
                    require_once("../classes/Users.php");

                    $posts = new Posts();
                    $result_set = $posts->getAllPosts();

                    $users = new Users();
                    while($row = mysqli_fetch_assoc($result_set)) {
                        extract($row);
                        $resultant_row = $users->getUserDetailsById($post_user_id, "user_name");
                        extract(mysqli_fetch_assoc($resultant_row));
                ?>
                        <div class="panel panel-info">
                            <div class="panel-heading">
                                <i class="fa fa-user" aria-hidden="true"></i> <div style="font-size: 16px; font-family: 'Cantora One'; display: inline;"><?php echo $user_name; ?></div> 
                                <i class="fa fa-clock-o" aria-hidden="true" style="float: right;"><div style="font-size: 16px; font-family: 'Cantora One'; display: inline;"> Posted on <?php echo $created_at; ?></div></i> 
                            </div>
                            <div class="panel-body">
                                <?php echo $post_content; ?>
                            </div>
                            <div class="panel-footer">
                                <?php echo '<a href="comments.php?post_id='.$post_id.'&post_user_id='.$post_user_id.'" class="btn btn-outline btn-success-mine btn-sm" style="font-size: 13px;">Post Your Answer</a>'; ?>
                                <a href="" class="btn btn-outline btn-success btn-sm" style="font-size: 13px;">Upvote Post</a>
                                <i class="fa fa-thumbs-up fa-2x" aria-hidden="true" style="float: right; color: #007bff;  letter-spacing:.25px;"> <?php echo $post_points; ?></i>
                            </div>
                        </div>
                <?php 
                    } // End of while loop
                ?>
                
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