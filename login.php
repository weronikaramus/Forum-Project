<?php
include 'db/auth.php';
    $email = $_POST['email'];
    $passwd = $_POST['passwd']; 

    $sqll = "SELECT * FROM Users WHERE email='$email' ";

    

?>