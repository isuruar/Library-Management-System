<?php
    session_start();
    include "Php/database.php";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Profile</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="images/icon-white.png">
    <link rel="stylesheet" href="css/profile.css">
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
        <form action="" method="POST">
            <button class="btn btn-default" name="submit1" type="submit">Edit</button>
            <?php
            if(isset($_POST['submit1']))
            {
                header("Location: http://localhost/Library%20System/Admin/edit.php");
            }
            ?>
        </form>
            
        <div class="wrapper">
            <?php
                $dbConn = GetDB();
                $q=mysqli_query($dbConn,"SELECT * FROM `admin` WHERE `Email Address`='$_SESSION[login_user]';");
            ?>
            <h2 class="header">My Profile</h2>

            <?php
                 $row=mysqli_fetch_assoc($q);
                
            ?>

            <div style="text-align:center;">Welcome 
            <h4>
                <?php
                    // echo $_SESSION['login_user'];
                    echo '<span class="warning" style="color:white;">'.$_SESSION['login_user'].'</span>'; 
                    
                ?>
            </h4>
            <br>
            </div>
                <?php
                    echo "<table class='table table-dark'>";
                    echo "<tr>";
                        echo "<td style='color:#f39f18;'>";
                            echo "<b> Admin ID: </b>"; 
                        echo "</td>";

                        echo "<td>"; 
                            echo $row['Admin ID'];
                        echo "</td>";
                    echo "</tr>";
                    
                    
                    echo "<tr>";
                        echo "<td style='color:#f39f18;'>"; 
                            echo "<b> First Name: </b>"; 
                        echo "</td>";

                        echo "<td>"; 
                            echo $row['First Name'];
                        echo "</td>";
                    echo "</tr>";

                    echo "<tr>";
                        echo "<td style='color:#f39f18;'>"; 
                            echo "<b> Last Name: </b>"; 
                        echo "</td>";

                        echo "<td>"; 
                            echo $row['Last Name'];
                        echo "</td>";
                    echo "</tr>";

                    echo "<tr>";
                        echo "<td style='color:#f39f18;'>"; 
                            echo "<b> Email Address: </b>"; 
                        echo "</td>";

                        echo "<td>"; 
                            echo $row['Email Address'];
                        echo "</td>";
                    echo "</tr>";

                    echo "<tr>";
                        echo "<td style='color:#f39f18;'>"; 
                            echo "<b> Contact Number: </b>"; 
                        echo "</td>";

                        echo "<td>"; 
                            echo $row['Contact Number'];
                        echo "</td>";
                    echo "</tr>";

                    echo "</tr>";
                    echo "</table>";
                ?>            
        </div>
      
    </div>

</body>

</html>
