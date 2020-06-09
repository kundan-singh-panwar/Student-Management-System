<?php
include('dbcon.php');
include('include/header.php');
session_start();
if (isset($_SESSION['aid']) && isset($_SESSION['adminname'])) {
    header('location:admindash.php');
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="stylesheet" href="css/admin.css">
</head>

<body style="background-color: cornflowerblue;">

    <div class="find_student">
        <h2
            style="text-shadow:1px 1px 2px black; box-shadow:2px 2px 2px black;background:gold;width:20%; text-align:center;border-radius:10px;border:1px solid black;padding:10px; margin:10px;">
            <a href="index.php" style="text-decoration:none;color:white;">Find Student</a> </h2>
    </div>
    <form class="form_0002_details" action="admin.php" method="post">
        <h1>Admin Login</h1>
        <input type="text" placeholder="Admin Username " name="adminname" required><br>
        <input type="password" placeholder="Password" name="pass" required><br>
        <input type="submit" name="login" value="Admin Access"><br>
    </form>

</body>

</html>
<?php



if (isset($_POST['login'])) {
    $admin = $_POST['adminname'];
    $pass = $_POST['pass'];

    $query = "SELECT * FROM `admin` WHERE `username`='$admin' && `password` = '$pass'";

    $result = mysqli_query($link, $query);
    $count = mysqli_num_rows($result);
    if ($count != 1) {
?>
<script>
alert('message?:Only Admins can access');
window.open('admin.php', '_self');
</script>

<?php
    } else {


        $data = mysqli_fetch_assoc($result);

        $id = $data['id'];
        $name = $data['username'];

        $_SESSION['aid'] = $id;
        $_SESSION['adminname'] = $name;
        header('location:admindash.php');
    }
}



?>