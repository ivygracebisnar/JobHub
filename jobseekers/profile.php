<?php

include '../connection.php';
session_start();
$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:login.php');
};
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8"/>
        <title>Personal Details</title>
        <link rel="stylesheet" href="../css/style.css"/>
        <link rel="shortcut icon" href="../img/slsu.png">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>
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
                    <h2>Personal Details</h2>
                </div>
                <div class="user--info">
                    <img src="../img/slsu.png" alt=""/>
                </div>
            </div>
            <div class="container" style="margin-top: 20px;">
                <div class="left">
                <?php
                    $select = mysqli_query($conn, "SELECT * FROM `jobseeker` WHERE id = '$user_id'") or die('query failed');
                    if(mysqli_num_rows($select) > 0){
                        $fetch = mysqli_fetch_assoc($select);
                    }
                    if($fetch['image'] == ''){
                        echo '<img src="../images/default-avatar.png">';
                    }else{
                        echo '<img src="../uploaded_img/'.$fetch['image'].'">';
                    }
                ?>
                    <h4><?php echo $fetch['name'];?></h4>
                    <h4>ID:  <?php echo $fetch['id'];?></h4>
                    <h4>Email:  <?php echo $fetch['email'];?></h4>
                </div>
                <div class="right">
                    <div class="info">
                        <h3>Information</h3>
                        <div class="info_data">
                            <div class="data">
                                <h4>Age</h4>
                                <p><?php echo $fetch['age'];?></p>
                            </div>
                            <div class="data">
                                <h4>Phone</h4>
                                <p><?php echo $fetch['phone'];?></p>
                            </div>
                            <div class="data">
                                <h4>Address</h4>
                                <p><?php echo $fetch['address'];?></p>
                            </div>
                        </div>
                    </div>
                    <div class="skills">
                        <h3>Skills</h3>
                        <div class="skills_data">
                            <div class="data">
                                <p><?php echo $fetch['skills'];?></p>
                            </div>
                        </div>
                    </div>
                    <div class="projects">
                        <h3>Experience</h3>
                        <div class="info_data">
                            <div class="data">
                                <p><?php echo $fetch['experience'];?></p>
                            </div>
                        </div>
                    </div>
                        <a href="resume.php"><button>Resume</button></a>
                        <a href="update.php"><button style="float: right;">Update</button></a>
                </div>
            </div>
        </div>
        <div class="footer" style="position: fixed;left: 0;bottom: 0;width: 100%;background: rgb(229, 223, 223);color: gray;text-align: center;">
            <strong><img src="../img/slsu.png" style="width: 20px; height: 20%; margin-left: 11%; margin-bottom: -23px; margin-top: 3px;"/>Copyright &copy; 2023; Group 4 - Barangay JobHub Information Management System BSIT 301 S.Y 2023-2024</strong> All Rights Reserved.
        </div>
        <!---END OF MAIN--CONTENT--->
    </body>
</html>