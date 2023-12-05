<?php
include("../connection.php");

$find_notifications = "SELECT * FROM info WHERE active = 1";
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
$deactive_notifications = "SELECT * FROM info WHERE active = 0 ORDER BY jobid DESC LIMIT 0,5";
$result = mysqli_query($conn, $deactive_notifications);
while($rows = mysqli_fetch_assoc($result)){
    $deactive_notifications_dump[] = array(
        "jobid" => $rows['jobid'],
        "title" => $rows['title'],
        "description" => $rows['description']
    );
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        #notification-container {
            position: relative;
            display: inline-block;
            margin: 10px;
        }

        #notification-icon {
            font-size: 24px;
            color: black;
            cursor: pointer;
        }

        #notification-count {
            position: absolute;
            top: -5px;
            right: -5px;
            background-color: red;
            color: white;
            border-radius: 50%;
            padding: 5px 10px;
            font-size: 12px;
        }

        #notification-list {
            display: none;
            position: absolute;
            top: 40px;
            right: 0;
            width: 300px;
            box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
            border-radius: 5px;
            overflow: hidden;
            z-index: 1;
        }

        .notification-item {
            padding: 10px;
            border-bottom: 1px solid #ddd;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .notification-item:hover {
            background-color: #f5f5f5;
        }

        .highlight {
            background-color: #f5f5f5 !important;
        }

        .notification-title {
            font-weight: bold;
        }

        .msg {
            margin-top: 5px;
        }

        .view-link {
            text-decoration: none;
            color: #3498db;
            font-weight: bold;
        }

        .view-link:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<div id="notification-container">
<!-- Bell Icon -->
<i class="fa fa-bell" id="over" data-value="<?php echo $count_active; ?>" style="font-size: 24px; color: black; margin: 0.5rem 0.4rem;"></i>

<style>
    .highlight {
        background-color: #ffffff; /* You can adjust the color as needed */
    }
</style>

<?php if (!empty($count_active)) : ?>
    <!-- Notification Count Badge -->
    <div class="round" id="bell-count" data-value="<?php echo $count_active; ?>"><span><?php echo $count_active; ?></span></div>

    <!-- Notification Dropdown -->
    <div id="list">
        <?php foreach ($notifications_data as $list_rows) : ?>
            <button class="message alert alert-success" data-id="<?php echo $list_rows['jobid']; ?>" onclick="redirectToJob(this, '<?php echo $list_rows['jobid']; ?>')">
                <span class="notification-title"><?php echo $list_rows['title']; ?></span>
                <div class="msg">
                    <p><?php echo $list_rows['description']; ?></p><br>
                    <a href="viewjobs.php?profid=<?php echo htmlentities($list_rows['jobid']); ?>" class="view-link">View Details</a>
                </div>
            </button>
        <?php endforeach; ?>
    </div>
<?php else : ?>
    <!-- Display the latest five deactive notifications if no active notifications -->
    <div id="list">
        <?php foreach ($deactive_notifications_dump as $list_rows) : ?>
            <button class="message alert alert-danger" data-id="<?php echo $list_rows['jobid']; ?>" onclick="redirectToJob(this, '<?php echo $list_rows['jobid']; ?>')">
                <span class="notification-title"><?php echo $list_rows['title']; ?></span>
                <div class="msg">
                    <p><?php echo $list_rows['description']; ?></p>
                </div>
            </button>
        <?php endforeach; ?>
    </div>
<?php endif; ?>
<script src="script.js"></script>
<style></style>
<script>
    function redirectToJob(element, jobid) {
        // Remove highlighting from all buttons
        var buttons = document.querySelectorAll('.message');
        buttons.forEach(function (btn) {
            btn.classList.remove('highlight');
        });

        // Highlight the clicked button
        element.classList.add('highlight');

        // Redirect to the appropriate page with the jobid
        window.location.href = 'viewjobs.php?profid=' + encodeURIComponent(jobid);
    }
</script>

</body>
</html>