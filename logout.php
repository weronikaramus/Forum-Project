<?php
session_start();
include 'auth.php';

session_unset();

header('Location: login.php');

?>