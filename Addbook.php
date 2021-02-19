<?php
session_start();
$errors = [];
$missing = [];
$validationErrors = [];

if (isset($_POST['addbook'])) {
    $expected = ['title', 'author', 'yearofPublication', 'publisher', 'isbnNumber', 'category'];
    $required = ['title', 'author', 'yearofPublication', 'publisher', 'isbnNumber', 'category'];
    require "Php/registerprocess.php";
}
require "Php/database.php";
require "Php/validations.php";

if (array_key_exists('title', $_POST)) {
    $thetitle = $_POST["title"];
    $theauthor = $_POST["author"];
    $yearofpub = $_POST["yearofPublication"];
    $pblisher = $_POST["publisher"];
    $isbnno = $_POST["isbnNumber"];
    $ctegory = $_POST["category"];

    if(isset($_SESSION['login_user'])){
        $validationErrors = validatebook($thetitle, $theauthor, $yearofpub, $pblisher, $isbnno, $ctegory);

        //connecting the database and inserting data into the table
        if (!$validationErrors && !$errors) {
            $dbConn = GetDB();
            $sql = "INSERT INTO `books`(`Title`, `Author`, `Year of Publication`, `Publisher`, `ISBN Number`, `Category`) VALUES (?,?,?,?,?,?)";
            $statement = $dbConn->prepare($sql);
            if (!$statement) {
                echo 'Database did not connect';
            }
            $statement->bind_param("ssssss", $title, $author, $yearofpub, $pblisher, $isbnno, $ctegory);
            $statement->execute();
            echo "<script>alert('Book added successfully!');window.location.href='addbook.php';</script>";
        } 
    }
    else 
        {   
            echo "<script>alert('You need to log in first!');window.location.href='addbook.php';</script>";
        }
        
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <title>Add Book</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="images/icon-white.png">
    <link rel="stylesheet" href="css/addbook.css">
    <link rel="stylesheet" href="css/nav.css">


    <!-- Jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script>
        $(document).ready(function()
        {
            $("#addbook").click(function()
            {
                var yearofpub = $("#drYears");
                if(drYears.val() ==="")
                {
                    document.getElementById("yearofpub").innerHTML="Please select Year";
                    document.getElementById("yearofpub").style.color="red";
                }
            });
        });

    </script>

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

<body>

<?php
        require "Php/nav.php";     
?>

 <div class="container">
     <h2 class="heading">Add Books</h2>
     <form class="add-book" onsubmit="librarian.php" method="POST" action="<?= $_SERVER['PHP_SELF'];?>">

    <div class="form-row">
         <div class="col form-group padding-none col-md-5">

             <label style="color:white;">Title:
                    <?php
                    if (array_key_exists('title', $validationErrors)) {
                        echo '<span class="warning" style="color:#f39f18;">' . $validationErrors["title"] . '</span>';
                    }
                    ?>
                    </label>
                    <input type="text" class="form-control" placeholder="Title" name="title"
                    <?php
                    if ($errors || $missing || $validationErrors){
                        echo 'value="'. htmlentities($thetitle).'"';
                    }     
                    ?>
                    >

                        </div>
                        <div class="col form-group padding-none col-md-1">
                        </div>
                        <div class="col form-group padding-none col-md-6">
                            <label style="color:white;">Author:
                            <?php
                                if (array_key_exists('author', $validationErrors)) {
                                    echo '<span class="warning" style="color:#f39f18;">' . $validationErrors["author"] . '</span>';
                                }
                            ?>
                        
                        </label>
                            <input type="text" class="form-control" placeholder="Author" name="author"
                            <?php
                                if ($errors || $missing || $validationErrors){
                                    echo 'value="'. htmlentities($theauthor).'"';
                                }     
                            ?>
                            >
                        </div>
                    </div>
                    <div class="form-group">
                        <label id="yearofpub" style="color:white;">Year of Publication: <br></label>
                        <select name="yearofPublication" id="drYears">
                            <option>- Year -</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label style="color:white;">Publisher:
                        <?php
                            if (array_key_exists('publisher', $validationErrors)) {
                                echo '<span class="warning" style="color:#f39f18;">' . $validationErrors["publisher"] . '</span>';
                            }
                        ?>
                    </label>
                        <input class="form-control" type="text" placeholder="Publisher" name="publisher"
                        <?php
                            if ($errors || $missing || $validationErrors){
                                echo 'value="'. htmlentities($pblisher).'"';
                            }     
                        ?>
                        >
                    </div>
                    <div class="form-group">
                        <label style="color:white;">ISBN Number:
                        <?php
                            if (array_key_exists('isbn_number', $validationErrors)) {
                                echo '<span class="warning" style="color:#f39f18;">' . $validationErrors["isbn_number"] . '</span>';
                            }
                        ?>
                        </label>
                        <input class="form-control" type="text" placeholder="ISBN Number" name="isbnNumber"
                        <?php
                            if ($errors || $missing || $validationErrors){
                                echo 'value="'. htmlentities($isbnno).'"';
                            }     
                        ?>
                        >
                    </div>
                    <div class="form-group">
                        <label style="color:white;">Category:</label>
                        <select name="category">
                            <option>All Categories</option>
                            <?php
                            if ($missing){
                                echo 'value="'. htmlentities($ctegory).'"';
                            }     
                            ?>
                            <?php
                            if (array_key_exists('category', $validationErrors)) {
                                echo '<span class="warning" style="color:#f39f18;">' . $validationErrors["category"] . '</span>';
                            }
                            ?>
                            <option value="Romance">Romance</option>
                            <option value="Fiction">Fiction</option>
                            <option value="Non-Fiction">Non-Fiction</option>
                            <option value="Mystery">Mystery</option>
                            <option value="Novel">Novel</option>
                        </select>
                        
                    </div>
                    <div class="form-group">
                        <button type="submit" name="addbook" class="btn btn-primary btn-block"> Add Book </button>
                    </div>
                </form>

        </div>

<script>

        window.onload = function() {
            //Reference the DropDownList.
            var ddlYears = document.getElementById("drYears");

            //Determine the Current Year.
            var currentYear = (new Date()).getFullYear();

            //Loop and add the Year values to DropDownList.
            for (var i = currentYear; i >= 1850; i--) {
                var option = document.createElement("OPTION");
                option.innerHTML = i;
                option.value = i;
                ddlYears.appendChild(option);
            }
        };

    </script>
</body>

</html>
