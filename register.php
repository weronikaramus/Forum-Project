<?php
include 'auth.php';

    $conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname)
    or die('Błąd połączenia z serwerem: '.mysqli_error($conn));
    
    $username = $_POST['username'];
    $email = $_POST['email'];
    $passwd = md5($_POST['passwd']);
    $conf_passwd = md5($_POST['conf_passwd']);
    $date = date("Y-m-d");

    if($passwd != $conf_passwd) echo "Passwords must be the same!";
    else if(!$username) echo "Username must not be null!";
    else if(!$email) echo "Email must not be null!";
    else{
    $sql =  mysqli_query($conn, "INSERT INTO Users(username, email, date) VALUES ('".$username."','".$email."','".$date."')");

    $last_id = $conn->insert_id;
 
    $sql =  mysqli_query($conn, "INSERT INTO Passwords(passwd, id_user) VALUES ('".$passwd."', '".($last_id)."')");

    header('Location: login.php');
    }

?>

