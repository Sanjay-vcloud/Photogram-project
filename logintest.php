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
/** 
 * check if session_token is available
 * if yes construct usersession and see its successful
 * check the session is vaild one
 * if valid print session validated else ask user to login
 */
if(session::get('is_loggedin'))
{
    $userdata = session::get('user_session');
    $userobj = new user($result);
    echo "Welcome back ," . $userobj->getFirstname();
    $userobj->setBio('making new bio');
    echo $userobj->getBio();
}
else
{
    echo "no session is found,try to login now ";
    $result = user::login_validation($username,$password);
    $userobj = new user($result);

    if($result)
    {
        echo "<br> login success, ".$userobj->getFirstname();
        session::set('is_loggedin',true);
        session::set('user_session',$result);
    }
    else{
        echo "<br> login failed $username";
    }
}
?>
<br><br><a href="logintest.php?logout"><button>logout</button></a>