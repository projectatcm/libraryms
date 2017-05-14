<?php
include 'libs/Dbconnection.php';
$email = $_POST['email'];
$password = $_POST['password'];
if($email == "" || $email == NULL)
{
    echo 'enter email id';
}
else if($password == "")
{
    alert("Enter password");
    
}

?>