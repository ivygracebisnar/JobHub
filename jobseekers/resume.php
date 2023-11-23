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

        <style>
            .resume {
            max-width: 800px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            color: #333;
            }

            .resume h1, .resume h2, .resume h3 {
                color: rgba(113, 99, 186, 1);
            }

            .resume h1 {
                font-size: 36px;
                margin-bottom: 10px;
                text-align: center;
            }

            .resume h2 {
                font-size: 24px;
                margin-bottom: 10px;
                border-bottom: 1px solid #e0e0e0;
            }

            .resume h3 {
                font-size: 18px;
                margin-bottom: 10px;
            }

            .resume p {
                font-size: 16px;
                line-height: 1.6;
                margin-bottom: 10px;
            }

            .resume img {
                border-radius: 50%;
                max-width: 150px;
                height: auto;
                margin: 0 auto 20px;
                display: block;
            }

            .resume .section {
                margin-bottom: 40px;
            }

            .resume .section:last-child {
                margin-bottom: 0;
            }

            .resume .section-title {
                font-weight: bold;
                font-size: 20px;
                margin-bottom: 10px;
                color: rgba(113, 99, 186, 1);
            }

            .resume .section-content {
                margin-left: 20px;
            }
        </style>
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
                    <h2>Resume</h2>
                </div>
                <div class="user--info">
                    <img src="../img/slsu.png" alt=""/>
                </div>
            </div>
            <div class="tabular--wrapper">
                <div class="resume">
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
                    <h1><?php echo $fetch['name'];?></h1><br>
                    <p><?php echo $fetch['address'];?>  <b>|</b>  <?php echo $fetch['phone'];?>  <b>|</b>  <?php echo $fetch['email'];?></p>

                    <div class="section">
                        <h2>Summary</h2>
                        <!-- This summary is sample only as it is not added in the database yet -->
                        <p>I am a highly motivated and detail-oriented individual with a passion for web development and design. I have experience in front-end technologies such as HTML, CSS, and JavaScript, and I am eager to learn new technologies and frameworks.</p>
                    </div>

                    <div class="section">
                        <h2>Age</h2>
                        <div class="section-content">
                            <p><?php echo $fetch['age'];?></p>
                        </div>
                    </div>

                    <div class="section">
                        <h2>Experience</h2>
                        <div class="section-content">
                            <p><?php echo $fetch['experience'];?></p>
                        </div>
                    </div>

                    <div class="section">
                        <h2>Skills</h2>
                        <div class="section-content">
                            <p><?php echo $fetch['skills'];?></p>
                        </div>
                    </div>
                    <button style="background: rgb(86, 75, 133);
    color: #fff;
    padding: 7px 15px;
    border-radius: 10px;
    cursor: pointer;
    margin-left: 750px;"><a href="generate_pdf.php?pdfid=<?php echo htmlentities($row['id']);?>">PDF</a></button>
                </div>
            </div>
        </div>
        <div class="footer" style="position: fixed;left: 0;bottom: 0;width: 100%;background: rgb(229, 223, 223);color: gray;text-align: center;">
            <strong><img src="../img/slsu.png" style="width: 20px; height: 20%; margin-left: 11%; margin-bottom: -23px; margin-top: 3px;"/>Copyright &copy; 2023; Group 4 - Barangay JobHub Information Management System BSIT 301 S.Y 2023-2024</strong> All Rights Reserved.
        </div>
        <!---END OF MAIN--CONTENT--->
    </body>
</html>