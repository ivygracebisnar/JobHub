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
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8"/>
        <title>Admin Dashboard</title>
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
                    <h2>Admin Dashboard</h2>
                </div>
                <div class="user--info">
                    <script>
                        $(document).ready(function(){
                            $("#Input").on("keyup",function(){
                                var value=$(this).val().toLowerCase();
                                $("#Table tr").filter(function(){
                                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                                });
                            });
                        });
                    </script>
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
            <div class="insights">
                    <div class="first">
                    <ion-icon name="people-sharp"></ion-icon>
                        <div class="middle">
                            <div class="left">
                                <h3>Total Job Seekers</h3>
                                <?php
                                    $dash_jobseekers_query = "SELECT * FROM jobseeker";
                                    $dash_jobseekers_query_run = mysqli_query($conn, $dash_jobseekers_query);
                                    if($jobseekers_total = mysqli_num_rows($dash_jobseekers_query_run)){
                                        echo '<h1> '.$jobseekers_total.' </h1>';
                                    }else{
                                        echo '<h5 class="text-muted">No Record!</h5>';
                                    }
                                ?>
                                <a href="../admin/viewjobseekers.php" style="float: right;"><button style="background: rgb(86, 75, 133);
    color: #fff;
    padding: 7px 15px;
    border-radius: 10px;
    cursor: pointer;
    width: 100%;">Show</button></a>
                            </div>
                        </div>
                    </div>
                    <div class="second">
                    <ion-icon name="people-sharp"></ion-icon>
                        <div class="middle">
                            <div class="left">
                                <h3>Total Employers</h3>
                                <?php
                                    $dash_employers_query = "SELECT * FROM employers";
                                    $dash_employers_query_run = mysqli_query($conn, $dash_employers_query);
                                    if($employers_total = mysqli_num_rows($dash_employers_query_run)){
                                        echo '<h1> '.$employers_total.' </h1>';
                                    }else{
                                        echo '<h5 class="text-muted">No Record!</h5>';
                                    }
                                ?>
                                <a href="../admin/viewemployers.php" style="float: right;"><button style="background: rgb(86, 75, 133);
    color: #fff;
    padding: 7px 15px;
    border-radius: 10px;
    cursor: pointer;
    width: 100%;">Show</button></a>
                            </div>
                        </div>
                    </div>
                    <div class="third">
                    <ion-icon name="people-sharp"></ion-icon>
                        <div class="middle">
                            <div class="left">
                                <h3>Total Jobs Available</h3>
                                <?php
                                    $dash_jobs_query = "SELECT * FROM jobs";
                                    $dash_jobs_query_run = mysqli_query($conn, $dash_jobs_query);
                                    if($jobs_total = mysqli_num_rows($dash_jobs_query_run)){
                                        echo '<h1> '.$jobs_total.' </h1>';
                                    }else{
                                        echo '<h5 class="text-muted">No Record!</h5>';
                                    }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            <div class="tabular--wrapper">
                <h3 class="main--title">Jobs List</h3>
                <div class="table-container">
                    <table>
                        <thead>
                            <th>Job Title</th>
                            <th>Description</th>
                            <th>Salary</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            <?php
                                require_once "../connection.php";
                                $sql = mysqli_query($conn, "SELECT * FROM jobs ORDER BY jobid");
                                $count =1;
                                $row = mysqli_num_rows($sql);
                                if($row > 0) {
                                    while($row = mysqli_fetch_array($sql)) {
                            ?>
                            <tr id="Table">
                                <td><?php echo $row['title'];?></td>
                                <td><?php echo $row['description'];?></td>
                                <td><?php echo $row['salary'];?></td>
                                <td><a href="viewjobs.php?profid=<?php echo htmlentities($row['jobid']);?>" style="font-size: 15px;"><button><i class="fa-solid fa-eye"></i> View</button></a></td>
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