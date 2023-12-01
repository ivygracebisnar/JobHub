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
        <link rel="stylesheet" href="../css/admin.css"/>
        <link rel="shortcut icon" href="../img/slsu.png">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>
        <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
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

<style>
                .pagination {
                    display: flex;
                    justify-content: flex-end;
                    align-items: center;
                    list-style: none;
                    padding: 0;
                    font-family: "Poppins", sans-serif;
                }

                .pagination li {
                    margin-right: 5px;
                }

                .pagination li a {
                    display: inline-block;
                    padding: 6px 12px;
                    text-decoration: none;
                    color: #333;
                    border: 1px solid #ccc;
                    border-radius: 3px;
                    background-color: #fff;
                }

                .pagination li a:hover {
                    background-color: #f5f5f5;
                }

                .pagination li.active a {
                    background-color: #007bff;
                    color: #fff;
                    font-weight: bold;
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
                    <h2>Job Seekers</h2>
                </div>
                <div class="user--info">
                    <div class="search--box">
                        <i class="fas fasolid fa-search"></i>
                        <input type="text" id="myInput" placeholder="Search" class="form-control"/>
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
                        <tbody id="myTable">
                            <?php
                                require_once "../connection.php";

                                if(isset($_GET['page_no']) && $_GET['page_no']!="") {
                                    $page_no = $_GET['page_no'];
                                }else{
                                    $page_no = 1;
                                }

                                $total_records_per_page = 10;
                                $offset = ($page_no-1) * $total_records_per_page;
                                $previous_page = $page_no - 1;
                                $next_page = $page_no + 1;
                                $adjacents = "2";

                                $result_count=mysqli_query($conn, "SELECT COUNT(*) as total_records FROM jobs");
                                $total_records = mysqli_fetch_array($result_count);
                                $total_records = $total_records['total_records'];
                                $total_no_of_pages = ceil($total_records / $total_records_per_page);
                                $second_last = $total_no_of_pages - 1;

                                $sql = mysqli_query($conn, "SELECT * FROM jobseeker ORDER BY id DESC");
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
                        <tfoot>
                            <tr>
                                <td colspan="7">Total Jobseekers = <?php
                                    $dash_jobs_query = "SELECT * FROM jobseeker";
                                    $dash_jobs_query_run = mysqli_query($conn, $dash_jobs_query);
                                    if($jobs_total = mysqli_num_rows($dash_jobs_query_run)){
                                        echo ''.$jobs_total.'';
                                    }else{
                                        echo 'No Record!';
                                    }
                                ?></td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                <ul class="pagination pull-right">
                    <li class="pull-left btn btn-default disabled">Showing page <?php echo $page_no. " of ". $total_no_of_pages;?></li>
                    <li <?php if($page_no <= 1) {echo "class='disabled'";}?>>
                    <a <?php if($page_no > 1) {echo "href='?page_no=$previous_page'";}?>>Previous</a>
                    </li>

                <?php
                    if($total_no_of_pages <=10) {
                        for($counter = 1; $counter <-$total_no_of_pages;$counter++) {
                            if($counter == $page_no) {
                                echo "<li class='active'><a>$counter</a></li>";
                            }else{
                                echo "<li><a href='?page_no=$counter'>$counter</a></li>";
                            }
                        }
                    }elseif($total_no_of_pages > 10) {
                        if($page_no <=4){
                            for($counter =  1; $counter < 8; $counter++){
                                if($counter == $page_no){
                                    echo "<li class='active'><a>$counter</a></li>";
                                }else{
                                    echo "<li><a href='?page_no=$counter'>$counter</a></li>";
                                }
                            }
                            echo "<li><a>...</a></li>";
                            echo "<li><a href='?page_no=$second_last'>$second_last</a></li>";
                            echo "<li><a href='?page_no=$total_no_of_pages'>$total_no_of_pages</a></li>";
                        }elseif($page_no > 4 && $page_no < $total_no_of_pages - 4){
                            echo "<li><a href='>page_no=1'>1</a></li>";
                            echo "<li><a href='>page_no=2'>2</a></li>";
                            echo "<li><a>...</a></li>";

                            for($counter = $page_no - $adjacents; $counter <=$page_no + $adjacents;$counter++){
                                if($counter == $page_no){
                                    echo "<li class='active'><a>$counter</a></li>";
                                }else{
                                    echo "<li><a href='?page_no=$counter'>$counter</a></li>";
                                }
                            }
                            echo "<li><a>...</a></li>";
                            echo "<li><a href='?page_no=$second_last'>$second_last</a></li>";
                            echo "<li><a href='?page_no=$total_no_of_pages'>$total_no_of_pages</a></li>";
                        }else{
                            echo "<li><a href='>page_no=1'>1</a></li>";
                            echo "<li><a href='>page_no=2'>2</a></li>";
                            echo "<li><a>...</a></li>";

                            for($counter = $total_no_of_pages - 6;$counter <= $total_no_of_pages;$counter++){
                                if($counter == $page_no){
                                    echo "<li class='active'><a>$counter</a></li>";
                                }else{
                                    echo "<li><a href='?page_no=$counter'>$counter</a></li>";
                                }
                            }
                        }
                    }
                ?>
                <li <?php if($page_no >= $total_no_of_pages){ echo "class='disabled'";}?>>
                    <a <?php if($page_no < $total_no_of_pages){ echo "href='?page_no=$next_page'";}?>>Next</a>
                </li>
                <?php if($page_no < $total_no_of_pages){ echo "<li><a href='?page_no=$total_no_of_pages'>Last &rsaquo; &rsaquo;</></li>";}?>
                </ul>
            </div>
        </div>
        <script src="js/script.js"></script>
        <?php include("../footer/footer.php") ?>
        <!---END OF MAIN--CONTENT--->
    </body>
</html>