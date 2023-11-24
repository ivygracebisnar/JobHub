<?php

session_start();

if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: signin.php");
    exit;
}
?>

<?php
require_once '../connection.php';

$eid = $_GET['profid'];
$sql = mysqli_query($conn, "SELECT * FROM jobseeker WHERE id='$eid'");
$result = mysqli_fetch_array($sql);
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8"/>
        <title>Job Seekers' Profile</title>
        <link rel="stylesheet" href="../css/admin.css"/>
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
                    <h2>Job Seekers</h2>
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
            </div>
            <div class="container" style="margin-top: 15px; margin-left: 9%; width: 78%;">
                <div class="left">
                    <img src="../uploaded_img/<?php echo $result['image'];?>" alt="user" width="100">
                    <h4><?php echo $result['name'];?></h4>
                    <h4>ID:  <?php echo $result['id'];?></h4>
                    <h4>Email:  <?php echo $result['email'];?></h4>

                </div>
                <div class="right">
                    <div class="info">
                        <h3>Information</h3>
                        <div class="info_data">
                            <div class="data">
                                <h4>Age</h4>
                                <p><?php echo $result['age'];?></p>
                            </div>
                            <div class="data">
                                <h4>Phone</h4>
                                <p><?php echo $result['phone'];?></p>
                            </div>
                        </div>
                    </div>
                    <div class="projects">
                        <h3>Location</h3>
                        <div class="info_data">
                            <div class="data">
                                <h4>Address</h4>
                                <p><?php echo $result['address'];?></p>
                            </div>
                        </div>
                    </div>
                    <div class="info">
                        <h3>Skills & Experience</h3>
                        <div class="info_data">
                            <div class="data">
                                <h4>Skills</h4>
                                <p><?php echo $result['skills'];?></p>
                            </div>
                            <div class="data">
                                <h4>Experience</h4>
                                <p><?php echo $result['experience'];?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer" style="position: fixed;left: 0;bottom: 0;width: 100%;background: rgb(229, 223, 223);color: gray;text-align: center;">
            <strong><img src="../img/slsu.png" style="width: 20px; height: 20%; margin-left: 11%; margin-bottom: -23px; margin-top: 3px;"/>Copyright &copy; 2023; Group 4 - Barangay JobHub Information Management System BSIT 301 S.Y 2023-2024</strong> All Rights Reserved.
        </div>
        <!---END OF MAIN--CONTENT--->
    </body>
</html>