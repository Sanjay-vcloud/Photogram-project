<?php
$pass = isset($_GET['pass']) ? $_GET['pass'] : 'random_string';
// $pass = "sanjay";
$hashing = md5(strrev(md5($pass)));
echo "The result of hashing is ". $hashing;


$data = "hello";



// foreach (hash_algos() as $v) {

//         $r = hash($v, $data, false);

//         printf("%-12s %3d %s\n", $v, strlen($r), $r);

// }