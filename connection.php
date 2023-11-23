<?php
$conn = new mysqli('localhost','root','','advancedb');

if($conn === false){
    die("Connection Failed!".mysqli_connect_error());
}
?>