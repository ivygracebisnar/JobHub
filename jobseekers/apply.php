<?php

include '../connection.php';
session_start();
$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:login.php');
};
if(isset($_POST["register"])) {
    $id = mysqli_real_escape_string($conn, $_POST['id']);
    
    // Check if file is uploaded
    if ($_FILES['file']['error'] === UPLOAD_ERR_OK) {
        $uploadDir = '../uploads/'; // Directory to store uploaded files
        $fileName = $_FILES['file']['name'];
        $filePath = $uploadDir . $fileName;

        // Move uploaded file to the directory
        if (move_uploaded_file($_FILES['file']['tmp_name'], $filePath)) {

            // Perform proper sanitization and validation before inserting data
            $sql = "INSERT INTO files (id, file_name, file_path) VALUES ('$id', '$fileName', '$filePath')";
            $conn->query($sql);

            // Close database connection
            $conn->close();
            
            echo "File uploaded successfully.";
        } else {
            echo "Error uploading file.";
        }
    } else {
        echo "File upload failed.";
    }
}

?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8"/>
        <title>Job Opportunities</title>
        <link rel="stylesheet" href="../css/jobseekers.css"/>
        <link rel="shortcut icon" href="../img/slsu.png">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>

        <style>
        .form-container {
            max-width: 1000px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
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
        <div class="sidebar">
            <?php include("sidebar.php") ?>
        </div>
        <!---END OF SIDEBAR--->

        <!---START OF MAIN--CONTENT--->
        <div class="main--content">
            <div class="header--wrapper">
                <div class="header--title">
                    <h2>"Send Resume and Don't miss Opportunities!"</h2>
                </div>
                <div class="user--info">
                    <img src="../img/slsu.png" alt=""/>
                </div>
            </div>
            <div class="form-container">
                <form action="" method="post">
                    <div class="form-group">
                        <div class="col-md-6">
                        <label>Applicant ID</label>
                            <input type="text" name="id" class="form-control" placeholder="Applicant ID" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-6">
                        <label>Insert Resume</label>
                            <input type="file" name="file" class="form-control" placeholder="Choose File" required>
                        </div>
                    </div>
                    <div class="form-group" style="margin-top:1%">
                        <div class="col-md-6">
                            <button type="submit">Send</button>
                        </div>
                    </div>
                </form>
            </div>
            <!-- <div class="main-course">
                <h1>My Jobs</h1>
                <div class="course-box">
                    <ul>
                        <li class="active">In progress</li>
                        <li>pending</li>
                        <li>finished</li>
                    </ul>
                    <div class="course">
                        <div class="box">
                            <h3>Programming</h3>
                            <p>50% - progress</p>
                            <button>continue</button>
                            <i class="fas fa-computer"></i>
                        </div>
                        <div class="box">
                            <h3>Online Tutor</h3>
                            <p>80% - progress</p>
                            <button>continue</button>
                            <i class="fas fa-pen"></i>
                        </div>
                    </div>
                </div>
            </div> -->
        </div>
        <div class="footer" style="position: fixed;left: 0;bottom: 0;width: 100%;background: rgb(229, 223, 223);color: gray;text-align: center;">
            <strong><img src="../img/slsu.png" style="width: 20px; height: 20%; margin-left: 11%; margin-bottom: -23px; margin-top: 3px;"/>Copyright &copy; 2023; Group 4 - Barangay JobHub Information Management System BSIT 301 S.Y 2023-2024</strong> All Rights Reserved.
        </div>
        <!---END OF MAIN--CONTENT--->
    </body>
</html>