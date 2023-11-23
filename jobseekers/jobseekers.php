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
        <title>Dashboard</title>
        <link rel="stylesheet" href="../css/jobseekers.css"/>
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
                    <h2>JOB Recommendations</h2>
                </div>
                <div class="user--info">
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
                    <img src="../img/slsu.png" alt=""/>
                </div>
            </div>
            <div class="card--container">
                <h1 class="main--title">For You</h1>
                <div class="card-wrapper">
                    <div class="payment--card">
                        <div class="card--header">
                            <div class="amount">
                            <?php
                                require_once "../connection.php";
                                $sql = mysqli_query($conn, "SELECT * FROM jobs WHERE jobid=1");
                                $count =1;
                                $row = mysqli_num_rows($sql);
                                if($row > 0) {
                                    while($row = mysqli_fetch_array($sql)) {
                            ?>
                            <span class="title"><?php echo $row['title'];?></span>
                                <span class="amount-value"><?php echo $row['salary'];?></span>
                            <?php
                                $count = $count+1;
                                }}
                            ?>
                                
                            </div>
                        </div>
                        <a href="viewjobs.php?profid=1"><button style="width: 100%;">Get Started</button></a>
                    </div>
                    <div class="payment--card">
                        <div class="card--header">
                            <div class="amount">
                            <?php
                                require_once "../connection.php";
                                $sql = mysqli_query($conn, "SELECT * FROM jobs WHERE jobid=2");
                                $count =1;
                                $row = mysqli_num_rows($sql);
                                if($row > 0) {
                                    while($row = mysqli_fetch_array($sql)) {
                            ?>
                            <span class="title"><?php echo $row['title'];?></span>
                                <span class="amount-value"><?php echo $row['salary'];?></span>
                            <?php
                                $count = $count+1;
                                }}
                            ?>
                            </div>
                        </div>
                        <a href="viewjobs.php?profid=2"><button style="width: 100%;">Get Started</button></a>
                    </div>
                    <div class="payment--card">
                        <div class="card--header">
                            <div class="amount">
                            <?php
                                require_once "../connection.php";
                                $sql = mysqli_query($conn, "SELECT * FROM jobs WHERE jobid=3");
                                $count =1;
                                $row = mysqli_num_rows($sql);
                                if($row > 0) {
                                    while($row = mysqli_fetch_array($sql)) {
                            ?>
                            <span class="title"><?php echo $row['title'];?></span>
                                <span class="amount-value"><?php echo $row['salary'];?></span>
                            <?php
                                $count = $count+1;
                                }}
                            ?>
                            </div>
                        </div>
                        <a href="viewjobs.php?profid=3"><button style="width: 100%;">Get Started</button></a>
                    </div>
                </div>
            </div>
            <div class="tabular--wrapper">
                <h3 class="main--title">There are <?php
                                    $dash_jobs_query = "SELECT * FROM jobs";
                                    $dash_jobs_query_run = mysqli_query($conn, $dash_jobs_query);
                                    if($jobs_total = mysqli_num_rows($dash_jobs_query_run)){
                                        echo ''.$jobs_total.'';
                                    }else{
                                        echo 'No Record!';
                                    }
                                ?> Jobs available.<a href="jobs.php" style="margin-left: 5px; color: rgb(45, 39, 73);">See all</a></h3>
                <div class="table-container">
                    <table>
                        <thead>
                            <th>Job Title</th>
                            <th>Description</th>
                            <th>Location</th>
                            <th>Salary</th>
                            <th>Action</th>
                        </thead>
                        <tbody id="Table">
                            <?php
                                require_once "../connection.php";
                                $sql = mysqli_query($conn, "SELECT * FROM jobs ORDER BY jobid");
                                $count =1;
                                $row = mysqli_num_rows($sql);
                                if($row > 0) {
                                    while($row = mysqli_fetch_array($sql)) {
                            ?>
                            <tr>
                                <td><?php echo $row['title'];?></td>
                                <td><?php echo $row['description'];?></td>
                                <td><?php echo $row['location'];?></td>
                                <td><?php echo $row['salary'];?></td>
                                <td><a href="viewjobs.php?profid=<?php echo htmlentities($row['jobid']);?>" style="font-size: 15px;"><button style="background: rgb(86, 75, 133);
    color: #fff;
    padding: 7px 15px;
    border-radius: 10px;
    cursor: pointer;">Show</button></a></td>
                            </tr>
                            <?php
                                $count = $count+1;
                                }}
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <script src="../js/script.js"></script>
        <div class="footer" style="position: fixed;left: 0;bottom: 0;width: 100%;background: rgb(229, 223, 223);color: gray;text-align: center;">
            <strong><img src="../img/slsu.png" style="width: 20px; height: 20%; margin-left: 11%; margin-bottom: -23px; margin-top: 3px;"/>Copyright &copy; 2023; Group 4 - Barangay JobHub Information Management System BSIT 301 S.Y 2023-2024</strong> All Rights Reserved.
        </div>
        <!---END OF MAIN--CONTENT--->
    </body>
</html>