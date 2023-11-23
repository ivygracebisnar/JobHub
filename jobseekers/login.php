<?php

include '../connection.php';
session_start();

if(isset($_POST['submit'])){

   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = mysqli_real_escape_string($conn, md5($_POST['password']));

   $select = mysqli_query($conn, "SELECT * FROM `jobseeker` WHERE email = '$email' AND password = '$pass'") or die('query failed');

   if(mysqli_num_rows($select) > 0){
      $row = mysqli_fetch_assoc($select);
      $_SESSION['user_id'] = $row['id'];
      header('location:jobseekers.php');
   }else{
      $message[] = 'incorrect email or password!';
   }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../img/slsu.png">
    <link rel="stylesheet" href="../css/jobseekerslogin.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <title>User Login or Signup</title>
</head>
<body>
    <div class="wrapper">
        <div class="container main">
            <div class="row">
                <div class="col-md-6 side-image">
                    <img src="images/white.png" alt="">
                </div>
                <div class="col-md-6 right">
                     <div class="input-box">
                        <h3><b>Barangay JobHub Information Management System</b></h3>
                        <br>
                        <?php
                            if(isset($message)){
                                foreach($message as $message){
                                    echo '<div class="message">'.$message.'</div>';
                                }
                            }
                        ?>
                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="input-field">
                                <input type="email" name="email" class="input" required autocomplete="off">
                                <label for="email">Email</label>
                            </div>
                            <div class="input-field">
                                <input type="password" name="password" class="input" required>
                                <label for="password">Password</label>
                            </div>
                            <div class="input-field">
                                <input type="submit" name="submit" class="submit" value="Sign In"><p></p>
                                <a href="register.php" style="text-align: center;">Sign Up</a>
                            </div>
                            <div class="signin">
                                <span><a href="forgot_password.php">Forgot Password?</a></span>
                            </div>
                        </form>
                     </div>
                </div>
            </div>
        </div>
    </div>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>