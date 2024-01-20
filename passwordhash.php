<?php
// $time = microtime(true);
// $options = [
//     'cost' => 15,
// ];
// echo password_hash("rasmuslerdorf", PASSWORD_BCRYPT, $options);
// echo "\nTook " . (microtime(true) - $time) . ' sec';


// for verification

$hash = '$2y$10$.vGA1O9wmRjrwAVXD98HNOgsNpDczlqm3Jq7KnEd1rVAGv3Fykk1a';

if (password_verify('rasmuslerdorf', $hash)) {
    echo 'Password is valid!';
} else {
    echo 'Invalid password.';
}
