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

$eid = $_GET['profid'];
$sql = mysqli_query($conn, "SELECT * FROM jobs WHERE jobid='$eid'");
$result = mysqli_fetch_array($sql);

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8"/>
        <title>Job Details</title>
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
                    <h2>Job Details</h2>
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
            <div class="container" style="margin-top: 20px;">
                <div class="right" style="width: 100%;">
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
        <script src="../js/script.js"></script>
        <?php include("../footer/footer.php") ?>
        <!---END OF MAIN--CONTENT--->
    </body>
</html>