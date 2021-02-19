<?php
    session_start();
    require "Php/database.php";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Approve Books</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="images/icon-white.png">
    <link rel="stylesheet" href="css/approve.css">
    <link rel="stylesheet" href="css/nav.css">
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

<div class="container">
     <h2 class="heading">Approve Books</h2>
     <form class="approve" method="POST" action="">

        <div class="form-row">
         <div class="form-group">
            <label style="color:white;">Approve (Yes/No):</label>
                <input type="text" class="form-control" placeholder="Yes or No" name="approval" required="">
        </div>       

        
        <div class="form-group">
            <label style="color:white;">Issue Date:</label>
                <input type="text" class="form-control" placeholder="Issue Date yyyy-mm-dd" name="issuedate" required="">
            </div>
        </div>

        <div class="form-group">
            <label id="yearofpub" style="color:white;">Return Date: <br></label>
            <input type="text" class="form-control" placeholder="Return Date yyyy-mm-dd" name="returndate" required="">            
        </div>
            
        <div class="form-group">
            <button type="submit" name="submit" class="btn btn-primary btn-block"> Approve </button>
        </div>
    </form>

</div>

</div>

<?php

if (isset($_POST['submit'])) {
    $expected = ['approval', 'issuedate', 'returndate'];
    $required = ['approval', 'issuedate', 'returndate'];

    require "Php/registerprocess.php";
}

if (array_key_exists('approval', $_POST)) {
    $theapproval = $_POST["approval"];
    $theissuedate = $_POST["issuedate"];
    $thereturndate = $_POST["returndate"];
    

    //connecting the database

    $dbConn = GetDB();
        //updating the issue books table
        mysqli_query($dbConn,"UPDATE `issued_books` SET `Approve`='{$_POST['approval']}',`Issued_Date`='{$_POST['issuedate']}',
        `Return_Date`='{$_POST['returndate']}' WHERE `Email Address`='{$_SESSION['Email']}' AND `Book ID` = '{$_SESSION['BookID']}';"); 

        //updating the books table
        mysqli_query($dbConn,"UPDATE `books` SET `Quantity`= `Quantity`-1 WHERE `Book ID`='{$_SESSION['BookID']}';");
        
        $res = mysqli_query($dbConn,"SELECT `Quantity` FROM `books` WHERE `Book ID`='{$_SESSION['BookID']}';");
        
        while($row=mysqli_fetch_assoc($res))
        {
            if($row[`Quantity`]==0)
            {
                mysqli_query($dbConn,"UPDATE `books` SET `Status`= 'Unavailable' WHERE `Book ID`='{$_SESSION['BookID']}';");
            }
        }
        echo "<script>alert('Updated Successfully');window.location.href='/Library%20System/Admin/reserved.php';</script>";
    }

?>





</body>

</html>
