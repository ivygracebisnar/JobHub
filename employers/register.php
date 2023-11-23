<?php

include '../connection.php';

if(isset($_POST['submit'])){

   $emp_name = mysqli_real_escape_string($conn, $_POST['emp_name']);
   $comp_name = mysqli_real_escape_string($conn, $_POST['comp_name']);
   $age = mysqli_real_escape_string($conn, $_POST['age']);
   $address = mysqli_real_escape_string($conn, $_POST['address']);
   $phone = mysqli_real_escape_string($conn, $_POST['phone']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = mysqli_real_escape_string($conn, md5($_POST['password']));
   $cpass = mysqli_real_escape_string($conn, md5($_POST['cpassword']));
   $image = $_FILES['image']['name'];
   $image_size = $_FILES['image']['size'];
   $image_tmp_name = $_FILES['image']['tmp_name'];
   $image_folder = '../uploaded_img/'.$image;

   $select = mysqli_query($conn, "SELECT * FROM `employers` WHERE email = '$email' AND password = '$pass'") or die('query failed');

   if(mysqli_num_rows($select) > 0){
      $message[] = 'user already exist'; 
   }else{
      if($pass != $cpass){
         $message[] = 'confirm password not matched!';
      }elseif($image_size > 2000000){
         $message[] = 'image size is too large!';
      }else{
         $insert = mysqli_query($conn, "INSERT INTO `employers`(emp_name, comp_name, age, address, phone, email, password, image) VALUES('$emp_name', '$comp_name', '$age', '$address', '$phone', '$email', '$pass', '$image')") or die('query failed');

         if($insert){
            move_uploaded_file($image_tmp_name, $image_folder);
            $message[] = 'registered successfully!';
            header('location:login.php');
         }else{
            $message[] = 'Registration failed!';
         }
      }
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
    <link rel="stylesheet" href="../css/employerslogin.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <title>Employer - Sign up</title>
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
                        <h3><b>Employer Registration</b></h3>
                        <h6>Please fill this form to create an admin account.</h6><br>
                        <form action="" method="post">
                            <?php
                                if(isset($message)){
                                    foreach($message as $message){
                                        echo '<div class="message">'.$message.'</div>';
                                    }
                                }
                            ?>
                            
                            <div class="row1">
                                <div class="col-md-8">
                                    <label>Employer's Fullname</label>
                                    <input type="text" name="emp_name" placeholder="Fullname" class="form-control" required>
                                </div>
                                <div class="col-md-8">
                                    <label>Company Name</label>
                                    <input type="text" name="comp_name" placeholder="Company Name" class="form-control" required>
                                </div>
                                <div class="col-md-4">
                                    <label>Age</label>
                                    <input type="text" name="age" placeholder="Age" class="form-control" required>
                                </div>
                            </div>
                            <div class="row1">
                                <div class="col-md-6">
                                    <label>Address</label>
                                    <input type="text" name="address" placeholder="Address" class="form-control" required>
                                </div>
                                <div class="col-md-6">
                                    <label>Phone</label>
                                    <input type="text" name="phone" placeholder="Phone Number" class="form-control" required>
                                </div>
                            </div>
                            <br>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" name="email" placeholder="Email" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" name="password" placeholder="Password" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Confirm Password</label>
                                <input type="password" name="cpassword" style="font-size: 15px;" placeholder="Confirm Password" class="form-control" required>
                            </div>
                            <div class="col-md-12">
                                <label>Profile Picture</label>
                                <input type="file" name="image" class="box" accept="image/jpg, image/jpeg, image/png" placeholder="Choose File">
                            </div><br>
                            <div class="form-group">
                                <input type="submit" name="submit" class="btn btn-primary" style="font-size: 15px;" value="Submit">
                                <input type="reset" class="btn btn-secondary ml-2" style="font-size: 15px;" value="Reset">
                            </div><br>
                            <p style="font-size: 17px;margin-left: 0.1rem;">Already have an account? <a href="login.php">Sign In</a>.</p>
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