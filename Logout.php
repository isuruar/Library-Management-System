<?php
    session_start();
    unset($_SESSION["login_user"]);  
    echo "<script>alert('Logout Successful!');window.location.href='/Library%20System/Admin/index.php';</script>";
    // session_start();
    // if(isset($_SESSION['login_user']))
    // {
    //     unset($_SESSION['login_user']);
    // }
    // // echo "<script>window.location.href='/Library%20System/index.php';</script>";
    // header("location:http://localhost/Library%20System/index.php");
?>
