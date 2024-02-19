<?php

include 'libs/load.php';

$username = "admin";
// $password = "admin";
$password = isset($_GET['pass']) ? $_GET['pass'] : '';

// $result =user::login_validation($username,$password);

// if($result)
// {
//     echo "login successful $result[username]";
// }
// else
// {
//     echo "login fail";
// }
if(isset($_GET['logout']))
{
    session::destroy();
    die("Session destroyed Login again <br><br><a href='logintest.php'><button>login</button></a>");
}
$result = null;

if(session::get('is_loggedin'))
{
    $userdata = session::get('user_session');
    echo "Welcome back ," . $userdata['username'];
}
else
{
    echo "no session is found,try to login now ";
    $result = user::login_validation($username,$password);

    if($result)
    {
        echo "<br> login success, ".$result['username'];
        session::set('is_loggedin',true);
        session::set('user_session',$result);
    }
    else{
        echo "<br> login failed $username";
    }
}
?>
<br><br><a href="logintest.php?logout"><button>logout</button></a>