<?php
    include("../connection.php");
?>
<!DOCTYPE html>
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
          <!--- START OF SIDEBAR--->
          <div class="sidebar">
            <?php include("sidebar.php") ?>
        </div>
        <!---END OF SIDEBAR--->

        <!---START OF MAIN--CONTENT--->
        <div class="main--content">
            <div class="header--wrapper">
                <div class="header--title">
                    <h2>Your Jobs Lists</h2>
                </div>
                <div class="user--info">
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
                    <img src="../img/slsu.png" alt=""/>
                </div>
            </div>
            <div class="tabular--wrapper">
                <div class="search--box">
                    <i class="fas fasolid fa-search"></i>
                    <input type="text" id="Input" placeholder="Search"/>
                </div>
                </div>
               
                <div class="job-postings">
    <h3>Job Postings</h3>
    <form class="form-horizontal" id="frm_data">
        <div class="form-group row">
            <label class="control-label col-md-4" for="title">Title</label>
            <div class="col-md-6">
                <input type="text" name="title" id="title" class="form-control" placeholder="Title" required/>
            </div>
        </div>

        <div class="form-group row">
            <label class="control-label col-md-4" for="description">Description</label>
            <div class="col-md-6">
                <textarea style="resize:none !important;" name="description" id="description" rows="4" cols="10" class="form-control"></textarea>
            </div>
        </div>

        <div class="form-group row">
            <label class="control-label col-md-4" for="location">Location</label>
            <div class="col-md-6">
                <textarea style="resize:none !important;" name="location" id="location" rows="4" cols="10" class="form-control"></textarea>
            </div>
        </div>

        <div class="form-group row">
            <label class="control-label col-md-4" for="requirements">Requirements</label>
            <div class="col-md-6">
                <input type="text" name="requirements" id="requirements" class="form-control" placeholder="Requirements" required/>
            </div>
        </div>

        <div class="form-group row">
            <label class="control-label col-md-4" for="salary">Salary</label>
            <div class="col-md-6">
                <input type="text" name="salary" id="salary" class="form-control" placeholder="Salary" required/>
            </div>
        </div>

        <div class="form-group row">
            <label class="control-label col-md-4" for="posteddate"> Date Posted</label>
            <div class="col-md-6">
                <input type="date" name="posteddate" id="posteddate" class="form-control" required/>
            </div>
        </div>

        <div class="form-group row">
            <label class="control-label col-md-4" for="employer_id">Employer ID</label>
            <div class="col-md-6">
                <input type="text" name="employer_id" id="employer_id" class="form-control" required/>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-md-10 offset-md-2" style="text-align:center;">
                <input type="submit" id="notify" name="submit" class="btn btn-danger" value="POST JOB"/>
            </div>
        </div>
    </form>
</div>


</body>

</html>
