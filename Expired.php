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
        <link rel="stylesheet" href="css/expired.css">
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
    <br>
    <h3 class="heading2">Expired Books List</h3>
    <div class="container1">
        <form action="" method="POST">
            <button class="btn btn default" name="submit2" type="submit" style="background-color:green;color:white;font-family:'Noto Sans TC',serif;" >RETURNED</button> &nbsp;
            <button class="btn btn default" name="submit3" type="submit" style="background-color:red;color:white;font-family:'Noto Sans TC',serif;">EXPIRED</button>
        </form>

    <div class="row search-bar">
        <?php
            if(isset($_SESSION['login_user']))
            {
            ?>
                
                <div class="container">
                
                <div class="search-container">
                    <form name="form1" method="POST" action="">
                        <h3 class="heading3">Insert member email and book ID to return book</h3>
                        <br>
                        <input type="text" placeholder="Member Email" name="emailaddress" value=""required="">
                        <br><br>
                        <input type="text" placeholder="Book ID" name="bookid" value="" required="">
                        <br><br>
                        <button class="btn btn default" name="submit" type="submit" >Submit</button>
                        <br><br>
                    </form>
                </div>
                </div>

            <?php
                $dbConn = GetDB();  
                if(isset($_POST['submit']))
                {
                    $res = mysqli_query($dbConn,"SELECT * FROM `issued_books` WHERE `Email Address` = '$_POST[emailaddress]' AND `Book ID` = '{$_POST['bookid']}';");
                    while($row=mysqli_fetch_assoc($res))
                    {
                        $d = strtotime($row['Return_Date']);
                        $c = strtotime(date("Y-m-d"));  
                        $diff = $c-$d;
                    
                        if($diff>=0)
                        {
                            $day = floor($diff/(60*60*24));
                            $fine = $day*.10;
                        }
                    }
            

                    $X = date("Y-m-d");
                    mysqli_query($dbConn,"INSERT INTO `fines` VALUES ('{$_POST['emailaddress']}','{$_POST['bookid']}','$X','$day','$fine','not paid');");
        

                    $var1 = '<p style="color:Yellow;b ackground-color:Green;">RETURNED</P>';
                    mysqli_query($dbConn,"UPDATE `issued_books` SET `Approve`='$var1' WHERE `Email Address`='{$_POST['emailaddress']}' AND `Book ID`='{$_POST['bookid']}'");
                    
                    mysqli_query($dbConn,"UPDATE `books` SET `Quantity`='Quantity'+1 WHERE `Book ID`='{$_POST['bookid']}'");
                }

            }
        ?>
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
        <span style="font-size:30px;cursor:pointer;color:white;" onclick="openNav()">&#9776; Open</span>

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

    <br><br>
    <?php
            $c=0;
            $dbConn = GetDB();  
            if(isset($_SESSION['login_user']))
            {
                $ret = '<p style="color:Yellow;background-color:Green;">RETURNED</P>';
                $exp = '<p style="color:Yellow;background-color:Red;">Expired</P>';

            if(isset($_POST['submit2']))
            {
                $sql = "SELECT `members`.`Email Address`,`Member ID`,`books`.`Book ID`,`Title`,`Author`,
                `Year of Publication`,`Approve`,`Issued_Date`,`Return_Date`FROM `members`INNER JOIN `issued_books`ON `members`.`Email Address`=
                `issued_books`.`Email Address`INNER JOIN `books`ON `issued_books`.`Book ID`=`books`.`Book ID` WHERE 
                `issued_books`.`Approve` = '$ret'
                ORDER BY `issued_books`.`Return_Date` DESC";
                $res = mysqli_query($dbConn,$sql);
            }
            else if(isset($_POST['submit3']))
            {
                $sql = "SELECT `members`.`Email Address`,`Member ID`,`books`.`Book ID`,`Title`,`Author`,
                `Year of Publication`,`Approve`,`Issued_Date`,`Return_Date`FROM `members`INNER JOIN `issued_books`ON `members`.`Email Address`=
                `issued_books`.`Email Address`INNER JOIN `books`ON `issued_books`.`Book ID`=`books`.`Book ID` WHERE 
                `issued_books`.`Approve` = '$exp'
                ORDER BY `issued_books`.`Return_Date` DESC";
                $res = mysqli_query($dbConn,$sql);
            }
            else{
                $sql = "SELECT `members`.`Email Address`,`Member ID`,`books`.`Book ID`,`Title`,`Author`,
                `Year of Publication`,`Approve`,`Issued_Date`,`Return_Date`FROM `members`INNER JOIN `issued_books`ON `members`.`Email Address`=
                `issued_books`.`Email Address`INNER JOIN `books`ON `issued_books`.`Book ID`=`books`.`Book ID` WHERE 
                `issued_books`.`Approve`!='' AND `issued_books`.`Approve` != 'Yes'
                ORDER BY `issued_books`.`Return_Date` DESC";
                $res = mysqli_query($dbConn,$sql);
            }
                
                    echo "<table class='table table-dark'>";
                    echo "<tr>";
                        echo "<th>"; echo "Member Email"; echo "</th>";
                        echo "<th>"; echo "Member ID"; echo "</th>";
                        echo "<th>"; echo "Book ID";echo "</th>";
                        echo "<th>"; echo "Book Title"; echo "</th>";
                        echo "<th>"; echo "Author Name"; echo "</th>";
                        echo "<th>"; echo "Year of Publication"; echo "</th>";
                        echo "<th>"; echo "Status"; echo "</th>";
                        echo "<th>"; echo "Issued Date"; echo "</th>";
                        echo "<th>"; echo "Return Date"; echo "</th>";
                        
                    echo "</tr>";
                    echo "</table>";

                    echo "<div class='scroll'>";
                    echo "<table class='table table-dark'>";
                    while($row=mysqli_fetch_assoc($res)){
                        
                        echo "<tr>";
                        echo "<td>"; echo $row['Email Address']; echo "</td>";
                        echo "<td>"; echo $row['Member ID']; echo "</td>";
                        echo "<td>"; echo $row['Book ID']; echo "</td>";
                        echo "<td>"; echo $row['Title']; echo "</td>";
                        echo "<td>"; echo $row['Author']; echo "</td>";
                        echo "<td>"; echo $row['Year of Publication']; echo "</td>";
                        echo "<td>"; echo $row['Approve']; echo "</td>";
                        echo "<td>"; echo $row['Issued_Date']; echo "</td>";
                        echo "<td>"; echo $row['Return_Date']; echo "</td>";
                        echo "</tr>";
                    }
                    echo "</table>";
                    echo "</div>";
                    }
                    else
                    {
                        echo "<span style=font-size:25px;font-weight:bold;padding:20px;padding-top:20px;color:white;>You need to login to view the information of borrowed books!</span>";
                    }
        
    ?>


    </body>

    </html>
