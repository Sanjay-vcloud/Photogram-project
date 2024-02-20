<pre>
<?php
// session_start();
// setcookie("cookiename", "cookie_value", time() + (86400 * 30), "/");
// include 'libs/load.php';

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

// echo "_SESSION\n";
// print_r($_SESSION); // presist across the request

// database::getconnection();
// database::getconnection();
// database::getconnection();
// database::getconnection();

// $mic1 = new mic('frisky','red','10k');
// $mic1->display();
// $mic1->brand='sanjay';
// echo "\n".$mic1->brand."\n";
// $mic1->display();
$file_path = $_SERVER['DOCUMENT_ROOT'] . '/../photogramconfig.json';

if (file_exists($file_path)) {
    $__site_config = file_get_contents($file_path);
    echo "file exist";
} else {
    echo "File not found: $file_path";
}

?>
</pre> 
