<?php
include('dbcon.php');
include('include/header.php');


session_start();
if (isset($_SESSION['aid']) && isset($_SESSION['adminname'])) {
    echo "<h2 id='welcome_0007_name' style='text-align:center; padding:10px; border:1px dotted white; color:white;box-shadow:2px 2px 2px 2px black; text-shadow: 1px 1px 2px black;'>Welcome Admin " . " " . $_SESSION['adminname'] . "</h2>";
} else {
    header('location:admin.php');
}

@$id = $_GET['id'];

$qry = "SELECT * FROM students WHERE roll='$id' ";
$run = mysqli_query($link, $qry);
$data = mysqli_fetch_assoc($run);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete | Student Management System</title>
    <link rel="stylesheet" href="css/update.css">
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
        <h2 id="insert_head">Delete Student Details Here</h2>
    </center>


    <form class="update_form" action="delete.php" method="post">
        <input id="input_filed" type="text" name="class" placeholder="Student class" id="" required>
        <input id="input_filed" type="text" name="sname" placeholder="Student name" id="" required><br>
        <input id="input_btn" type="submit" name="search" value="Search">
    </form>
    <center>
        <table style="text-align: center; " align="center" width="95%" border="1">
            <tr style="color:white;">
                <th>SNo.</th>
                <th>Image</th>
                <th>Roll number</th>
                <th>Student Name</th>
                <th>Student Class</th>
                <th>Father Name</th>
                <th>Mother Name</th>
                <th>Parants Contact</th>
                <th>City</th>
                <th>Address</th>
                <th>DELETE REORDS</th>
            </tr>

            <?php
            if (isset($_POST['search'])) {

                $class = $_POST['class'];
                $name = $_POST['sname'];

                $update = "SELECT * FROM students WHERE class='$class' AND sname LIKE '%$name%' ";
                $run = mysqli_query($link, $update);
                if (mysqli_num_rows($run) < 1) {
            ?>
            <script>
            alert('Sorry! No Records Found');
            window.open('delete.php', '_self');
            </script>
            <?php
                } else {
                    $count = 0;
                    while ($data = mysqli_fetch_assoc($run)) {
                        $count++;
                    ?>

            <tr>
                <td><?php echo $count; ?></td>
                <td><img src="uploadimg/<?php echo $data['image'];  ?>"
                        style="max-width:150px; padding:5px;  border: 5px solid black;" alt=""></td>
                <td><?php echo $data['roll'];   ?></td>
                <td><?php echo $data['sname'];   ?></td>
                <td><?php echo $data['class'];   ?></td>
                <td><?php echo $data['fname'];   ?></td>
                <td><?php echo $data['mname'];   ?></td>
                <td><?php echo $data['contact'];   ?></td>
                <td><?php echo $data['city'];   ?></td>
                <td><?php echo $data['address'];   ?></td>
                <td><a href="deletestu.php?id=<?php echo $data['roll']; ?>" style="color:white;"> DELETE RECORD</a></td>
            </tr>
            <?php
                    }
                }
            }

            ?>





        </table>
    </center>

</body>

</html>