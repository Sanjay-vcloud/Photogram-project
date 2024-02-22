<?php

include 'libs/load.php';
$username = 'admin';
$password = isset($_GET['pass']) ? $_GET['pass'] : '';

if (isset($_GET['logout'])) {
    session::destroy();
    die("Session destroyed. Login again <br><br><a href='sessiontest.php'><button>login</button></a>");
}

if (session::isset('session_token')) {
    $agent = $_SERVER['HTTP_USER_AGENT'];
    $token = session::get('session_token');
    $sessionobj = new usersession($token);
    $db_agent = $sessionobj->getuseragent();

    if ($agent != $db_agent) {
        // Redirect to login page
        // header("Location: sessiontest.php");
        session::destroy();
        echo "user agent mismatch try to login";
        exit();
    }

    $result = $sessionobj->isvalid($token);
    $active = $sessionobj->getactive();
    $userobj = $sessionobj->getuser();

    if ($result && $active) {
        echo "Login successful " . $userobj->username;
    }
} else {
    echo "No session found, try to login now ";
    $token = usersession::authenticate($username, $password);
    if ($token) {
        echo "Login successful";
    } else {
        echo "Login failed";
    }
}

echo '<br><br><a href="sessiontest.php?logout"><button>Logout</button></a>';
