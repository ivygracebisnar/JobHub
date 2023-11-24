<?php
    include("../connection.php");
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Job Postings</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="../css/postjob.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
    <script src="./assets/js/jquery.min.js"></script>
    <script src="./assets/js/bootstrap.min.js"></script>
    <script src="../js/postjob.js"></script>
   
</head>

<body>
    <?php
        $find_notifications = "SELECT * FROM inf WHERE active = 1";
        $result = mysqli_query($conn, $find_notifications);
        $count_active = '';
        $notifications_data = array(); 
        $deactive_notifications_dump = array();
        while($rows = mysqli_fetch_assoc($result)){
            $count_active = mysqli_num_rows($result);
            $notifications_data[] = array(
                "jobid" => $rows['jobid'],
                "title" => $rows['title'],
                "description" => $rows['description']
            );
        }

        // Only five specific posts
        $deactive_notifications = "SELECT * FROM inf WHERE active = 0 ORDER BY jobid DESC LIMIT 0,5";
        $result = mysqli_query($conn, $deactive_notifications);
        while($rows = mysqli_fetch_assoc($result)){
            $deactive_notifications_dump[] = array(
                "jobid" => $rows['jobid'],
                "title" => $rows['title'],
                "description" => $rows['description']
            );
        }
    ?>
            <ul class="nav navbar-nav navbar-right">
                <li><i class="fa fa-bell" id="over" data-value ="<?php echo $count_active; ?>" style="z-index:-99 !important;font-size:32px;color:black;margin:0.5rem 0.4rem !important;"></i></li>
                <?php if(!empty($count_active)){ ?>
                    <div class="round" id="bell-count" data-value ="<?php echo $count_active; ?>"><span><?php echo $count_active; ?></span></div>
                <?php } ?>
                <?php if(!empty($count_active)){ ?>
                    <div id="list">
                        <?php foreach($notifications_data as $list_rows){ ?>
                            <li id="message_items">
                                <div class="message alert alert-warning" data-id=<?php echo $list_rows['jobid']; ?>>
                                    <span><?php echo $list_rows['title']; ?></span>
                                    <div class="msg">
                                        <p><?php echo $list_rows['description']; ?></p>
                                    </div>
                                </div>
                            </li>
                        <?php } ?> 
                    </div> 
                <?php } else { ?>
                    <!--old Messages-->
                    <div id="list">
                        <?php foreach($deactive_notifications_dump as $list_rows){ ?>
                            <li id="message_items">
                                <div class="message alert alert-danger" data-id=<?php echo $list_rows['jobid']; ?>>
                                    <span><?php echo $list_rows['title']; ?></span>
                                    <div class="msg">
                                        <p><?php echo $list_rows['description']; ?></p>
                                    </div>
                                </div>
                            </li>
                        <?php } ?>
                    </div>
                    <!--old Messages-->
                <?php } ?>
            </div>
        </ul>
    </div>

</body>

</html>
