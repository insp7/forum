<!DOCTYPE html>
<html lang="en">

<!-- HEADER -->
<?php 
    require_once("../ui-elements/header.php");
    if(session_status() == PHP_SESSION_NONE) {
        session_start(); // Session not started so start the session
    }
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
                        <h3 class="page-header">Comments</h3>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->

                <!-- ***************** START FROM HERE ***************** -->
                <?php
                    require_once("../classes/Posts.php");
                    require_once("../classes/Users.php");

                    // $posts = new Posts();
                    // $result_set = $posts->getAllPosts();

                    // $users = new Users();
                    if(isset($_GET['post_id'])) {
                        $posts = new Posts();
                        $resultant_row = $posts->getPostById($_GET['post_id'], "*");
                        extract(mysqli_fetch_assoc($resultant_row));

                        $users = new Users();
                        $resultant_row = $users->getUserDetailsById($post_user_id, "user_name");
                        extract(mysqli_fetch_assoc($resultant_row));
                ?>
                        <!--POST ID FOR JAVASCRIPT-->
                        <p id="post_id" hidden><?php echo $_GET['post_id']?></p>

                        <div class="panel panel-info">
                            <div class="panel-heading">
                                <i class="fa fa-user" aria-hidden="true"> <div style="font-size: 20px; font-family: 'Cantora One'; display: inline;"><?php echo $user_name; ?></div></i> 
                                <i class="fa fa-clock-o" aria-hidden="true" style="float: right;"> <div style="font-size: 16px; font-family: 'Cantora One'; display: inline;">Posted on <?php echo $created_at; ?></div></i> 
                            </div>
                            <div class="panel-body">
                                <?php echo $post_content; ?>
                                <i class="fa fa-thumbs-up fa-2x" aria-hidden="true" style="float: right; color: #007bff;  letter-spacing:.25px;"> <?php echo $post_points; ?></i>
                            </div>
                        </div>
                <?php 
                    } // End of if statement
                ?>
                <?php 
                    require_once("../classes/Comments.php");

                    $comments = new Comments();
                    $result_set = $comments->getAllCommentsByPostId($_GET['post_id']);
                    
                    while($row = mysqli_fetch_assoc($result_set)) {
                        extract($row);
                ?>
                <div id="all_comments">
                    <div class="well well-sm">
                        <div style="font-size: 16px; font-family: 'Cantora One';"><?php echo $comment_author; ?></div>
                        <div style="font-size: 12px;">answered on <?php echo $created_at; ?></div>
                        <h4></h4>
                        <p><?php echo $comment_content; ?></p>
                    </div>
                </div>
                <?php 
                    } // End of while loop
                ?>
                                
                <div id="comment_posted_using_ajax"></div>
                <div class="form-group">
                    <br>
                    <label for="comment_content">Your Comment</label>
                    <textarea id="comment_content" name="comment_content" class="form-control" placeholder="Write your answer..." rows="3"></textarea>                 
                </div>
                <button class="btn btn-outline btn-success-mine btn-sm" style="font-size: 13px;" id="post_comment" name="post_comment">Post Your Answer</button>
                <hr>
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