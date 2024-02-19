<?php

class user
{
  private $conn;
  private $username;
  private $id;

  static function signup($user, $pass, $email, $phone)
  {
    // $pass = sha1(strrev(md5($pass)));
    $pass = password_hash($pass, PASSWORD_DEFAULT);
    $conn = database::getconnection();
    try {
      $sql = "INSERT INTO `auth` (`username`, `password`, `email`, `phone`, `blocked`, `active`)
    VALUES ('$user','$pass','$email','$phone','0', '1');";
      if ($conn->query($sql) === TRUE) {
        $error = true;
      } else {
        // echo "Error: " . $sql . "<br>" . $conn->error;
        throw new Exception("connection failed " . $conn->connect_error);
      }
    } catch (Exception $e) {
      echo "exception caugh : " . $e->getMessage();
    }

    $conn->close();
    return $error;
  }

  static function login_validation($username, $password)
  {

    // $password = sha1(strrev(md5($password))); security through obscurity
    $conn = database::getconnection();
    $query = "SELECT * FROM `auth` WHERE `username` = '$username'";
    $result = $conn->query($query);
    if ($result->num_rows == 1) {
      $row = $result->fetch_assoc();
      // if($row['password']==$password)
      if (password_verify($password, $row['password'])) {
        return $row;
      } else {
        // Invalid credentials
        return false;
      }
    } else {
      return false;
    }
  }

  public function __construct($user)
  {
    try {
      $this->conn = Database::getConnection();
      $this->username = $user;
      $this->id = null;

      // TODO: Write the code to fetch user data from the database. Include the 'id' column in the SELECT statement.
      $sql = "SELECT `id`, `username` FROM `auth` WHERE `username` = '$user'";
      $result = $this->conn->query($sql);

      if ($result === FALSE) {
        throw new Exception("Failed: " . $this->conn->error);
      }

      if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $this->id = $row['id']; // Update from the database
      } else {
        throw new Exception("User not found.");
      }
    } catch (Exception $e) {
      echo "Exception caught: " . $e->getMessage();
    }
  }

  public function authentication() //function strubs
  {
  }

  public function setbio($bio)
  {
    try {
      //TODO : Write update command to update bio
      if($this->id==null)
      {
        throw new Exception('failed');
      }
      $updateSql = "UPDATE `users` SET `bio` = '$bio' WHERE `id` = '$this->id'";
      if ($this->conn->query($updateSql) === FALSE) {
        throw new Exception(" connection failed : " . $this->conn->connect_error);
      } else {
        echo "<br>Bio updated successful";
      }
    } catch (Exception $e) {
      echo "Exception catch : " . $e->getMessage();
    }
  }

  public function getbio()
  {
    try {
      if($this->id==null)
      {
        throw new Exception('failed');
      }
      //TODO : Write select command to fetch bio
      $getsql = "SELECT bio FROM users WHERE id = '$this->id'";
      if ($this->conn->query($getsql) === FALSE) {
        throw new Exception("Failed :" . $this->conn->connect_error);
      }
      $result = $this->conn->query($getsql);
      if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        echo "<br>BIO $row[bio]";
      }
    } catch (Exception $e) {
      echo "Exception catch: " . $e->getMessage();
    }
  }



  public function setAvatar($link)
  {
    try {
      if($this->id==null)
      {
        throw new Exception('failed');
      }
      //TODO : Write update command to update bio
      $updateSql = "UPDATE `users` SET `avatar` = '$link' WHERE `id` = '$this->id'";
      if ($this->conn->query($updateSql) === FALSE) {
        throw new Exception(" connection failed : " . $this->conn->connect_error);
      } else {
        echo "<br>avatar updated successful";
      }
    } catch (Exception $e) {
      echo "Exception catch : " . $e->getMessage();
    }
  }

  public function getAvatar()
  {
    try {
      if($this->id==null)
      {
        throw new Exception('failed');
      }
      //TODO : Write select command to fetch bio
      $getsql = "SELECT avatar FROM users WHERE id = '$this->id'";
      if ($this->conn->query($getsql) === FALSE) {
        throw new Exception("Failed :" . $this->conn->connect_error);
      }
      $result = $this->conn->query($getsql);
      if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        echo "<br>avatar $row[avatar]";
      }
    } catch (Exception $e) {
      echo "Exception catch: " . $e->getMessage();
    }
  }
  

  public function setdob($dob)
  {
    try {
      if($this->id==null)
      {
        throw new Exception('failed');
      }
      //TODO : Write update command to update bio
      $updateSql = "UPDATE `users` SET `dob` = '$dob' WHERE `id` = '$this->id'";
      if ($this->conn->query($updateSql) === FALSE) {
        throw new Exception(" connection failed : " . $this->conn->connect_error);
      } else {
        echo "<br>dob updated successful";
      }
    } catch (Exception $e) {
      echo "Exception catch : " . $e->getMessage();
    }
  }

  public function getdob()
  {
    try {
      if($this->id==null)
      {
        throw new Exception('failed');
      }
      //TODO : Write select command to fetch bio
      $getsql = "SELECT dob FROM users WHERE id = '$this->id'";
      if ($this->conn->query($getsql) === FALSE) {
        throw new Exception("Failed :" . $this->conn->connect_error);
      }
      $result = $this->conn->query($getsql);
      if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        echo "<br>dob: $row[dob]";
      }
    } catch (Exception $e) {
      echo "Exception catch: " . $e->getMessage();
    }
  }
}
