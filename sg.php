<pre>
<?php
// session_start();

// setcookie("cookiename", "cookie_value", time() + (86400 * 30), "/");
include 'libs/load.php';

echo "_SESSION\n";
print_r($_SESSION); // presist across the request
echo "Server";
print_r($_SERVER);
if(isset($_GET['clear']))
{
    echo "clearing the session\n";
    // session_unset();
    session::end();
}
$a ="a";
if(session::isset($a))
{
    echo "A already exist.. value of a:".session::get($a);
}
else
{
    // $_SESSION['a'] = time();
    session::set($a,time());
    echo "new valued assigned to a.. value of a: $_SESSION[a]\n";
}

if(isset($_GET['destroy']))
{
    session::destroy();
}

?>
</pre>
