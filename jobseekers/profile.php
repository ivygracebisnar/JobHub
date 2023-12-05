<?php

include '../connection.php';
session_start();
$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:login.php');
};

$select = mysqli_query($conn, "SELECT * FROM `jobseeker` WHERE id = '$user_id'") or die('query failed');
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


        <style>
                .user-pic{
                    width: 40px;
                    border-radius: 50%;
                    cursor: pointer;
                    margin-left: 30px;
                }
                .sub-menu-wrap{
                    position: absolute;
                    top: 100%;
                    right: 10%;
                    width: 320px;
                    max-height: 0px;
                    overflow: hidden;
                    transition: max-height 0.5s;
                }
                .sub-menu-wrap.open-menu{
                    max-height: 400px;
                }
                .sub-menu{
                    background: #fff;
                    padding: 20px;
                    margin: 10px;
                }
                .user-info{
                    display: flex;
                    align-items: center;
                }
                .user-info h3{
                    font-weight: 500;
                }
                .user-info img{
                    width: 50px;
                    border-radius: 50%;
                    margin-right: 15px;
                }
                .sub-menu hr{
                    border: 0;
                    height: 1px;
                    width: 100%;
                    background: #ccc;
                    margin: 15px 0 10px;
                }
                .sub-menu-link{
                    display: flex;
                    align-items: center;
                    text-decoration: none;
                    color: #525252;
                    margin: 12px 0;
                }
                .sub-menu-link p{
                    width: 100%;
                }
                .sub-menu-link i{
                    width: 40px;
                    background: #e5e5e5;
                    border-radius: 50%;
                    padding: 8px;
                    margin-right: 15px;
                }
                .sub-menu-link span{
                    font-size: 22px;
                    transition: transform 0.5s;
                }
                .sub-menu-link:hover span{
                    transform: translateX(5px);
                }
                .sub-menu-link:hover p{
                    font-weight: 600;
                }
            </style>
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
                    <?php
                        if($fetch['image'] == ''){
                            echo '<img src="../images/default-avatar.png">';
                        }else{
                            echo '<img src="../uploaded_img/'.$fetch['image'].'">';
                        }
                    ?>
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
        <script src="../js/script.js"></script>
        <?php include("../footer/footer.php") ?>
        <!---END OF MAIN--CONTENT--->
    </body>
</html>