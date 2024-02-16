<?php

class user
{
  private $conn;

    static function signup($user,$pass,$email,$phone)
    {
      // $pass = sha1(strrev(md5($pass)));
      $pass = password_hash($pass,PASSWORD_DEFAULT);
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

    public function __construct($user)    //strub
    {
      $this->conn = database::getconnection();
      $this->conn->query();
    }

    static function login_validation ($username,$password)
    {
      
      // $password = sha1(strrev(md5($password))); security through obscurity
      $conn = database::getconnection();
      $query = "SELECT * FROM `auth` WHERE `username` = '$username'"; 
      $result = $conn->query($query);
      if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        // if($row['password']==$password)
        if(password_verify($password,$row['password']))
        {
          return $row;
        }
      else {
        // Invalid credentials
       return false;
      }
    }else
    {
      return false;
    }
    }

    public function authentication() //function strubs
    {

    }

    public function setbio()
    {

    }

    public function getbio()
    {

    }

    public function setAvatar()
    {

    }

    public function getAvatar()
    {

    }

}