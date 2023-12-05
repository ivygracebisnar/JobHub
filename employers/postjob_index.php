<?php
 include '../connection.php';
 session_start();
 $user_id = $_SESSION['user_id'];
 
 if(!isset($user_id)){
    header('location:login.php');
 };
 
 $select = mysqli_query($conn, "SELECT * FROM `employers` WHERE id = '$user_id'") or die('query failed');
 if(mysqli_num_rows($select) > 0){
     $fetch = mysqli_fetch_assoc($select);
 }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Job Posting</title>
    <link rel="stylesheet" href="../css/style.css"/>
    
    <link rel="shortcut icon" href="../img/slsu.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css"/>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet"> -->
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>
  
    <script src="./assets/js/jquery.min.js"></script>
    <script src="./assets/js/bootstrap.min.js"></script>
    <script src="postjob_script.js"></script>

    <style>
       body {
    margin:0 !important;
    padding:0 !important;
    box-sizing: border-box;
    font-family: 'Roboto', sans-serif;
}
.round{
 width:20px;
 height:20px;
 border-radius:50%;
 position:relative;
 background:rgb(25, 24, 24);
 display:inline-block;
 padding:0.3rem 0.2rem !important;
 margin:0.3rem 0.2rem !important;
 left:-18px;
 top:10px;
 z-index: 99 !important;
}
.round > span {
 color:white;
 display:block;
 text-align:center;
 font-size:1rem !important;
 padding:0 !important;
}
#list{

 display: none;
 top: 33px;
 position: absolute;
 right: 2%;
 background:#ffffff;
z-index:100 !important;
width: 25vw;
margin-left: -37px;

padding:0 !important;
margin:0 auto !important;

 
}
.message > span {
  width:100%;
  display:block;
  color:rgb(11, 11, 11);
  text-align:justify;
  margin:0.2rem 0.3rem !important;
  padding:0.3rem !important;
  line-height:1rem !important;
  font-weight:bold;
  border-bottom:1px solid white;
  font-size:1.8rem !important;

}
.message{
  background:#4792b7;
 margin:0.3rem 0.2rem !important;
 padding:0.2rem 0 !important;
 width:100%;
 display:block;
 
}
.message > .msg {
  width:90%;
  margin:0.2rem 0.3rem !important;
  padding:0.2rem 0.2rem !important;
  text-align:justify;
  font-weight:bold;
  display:block;
  word-wrap: break-word;

 
}

.container {
    width: 100%;
    margin: 0 auto;
    background-color: #ffffff;
    padding: 20px;
    margin-top: 50px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}



.fa-bell {
    font-size: 32px;
    color: #0a0a0a;
    margin: 0.5rem 0.4rem !important;
}

.round {
    background-color: #ffffff;
    border-radius: 50%;
    padding: 5px 10px;
    color: #ffffff;
    font-size: 16px;
    margin-left: 5px;
}

#list {
    display: none;
    position: absolute;
    background-color: #ffffff;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    border-radius: 5px;
    padding: 10px;
    width: 300px;
    z-index: 99;
}

#list li {
    list-style: none;
    margin-bottom: 10px;
}

.message {
    padding: 10px;
    border-radius: 5px;
    background-color: #282130;
    color: #ffffff;
    cursor: pointer;
    transition: background-color 0.3s;
}

.message:hover {
    background-color: #e1d9ea;
}

.msg {
    max-height: 50px;
    overflow: hidden;
}

.btn-danger {
    background-color: rgb(86, 75, 133);;
    color: #ffffff;
    border: none;
}
/* Added styles for the bell icon */
#over:hover {
    cursor: pointer;
    color: #FFD700; /* Change color on hover */
}

/* Added styles for the notification count */
.round {
    background-color: #FF4500; /* Bell background color */
    color: white; /* Bell text color */
    border-radius: 50%;
    padding: 5px 8px;
    position: absolute;
    top: 10px;
    right: 10px;
}

/* Added styles for the notification list */
#list {
    display: none;
    position: absolute;
    top: 60px; /* Adjust as needed */
    right: 0;
    width: 300px;
    background-color: white;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    z-index: 1;
}

/* Adjusted styles for the notification items */
.message {
    margin: 5px;
    padding: 10px;
    border: 1px solid #ddd;
    border-radius: 5px;
}

/* Added styles for notification item hover effect */
.message:hover {
    background-color: #f9f9f9;
}

.form-container {
            max-width: 1050px;
            margin: 0 auto;
            background-color: #fff;
            padding: 50px 70px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            border-radius: 10px;
            color: #333;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            font-weight: bold;
            display: block;
            margin-bottom: 5px;
        }

        .form-group input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }

        .form-group button {
            padding: 10px 20px;
            background-color: rgba(113, 99, 186, 1);
            color: #fff;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
        }

        .form-group button:hover {
            background-color: rgba(85, 73, 141, 1);
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
                    <h2>JOB POSTING</h2>
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
            <div class="form-container">
                <form class="form-horizontal" id="frm_data">
                    <div class="form-group row">
                        <div class="col-md-6">
                            <label class="control-label col-md-4" for="notification">Title</label>
                            <input type="text" name="title" id="title" class="form-control" placeholder="Title " required/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-6">
                            <label class="control-label col-md-4" for="notification">Description</label>
                            <input type="text" name="description" id="description" class="form-control" placeholder="Description" required/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-6">
                            <label class="control-label col-md-4" for="notification">Location</label>
                            <input type="text" name="location" id="location" class="form-control" placeholder="Location " required/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-6">
                            <label class="control-label col-md-4" for="notification">Requirements</label>
                            <input type="text" name="requirements" id="requirements" class="form-control" placeholder="Requirements " required/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-6">
                            <label class="control-label col-md-4" for="notification">Salary</label>
                            <input type="text" name="salary" id="salary" class="form-control" placeholder="Salary " required/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-6">
                            <label class="control-label col-md-4" for="notification">Date Posted</label>
                            <input type="date" name="posteddate" id="posteddate" class="form-control" placeholder="Date Posted" required/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-6">
                            <label class="control-label col-md-4" for="notification">Employer ID</label>
                            <input type="number" name="employer_id" id="employer_id" class="form-control" placeholder="Employer Id " required/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-10 col-offset-2" style="text-align:left;width: 20%;">
                            <input type="submit" id="notify" name="submit" class="btn btn-danger" value="NOTIFY"/>
                        </div>
                    </div>  
                </form>
            </div>
        </div>
        <?php include("../footer/footer.php") ?>
    </body>
</html>