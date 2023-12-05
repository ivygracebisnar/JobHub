<?php

include '../connection.php';
session_start();
$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:login.php');
};

$select = mysqli_query($conn, "SELECT * FROM `employers` WHERE id = '$user_id'") or die('query failed');
if(mysqli_num_rows($select) > 0){
    $fetch = mysqli_fetch_assoc($select);
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8"/>
        <title>About</title>
        <link rel="stylesheet" href="../css/style.css"/>
        <link rel="shortcut icon" href="../img/slsu.png">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>
    </head>
    <body>
        <!--- START OF SIDEBAR--->
        <?php include("../employers/sidebar.php") ?>
        <!---END OF SIDEBAR--->

        <!---START OF MAIN--CONTENT--->
        <div class="main--content">
            <div class="header--wrapper">
                <div class="header--title">
                    <h2>About</h2>
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
                    <a href="profile.php"><?php
                        if($fetch['image'] == ''){
                            echo '<img src="../images/default-avatar.png">';
                        }else{
                            echo '<img src="../uploaded_img/'.$fetch['image'].'">';
                        }
                    ?></a>
                </div>
            </div>
            <div class="tabular--wrapper">
                <img src="../img/logosq.png" style="width: 50%; height: 50%; margin-left: 25%; border-radius: 25px;"><br><br>
                <h3 style="margin-left: 75px; margin-right: 75px; font-family: sans-serif;">The Barangay JobHub Information Management System is a digital platform designed to streamline and enhance the management of job-related information within a specific barangay (neighborhood or community) context. This system aims to facilitate the efficient matching of job seekers with available job opportunities, fostering local employment and economic growth.</h3><br>
                <h4 style="margin-left: 125px; margin-right: 75px;">•   To automate and digitize the job matching process, reducing manual efforts and saving time.
                <br>•   To expand the reach of job opportunities by utilizing digital platforms and reaching a wider audience.
                <br>•   To enhance the efficiency of job matching by accurately matching job seekers' skills and preferences with available job vacancies.
                <br>•   To establish seamless communication channels between job seekers and employers.
</h4>
            </div>
        </div>
        <script src="../js/script.js"></script>
        <?php include("../footer/footer.php") ?>
        <!---END OF MAIN--CONTENT--->
    </body>
</html>