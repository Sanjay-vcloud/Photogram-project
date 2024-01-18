<?php
$pass = "sanjay";
$hashing = md5(strrev(md5($pass)));
echo "The result of hashing is ". $pass;