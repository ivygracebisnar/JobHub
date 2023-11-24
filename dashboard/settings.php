<?php

session_start();

if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: signin.php");
    exit;
}
?>

<?php
require_once '../connection.php';

// Define variables and initialize with empty values
$new_password = $confirm_password = "";
$new_password_err = $confirm_password_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Validate new password
    if(empty(trim($_POST["new_password"]))){
        $new_password_err = "Please enter the new password.";     
    } elseif(strlen(trim($_POST["new_password"])) < 6){
        $new_password_err = "Password must have atleast 6 characters.";
    } else{
        $new_password = trim($_POST["new_password"]);
    }
    
    // Validate confirm password
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Please confirm the password.";
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($new_password_err) && ($new_password != $confirm_password)){
            $confirm_password_err = "Password did not match.";
        }
    }
        
    // Check input errors before updating the database
    if(empty($new_password_err) && empty($confirm_password_err)){
        // Prepare an update statement
        $sql = "UPDATE admin_acc SET pword = ? WHERE id = ?";
        
        if($stmt = mysqli_prepare($conn, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "si", $param_password, $param_id);
            
            // Set parameters
            $param_password = password_hash($new_password, PASSWORD_DEFAULT);
            $param_id = $_SESSION["id"];
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Password updated successfully. Destroy the session, and redirect to login page
                session_destroy();
                header("location: settings.php");
                exit();
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    
    // Close connection
    mysqli_close($conn);
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
        <div class="sidebar">
            <?php include("../admin/sidebar.php") ?>
        </div>
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
                            <p><b><?php echo htmlspecialchars($_SESSION["username"]); ?></b></p>
                            <small class="text-muted">Admin</small>
                        </div>
                    </div>
                    <img src="../img/slsu.png" alt=""/>
                </div>
            </div>
            <div class="tabular--wrapper" style="width: 50%;">
                <h2>Reset Password</h2><br>
                <p>Please fill out this form to reset your password.</p>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post"> 
                <br>
                    <div class="col-md-6">
                        <label style="font-size: 18px; font-family: sans-serif;">New Password</label>
                        <input type="text" name="new_password" placeholder="New Password" class="form-control <?php echo (!empty($new_password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $new_password; ?>" style="border: 2px solid gray; border-radius: 4px;  padding: 5px 30px;" required>
                        <span class="invalid-feedback"><?php echo $new_password_err; ?></span>
                    </div><br>
                    <div class="col-md-6">
                        <label style="font-size: 18px; font-family: sans-serif;">Confirm Password</label>
                        <input type="text" name="confirm_password" placeholder="Confirm Password" class="form-control <?php echo (!empty($confirm_password_err)) ? 'is-invalid' : ''; ?>" style="border: 2px solid gray; border-radius: 4px; padding: 5px 30px;" required>
                        <span class="invalid-feedback"><?php echo $confirm_password_err; ?></span>
                    </div>
                    <br>
                    <div class="col-md-6">
                        <button type="submit" style="background-color: rgb(86, 75, 133); border: none; color: white; padding: 10px 20px; text-decoration: none; margin: 4px 2px; border-radius: 5%; cursor: pointer;">Reset Password</button>
                    </div>
                </form>
            </div>
        </div>
        <script src="js/script.js"></script>
        <div class="footer" style="position: fixed;left: 0;bottom: 0;width: 100%;background: rgb(229, 223, 223);color: gray;text-align: center;">
            <strong><img src="../img/slsu.png" style="width: 20px; height: 20%; margin-left: 11%; margin-bottom: -23px; margin-top: 3px;"/>Copyright &copy; 2023; Group 4 - Barangay JobHub Information Management System BSIT 301 S.Y 2023-2024</strong> All Rights Reserved.
        </div>
        <!---END OF MAIN--CONTENT--->
    </body>
</html>