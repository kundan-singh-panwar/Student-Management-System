<?php
include('dbcon.php');
include('include/header.php');


session_start();
if (isset($_SESSION['aid']) && isset($_SESSION['adminname'])) {
    echo "<h2 id='welcome_0007_name' style='text-align:center; padding:10px; border:1px dotted white; color:white;box-shadow:2px 2px 2px 2px black; text-shadow: 1px 1px 2px black;'>Welcome Admin " . " " . $_SESSION['adminname'] . "</h2>";
} else {
    header('location:admin.php');
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Student | Admin DashBoard</title>
    <link rel="stylesheet" href="css/insert.css">
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
    </center>
    <h2 id="insert_head">Insert Student Details Here</h2>
    <center>
        <div class="form_div">
            <form action="insert.php" method="POST" enctype="multipart/form-data">
                <input type="text" name="rol" maxlength="8" minlength="8" placeholder="student id" required>
                <input type="text" name="name" placeholder="Student Name" required><br>
                <input type="text" name="class" placeholder="Student class" required>
                <input type="text" name="fname" placeholder="Father Name" required><br>
                <input type="text" name="mname" placeholder="Mother Name" required>
                <input type="text" name="contact" maxlength="10" minlength="10" placeholder="Contact Number"
                    required><br>
                <input type="text" name="city" placeholder="city" required>

                <textarea id="text-area" name="add" id="" placeholder="Full Address" cols="30" rows="1"></textarea><br>
                <input type="file" name="simg" id="" required>
                <input id="btn-insert" type="submit" value="Insert Student" name="insert">
            </form>
        </div>
    </center>
</body>

</html>

<?php

if (isset($_POST['insert'])) {
    $roll = $_POST['rol'];
    $sname = $_POST['name'];
    $class = $_POST['class'];
    $fname = $_POST['fname'];
    $mname = $_POST['mname'];
    $contact = $_POST['contact'];
    $city = $_POST['city'];

    $address = $_POST['add'];
    $image = $_FILES['simg']['name'];
    $tempname = $_FILES['simg']['tmp_name'];

    move_uploaded_file($tempname, "uploadimg/$image");

    $qry = "INSERT INTO students VALUES('$roll','$sname','$class','$fname','$mname','$contact','$city','$address','$image')";
    $data = mysqli_query($link, $qry);
    if ($data) {
?>
<script>
alert('Student Inserted Sucessfully');
window.open('insert.php', '_self');
</script>

<?php
    } else {
    ?>
<script>
alert('Student Data not Inserted! sorry try again letter');
window.open('insert.php', '_self');
</script>
<?php
    }
}



?>