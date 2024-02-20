<?php

class user
{
  private $conn;
  private $username;
  private $id;

  public function __call($name, $arguments)
  {
    $property = preg_replace("/[^0-9a-zA-Z]/", "", substr($name, 3));
    $property = strtolower(preg_replace('/\B([A-Z])/', '_$1', $property));

    if (substr($name, 0, 3) == "get") {
      return $this->_get_data($property);
    } elseif (substr($name, 0, 3) == "set") {
      return $this->_set_data($property, $arguments[0]);
    }
  }


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
        return $row['username'];
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
      $sql = "SELECT `id`, `username` FROM `auth` WHERE `username` = '$this->username'";
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

  // Private method to set data in the database
  private function _set_data($column, $value)
  {
    try {
      $this->conn = Database::getConnection();
      if ($this->id == null) {
        throw new Exception('User ID not available.');
      }

      $updateSql = "UPDATE `users` SET `$column` = '$value' WHERE `id` = '$this->id'";
      if ($this->conn->query($updateSql) === FALSE) {
        throw new Exception("Connection failed: " . $this->conn->connect_error);
      } else {
        echo "<br>$column updated successfully";
      }
    } catch (Exception $e) {
      echo "Exception caught: " . $e->getMessage();
    }
  }

  // Private method to get data from the database
  private function _get_data($column)
  {
    try {
      $this->conn = Database::getConnection();
      if ($this->id == null) {
        throw new Exception('User ID not available.');
      }

      $getSql = "SELECT $column FROM users WHERE id = '$this->id'";
      $result = $this->conn->query($getSql);

      if ($result === FALSE) {
        throw new Exception("Failed: " . $this->conn->connect_error);
      }

      if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        return $row[$column];
      }
    } catch (Exception $e) {
      echo "Exception caught: " . $e->getMessage();
    }
  }

  // public function authentication()
  // {
  //     // TODO: Implement authentication logic
  // }

  // // Public methods using _set_data and _get_data for bio, avatar, dob
  // public function setBio($bio)
  // {
  //     return $this->_set_data('bio', $bio);
  // }

  // public function getBio()
  // {
  //     return $this->_get_data('bio');
  // }

  // public function setAvatar($link)
  // {
  //     return $this->_set_data('avatar', $link);
  // }

  // public function getAvatar()
  // {
  //     return $this->_get_data('avatar');
  // }

  // public function setDob($year, $month, $day)
  //   {
  //       if (checkdate($month, $day, $year)) { //checking data is valid
  //           return $this->_set_data('dob', "$year.$month.$day");
  //       } else {
  //           return false;
  //       }
  //   }


  // public function getDob()
  // {
  //     return $this->_get_data('dob');
  // }

}
