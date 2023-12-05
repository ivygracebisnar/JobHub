<?php

include '../connection.php';
session_start();
$user_id = $_SESSION['user_id'];

$select = mysqli_query($conn, "SELECT * FROM `jobseeker` WHERE id = '$user_id'") or die('query failed');
if(mysqli_num_rows($select) > 0){
    $fetch = mysqli_fetch_assoc($select);
}

if(isset($_POST['reset_pass'])){

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
         mysqli_query($conn, "UPDATE `jobseeker` SET password = '$confirm_pass' WHERE id = '$user_id'") or die('query failed');
         $message[] = 'password updated successfully!';
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
                        <input type="text" id="myInput" placeholder="Search" class="form-control"/>
                    </div>
                    <div class="notification">
                        <div class="notif-icon" onclick="toggleNotifi()">
                            <i class="fas fa-bell"></i>
                        </div>
                        <div class="notif-box" id="box">
                            <h2>Notification</h2>
                            <div class="notif-item">
                                <div class="text">
                                    <h4>No New Notification!</h4>
                                    <p>Nothing to show here!</p>
                                </div>
                            </div>
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
            <div class="tabular--wrapper" style="width: 100%;">
                <h2>Reset Password</h2><br>
                <p>Please fill out this form to reset your password.</p>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post"> 
                <br>
                    <div class="col-md-6">
                        <input type="hidden" name="old_pass" value="<?php echo $fetch['password']; ?>">
                        <label style="font-size: 18px; font-family: sans-serif;">Old Password</label>
                        <input type="password" name="update_pass" placeholder="Previous Password" style="border: 2px solid gray; border-radius: 4px;  padding: 5px 30px;" required>
                    </div><br>
                    <div class="col-md-6">
                        <label style="font-size: 18px; font-family: sans-serif;">New Password</label>
                        <input type="password" name="new_pass" placeholder="New Password" style="border: 2px solid gray; border-radius: 4px;  padding: 5px 30px;" required>
                    </div><br>
                    <div class="col-md-6">
                        <label style="font-size: 18px; font-family: sans-serif;">Confirm Password</label>
                        <input type="password" name="confirm_pass" placeholder="Confirm New Password" class="form-control" style="border: 2px solid gray; border-radius: 4px; padding: 5px 30px;" required>
                    </div>
                    <br>
                    <div class="col-md-6">
                        <button type="submit" name="update_profile" style="background-color: rgb(86, 75, 133); border: none; color: white; padding: 10px 20px; text-decoration: none; margin: 4px 2px; border-radius: 5%; cursor: pointer;">Reset Password</button>
                    </div>
                </form>
            </div>
        </div>
        <script src="../js/script.js"></script>
        <?php include("../footer/footer.php") ?>
        <!---END OF MAIN--CONTENT--->
    </body>
</html>