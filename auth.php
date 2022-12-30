<?php
    $dbhost = 'localhost';
    $dbuser = '21_ramus';
    $dbpass = 'G4a7j5s3d4';
    $dbname = '21_ramus';
    $conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname)
    or die('Bład połączenia z serwerem: '.mysqli_connect_error());
    
 ?>