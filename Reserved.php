<?php
    session_start();
    require "Php/database.php";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Reserved Books</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="images/icon-white.png">
    <link rel="stylesheet" href="css/reserved.css">
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

<h3 class="heading2">Information of Reserved Books</h3>

<div class="row search-bar">
        <div class="container">
            <div class="search-container">
                <form name="form1" method="POST" action="">
                    <h4>Enter Member Email and Book ID to approve book</h4>
                    <input type="text" placeholder="Member Email" name="emailaddress" value=""required="">
                    <br><br>
                    <input type="text" placeholder="Book ID" name="bookid" value="" required="">
                    <br><br>
                    <button class="btn btn default" name="submit" type="submit" >Submit</button>
                </form>
            
            </div>
            
        </div>
</div>
</div>


<!-- sidenavbar -->
<div id="mySidenav" class="sidenav">
    <div class="h"><a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a></div>
    <div class="h"><a href="books.php">Books</a></div>
    <div class="h"><a href="reserved.php">Reserved Books</a></div>
    <div class="h"><a href="issue_info.php">Issue Information</a></div>
    <div class="h"><a href="expired.php">Expired List</a></div>
</div>

<div id="main">
    <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; Open</span>

<script>
    function openNav() {
    document.getElementById("mySidenav").style.width = "430px";
    document.getElementById("main").style.marginLeft = "430px";
    document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
}

function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
    document.getElementById("main").style.marginLeft= "0";
    document.body.style.backgroundColor = "white";
}

</script>

    <div class="table-responsive">
        <h2 class="heading">Reserved Books</h2>
        
        <?php
             $dbConn = GetDB();  
             if(isset($_SESSION['login_user']))
             {
                 $sqlQuery = "";  
                 
                 $sqlQuery = "SELECT `members`.`Email Address`,`Member ID`,`books`.`Book ID`,`Title`,`Author`,`Year of Publication`,
                 `Status` FROM `members` INNER JOIN `issued_books`ON `members`.`Email Address`=`issued_books`.
                 `Email Address`INNER JOIN `books`ON `issued_books`.`Book ID`=`books`.`Book ID` WHERE 
                 `issued_books`.`Approve`=''";

                 $res = mysqli_query($dbConn,$sqlQuery);

                 if(mysqli_num_rows($res)==0){
                    echo "<span style=font-size:25px;font-weight:bold;padding:20px;padding-top:20px;>No pending requests!</span>";
                 }

                else{
                    echo "<table class='table table-dark'>";
                    echo "<tr>";
                        echo "<th>"; echo "Member Email"; echo "</th>";
                        echo "<th>"; echo "Member ID"; echo "</th>";
                        echo "<th>"; echo "Book ID";echo "</th>";
                        echo "<th>"; echo "Book Title"; echo "</th>";
                        echo "<th>"; echo "Author Name"; echo "</th>";
                        echo "<th>"; echo "Year of Publication"; echo "</th>";
                        echo "<th>"; echo "Status"; echo "</th>";
                        
                    echo "</tr>";
                     }
                    while($row=mysqli_fetch_assoc($res)){
                        echo "<tr>";
                        echo "<td>"; echo $row['Email Address']; echo "</td>";
                        echo "<td>"; echo $row['Member ID']; echo "</td>";
                        echo "<td>"; echo $row['Book ID']; echo "</td>";
                        echo "<td>"; echo $row['Title']; echo "</td>";
                        echo "<td>"; echo $row['Author']; echo "</td>";
                        echo "<td>"; echo $row['Year of Publication']; echo "</td>";
                        echo "<td>"; echo $row['Status']; echo "</td>";
                        echo "</tr>";
                    }
                    echo "</table>";  
                    }
                else
                {
                    echo "<span style=font-size:25px;font-weight:bold;padding:20px;padding-top:20px;>You need to login to view the requests!</span>";
                }
                
                if(isset($_POST['submit']))
                {
                    $_SESSION['Email'] = $_POST['emailaddress'];                 
                    $_SESSION['BookID'] = $_POST['bookid'];

                    echo "<script>alert('Submitted successfully!');window.location.href='approve.php';</script>";
                }
            
        ?>
    
    </div>
</div>


    <!-- <footer>
        <div class="container">
            <div class="footer-logo">
                <img src="images/logo.jpeg">
            </div>
            <div class="footer-content">
                <p><b>Address:</b> LOWA State University, Ames, IA 50011, United States</p>
                <p><b>Phone:</b>+1 515-294-4111</p>
                <a href="mailto:info@lowastateuniversity.com">info@lowastateuniversity.com</a>
            </div>
            <div class="footer-socialmedia">
                <a href="#" class="fa fa-facebook"></a>
                <a href="#" class="fa fa-twitter"></a>
                <a href="#" class="fa fa-instagram"></a>
                <a href="#" class="fa fa-linkedin"></a>
            </div>
        </div>
    </footer>

    <div class="row">
        <div class="footer-copyrights">© Copyrights 2020. LOWA State University All Rights Reserved</div>
    </div> -->

    <script>
        // window.onscroll = function () { myFunction() };

        // var navbar = document.getElementById("navbar");

        // var sticky = navbar.offsetTop;

        // function myFunction() {
        //     if (window.pageYOffset >= sticky) {
        //         navbar.classList.add("sticky")
        //     } else {
        //         navbar.classList.remove("sticky");
        //     }
        // }
    </script>

</body>

</html>
