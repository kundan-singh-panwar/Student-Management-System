<?php
$server = 'localhost';
$user = 'root';
$password = '';
$dbname = 'sms';

$link = mysqli_connect($server, $user, $password, $dbname);
if ($link) {
    echo "";
} else {
    die("connection failed" . mysqli_connect_error());
}