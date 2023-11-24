<?php

session_start();

if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: signin.php");
    exit;
}
?>

<?php
require_once '../connection.php';
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8"/>
        <title>Admin Dashboard</title>
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
            <div class="tabular--wrapper">
                <h3 class="main--title">Job Seekers List</h3>
                <div class="table-container">
                    <table>
                        <thead>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Address</th>
                            <th>Action</th>
                        </thead>
                        <tbody id="Table">
                            <?php
                                require_once "../connection.php";
                                $sql = mysqli_query($conn, "SELECT * FROM jobseeker ORDER BY id");
                                $count =1;
                                $row = mysqli_num_rows($sql);
                                if($row > 0) {
                                    while($row = mysqli_fetch_array($sql)) {
                            ?>
                            <tr>
                                <td><?php echo $row['id'];?></td>
                                <td><?php echo $row['name'];?></td>
                                <td><?php echo $row['email'];?></td>
                                <td><?php echo $row['phone'];?></td>
                                <td><?php echo $row['address'];?></td>
                                <td><a href="jobseekersprofile.php?profid=<?php echo htmlentities($row['id']);?>" style="font-size: 15px;"><button><i class="fa-solid fa-user"></i> View</button></a></td>
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
        <script src="js/script.js"></script>
        <div class="footer" style="position: fixed;left: 0;bottom: 0;width: 100%;background: rgb(229, 223, 223);color: gray;text-align: center;">
            <strong><img src="../img/slsu.png" style="width: 20px; height: 20%; margin-left: 11%; margin-bottom: -23px; margin-top: 3px;"/>Copyright &copy; 2023; Group 4 - Barangay JobHub Information Management System BSIT 301 S.Y 2023-2024</strong> All Rights Reserved.
        </div>
        <!---END OF MAIN--CONTENT--->
    </body>
</html>