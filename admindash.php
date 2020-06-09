<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admindash Board | Student Managment System</title>
    <link rel="stylesheet" href="css/admindash.css">
</head>

<body>
    <h1 id="admin_head_0005">Admin Dashboard</h1>


    <?php
    session_start();
    if (isset($_SESSION['aid']) && isset($_SESSION['adminname'])) {
        echo "<h2 id='welcome_0007_name' style='text-align:center; padding:10px; border:1px dotted white; color:white;box-shadow:2px 2px 2px 2px black; text-shadow: 1px 1px 2px black;'>Welcome Admin " . " " . $_SESSION['adminname'] . "</h2>";
    } else {
        header('location:admin.php');
    }
    ?>



    <div class="find_student">

        <h2
            style="text-shadow:1px 1px 2px black; box-shadow:2px 2px 2px black;background:gold;width:20%; text-align:center;border-radius:10px;border:1px solid black;padding:10px; margin:10px;">
            <a href="index.php" style="text-decoration:none;color:white;">Find Student</a> </h2>
    </div>
    <center>
        <div class="features">
            <h1 style="border: 1px solid black; border-radius:10%; text-shadow:1px 1px 2px black; box-shadow:1px 1px 2px 1px black; width:20%;"
                align="center">
                Fetures</h1>
            <center>
                <div id="first">
                    <h2> <a href="insert.php"> Insert Student Details</a></h2>
                </div>
            </center>
            <div id="second">
                <h2><a href="update.php">Update Student Details</a></h2>
            </div>
            <div id="third">
                <h2><a href="delete.php">Delete Student Details</a></h2>
            </div>
        </div>
    </center>


    <div class="logout">
        <form id="form-logout" action="admindash.php" method="post">
            <input style="cursor:pointer; padding:5px;background:transparent;text-shadow:1px 1px 2px black;"
                id="logout_0006" type="submit" name="logout" value="Log out">
        </form>

    </div>
</body>

</html>
<?php
if (isset($_POST['logout'])) {
    session_unset();
    session_destroy();
    header('location:admin.php');
}

?>