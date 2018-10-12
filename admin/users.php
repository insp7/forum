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
                        <table class="table table-hover">
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
                            <tbody>
                                <?php
                                    $sr_no = 1;
                                    $users = new Users();
                                    $result_set = $users->getAllUsers();
                                    while($row = mysqli_fetch_assoc($result_set)){
                                        extract($row);

                                        echo "<tr>";
                                        echo "<td>$sr_no</td>";
                                        echo "<td>$user_id</td>";
                                        echo "<td>$first_name</td>";
                                        echo "<td>$last_name</td>";
                                        echo "<td>$user_name</td>";
                                        echo "<td>$user_email</td>";
                                        echo "<td>$user_dob</td>";
                                        echo "<td>$user_branch</td>";
                                        echo "<td>$user_posts</td>";
                                        echo "<td>$user_role</td>";
                                        echo "<td><a class='btn btn-outline btn-danger' href=''><span class='fa fa-trash'></span> Delete</a></td>";
                                        echo "<td><a class='btn btn-outline btn-primary' href=''><span class='fa fa-pencil-square-o'></span> Edit</a></td>";
                                        echo "</tr>";

                                        $sr_no++;
                                    }
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