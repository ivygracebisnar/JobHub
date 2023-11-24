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
$sql = mysqli_query($conn, "SELECT * FROM jobs WHERE jobid='$eid'");
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
                    <h2>Job Opportunities</h2>
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
            <div class="container">
                <div class="right" style="margin-top: 330px; margin-left: 240px;">
                    <div class="info">
                        <h3>Job Information</h3>
                        <div class="info_data">
                            <div class="data">
                                <h4>Employer ID</h4>
                                <p><?php echo $result['employer_id'];?></p>
                            </div>
                            <div class="data">
                                <h4>Job Name</h4>
                                <p><?php echo $result['title'];?></p>
                            </div>
                            <div class="data">
                                <h4>Address</h4>
                                <p><?php echo $result['location'];?></p>
                            </div>
                        </div>
                    </div>
                    <div class="projects">
                        <h3>Description</h3>
                        <div class="info_data">
                            <div class="data">
                                <h4>Description</h4>
                                <p><?php echo $result['description'];?></p>
                            </div>
                            <div class="data">
                                <h4>Requirements</h4>
                                <p><?php echo $result['requirements'];?></p>
                            </div>
                        </div>
                    </div>
                    <div class="skills">
                        <h3>Others</h3>
                        <div class="skills_data">
                            <div class="data">
                                <h4>Salary</h4>
                                <p><?php echo $result['salary'];?></p>
                            </div>
                            <div class="data">
                                <h4>Date Posted</h4>
                                <p><?php echo $result['posteddate'];?></p>
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