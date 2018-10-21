<!DOCTYPE html>
<html lang="en">
    
    <!-- HEADER -->
    <?php
        require_once("../ui-elements/header.php");
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
                            <h1 class="page-header">User information</h1>
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>

                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-hover" id="users-table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>First name</th>
                                        <th>Last name</th>
                                        <th>Username</th>
                                        <th>Email</th>
                                        <th>DOB</th>
                                        <th>Branch</th>
                                        <th>Posts</th>
                                        <th>User role</th>
                                    </tr>
                                </thead>
                                <tbody class="hover-mine">
                                    <?php
                                        $sr_no = 1;
                                        $users = new Users();
                                        $result_set = $users->getAllUsers();
                                        while($row = mysqli_fetch_assoc($result_set)){
                                            extract($row);
                                    ?>
                                            <tr>
                                                <td><?php echo $sr_no; ?></td>
                                                <td style="text-align: center; padding-left: 25px; padding-right: 25px;"><?php echo $first_name; ?></td>
                                                <td style="text-align: center; padding-left: 25px; padding-right: 25px;"><?php echo $last_name; ?></td>
                                                <td><?php echo $user_name; ?></td>
                                                <td><?php echo $user_email; ?></td>
                                                <td><?php echo $user_dob; ?></td>
                                                <td><?php echo $user_branch; ?></td>
                                                <td style="text-align: center;"><?php echo $user_posts; ?></td>
                                                <td style="text-align: center; padding-left: 25px; padding-right: 25px;"><?php echo $user_role; ?></td>
                                                <td><a class='btn btn-outline btn-danger' onclick='deleteUserClicked(event, <?php echo $user_id; ?>, this);'><span class='fa fa-trash'></span> Delete</a></td>
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