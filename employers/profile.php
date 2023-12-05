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
        <title>Personal Details</title>
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
                    <h2>Personal Details</h2>
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
            <div class="container" style="margin-top: 30px;">
                <div class="left">
                <?php
                    $select = mysqli_query($conn, "SELECT * FROM `employers` WHERE id = '$user_id'") or die('query failed');
                    if(mysqli_num_rows($select) > 0){
                        $fetch = mysqli_fetch_assoc($select);
                    }
                    if($fetch['image'] == ''){
                        echo '<img src="../images/default-avatar.png">';
                    }else{
                        echo '<img src="../uploaded_img/'.$fetch['image'].'">';
                    }
                ?>
                    <h4><?php echo $fetch['emp_name'];?></h4>
                    <h4>ID:  <?php echo $fetch['id'];?></h4>
                </div>
                <div class="right">
                    <div class="info">
                        <h3>Information</h3>
                        <div class="info_data">
                            <div class="data">
                                <h4>Company Name</h4>
                                <p><?php echo $fetch['comp_name'];?></p>
                            </div>
                            <div class="data">
                                <h4>Email</h4>
                                <p><?php echo $fetch['email'];?></p>
                            </div>
                            <div class="data">
                                <h4>Total Job Hiring</h4>
                                <?php
                                    $dash_jobseekers_query = "SELECT * FROM jobs WHERE employer_id = $user_id";
                                    $dash_jobseekers_query_run = mysqli_query($conn, $dash_jobseekers_query);
                                    if($jobseekers_total = mysqli_num_rows($dash_jobseekers_query_run)){
                                        echo '<p> '.$jobseekers_total.' <p>';
                                    }else{
                                        echo '<p class="text-muted">No Record!</p>';
                                    }
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="skills">
                    <h3>Contact Details</h3>
                        <div class="skills_data">
                            <div class="data">
                                <h4>Age</h4>
                                <p><?php echo $fetch['age'];?></p>
                            </div>
                            <div class="data">
                                <h4>Phone</h4>
                                <p><?php echo $fetch['phone'];?></p>
                            </div>
                        </div>
                    </div>
                    <div class="projects">
                        <h3>Location</h3>
                        <div class="info_data">
                            <div class="data">
                                <h4>Address</h4>
                                <p><?php echo $fetch['address'];?></p>
                            </div>
                        </div>
                    </div>
                        <a href="update.php"><button style="float: right;">Update</button></a>
                </div>
            </div>
        </div>
        <script src="../js/script.js"></script>
        <?php include("../footer/footer.php") ?>
        <!---END OF MAIN--CONTENT--->
    </body>
</html>