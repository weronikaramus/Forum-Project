<?php
require_once 'db/auth.php';

    $conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname)
    or die('Błąd połączenia z serwerem: '.mysqli_error($conn));
    
    $username = $_POST['username']
    $email = $_POST['email'];
    $passwd = md5($_POST['passwd']);
    $conf_passwd = md5($_POST['conf_passwd']);



   

    $sql =  mysqli_query($conn, "INSERT INTO Users(username, email) VALUES ('".$username."','".$email."') + mysqli_query($conn,
    INSERT INTO Passwords(passwd) VALUES ('".$passwd."'); ");
?>

