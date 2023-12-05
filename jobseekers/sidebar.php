<div class="sidebar">
            <div class="logo">
                <ul class="menu">
                    <div class="top">
                        <div class="jobhublogo">
                            <a href="about.php"><img class="img-circle" src="../img/logo.png"></a>
                            <h4>BJIMS</h4>
                        </div>
                    </div><br>
                    <li>
                        <a href="jobseekers.php">
                            <i class="fas fa-briefcase"></i>
                            <span>Jobs</span>
                        </a>
                    </li>
                    <li>
                        <a href="profile.php">
                            <i class="fas fa-user-alt"></i>
                            <span>Profile</span>
                        </a>
                    </li>
                    <li>
                        <a href="activitylog.php">
                            <i class="fa-solid fa-clock-rotate-left"></i>
                            <span>Activity Log</span>
                        </a>
                    </li>
                    <li>
                        <a href="settings.php">
                            <i class="fas fa-cog"></i>
                            <span>Settings</span>
                        </a>
                    </li>
                    <li>
                        <a href="logout.php?logout=<?php echo $user_id; ?>">
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