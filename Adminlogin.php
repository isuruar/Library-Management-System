<?php
session_start();
$errors = [];
$missing = [];
$validationErrors = [];

if (isset($_POST['login'])) {
    $expected = ['emailAddress', 'password'];
    $required = ['emailAddress', 'password',];

    require "Php/registerprocess.php";
}
require "Php/database.php";
require "Php/validations.php";

if (array_key_exists('emailAddress', $_POST)) {
    $dbConn = GetDB();
    $email = $_POST["emailAddress"];
    $pw = $_POST["password"];

    $validationErrors = validatelogin($email, $pw);

    //if(!$validationErrors && !$errors){
    $count = 0; //to keep track of how many rows found that match the email and pw
    $res = mysqli_query($dbConn, "SELECT * FROM `admin` WHERE `Email Address`='$_POST[emailAddress]' AND `Password`= '$_POST[password]';");
    $count = mysqli_num_rows($res);
    if ($count == 0) {
    ?>
        <div class="alert alert-danger" style="margin:auto; padding:20px;text-align:center;font-size:
            large;color:#f39f18;background-color:black;border-style:solid;border-color: black;">
            <strong>No account found or incorrect password!</strong>
        </div>
    <?php
    } else {
        $_SESSION['login_user'] = $_POST['emailAddress'];
        echo "<script>alert('Login Successful!');window.location.href='/Library%20System/Admin/index.php';</script>";
    }

}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Lowa State University</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="images/icon-white.png">
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="css/nav.css">
    <!-- google fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@700&family=Noto+Sans+TC:wght@500&family=Staatliches&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@700&family=Noto+Sans+TC:wght@500&family=Staatliches&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@900&display=swap" rel="stylesheet">
    <!-- google fonts -->

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>
    <nav id="navbar" class="navbar navbar-default margin-none">
        <div class="container">
            <ul class="nav navbar-nav">
                <li><a href="index.php"><span class="glyphicon glyphicon-home"></a></li>
                <li><a href="books.php">Books</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="register.php"><span class="glyphicon glyphicon-user"></span> Register</a></li>
                <li class="active"><a href="adminlogin.php"><span class="glyphicon glyphicon-log-in"></span> Admin Login</a></li>
                <li><a href="../Student/login.php"><span class="glyphicon glyphicon-log-in"></span> Member Login</a></li>
            </ul>
        </div>
    </nav>

    <div class="jumbotron text-center margin-none">
        <div class="layer"></div>
        <div class="jumbotron-ontop">
            <img class="logo-icon" src="images/icon-white.png">
            <h1>Admin Login</h1>
            <p>Online Library</p>

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
                        ?>>
                    </div>
                    <div class="form-group">
                        <label for="pwd">Password:
                            <?php
                            if (array_key_exists('password', $validationErrors)) {
                                echo '<span class="warning" style="color:#f39f18;">' . $validationErrors["password"] . '</span>';
                            }
                            ?>
                        </label>
                        <input type="password" class="form-control" placeholder="Password" name="password" required="" 
                        <?php
                            if ($errors || $missing) {
                             echo 'value="' . htmlentities($password) . '"';
                        }
                        ?>>
                    </div>
                    <div class="form-group">
                        <button type="submit" name="login" class="btn btn-default"><i class="fa fa-sign-in"></i></i> Login</button>
                        <div class="text">
                            <p>
                                <br>
                                <a style="color:#6b9e8f; text-align:center;" href="update_password.php">Forgot password?</a>&nbsp;
                                <!-- adds some space -->
                                Do not have an account?&nbsp;<a style="color:#6b9e8f;" href="register.php">Sign Up</a>
                            </p>
                        </div>
                        <!-- &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; -->
                    </div>
                </form>
            </div>
        </div>
    </div>



</body>

</html>
