<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8"/>
        <title>Admin Dashboard</title>
        <link rel="stylesheet" href="../css/admin.css"/>
        <link rel="shortcut icon" href="../img/slsu.png">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>

        <style>
            
        </style>
    </head>

    <body>
        <div class="sidebar">
            <div class="logo">
                <ul class="menu">
                    <div class="top">
                        <div class="jobhublogo">
                            <img class="img-circle" src="../img/logo.png">
                            <img class="img-circle" src="../img/logorm.png">
                            <h4>BJIMS</h4>
                        </div>
                    </div>
                    <div class="profile">
                    </div><br>
                    <li>
                        <a href="../admin/dashboard.php">
                            <i class="fa-solid fa-gauge"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a href="../dashboard/about.php">
                            <i class="fa-solid fa-comments"></i>
                            <span>About</span>
                        </a>
                    </li>
                    <li>
                        <a href="../admin/activitylog.php">
                        <i class="fa-solid fa-clock-rotate-left"></i>
                            <span>Activity Log</span>
                        </a>
                    </li>
                    <li>
                        <a href="../dashboard/settings.php">
                            <i class="fas fa-cog"></i>
                            <span>Settings</span>
                        </a>
                    </li>
                    <li>
                        <a href="logout.php">
                            <i class="fas fa-sign-out-alt"></i>
                            <span>Log Out</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <script>
            includeHTML();
        </script>
    </body>
</html>