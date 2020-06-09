<?php
include('dbcon.php');
error_reporting(0);
session_start();
if (isset($_SESSION['aid']) && isset($_SESSION['adminname'])) {
} else {
    header('location:admin.php');
}


$roll = $_POST['rol'];
$sname = $_POST['name'];
$class = $_POST['class'];
$fname = $_POST['fname'];
$mname = $_POST['mname'];
$contact = $_POST['contact'];
$city = $_POST['city'];
$address = $_POST['add'];
$id = $_POST['roll'];
$image = $_FILES['simg']['name'];
$tempname = $_FILES['simg']['tmp_name'];

move_uploaded_file($tempname, "uploadimg/$image");

$address = $_POST['add'];
$qry = "UPDATE `students` SET `roll` = '$roll', `sname` = '$sname', `class` = '$class', `fname` = '$fname',`mname` = '$mname',`contact` = '$contact',`city` = '$city', `address` = '$address',`image` = '$image' WHERE `roll` = '$id'";
$data = mysqli_query($link, $qry);
if ($data) {
?>
<script>
alert('Student Update Sucessfully');
window.open('update.php', '_self');
</script>

<?php
} else {
?>
<script>
alert('Student Data not Updated! sorry try again letter');
window.open('updateform.php', '_self');
</script>
<?php
}