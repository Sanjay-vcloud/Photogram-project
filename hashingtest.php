<?php
$pass = "sanjay";
$hashing = md5(strrev(md5($pass)));
echo "The result of hashing is ". $pass;


$data = "hello";



foreach (hash_algos() as $v) {

        $r = hash($v, $data, false);

        printf("%-12s %3d %s\n", $v, strlen($r), $r);

}