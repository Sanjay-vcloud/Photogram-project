<?php

class user
{
    static function signup($user,$pass,$email,$phone)
    {
    $conn=database::getconnection();
    
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
}