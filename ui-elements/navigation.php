<!-- NAVIGATION -->
<nav class="navbar navbar-default navbar-fixed-top" role="navigation" style="margin-bottom: 0;">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">FORUM</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                    <?php
                        print_r($_SESSION);
                    ?>
                    <button style="background: none; color: inherit; border: none; padding: 0; font: inherit; outline: inherit; padding-left: 22px; margin-top:14px; margin-right: 10px;" onclick="logoutButtonClicked(event);">
                    <i class="fa fa-sign-out fa-fw"></i> Logout</button>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar sidebar-mine" role="navigation" style="background: #fff;">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search nav-link-margin">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                            </div>
                            <!-- /input-group -->
                        </li>
                        <li class="nav-link-margin">
                            <?php
                                // Setting absolute path 
                                $path = "";
                                if($_SESSION['user_role'] === "admin") {
                                    $path = "http://localhost/forum/admin/index.php";
                                } else {
                                    $path = "http://localhost/forum/index.php";
                                }
                            ?>
                            <a href="<?php echo $path; ?>"><i class="fa fa-home fa-fw"></i> Home</a>
                        </li>
        
                        <li class="nav-link-margin">
                            <a href="http://localhost/forum/posts/view-all-posts.php"><i class="fa fa-clone fa-fw"></i> View Posts</a>
                        </li>
                        <li class="nav-link-margin">
                            <a href="http://localhost/forum/posts/add-post.php"><span class="fa fa-question"></span> Post Question</a>
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>