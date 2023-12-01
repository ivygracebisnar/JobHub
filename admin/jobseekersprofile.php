<?php

include '../connection.php';
session_start();
$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:login.php');
};

$select = mysqli_query($conn, "SELECT * FROM `admin` WHERE id = '$user_id'") or die('query failed');
if(mysqli_num_rows($select) > 0){
    $fetch = mysqli_fetch_assoc($select);
}

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
            <?php include("sidebar.php") ?>
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
                            <p><b><?php echo $fetch['name']; ?></b></p>
                            <small class="text-muted">Admin</small>
                        </div>
                    </div>
                    <?php
                        if($fetch['image'] == ''){
                            echo '<img src="../images/default-avatar.png">';
                        }else{
                            echo '<img src="../uploaded_img/'.$fetch['image'].'">';
                        }
                    ?>
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
        <?php include("../footer/footer.php") ?>
        <!---END OF MAIN--CONTENT--->
    </body>
</html>