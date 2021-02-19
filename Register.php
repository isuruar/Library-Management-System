<?php
    $errors = [];

    $missing = [];

    $validationErrors = [];

    if (isset($_POST['register'])){
        $expected = ['firstName','lastName','emailAddress','contactNo','password','confirmPassword'];
        $required = ['firstName','lastName','emailAddress','contactNo','password','confirmPassword'];
        require "Php/registerprocess.php";
    }
    require "Php/database.php";
    require "Php/validations.php";

    if(array_key_exists('firstName', $_POST))
    {
        $fname = $_POST["firstName"];
        $lname = $_POST["lastName"];
        $email = $_POST["emailAddress"];
        $cntactno = $_POST["contactNo"];
        $pw = $_POST["password"];
        $cpw = $_POST["confirmPassword"];

        //insert values from validate.php file
        $validationErrors = validate($fname, $lname, $email, $cntactno, $pw, $cpw);

        if(!$validationErrors && !$errors){
            $dbConn = GetDB();
            $sql = "INSERT INTO `admin`(`First Name`, `Last Name`, `Email Address`, `Contact Number`,`Password`, `Confirm Password`) VALUES (?,?,?,?,?,?)";
            $statement = $dbConn->prepare($sql);
            if(!$statement){
                echo 'Database did not connect';
            }
            $statement->bind_param("ssssss",$fname,$lname,$email,$cntactno,$pw,$cpw);
            $statement->execute();
            // redirects to the home page after pressing register
            echo "<script>alert('Registration Successful!');window.location.href='/Library%20System/Admin/index.php';</script>";
            die();
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
    <link rel="stylesheet" href="css/register.css">
    <link rel="stylesheet" href="css/nav.css">
 <!-- google fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@700&family=Noto+Sans+TC:wght@500&family=Staatliches&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@700&family=Noto+Sans+TC:wght@500&family=Staatliches&display=swap"rel="stylesheet">
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
                <li class="active"><a href="register.php"><span class="glyphicon glyphicon-user"></span> Register</a>
                </li>
                <li><a href="adminlogin.php"><span class="glyphicon glyphicon-log-in"></span> Admin Login</a></li>
            </ul>
        </div>
    </nav>
    <div class="jumbotron text-center margin-none">
        <div class="layer"></div>
        <div class="jumbotron-ontop">
            <img style="height:70px; width:70px;" class="logo-icon" src="images/icon-white.png">
            <h1 class="registrationform">Admin Registration Form</h1>
            <p>Online Library</p>

            <div class="register-wrap">
                <form onsubmit="register.php" method="POST" action="<?= $_SERVER['PHP_SELF'];?>">
                    <div class="form-row">
                        <div class="col form-group padding-none col-md-5">
                            <label>First Name:
                                <?php                                     
                                    if (array_key_exists('firstName',$validationErrors)){
                                       echo '<span class="warning" style="color:#f39f18;">'.$validationErrors["firstName"].'</span>';     
                                    }
                                ?>
                            </label>
                            <input type="text" class="form-control" placeholder="First Name" name="firstName"
                            <?php
                            if ($errors || $missing || $validationErrors){
                                echo 'value="'. htmlentities($firstName).'"';
                            }     
                            ?>
                            >
                        </div>

                        <div class="col form-group padding-none col-md-1">

                        </div>

                        <div class="col form-group padding-none col-md-6">
                            <label>Last Name:
                                <?php                                     
                                    if (array_key_exists('lastName',$validationErrors)){
                                        echo '<span class="warning" style="color:#f39f18;">'.$validationErrors["lastName"].'</span>';     
                                    }
                                ?>
                            </label>
                            <input type="text" class="form-control" placeholder="Last Name" name="lastName"
                            <?php
                            if ($errors || $missing || $validationErrors){
                                echo 'value="'. htmlentities($lastName).'"';
                            }     
                            ?>
                            >
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Email Address:
                        <?php                                     
                            if (array_key_exists('emailAddress',$validationErrors)){
                                echo '<span class="warning" style="color:#f39f18;">'.$validationErrors["emailAddress"].'</span>';     
                            }
                        ?>
                        </label>
                        <input type="email" class="form-control" placeholder="Email Address" name="emailAddress"
                        <?php
                            if ($errors || $missing || $validationErrors){
                                echo 'value="'. htmlentities($emailAddress).'"';
                            }     
                        ?>
                        >
                        <small class="form-text text-muted">We'll never share your email with anyone else.</small>
                    </div>

                    <div class="form-group">
                        <label>Contact Number:
                        <?php                                     
                            if (array_key_exists('contactNo',$validationErrors)){
                                echo '<span class="warning" style="color:#f39f18;">'.$validationErrors["contactNo"].'</span>';     
                            }
                        ?>
                        </label>
                        <input type="text" class="form-control" placeholder="Contact Number" name="contactNo"
                        <?php
                            if ($errors || $missing || $validationErrors){
                                echo 'value="'. htmlentities($contactNo).'"';
                            }     
                            ?>
                        >
                    </div>
                    
                    <div class="form-group">
                        <label>Password:
                        <?php                                     
                            if (array_key_exists('password',$validationErrors)){
                                    echo '<span class="warning" style="color:#f39f18;">'.$validationErrors["password"].'</span>';     
                                }
                        ?>
                        </label>
                        <input class="form-control" type="password" placeholder="Password" name="password"
                        <?php
                            if ($errors || $missing){
                                echo 'value="'. htmlentities($password).'"';
                            }     
                        ?>
                        >
                    </div>
                    <div class="form-group">
                        <label>Confirm Password:
                        <?php                                     
                            if (array_key_exists('confirmPassword',$validationErrors)){
                                    echo '<span class="warning" style="color:#f39f18;">'.$validationErrors["confirmPassword"].'</span>';     
                                }
                        ?>
                        </label>
                        <input class="form-control" type="password" placeholder="Confirm Password" name="confirmPassword"
                        <?php
                            if ($errors || $missing){
                                echo 'value="'. htmlentities($confirmPassword).'"';
                            }     
                        ?>
                        >
                    </div>
                    <div class="form-group">
                        <button type="submit" name="register" class="btn btn-primary btn-block"><i class="fa fa-user"></i> Register </button>
                    </div>
                    <p id="signin">
		                Already a member? <a style="color:#f39f18;" href="adminlogin.php">Log In</a>
	                </p>
                    </div>
                   
                </form>
            </div>
        </div>
    </div>

    
    
</body>

</html>
