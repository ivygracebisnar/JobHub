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

// Fetch employer activity logs
$employer_logs = fetchActivityLogs("employers_activity_log");

// Fetch jobseeker activity logs
$jobseeker_logs = fetchActivityLogs("jobseeker_activity_log");

function fetchActivityLogs($tableName) {
    global $conn;

    $logs = array();

    $query = "SELECT * FROM $tableName ORDER BY activity_timestamp DESC LIMIT 10"; // Adjust the query as needed

    $result = mysqli_query($conn, $query);

    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            $logs[] = $row;
        }
        mysqli_free_result($result);
    } else {
        echo "Error: " . mysqli_error($conn);
    }

    return $logs;
}

// Close the database connection
mysqli_close($conn);

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
            
            // Variable to store the last clicked button
            let lastClickedButton = null;

            // Event listener for clicks on document body
            document.body.addEventListener('click', function (event) {
                const logsContainer = document.querySelector('.container');
                const buttonContainer = document.querySelector('.button-container');

                if (!logsContainer.contains(event.target) && !buttonContainer.contains(event.target)) {
                    // Clicked outside the logs container and button container

                    // Hide the logs container
                    logsContainer.style.display = 'none';

                    // Show the last clicked button
                    if (lastClickedButton) {
                        lastClickedButton.style.display = 'block';
                    }
                }
            });

            function showLogs(logsId) {
                const logs = document.querySelectorAll('.page');
                logs.forEach(log => log.style.display = 'none');

                const selectedLogs = document.getElementById(logsId);
                if (selectedLogs) {
                    selectedLogs.style.display = 'block';
                }

                // Hide all buttons
                document.querySelectorAll('.button-container button').forEach(button => {
                    button.style.display = 'none';
                });

                // Show the clicked button
                const clickedButton = document.querySelector('.button-container button[data-logs="' + logsId + '"]');
                if (clickedButton) {
                    clickedButton.style.display = 'block';
                    lastClickedButton = clickedButton;
                }
            }
        </script>
        <style>
            body {
                font-family: Arial, sans-serif;
                margin: 0;
                padding: 0;
                box-sizing: border-box;
                text-align: center;
            }

            .container {
                display: flex;
                flex-direction: column;
            }

            .page {
                display: none;
                text-align: left;
                max-width: 600px;
                margin: 0 auto;
            }

            .page.active {
                display: block;
            }

            button {
                padding: 10px;
                font-size: 16px;
                margin-bottom: 20px;
                background: rgb(86, 75, 133);
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
                    <h2>Activity Log</h2>
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
            <div class="tabular--wrapper">
                <div class="table-container">
                    <!-- Display Employer Activity Logs -->
                    <div class="page" id="employerLogs">
                        <h2>Employer Activity Logs</h2>
                        <ul>
                            <?php foreach ($employer_logs as $log) : ?>
                                <li><?php echo $log['activity_type'] . " at " . $log['activity_timestamp']; ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>

                    <!-- Display Jobseeker Activity Logs -->
                    <div class="page" id="jobseekerLogs" style="display:none;">
                        <h2>Jobseeker Activity Logs</h2>
                        <ul>
                            <?php foreach ($jobseeker_logs as $log) : ?>
                                <li><?php echo $log['activity_type'] . " at " . $log['activity_timestamp']; ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Buttons to toggle logs visibility -->
            <div class="button-container">
                <button onclick="showLogs('employerLogs')">Show Employer Logs</button>
                <button onclick="showLogs('jobseekerLogs')">Show Jobseeker Logs</button>
            </div>
        </div>
   
        <script src="../js/script.js"></script>
        <?php include("../footer/footer.php") ?>
        <!---END OF MAIN--CONTENT--->
    </body>
</html>