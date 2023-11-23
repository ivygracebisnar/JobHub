<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../img/slsu.png">
    <link rel="stylesheet" href="../css/adminlogin.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <title>Forgot Password</title>
</head>
<body>
    <div class="wrapper">
        <div class="container main">
            <div class="row">
                <div class="col-md-6 side-image">
                    <img src="images/white.png" alt="">
                </div>
                <div class="col-md-6 right">
                     <div class="input-box">
                        <h3><b>Forgot Password</b></h3>
                        <br>
                        <p style="font-size: 15px;">Please enter an email address.</p><br>
                        <form action="send_reset_email.php" method="post">
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" name="email" style="font-size: 15px;" placeholder="Enter your Email" class="form-control">
                            </div><br>
                            <div class="form-group">
                                <input type="submit" class="btn btn-danger" style="font-size: 15px;" value="Reset Password">
                                <button class="btn btn-primary"><a href="login.php">Cancel</a></button>
                            </div><br>
                        </form>
                     </div>
                </div>
            </div>
        </div>
    </div>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>