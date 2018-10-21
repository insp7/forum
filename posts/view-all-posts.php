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
            <div class="container-fluid container-fluid-mine effect8 padding-mine">
                <div class="row">
                    <div class="col-lg-12">
                        <br>
                        <h3 class="page-header show-inline-mine">All Posts</h3>
                        <a href="http://localhost/forum/posts/add-post.php" class="btn-mine btn-bootstrap4-primary-mine ask-quest-btn-alignment-mine"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Ask Question</a>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->

                <!-- ***************** START FROM HERE ***************** -->
                <?php
                    require_once("../classes/Posts.php");
                    require_once("../classes/Users.php");
                    require_once("../classes/PostVotes.php");

                    $posts = new Posts();
                    $post_votes = new PostVotes();
                    $users = new Users();

                    $result_set = $posts->getAllPosts();
                    $posts_upvoted = $post_votes->getUpvotedPostsByMe();

                    $selected_rows = mysqli_num_rows($posts_upvoted);
                    $shown_upvotes = 0;
                    $shown_rows = 1;

                    while($row = mysqli_fetch_assoc($result_set)) {
                        extract($row);

                        $resultant_row = $users->getUserDetailsById($post_user_id, "user_name");
                        extract(mysqli_fetch_assoc($resultant_row));
                        
                ?>
                        <div class="panel panel-info">
                            <div class="panel-heading">
                                <i class="fa fa-user" aria-hidden="true"></i> <div class="show-inline-mine post-header-details-mine"><?php echo $user_name; ?></div> 
                                <i class="fa fa-clock-o float-right-mine" aria-hidden="true"><div class="show-inline-mine post-header-details-mine"> Posted on <?php echo $created_at; ?></div></i> 
                            </div>
                            <div class="panel-body">
                                <?php echo $post_content; ?>
                            </div>
                            <div class="panel-footer">
                                <?php 
                                    echo '<a href="comments.php?post_id='.$post_id.'&post_user_id='.$post_user_id.'" class="btn btn-outline btn-success-mine btn-sm" style="font-size: 13px;">Post Your Answer</a>';
                                    if($selected_rows >= $shown_rows) { // If there are posts upvoted by the currently logged in user
                                        while($upvoted_post_id_row = mysqli_fetch_assoc($posts_upvoted)) {
                                            $shown_upvotes = 0;
                                            $upvoted_post_id = $upvoted_post_id_row['post_id'];
                                            
                                            if($upvoted_post_id === $post_id) { // If current post is an upvoted post
                                ?>
                                                <i class="fa fa-thumbs-up fa-2x upvote-post-btn-mine post-upvoted-mine" name="upvote-post" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="Upvote post" onclick="upvotePostClicked(event, <?php echo $post_id; ?>, this);"> <?php echo $post_points; ?></i>
                                <?php
                                                $shown_upvotes = 1;
                                                $shown_rows++;
                                                break;
                                            } // End of inner if
                                        }//END OF inner WHILE.
                                        $posts_upvoted = $post_votes->getUpvotedPostsByMe(); // INEFFCIENT LOGIC, improve later
                                        if($shown_upvotes != 1) {
                                ?>
                                                <i class="fa fa-thumbs-up fa-2x upvote-post-btn-mine post-not-upvoted-mine" name="upvote-post" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="Upvote post" onclick="upvotePostClicked(event, <?php echo $post_id; ?>, this);"> <?php echo $post_points; ?></i>
                                <?php
                                        } // End of second if
                                    } else { // If there are zero posts upvoted by the currently logged in user
                                ?> 
                                        <i class="fa fa-thumbs-up fa-2x upvote-post-btn-mine post-not-upvoted-mine" name="upvote-post" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="Upvote post" onclick="upvotePostClicked(event, <?php echo $post_id; ?>, this);"> <?php echo $post_points; ?></i>                
                                <?php 
                                    } // End of outer if-else
                                ?>
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