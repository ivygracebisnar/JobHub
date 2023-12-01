<?php

include '../connection.php';
session_start();
$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
    header('location:login.php');
 };
 
 $select = mysqli_query($conn, "SELECT * FROM `admin` WHERE id = '$user_id'") or die('query failed');
 if(mysqli_num_rows($select) > 0){
     $fetch = mysqli_fetch_assoc($select);
 }

if(isset($_POST['update_profile'])){

   $update_name = mysqli_real_escape_string($conn, $_POST['update_name']);
   $update_email = mysqli_real_escape_string($conn, $_POST['update_email']);

   mysqli_query($conn, "UPDATE `admin` SET name = '$update_name', email = '$update_email' WHERE id = '$user_id'") or die('query failed');

   $old_pass = $_POST['old_pass'];
   $update_pass = mysqli_real_escape_string($conn, md5($_POST['update_pass']));
   $new_pass = mysqli_real_escape_string($conn, md5($_POST['new_pass']));
   $confirm_pass = mysqli_real_escape_string($conn, md5($_POST['confirm_pass']));

   if(!empty($update_pass) || !empty($new_pass) || !empty($confirm_pass)){
      if($update_pass != $old_pass){
         $message[] = 'old password not matched!';
      }elseif($new_pass != $confirm_pass){
         $message[] = 'confirm password not matched!';
      }else{
         mysqli_query($conn, "UPDATE `admin` SET password = '$confirm_pass' WHERE id = '$user_id'") or die('query failed');
         $message[] = 'password updated successfully!';
      }
   }

   $update_image = $_FILES['update_image']['name'];
   $update_image_size = $_FILES['update_image']['size'];
   $update_image_tmp_name = $_FILES['update_image']['tmp_name'];
   $update_image_folder = 'uploaded_img/'.$update_image;

   if(!empty($update_image)){
      if($update_image_size > 2000000){
         $message[] = 'image is too large';
      }else{
         $image_update_query = mysqli_query($conn, "UPDATE `user_form` SET image = '$update_image' WHERE id = '$user_id'") or die('query failed');
         if($image_update_query){
            move_uploaded_file($update_image_tmp_name, $update_image_folder);
         }
         $message[] = 'image updated succssfully!';
      }
   }

}

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8"/>
        <title>Settings</title>
        <link rel="stylesheet" href="../css/style.css"/>
        <link rel="shortcut icon" href="../img/slsu.png">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>

        <style>
            .message{
                margin:10px 0;
                width: 100%;
                border-radius: 5px;
                padding:10px;
                text-align: center;
                background-color: #e74c3c;
                color: #fff;
                font-size: 20px;
                }

            .update-profile{
                min-height: 100vh;
                display: flex;
                align-items: center;
                justify-content: center;
                padding:20px;
            }
            
            .update-profile form{
                padding:20px;
                text-align: center;
                width: 700px;
                text-align: center;
                border-radius: 5px;
            }
            
            .update-profile form img{
                margin-left: 200px;
                height: 200px;
                width: 200px;
                border-radius: 50%;
                margin-bottom: 5px;
            }
            
            .update-profile form .flex{
                display: flex;
                justify-content: space-between;
                margin-bottom: 20px;
                gap:15px;
            }
            
            .update-profile form .flex .inputBox{
                width: 49%;
            }
            
            .update-profile form .flex .inputBox span{
                text-align: left;
                display: block;
                margin-top: 15px;
                font-size: 17px;
                color: #333;
            }
            
            .update-profile form .flex .inputBox .box{
                width: 100%;
                border-radius: 5px;
                padding:12px 14px;
                font-size: 17px;
                margin-top: 10px;
                border: 1px solid rgba(0,0,0,0.2);
            }
            .btn{
                background: rgb(86, 75, 133);
                color: #fff;
                padding: 7px 15px;
                border-radius: 10px;
                cursor: pointer;
                width: 20%;
            }
        </style>
    </head>
    <body>
        <!--- START OF SIDEBAR--->
            <?php include("sidebar.php") ?>
        <!---END OF SIDEBAR--->

        <!---START OF MAIN--CONTENT--->
        <div class="main--content">
            <div class="header--wrapper">
                <div class="header--title">
                    <h2>Account Settings</h2>
                </div>
                <div class="user--info">
                    <div class="search--box">
                        <i class="fas fasolid fa-search"></i>
                        <input type="text" id="Input" placeholder="Search"/>
                    </div>
                    <div class="notification">
                        <div class="notif-icon" onclick="toggleNotifi()">
                            <i class="fa-solid fa-bell"></i>
                            <!-- <i class="fas fa-bell"><span>4</span></i> -->
                        </div>
                        <div class="notif-box" id="box">
                            <h2>Notification</h2>
                            <div class="notif-item">
                                <div class="text">
                                    <h4>No New Notification.</h4>
                                    <p>Nothing to show here!</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="profile">
                        <div class="info">
                            <p><b><?php echo $fetch['name']; ?></b></p>
                            <small class="text-muted">Admin</small>
                        </div>
                    </div>
                    <?php
                        if($fetch['image'] == ''){
                            echo '<img src="../images/default-avatar.png">';
                        }else{
                            echo '<img src="../uploaded_img/'.$fetch['image'].'">';
                        }
                    ?>
                </div>
            </div>
            <div class="tabular--wrapper">
                <div class="update-profile">
                    <?php
                        $select = mysqli_query($conn, "SELECT * FROM `admin` WHERE id = '$user_id'") or die('query failed');
                        if(mysqli_num_rows($select) > 0){
                            $fetch = mysqli_fetch_assoc($select);
                        }
                    ?>
                    <form action="" method="post" enctype="multipart/form-data">
                        <?php
                            if($fetch['image'] == ''){
                                echo '<img src="../images/default-avatar.png">';
                            }else{
                                echo '<img src="../uploaded_img/'.$fetch['image'].'">';
                            }
                            if(isset($message)){
                                foreach($message as $message){
                                echo '<div class="message">'.$message.'</div>';
                                }
                            }
                        ?>
                        <div class="flex">
                            <div class="inputBox">
                                <span>Fullname :</span>
                                <input type="text" name="update_name" value="<?php echo $fetch['name']; ?>" class="box">
                                <span>Email :</span>
                                <input type="email" name="update_email" value="<?php echo $fetch['email']; ?>" class="box">
                                <span>Profile Picture :</span>
                                <input type="file" name="update_image" accept="image/jpg, image/jpeg, image/png" class="box">
                            </div>
                            <div class="inputBox">
                                <input type="hidden" name="old_pass" value="<?php echo $fetch['password']; ?>">
                                <span>Old Password :</span>
                                <input type="password" name="update_pass" placeholder="Enter Previous Password" class="box">
                                <span>New Password :</span>
                                <input type="password" name="new_pass" placeholder="Enter New Password" class="box">
                                <span>Confirm Password :</span>
                                <input type="password" name="confirm_pass" placeholder="Confirm New Password" class="box">
                            </div>
                        </div>
                        <input type="submit" value="Update Profile" name="update_profile" class="btn">
                    </form>
                </div>
            </div>
        </div>
        <script src="js/script.js"></script>
        <?php include("../footer/footer.php") ?>
        <!---END OF MAIN--CONTENT--->
    </body>
</html>