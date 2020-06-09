<?php
include('dbcon.php');
include('include/header.php');


session_start();
if (isset($_SESSION['aid']) && isset($_SESSION['adminname'])) {
    echo "<h2 id='welcome_0007_name' style='text-align:center; padding:10px; border:1px dotted white; color:white;box-shadow:2px 2px 2px 2px black; text-shadow: 1px 1px 2px black;'>Welcome Admin " . " " . $_SESSION['adminname'] . "</h2>";
} else {
    header('location:admin.php');
}



$roll = $_GET['id'];

$qry = "SELECT * FROM students WHERE roll='$roll' ";
$run = mysqli_query($link, $qry);
$data = mysqli_fetch_assoc($run);



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data | School Management System</title>
    <link rel="stylesheet" href="css/updateform.css">
</head>

<body>
    <center>
        <div class="find_student" style="display: flex;">

            <h2
                style="text-shadow:1px 1px 2px black; box-shadow:2px 2px 2px black;background:red;width:20%; text-align:center;border-radius:10px;border:1px solid black;padding:10px; margin:10px;">
                <a href="admindash.php" style="text-decoration:none;color:white;">Admin DashBoard</a> </h2>


            <h2
                style="text-shadow:1px 1px 2px black; box-shadow:2px 2px 2px black;background:gold;width:20%; text-align:center;border-radius:10px;border:1px solid black;padding:10px; margin:10px;">
                <a href="index.php" style="text-decoration:none;color:white;">Find Student</a> </h2>


        </div>
        <h2 id="insert_head">Update Student Details Here</h2>
    </center>

    <center>
        <div class="form_div">
            <form action="updatefinal.php" method="POST" enctype="multipart/form-data">
                <input type="text" name="rol" maxlength="8" minlength="8" value="<?php echo $data['roll']; ?>" required>
                <input type="text" name="name" value="<?php echo $data['sname']; ?>" required><br>
                <input type="text" name="class" value="<?php echo $data['class']; ?>" required>
                <input type="text" name="fname" value="<?php echo $data['fname']; ?>" required><br>
                <input type="text" name="mname" value="<?php echo $data['mname']; ?>" required>
                <input type="text" name="contact" maxlength="10" minlength="10" value="<?php echo $data['contact']; ?>"
                    required><br>
                <input type="text" name="city" value="<?php echo $data['city']; ?>" required>

                <input id="text-area" name="add" id="" value="<?php echo $data['address']; ?>" cols="30" rows="1"><br>
                <input type="file" name="simg" id="" required>

                <input type="hidden" name="roll" value="<?php echo $data['roll']; ?>">
                <input id="btn-insert" type="submit" value="Update Student" name="insert">
            </form>
        </div>
    </center>

</body>

</html>