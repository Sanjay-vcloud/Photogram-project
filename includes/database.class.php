<?php

class database
{
    public static $conn = null;

    static function getconnection()
    {
    try{
        if(database::$conn==null)
        {
        $servername = get_config("db_servername");
        $username = get_config("db_username");
        $password = get_config("db_password");
        $dbname = get_config("db_name");
        // echo $servername;
        // echo $username;
        // echo $password;
        // echo $dbname;
        
        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
          throw new Exception("Connection failed: " . $conn->connect_error);
        }else{
            database::$conn = $conn;
            // echo "establishing new connection\n";
            return database::$conn;
        }
    }else{
        // echo "establishing existing connection\n";
        return database::$conn;
    }
}
catch(Exception $e)
{
    echo "Exception Caugh : ".$e->getMessage();
}  
    }
}