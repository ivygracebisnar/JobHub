<?php

include '../connection.php';
session_start();
$user_id = $_SESSION['user_id'];

if(isset($_POST['update'])){

   $update_emp_name = mysqli_real_escape_string($conn, $_POST['update_emp_name']);
   $update_comp_name = mysqli_real_escape_string($conn, $_POST['update_comp_name']);
   $update_age = mysqli_real_escape_string($conn, $_POST['update_age']);
   $update_address = mysqli_real_escape_string($conn, $_POST['update_address']);
   $update_phone = mysqli_real_escape_string($conn, $_POST['update_phone']);
   $update_email = mysqli_real_escape_string($conn, $_POST['update_email']);

   mysqli_query($conn, "UPDATE `employers` SET emp_name = '$update_emp_name', comp_name = '$update_comp_name', age = '$update_age', address = '$update_address', phone = '$update_phone',  email = '$update_email' WHERE id = '$user_id'") or die('query failed');


//    $update_image = $_FILES['update_image']['name'];
//    $update_image_size = $_FILES['update_image']['size'];
//    $update_image_tmp_name = $_FILES['update_image']['tmp_name'];
//    $update_image_folder = '../uploaded_img/'.$update_image;

//    if(!empty($update_image)){
//       if($update_image_size > 2000000){
//          $message[] = 'image is too large';
//       }else{
//          $image_update_query = mysqli_query($conn, "UPDATE `jobseeker` SET image = '$update_image' WHERE id = '$user_id'") or die('query failed');
//          if($image_update_query){
//             move_uploaded_file($update_image_tmp_name, $update_image_folder);
//          }
//          $message[] = 'image updated succssfully!';
//       }
//    }

}

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8"/>
        <title>Personal Details</title>
        <link rel="stylesheet" href="../css/style.css"/>
        <link rel="shortcut icon" href="../img/slsu.png">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>

        <style>
        .form-container {
            max-width: 1050px;
            margin: 0 auto;
            background-color: #fff;
            padding: 50px 70px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            border-radius: 10px;
            color: #333;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            font-weight: bold;
            display: block;
            margin-bottom: 5px;
        }

        .form-group input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }

        .form-group button {
            padding: 10px 20px;
            background-color: rgba(113, 99, 186, 1);
            color: #fff;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
        }

        .form-group button:hover {
            background-color: rgba(85, 73, 141, 1);
        }

    </style>
    </head>
    <body>
        <!--- START OF SIDEBAR--->
        <div class="sidebar">
            <?php include("sidebar.php") ?>
        </div>
        <!---END OF SIDEBAR--->

        <!---START OF MAIN--CONTENT--->
        <div class="main--content">
            <div class="header--wrapper">
                <div class="header--title">
                    <h2>Update Personal Details</h2>
                </div>
                <div class="user--info">
                    <img src="../img/slsu.png" alt=""/>
                </div>
            </div>
            <div class="form-container">
            <?php
                $select = mysqli_query($conn, "SELECT * FROM `employers` WHERE id = '$user_id'") or die('query failed');
                if(mysqli_num_rows($select) > 0){
                    $fetch = mysqli_fetch_assoc($select);
                }
            ?>
                    <div class="form-group">
                        <div class="col-md-6">
                            <label>Fullname</label>
                            <input type="text" name="update_emp_name" value="<?php echo $fetch['emp_name']; ?>" class="form-control" placeholder="Fullname" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-6">
                            <label>Company Name</label>
                            <input type="text" name="update_comp_name" value="<?php echo $fetch['comp_name']; ?>" class="form-control" placeholder="Company Name" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-6">
                            <label>Age</label>
                            <input type="text" name="update_age" value="<?php echo $fetch['age'];?>" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-6">
                            <label>Email</label>
                            <input type="email" name="update_email" value="<?php echo $fetch['email'];?>" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-3">
                            <label>Phone</label>
                            <input type="text" name="update_phone" value="<?php echo $fetch['phone'];?>" class="form-control" placeholder="Phone" required>
                        </div>
                        <div class="col-md-6">
                            <label>Address</label>
                            <input type="text" name="update_address" value="<?php echo $fetch['address'];?>" class="form-control" placeholder="Address" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-6">
                        <label>Profile Picture</label>
                            <input type="file" name="update_image" value="<?php echo $fetch['image'];?>" accept="image/jpg, image/jpeg, image/png" class="form-control" placeholder="Choose File">
                        </div>
                    </div>
                    <div class="form-group" style="margin-top:1%">
                        <div class="col-md-6">
                            <button type="update" name="update_profile" class="btn btn-warning">Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="footer" style="position: fixed;left: 0;bottom: 0;width: 100%;background: rgb(229, 223, 223);color: gray;text-align: center;">
            <strong><img src="../img/slsu.png" style="width: 20px; height: 20%; margin-left: 11%; margin-bottom: -23px; margin-top: 3px;"/>Copyright &copy; 2023; Group 4 - Barangay JobHub Information Management System BSIT 301 S.Y 2023-2024</strong> All Rights Reserved.
        </div>
        <!---END OF MAIN--CONTENT--->
        <script src="modal.js"></script>
    </body>
</html>