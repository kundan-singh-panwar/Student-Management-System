<?php
include('dbcon.php');
include('include/header.php');
include('function.php');

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome| Student Managment System</title>
    <link rel="stylesheet" href="css/index.css">
</head>

<body style="background-color: cornflowerblue;">
    <div class="container">
        <h2 id="heading_0001_details">
            <div class="admin_0001_penal">
                <h4 id="Admin_0003_penal"> <a href="admin.php"> Admin Penal</a></h4>
            </div>
        </h2>


        <form class="form_0002_details" action="index.php" method="post">
            <h1 id="heading_0001_details">Find Student</h1>
            <input style="outline:none; width:30%;" type="text" placeholder="Roll Number" name="Roll" required>
            <input style="outline:none; width:30%;" type="text" placeholder="Class" name="class" required><br>
            <input
                style="outline:none; width:10%; background:white; padding-left:20px; padding-right:20px; padding-top:10px; padding-bottom:10px; border:2px solid white; color:black; cursor:pointer; font-weight:bold;"
                type="submit" name="show" value="Show Details"><br>
        </form>
    </div>
</body>

</html>

<?php

if (isset($_POST['show'])) {
    $roll = $_POST['Roll'];
    $class = $_POST['class'];

    showdetails($roll, $class);
}

?>