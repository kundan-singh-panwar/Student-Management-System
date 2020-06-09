<style>
th {
    color: white;
    font-family: Arial, Helvetica, sans-serif;
    font-size: 20px;
    padding: 10px;
    width: 20%;
}

td {
    font-size: 20px;
    font-weight: bold;
    font-family: Arial, Helvetica, sans-serif;
    padding: 10px;
    color: silver;


}
</style>
<?php

function showdetails($roll, $class)
{
    include('dbcon.php');
    $show = "SELECT * FROM students WHERE roll='$roll' AND class= '$class' ";
    $run = mysqli_query($link, $show);
    if (mysqli_num_rows($run) > 0) {
        $data = mysqli_fetch_assoc($run);
?>
<center>
    <table border="1" align="center" width="90%">
        <tr>
            <th colspan="3" style="color:white;">Student Details</th>
        </tr>
        <tr>
            <td rowspan="9" style="padding: 20px;"><img src="uploadimg/<?php echo $data['image'];  ?>"
                    style="max-width:500; max-height:500px; padding:5px;  border: 5px solid black;" alt="Student image">
            </td>
            <th>Roll No.</th>
            <td><?php echo $data['roll'];   ?></td>
        </tr>
        <tr>
            <th>Student Name</th>
            <td><?php echo $data['sname'];   ?></td>
        </tr>
        <tr>
            <th>Father Name</th>
            <td><?php echo $data['fname'];   ?></td>
        </tr>
        <tr>
            <th>Mother Name</th>
            <td><?php echo $data['mname'];   ?></td>
        </tr>
        <tr>
            <th>Contact</th>
            <td><?php echo $data['contact'];   ?></td>
        </tr>
        <tr>
            <th>City</th>
            <td><?php echo $data['city'];   ?></td>
        </tr>
        <tr>
            <th>Address</th>
            <td><?php echo $data['address'];   ?></td>
        </tr>
    </table>
</center>

<?php
    } else {
    ?>
<script>
alert('Sorry, No Reocrds Found!');
window.open('index.php', '_self');
</script>

<?php
    }
}
?>