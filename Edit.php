<?php
    session_start();
    include "Php/database.php";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Edit Profile</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="images/icon-white.png">
    <link rel="stylesheet" href="css/edit.css">
    <link rel="stylesheet" href="css/common.css">
    <link rel="stylesheet" href="css/nav.css">

    <!-- google fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@700&family=Noto+Sans+TC:wght@500&family=Staatliches&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@900&display=swap" rel="stylesheet">
    <!-- google fonts -->

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body class="body-override profile">

    <?php
    include "Php/nav.php";
    ?>

    <div class="container">
        <form action="" method="">
            
            <?php
            if(isset($_POST['submit1']))
            {
                header("Location: http://localhost/Library%20System/Admin/edit.php");
            }
            ?>
        
            
        <div class="wrapper">
            <h2 class="header">Edit Profile</h2>
            <?php
                $dbConn = GetDB();
                $sql = "SELECT * FROM `admin` WHERE `Email Address`='$_SESSION[login_user]';";
                $result = mysqli_query($dbConn,$sql);
                
                while($row=mysqli_fetch_assoc($result))
                {
                    $first = $row['First Name'];
                    $last = $row['Last Name'];
                    $email = $row['Email Address'];
                    $contactno = $row['Contact Number'];
                    $password = $row['Password'];
                }
            ?>

            <div class="editprofile">

            <label style="color:white;">First Name:</label>
            <input type="text" class="form-control" placeholder="First Name" name="firstname" value="<?php 
                echo $first;?>">
            <br>
            <label style="color:white;">Last Name:</label>
            <input type="text" class="form-control" placeholder="Last Name" name="lastname" value="<?php 
                echo $last;?>">
            <br>
            <label style="color:white;">Email Address:</label>
            <input type="text" class="form-control" placeholder="Email Address" name="emailaddress" value="<?php 
                echo $email;?>">
            <br>
            <label style="color:white;">Contact Number:</label>
            <input type="text" class="form-control" placeholder="Contact Number" name="contactno" value="<?php 
                echo  $contactno;?>">
            <br>
            <label style="color:white;">Password:</label>
            <input type="text" class="form-control" placeholder="Password" name="password" value="<?php 
                echo $password;?>">
            <br>
            <button class="btn btn-default" name="save" type="submit">Save</button>
            </div>
        </div>
        </form>
    </div>
    <?php 
        $dbConn = GetDB();
        if(isset($_POST['save']))
        {
            $first = $_POST['First Name'];
            $last = $_POST['Last Name'];
            $email = $_POST['Email Address'];
            $contactno = $_POST['Contact Number'];
            $password = $_POST['Password'];

            $sql1 = "UPDATE `admin` SET `First Name`= '$first',`Last Name`='$last',`Email Address`='$email',`Contact Number`= '$contactno',
            `Password`= '$password' WHERE `Email Address`='".$_SESSION['login_user']."'";

            if(mysqli_query($dbConn,$sql1))
            {
                echo "<script>alert('Saved successfully!');window.location.href='edit.php';</script>";
            }


        }

    ?>


</body>

</html>
