<?php

class database
{
    static $conn = null;

    static function getconnection()
    {
        if(database::$conn==null)
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
        }else{
            database::$conn = $conn;
            return database::$conn;
        }
    }else{
        return database::$conn;
    }
        
    }
}