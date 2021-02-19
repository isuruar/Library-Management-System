<?php
    session_start();
    require "Php/database.php";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Books</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="images/icon-white.png">
    <link rel="stylesheet" href="css/books.css">
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

<body class="body-override books">

<?php
        require "Php/nav.php";     
?>

<div class="row search-bar">
        <div class="container">
            <div class="search-container">
                <form name="form1" method="POST" action="<?= $_SERVER['PHP_SELF'];?>">
                    <select name="selectcategory">
                        <option value="all">All Categories</option>
                        <option value="Romance">Romance</option>
                        <option value="Fiction">Fiction</option>
                        <option value="Non-Fiction">Non-Fiction</option>
                        <option value="Mystery">Mystery</option>
                        <option value="Novel">Novel</option>
                    </select>
                    <input type="text" placeholder="Search Books" name="inputsearch" value="">
                    <button id="searchbutton" name="search" type="submit"><i class="fa fa-search"></i></button>
                </form>
            </div>
            <span style=font-size:large></span>
        </div>
</div>

<div class="row search-bar2">
        <div class="container">
            <div class="search-container2">
                <form name="form1" method="POST" action="<?= $_SERVER['PHP_SELF'];?>">
                    <input type="text" placeholder="Enter Book ID to delete" name="bookid" value="" required="">
                    <button id="deletebutton" name="deletebook" type="submit" ><i class="fa fa-trash"></i>  Delete Book</button>
                </form>
            </div>
            <span style=font-size:large></span>
        </div>
</div>

<!-- Side Navigation -->
<div id="mySidenav" class="sidenav">
  <div class="h"><a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a></div>
  <div class="h"><a href="addbook.php">Add Books</a></div>
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
        <h2 class="heading">List of Books</h2>
        <?php
            require "Php/searchbooks.php";
        ?>
    </div>


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

    <script>
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
    </script>

</body>

</html>
