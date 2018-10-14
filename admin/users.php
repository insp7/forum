<!DOCTYPE html>
<html lang="en">
    
    <!-- HEADER -->
    <?php
        require_once("../ui-elements/header.php");
        require_once("../classes/Users.php");
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
                                    <th>Id</th>
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
                                            <td><?php echo $user_id; ?></td>
                                            <td><?php echo $first_name; ?></td>
                                            <td><?php echo $last_name; ?></td>
                                            <td><?php echo $user_name; ?></td>
                                            <td><?php echo $user_email; ?></td>
                                            <td><?php echo $user_dob; ?></td>
                                            <td><?php echo $user_branch; ?></td>
                                            <td><?php echo $user_posts; ?></td>
                                            <td><?php echo $user_role; ?></td>
                                            <td><a class='btn btn-outline btn-danger' onclick='deleteUserClicked(event, <?php echo $user_id; ?>, this);'><span class='fa fa-trash'></span> Delete</a></td>
                                            <td><a class='btn btn-outline btn-primary'><span class='fa fa-pencil-square-o'></span> Edit</a></td>
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