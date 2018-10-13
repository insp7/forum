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

        <!-- /#page-wrapper -->
        <?php
            require_once("includes/dashboard_contents.php");
        ?>

    </div>
    <!-- /#wrapper -->

    <!-- FOOTER -->
    <?php 
        require_once("../ui-elements/footer.php");
    ?>

</body>
</html>
