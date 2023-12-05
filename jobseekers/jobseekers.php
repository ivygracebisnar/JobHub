
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
        <link rel="stylesheet" type="text/css" href="../employers/assets/css/bootstrap.min.css"/>
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
        <script src="../employers/assets/js/jquery.min.js"></script>
        <script src="../employers/assets/js/bootstrap.min.js"></script>
        <script src="../employers/postjob_script.js"></script>
        <script src="../js/script.js"></script>
       
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
            </script>
    </head>
    <body>
       <!--- START OF SIDEBAR --->
       <?php include("sidebar.php") ?>
    <!--- END OF SIDEBAR --->
    
  <!---START OF MAIN--CONTENT--->
        <div class="main--content">
            <div class="header--wrapper">
                <div class="header--title">
                    <h2>JOB RECOMMENDATION</h2>
                </div>
                <div class="user--info">
                    <div class="notification">
                        <div class="bell-container">
                            <div class="bell" onclick="toggleNotifi()">
                            <i class=""></i>
                            <div class="notification-container" id="notification-container">
                            </div>
                            <?php include("notif.php") ?>
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
            </div></div>
        </div>
            <div class="card--container">
                <h1 class="main--title">For You</h1>
                <div class="card-wrapper">
                    <div class="payment--card">
                        <div class="card--header">
                            <div class="amount">
                            <?php
                                require_once "../connection.php";
                                $sql = mysqli_query($conn, "SELECT * FROM info WHERE jobid=1");
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
                                $sql = mysqli_query($conn, "SELECT * FROM info WHERE jobid=2");
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
                                $sql = mysqli_query($conn, "SELECT * FROM info WHERE jobid=3");
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
                                    $dash_jobs_query = "SELECT * FROM info";
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
                                $sql = mysqli_query($conn, "SELECT * FROM info ORDER BY jobid DESC");
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