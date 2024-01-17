<pre>
<?php
session_start();
// setcookie("cookiename", "cookie_value", time() + (86400 * 30), "/");
include 'libs/load.php';

// echo "Server";
// print_r($_SERVER);
// echo "POST";
// print_r($_POST);
// echo "GET";
// print_r($_GET);
// echo "FILE";
// print_r($_FILES);
// echo "COOKIE";
// print_r($_COOKIE);

echo "_SESSION\n";
print_r($_SESSION); // presist across the request

if(isset($_GET['clear']))
{
    echo "clearing the session\n";
    session_unset();
}
if(isset($_SESSION['a']))
{
    echo "A already exist.. value of a: $_SESSION[a]\n";
}
else
{
    $_SESSION['a'] = time();
    echo "new valued assigned to a.. value of a: $_SESSION[a]\n";
}


?>
</pre>
