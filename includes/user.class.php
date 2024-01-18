<?php

class user
{
  private $conn;

    static function signup($user,$pass,$email,$phone)
    {
      $pass = md5($pass);
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

    public function __construct($user)
    {
      $this->conn = database::getconnection();
      $this->conn->query();
    }

    static function login_validation ($username,$password)
    {
        $password = md5($password);

      $conn = database::getconnection();

      $sql = "SELECT *
      FROM `auth`
      WHERE `username` = '$username' AND `password` = '$password'";
      $result = $conn->query($sql);
      if ($result->num_rows > 0) {
        // User is authenticated, you can proceed with further actions (e.g., set sessions)
          return true;
      } else {
        // Invalid credentials
       return false;
      }
    }
}