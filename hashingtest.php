<?php
$pass = isset($_GET['pass']) ? $_GET['pass'] : 'random_string';
// $pass = "sanjay";
$hashing = md5(strrev(md5($pass)));
echo "The result of hashing is ". $hashing."\n";


$str = <<< END
Lorem ipsum, dolor sit amet consectetur adipisicing elit. Corrupti porro hic eveniet cum soluta nulla, voluptas in accusamus quis quibusdam corporis excepturi laudantium, fuga officia deserunt eos veritatis, dolor exercitationem!
END;
$md5 = md5($str);
echo "\nData length of here docs is ".strlen($str). " NO of words in str is " . str_word_count($str)."\n\n";
echo"\nMD5: $md5 (Length ".strlen($md5).")";


$base64 = base64_encode('Lorem ipsum, dolor sit amet consectetur adipisicing elit. Corrupti porro hic eveniet cum soluta nulla, voluptas in accusamus quis quibusdam corporis excepturi laudantium, fuga officia deserunt eos veritatis, dolor exercitationem!
');

echo"\nBASE64: $base64 (Length ".strlen($base64).")";



// $data = "hello";
// foreach (hash_algos() as $v) {

//         $r = hash($v, $data, false);

//         printf("%-12s %3d %s\n", $v, strlen($r), $r);

// }