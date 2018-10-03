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

                    $posts = new Posts();
                    $result_set = $posts->getAllPosts();

                    while($row = mysqli_fetch_assoc($result_set)) {
                        extract($row);

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
                                <div class="panel-footer">
                                    <a href="comments.php?post_id='.$post_id.'&post_user_id='.$post_user_id.'" class="btn btn-outline btn-success-mine btn-sm" style="font-size: 13px;">Post Your Answer</a>
                                    <a href="" class="btn btn-outline btn-success btn-sm" style="font-size: 13px;">Upvote Post</a>
                                    <i class="fa fa-thumbs-up fa-2x" aria-hidden="true" style="float: right; color: #007bff;  letter-spacing:.25px;"> '.$post_points.'</i>
                                </div>
                            </div>';
                    }
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