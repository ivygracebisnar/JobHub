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
        <title>About</title>
        <link rel="stylesheet" href="../css/style.css"/>
        <link rel="shortcut icon" href="../img/slsu.png">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>
    </head>
    <body>
        <!--- START OF SIDEBAR--->
        <div class="sidebar">
            <?php include("../jobseekers/sidebar.php") ?>
        </div>
        <!---END OF SIDEBAR--->

        <!---START OF MAIN--CONTENT--->
        <div class="main--content">
            <div class="header--wrapper">
                <div class="header--title">
                    <h2>About</h2>
                </div>
                <div class="user--info">
                    <div class="profile">
                        <div class="info">
                        </div>
                    </div>
                    <img src="../img/slsu.png" alt=""/>
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
        <script src="js/script.js"></script>
        <div class="footer" style="position: fixed;left: 0;bottom: 0;width: 100%;background: rgb(229, 223, 223);color: gray;text-align: center;">
            <strong><img src="../img/slsu.png" style="width: 20px; height: 20%; margin-left: 11%; margin-bottom: -23px; margin-top: 3px;"/>Copyright &copy; 2023; Group 4 - Barangay JobHub Information Management System BSIT 301 S.Y 2023-2024</strong> All Rights Reserved.
        </div>
        <!---END OF MAIN--CONTENT--->
    </body>
</html>