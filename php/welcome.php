<?php
session_start();

include 'signUp.php';

echo $_SESSION['first'].", Your registration was successful!";


?>
