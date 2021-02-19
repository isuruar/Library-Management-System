<?php
session_start();
$errors = [];
$missing = [];
$validationErrors = [];

if (isset($_POST['submit'])) {
    $expected = ['emailAddress', 'password'];
    $required = ['emailAddress', 'password',];

    require "Php/registerprocess.php";
}

require "Php/database.php";
require "Php/validations.php";

if (array_key_exists('emailAddress', $_POST)) {
    $email = $_POST["emailAddress"];
    $pw = $_POST["password"];

    $validationErrors = validatelogin($email, $pw);

    if(!$validationErrors && !$errors){
    $dbConn = GetDB();
    $sql = mysqli_query($dbConn,"UPDATE `admin` SET `Password`='$_POST[password]' WHERE `Email Address`= '$_POST[emailAddress]'");
            
    echo "<script>alert('Password Updated Successfully!');window.location.href='/Library%20System/Admin/update_password.php';</script>";
    }
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <title>Update Password</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="images/icon-white.png">
    <link rel="stylesheet" href="css/nav.css">
    <link rel="stylesheet" href="css/updatepassword.css">
<!-- google fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@700&family=Noto+Sans+TC:wght@500&family=Staatliches&display=swap"rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@900&display=swap" rel="stylesheet">
<!-- google fonts -->
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>


</head>

<body>

    <?php
        require "Php/nav.php";     
    ?>

<div class="jumbotron text-center margin-none">
        <div class="layer"></div>
        <div class="jumbotron-ontop">
            <img class="logo-icon" src="images/icon-white.png">
            <h1>Lowa State University</h1>
            <p>Change Your Password</p>

            <div class="login-wrap">
                <form onsubmit="login.php" method="POST">
                    <div class="form-group">
                        <label for="email">Email:
                            <?php
                            if (array_key_exists('emailAddress', $validationErrors)) {
                                echo '<span class="warning" style="color:#f39f18;">' . $validationErrors["emailAddress"] . '</span>';
                            }
                            ?>
                        </label>
                        <input type="email" class="form-control" placeholder="Email" name="emailAddress" required=""
                        <?php
                            if ($errors || $missing || $validationErrors) {
                            echo 'value="' . htmlentities($emailAddress) . '"';
                            }
                        ?>
                        >
                    </div>
                    
                    <div class="form-group">
                        <label for="pwd">Password:</label>
                        <input type="password" class="form-control" placeholder="Password" name="password" required=""
                        <?php
                            if ($errors || $missing) {
                             echo 'value="' . htmlentities($password) . '"';
                        }
                        ?>
                        >
                    </div>

                    <div class="form-group">
                        <label for="pwd">New Password:
                            <?php
                            if (array_key_exists('password', $validationErrors)) {
                                echo '<span class="warning" style="color:#f39f18;">' . $validationErrors["password"] . '</span>';
                            }
                            ?>
                        </label>
                        <input type="password" class="form-control" placeholder="New Password" name="password" required=""
                        <?php
                            if ($errors || $missing) {
                             echo 'value="' . htmlentities($password) . '"';
                        }
                        ?>
                        >
                    </div>

                    <div class="form-group">
                        <button type="submit" name="submit" class="btn btn-default"><i class="fa fa-sign-in"></i></i> Update</button>
                    </div>
                    </div>
            
                </form>
            </div>
        </div>
    </div>

</body>

</html>
