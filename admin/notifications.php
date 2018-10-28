<!DOCTYPE html>
<html lang="en">
    
    <!-- HEADER -->
    <?php
        require_once("../ui-elements/header.php");
        require_once("../classes/Notifications.php");

        if($_SESSION['user_role'] === "user") { // if a user is logged in, deny him the admin access
            header("Location: ../admin-access-denied.html"); // Added Relative path again
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
                            <h1 class="page-header">All Notifications</h1>
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>

                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-hover table-striped table-condensed" id="notifications-table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>ID</th>
                                        <th>From-user-id</th>
                                        <th>To-user-id</th>
                                        <th>Notification-content</th>
                                        <th>Notified</th>
                                    </tr>
                                </thead>
                                <tbody class="hover-mine">
                                    <?php
                                        $sr_no = 1;
                                        $notifications = new Notifications();
                                        $result_set = $notifications->getAllNotifications();
                                        while($row = mysqli_fetch_assoc($result_set)) {
                                            extract($row);
                                    ?>
                                            <tr>
                                                <td><?php echo $sr_no; ?></td>
                                                <td><?php echo $notification_id; ?></td>
                                                <td><?php echo $from_user_id; ?></td>
                                                <td><?php echo $to_user_id; ?></td>
                                                <td><?php echo $notification_content; ?></td>
                                                <td><?php echo $notified; ?></td>
                                                <td><a class='btn btn-outline btn-danger' onclick="deleteNotificationClicked(event, <?php echo $notification_id; ?>, this);"><span class='fa fa-trash'></span> Delete</a></td>
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