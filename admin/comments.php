<!DOCTYPE html>
<html lang="en">
    
    <!-- HEADER -->
    <?php
        require_once("../ui-elements/header.php");
        require_once("../classes/Comments.php");

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
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">All Comments</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>

                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-condensed" id="comments-table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>ID</th>
                                    <th>Post ID</th>
                                    <th>Author</th>
                                    <th>Author's ID</th>
                                    <th>Content</th>
                                    <th>Created At</th>
                                    <th>Updated At</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $sr_no = 1;
                                    $comments = new Comments();
                                    $result_set = $comments->getAllComments();
                                    while($row = mysqli_fetch_assoc($result_set)) {
                                        extract($row);
                                ?>
                                        <tr>
                                            <td><?php echo $sr_no; ?></td>
                                            <td><?php echo $comment_id; ?></td>
                                            <td><?php echo $comment_post_id; ?></td>
                                            <td><?php echo $comment_author; ?></td>
                                            <td><?php echo $comment_author_id; ?></td>
                                            <td><?php echo $comment_content; ?></td>
                                            <td><?php echo $created_at; ?></td>
                                            <td><?php echo $updated_at; ?></td>   
                                            <td><a class='btn btn-outline btn-danger' onclick="deleteCommentClicked(event, <?php echo $comment_id; ?>, this);"><span class='fa fa-trash'></span> Delete</a></td>
                                        </tr>
                                <?php    
                                        $sr_no++;
                                    } // End of while loop
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.table-responsive -->
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