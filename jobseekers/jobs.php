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
                    background-color: rgba(113, 99, 186, 255);
                    color: #fff;
                    font-weight: bold;
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
                    <input type="text" id="myInput" placeholder="Search"/>
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
                    <div class="user-pic" onclick="toggleMenu()">
                        <?php
                            if($fetch['image'] == ''){
                                echo '<img src="../images/default-avatar.png">';
                            }else{
                                echo '<img src="../uploaded_img/'.$fetch['image'].'">';
                            }
                        ?>
                    </div>
                    <div class="sub-menu-wrap" id="subMenu">
                        <div class="sub-menu">
                            <div class="user-info">
                            <?php
                                if($fetch['image'] == ''){
                                    echo '<img src="../images/default-avatar.png">';
                                }else{
                                    echo '<img src="../uploaded_img/'.$fetch['image'].'">';
                                }
                            ?>
                            <h3><?php echo $fetch['name']; ?></h3>
                            </div>
                            <hr>

                            <a href="#" class="sub-menu-link">
                                <i class="fa-solid fa-user"></i>
                                <p>Edit Profile</p>
                                <span>></span>
                            </a>
                            <a href="#" class="sub-menu-link">
                                <i class="fa-solid fa-lock"></i>
                                <p>Security</p>
                                <span>></span>
                            </a>
                            <a href="#" class="sub-menu-link">
                                <i class="fa-solid fa-right-from-bracket"></i>
                                <p>Logout</p>
                                <span>></span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tabular--wrapper">
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

                                $sql = mysqli_query($conn, "SELECT * FROM jobs ORDER BY jobid DESC LIMIT $offset,$total_records_per_page");
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
                                <td colspan="7">Total Jobs = <?php
                                    $dash_jobs_query = "SELECT * FROM jobs";
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
                        for($counter = 1; $counter <=$total_no_of_pages;$counter++) {
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
        <script src="../js/script.js"></script>
        <?php include("../footer/footer.php") ?>
        <!---END OF MAIN--CONTENT--->
    </body>
</html>