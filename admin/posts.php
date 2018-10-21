<!DOCTYPE html>
<html lang="en">
    
    <!-- HEADER -->
    <?php
        require_once("../ui-elements/header.php");
        require_once("../classes/Posts.php");
        require_once("../classes/Users.php");

        if($_SESSION['user_role'] === "user") { // if a user is logged in, deny him the admin access
            header("Location: http://localhost/forum/admin-access-denied.html"); // Added Absolute Path
        }
    ?>

    <body>
        <div id="wrapper">

            <!-- Navigation -->
            <?php
                require_once("../ui-elements/navigation.php");
            ?>

            <div id="page-wrapper">
                <div class="container-fluid container-fluid-mine effect8 padding-mine">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">All Posts</h1>
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>

                    <div class="panel-body">
                        <table width="100%" id="posts-table" class="table table-striped table-condensed" id="posts-table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Content</th>
                                    <th>Posted By</th>
                                    <th>Tags</th>
                                    <th>Points</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $sr_no = 1;
                                    $posts = new Posts();
                                    $all_posts = $posts->getAllPosts();

                                    $users = new Users();

                                    while($row = mysqli_fetch_assoc($all_posts)) {
                                        extract($row);

                                        $user_result_set = $users->getUserDetailsById($post_user_id, "user_name");
                                        extract(mysqli_fetch_assoc($user_result_set)); 
                                ?>
                                        <tr>
                                            <td><?php echo $sr_no; ?></td>
                                            <td><?php echo $post_content; ?></td>
                                            <td><?php echo $user_name; ?></td>
                                            <td><?php echo $post_tags; ?></td>
                                            <td><?php echo $post_points; ?></td>
                                            <td><a class='btn btn-outline btn-info' onclick="editPostClicked(event, <?php echo $post_id; ?>, 'posts-table', this);"><span class='fa fa-pencil-square-o'></span> Edit</a></td>   
                                            <td><a class='btn btn-outline btn-danger' onclick="deletePostClicked(event, <?php echo $post_id; ?>, this);"><span class='fa fa-trash'></span> Delete</a></td>
                                        </tr>
                                <?php
                                        $sr_no++;
                                    } // End of while loop
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- /#page-wrapper -->
                    
                    <!-- When user clicks edit button, this edit-post-page is shown and the posts-table is hidden -->
                    <div class="hidden" id="edit-post-page">
                        <div class="container-fluid">
                            <form action="" method="POST" id="edit-question-form">
                                    <h3>Edit Question</h3>
                                    <input type="text" name="edit_question_tags" id="edit_question_tags" class="form-control" autocomplete="off" placeholder="Add comma separated tags">
                                    <br>
                                    <textarea id="question-to-edit"></textarea>
                                    <div id="question-to-edit-error" class="text-danger hidden">Cannot submit empty Post!</div>
                                    <br>
                                    <button name="update-question" id="update-question" class="btn btn-outline btn-info">Update Post</button>
                            </form>    
                        </div>
                        <!-- /.container-fluid -->
                    </div>
                    <!-- /#edit-post-page -->
                </div>
                    
            </div>
            <!-- /#wrapper -->

        <!-- FOOTER -->
        <?php
            require_once("../ui-elements/footer.php");
        ?>
    </body>
</html>