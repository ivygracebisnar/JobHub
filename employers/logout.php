<?php

include '../connection.php';
session_start();
$user_id = $_SESSION['user_id'];

if(isset($_GET['logout'])){
   unset($user_id);
   session_destroy();

   // // Log login activity
   // $user_id = $row['id'];
   // $activity_type = "Logout";
   // $log_query = "INSERT INTO employers_activity_log (user_id, activity_type) VALUES ('$user_id', '$activity_type')";
   // mysqli_query($conn, $log_query);

   header('location:login.php');
}


?>