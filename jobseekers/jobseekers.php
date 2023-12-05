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
        <title>Dashboard</title>
        <link rel="stylesheet" href="../css/style.css"/>
        <link rel="shortcut icon" href="../img/slsu.png">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>

        <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
        <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script> -->
        <link href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap.min.css" rel="stylesheet"/>
            <script>
                $(document).ready(function(){
                    $("#myInput").on("keyup",function(){
                        var value=$(this).val().toLowerCase();
                        $("#myTable tr").filter(function(){
                            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                        });
                    });
                });

                let subMenu = document.getElementById('subMenu');

                function toggleMenu(){
                    subMenu.classList.toggle('open-menu');
                }
            </script>
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
                    <h2>JOB Recommendations</h2>
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
                        <tbody id="myTable">
                            <?php
                                require_once "../connection.php";
                                $sql = mysqli_query($conn, "SELECT * FROM jobs ORDER BY jobid DESC");
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
                                <td><a href="viewjobs.php?profid=<?php echo htmlentities($row['jobid']);?>" style="font-size: 15px;"><button style="background: rgb(86, 75, 133);color: #fff;padding: 7px 15px;border-radius: 10px;cursor: pointer;">Show</button></a></td>
                            </tr>
                            <?php
                                $count = $count+1;
                                }}
                            ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="7"></td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
        <script src="../js/script.js"></script>
        <?php include("../footer/footer.php") ?>
        <!---END OF MAIN--CONTENT--->
    </body>
</html>