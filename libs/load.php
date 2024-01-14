<?php

function load_template($name)
{
//    include __DIR__."/../_templates/$name.php"; not consistent 
include $_SERVER['DOCUMENT_ROOT']."/app/_templates/$name.php";
}

function login_validation ($email,$password)
{
    if($email=='sanjay@gmail.com' and $password == 'sanjay@123')
    {
        echo "login_validation(true block)";
        return true;
    }
    else 
    {
        return false;
    }
}


function signup($user,$pass,$email,$phone)
{
$servername = "mysql.selfmade.ninja";
$username = "sanjay057";
$password = "sanjay@123";
$dbname = "sanjay057_photogram";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO `auth` (`username`, `password`, `email`, `phone`, `blocked`, `active`)
VALUES ('$user','$pass','$email','$phone','0', '1');";
if ($conn->query($sql) === TRUE) {
  $error = false;
} else {
  // echo "Error: " . $sql . "<br>" . $conn->error;
  $error = $conn->error;
}

$conn->close();
return $error;

}