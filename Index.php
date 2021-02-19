<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Lowa State University</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="images/icon-white.png">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/nav.css">

    <!-- google fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@700&family=Noto+Sans+TC:wght@500&family=Staatliches&display=swap"rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@900&display=swap" rel="stylesheet">

    <!-- font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>
    
    <!-- <div class="jumbotron" id="video-container">
        <video id="main-video" loop="true" autoplay="true" muted="true" preload="true">
            <source src="videos/timelapse.mp4" type="video/mp4">
        </video>
        <div class="overlay">
            <h1 class="mainheading">Lowa State University</h1>
            <h3 class="online">Online Library</h3>
            <p>
                <?php
                // $date1 = new DateTime();

                // $sltime = new DateTimeZone('Asia/Colombo');

                // $date1->setTimezone($sltime);

                // echo '<span style="color: #f39f18; font-size: 18px;">'.$date1->format('l, F j, Y').'<br></span>';
                
            ?>
            </p>
        </div>
    </div> -->


    <div class="jumbotron text-center margin-none top-fix">
        <div class="layer"></div>
        <div class="jumbotron-ontop">
            <img class="logo-icon" src="images/icon-white.png">
            <h1>Lowa State University</h1>
            <h3 class="online">Online Library</h3>
            
            <?php
                $date1 = new DateTime();

                $sltime = new DateTimeZone('Asia/Colombo');

                $date1->setTimezone($sltime);

                echo '<span style="color: #f39f18; font-size: 18px;">'.$date1->format('l, F j, Y').'<br></span>';
                
            ?>
    </div>

    <?php
        require "Php/nav.php";     
    ?>
    
    <div class="infobar2">
        <div class="row">
            <div class="container2">STAY IN. STAY CONNECTED.</div>
            <div class="container3">Stay in, stay healthy, and stay connected with the help of Lowa State University Library.
                <br>Whatever you’re in the mood for, we’ve curated popular library resources as well as our favorite experiences from across the web that we think you’ll enjoy.</div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <img class="mySlides" src="photos/slider/1.jpg" style="width:100%">
            <img class="mySlides" src="photos/slider/2.jpg" style="width:100%">
            <img class="mySlides" src="photos/slider/3.jpg" style="width:100%">
            <img class="mySlides" src="photos/slider/4.jpg" style="width:100%">
            <img class="mySlides" src="photos/slider/5.jpg" style="width:100%">
            <img class="mySlides" src="photos/slider/6.jpg" style="width:100%">
            <img class="mySlides" src="photos/slider/7.jpg" style="width:100%">
            <img class="mySlides" src="photos/slider/8.jpg" style="width:100%">
            <img class="mySlides" src="photos/slider/9.jpg" style="width:100%">
            <img class="mySlides" src="photos/slider/10.jpg" style="width:100%">
            <img class="mySlides" src="photos/slider/11.jpg" style="width:100%">
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <h3 class="heading">Top Books</h3>
            <div class="col-md-3">
                <div class="book-wrap">
                    <img class="book-image" src="photos/books/girlonthetrain.jpg">
                    <div class="book-content">
                        <h4>Girl on the Train</h4>
                        <p><b>Author:</b> Paula Hawkins</p>
                        <p><b>ISBN:</b> 6159483145</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="book-wrap">
                    <img class="book-image" src="photos/books/atmosphere.jpg">
                    <div class="book-content">
                        <h4>Atmosphere of Hope</h4>
                        <p><b>Author:</b>Tim Flannery</p>
                        <p><b>ISBN:</b> 6159485242</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="book-wrap">
                    <img class="book-image" src="photos/books/davinci.jpg">
                    <div class="book-content">
                        <h4>The Da Vinci Code</h4>
                        <p><b>Author:</b>Dan Brown</p>
                        <p><b>ISBN:</b>6859445145 </p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="book-wrap">
                    <img class="book-image" src="photos/books/homodeus.jpg">
                    <div class="book-content">
                        <h4>Homo Deus</h4>
                        <p><b>Author:</b>Yuval Noah Harari</p>
                        <p><b>ISBN:</b> 6159485145</p>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

    <footer>
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
        <div class="footer-copyrights">©Copyrights ©<?php echo date("Y");?>. LOWA State University All Rights Reserved</div>
    </div>

    <script>
        //Image Slider Script
        var slideIndex = 0;
        carousel();

        function carousel() {
            var i;
            var x = document.getElementsByClassName("mySlides");
            for (i = 0; i < x.length; i++) {
                x[i].style.display = "none";
            }
            slideIndex++;
            if (slideIndex > x.length) { slideIndex = 1 }
            x[slideIndex - 1].style.display = "block";
            setTimeout(carousel, 4000); // Change image every 2 seconds
        }

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
