<?php
    session_start();
    require "Php/database.php";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Fine Calculations</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="images/icon-white.png">
    <link rel="stylesheet" href="css/member.css">
    <link rel="stylesheet" href="css/common.css">
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

<body class="body-override fine">

    <?php
        require "Php/nav.php";     
    ?>

    <div class="row search-bar">
        <div class="container">
            <div class="search-container">
                <form name="form1" method="POST" action="<?= $_SERVER['PHP_SELF'];?>">
                    <input type="text" placeholder="Search by email" name="inputsearch" value="">
                    <button id="searchbutton" name="search" type="submit"><i class="fa fa-search"></i></button>
                </form>
            </div>
            <span style=font-size:large></span>
        </div>
    </div>

    <div class="table-responsive">
        <h2 class="heading">List of Members</h2>

        <?php
            
            $dbConn = GetDB();
            if(isset($_POST['search']))
                {
                $sqlQuery = "";               
                $sqlQuery = "SELECT * FROM `fines` where `Email Address` like '%".$_POST['inputsearch']."%'";
            
                $q = mysqli_query($dbConn,$sqlQuery);
                if(mysqli_num_rows($q)==0){
                    echo "<span style=font-size:larger>Sorry! No members found. Try searching again</span>";
                }                                                                                                       
                
                else{
                    echo "<table class='table table-dark'>";
                        echo "<tr>";
                            echo "<th>"; echo "Email Address"; echo "</th>";
                            echo "<th>"; echo "Book ID"; echo "</th>";
                            echo "<th>"; echo "Return Date";echo "</th>";
                            echo "<th>"; echo "Days"; echo "</th>";
                            echo "<th>"; echo "Fine"; echo "</th>";
                            echo "<th>"; echo "Status"; echo "</th>";
                        echo "</tr>";
            
                    while($row=mysqli_fetch_assoc($q)){
                        echo "<tr>";
                        echo "<td>"; echo $row['Email Address']; echo "</td>";
                        echo "<td>"; echo $row['Book ID']; echo "</td>";
                        echo "<td>"; echo $row['Returned']; echo "</td>";
                        echo "<td>"; echo $row['Day']; echo "</td>";
                        echo "<td>"; echo $row['Fine']; echo "</td>";
                        echo "<td>"; echo $row['Status']; echo "</td>";
                        echo "</tr>";
                    }
                    echo "</table>";
                    }
                }
                    // if button is not pressed
                   else{
                   
                    $dbConn = GetDB();
                    $res = mysqli_query($dbConn,"SELECT * FROM `fines`;");
                        echo "<table class='table table-dark'>";
                        echo "<tr>";
                            echo "<th>"; echo "Email Address"; echo "</th>";
                            echo "<th>"; echo "Book ID"; echo "</th>";
                            echo "<th>"; echo "Return Date";echo "</th>";
                            echo "<th>"; echo "Days"; echo "</th>";
                            echo "<th>"; echo "Fine"; echo "</th>";
                            echo "<th>"; echo "Status"; echo "</th>";
                        echo "</tr>";
            
                    while($row=mysqli_fetch_assoc($res)){
                        echo "<tr>";
                        echo "<td>"; echo $row['Email Address']; echo "</td>";
                        echo "<td>"; echo $row['Book ID']; echo "</td>";
                        echo "<td>"; echo $row['Returned']; echo "</td>";
                        echo "<td>"; echo $row['Day']; echo "</td>";
                        echo "<td>"; echo $row['Fine']; echo "</td>";
                        echo "<td>"; echo $row['Status']; echo "</td>";
                        echo "</tr>";
                    }
                    echo "</table>";
                   }
        ?>

    </div>

    <!-- <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="col-md-3">
                    <div class="book-wrap">
                        <img class="book-image" src="photos/books/briefhistory.jpg">
                        <div class="book-content">
                            <h4>A Brief History of Time</h4>
                            <p><b>Author:</b> Stephen Hawking</p>
                            <p><b>ISBN:</b> 9781558001138</p>
                            <button>Reserve Book</button>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="book-wrap">
                        <img class="book-image" src="photos/books/handmaid.jpg">
                        <div class="book-content">
                            <h4>The Handmaid's Tale</h4>
                            <p><b>Author:</b>Margaret Atwood</p>
                            <p><b>ISBN:</b> 61556585145</p>
                            <button disabled>Reserve Book</button>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="book-wrap">
                        <img class="book-image" src="photos/books/21lessons.jpg">
                        <div class="book-content">
                            <h4>21 Lessons...</h4>
                            <p><b>Author:</b>Yuval Noah Harari</p>
                            <p><b>ISBN:</b> 0525512179</p>
                            <button>Reserve Book</button>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="book-wrap">
                        <img class="book-image" src="photos/books/badblood.jpg">
                        <div class="book-content">
                            <h4>Bad Blood</h4>
                            <p><b>Author:</b> John Carreyrou</p>
                            <p><b>ISBN:</b> 9781509868087</p>
                            <button>Reserve Book</button>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="book-wrap">
                        <img class="book-image" src="photos/books/rosieproject.jpg">
                        <div class="book-content">
                            <h4>The Rosie Project </h4>
                            <p><b>Author:</b> Graeme Simsion</p>
                            <p><b>ISBN:</b> 9781476729084</p>
                            <button>Reserve Book</button>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="book-wrap">
                        <img class="book-image" src="photos/books/shoedog.jpg">
                        <div class="book-content">
                            <h4>Shoe Dog</h4>
                            <p><b>Author:</b> Phil Knight</p>
                            <p><b>ISBN:</b> 9781501135910</p>
                            <button>Reserve Book</button>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="book-wrap">
                        <img class="book-image" src="photos/books/mindatplay.jpg">
                        <div class="book-content">
                            <h4>A Mind at Play</h4>
                            <p><b>Author:</b> Jimmy Soni, Rob Goodman</p>
                            <p><b>ISBN:</b> 9781476766683</p>
                            <button disabled>Reserve Book</button>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="book-wrap">
                        <img class="book-image" src="photos/books/gonegirl.jpg">
                        <div class="book-content">
                            <h4>Gone Girl</h4>
                            <p><b>Author:</b> Gillian Flynn</p>
                            <p><b>ISBN:</b> 9780385366755</p>
                            <button>Reserve Book</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    


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

    <!-- <script>
        //Sticky Navbar Script
        window.onscroll = function () { myFunction() };

        var navbar = document.getElementById("navbar");

        var sticky = navbar.offsetTop;

        function myFunction() {
            if (window.pageYOffset >= sticky) {
                navbar.classList.add("sticky")
            } else {
                navbar.classList.remove("sticky");
            }
        }
    </script> -->

</body>

</html>
