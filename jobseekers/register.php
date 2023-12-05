<?php

include '../connection.php';

if(isset($_POST['submit'])){

   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $age = mysqli_real_escape_string($conn, $_POST['age']);
   $address = mysqli_real_escape_string($conn, $_POST['address']);
   $phone = mysqli_real_escape_string($conn, $_POST['phone']);
   $skills = mysqli_real_escape_string($conn, $_POST['skills']);
   $experience = mysqli_real_escape_string($conn, $_POST['experience']);
   $summary = mysqli_real_escape_string($conn, $_POST['summary']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = mysqli_real_escape_string($conn, md5($_POST['password']));
   $cpass = mysqli_real_escape_string($conn, md5($_POST['cpassword']));
   $image = $_FILES['image']['name'];
   $image_size = $_FILES['image']['size'];
   $image_tmp_name = $_FILES['image']['tmp_name'];
   $image_folder = '../uploaded_img/'.$image;

   $select = mysqli_query($conn, "SELECT * FROM `jobseeker` WHERE email = '$email' AND password = '$pass'") or die('query failed');

   if(mysqli_num_rows($select) > 0){
      $message[] = 'user already exist'; 
   }else{
      if($pass != $cpass){
         $message[] = 'confirm password not matched!';
      }elseif($image_size > 2000000){
         $message[] = 'image size is too large!';
      }else{
         $insert = mysqli_query($conn, "INSERT INTO `jobseeker`(name, age, address, phone, skills, experience, email, password, image, summary) VALUES('$name', '$age', '$address', '$phone', '$skills', '$experience', '$email', '$pass', '$image', '$summary')") or die('query failed');

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
    <link rel="stylesheet" href="../css/session.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>
    <title>Jobseeker - Sign up</title>

    <style>
        .flex{
            display: flex;
            justify-content: space-between;
            margin-bottom: 1px;
            gap:5px;
        }

        form .flex .inputBox{
            width: 100%;
        }

        form .flex .inputBox span{
            text-align: left;
            display: block;
            margin-top: 1px;
            font-size: 17px;
            color: #333;
        }

        form .flex .inputBox .box{
            width: 100%;
            border-radius: 5px;
            padding:5px 14px;
            font-size: 17px;
            margin-top: 2px;
            border: 1px solid rgba(0,0,0,0.2);
        }
    </style>
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
                        <h3><b>Job Seeker Registration</b></h3><br>
                        <form action="" method="post">
                            <?php
                                if(isset($message)){
                                    foreach($message as $message){
                                        echo '<div class="message">'.$message.'</div>';
                                    }
                                }
                            ?>
                            <div class="flex">
                                <div class="inputBox">
                                    <input type="text" name="name" placeholder="Fullname" class="box" required>
                                    <input type="text" name="age" placeholder="Age" class="box" required>
                                    <input type="text" name="address" placeholder="Address" class="box" required>
                                    <input type="text" name="phone" placeholder="Phone" class="box" required>
                                    <input type="text" name="skills" placeholder="Skills" class="box" required>
                                    <input type="text" name="experience" placeholder="Experience" class="box" required>
                                    <input type="text" name="summary" placeholder="Summary" class="box" required>
                                    <input type="email" name="email" placeholder="Email" class="box" required>
                                    <input type="password" name="password" placeholder="Password" class="box" required>
                                    <input type="password" name="cpassword" placeholder="Confirm Password" class="box" required>
                                    <input type="file" name="image" class="box" accept="image/jpg, image/jpeg, image/png" placeholder="Choose File">
                                </div>
                            </div><br>
                            <div class="form-group">
                                <input type="submit" name="submit" class="btn btn-primary" style="font-size: 15px;" value="Submit">
                                <input type="reset" class="btn btn-secondary ml-2" style="font-size: 15px;" value="Reset">
                            </div>
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