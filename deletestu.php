<?php
include('dbcon.php');
error_reporting(0);
session_start();
if (isset($_SESSION['aid']) && isset($_SESSION['adminname'])) {
} else {
    header('location:admin.php');
}

$id = $_REQUEST['id'];

$qry = "DELETE FROM `students` WHERE `roll` = '$id'";
$data = mysqli_query($link, $qry);
if ($data) {
?>
<script>
alert('<?php echo "id = " . $id . "  "; ?>Student Record Deleted Sucessfully');
window.open('delete.php', '_self');
</script>

<?php
} else {
?>
<script>
alert('Student Data not deleted! sorry try again letter');
window.open('delete.php', '_self');
</script>
<?php
}