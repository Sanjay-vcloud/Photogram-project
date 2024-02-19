<?php

include 'libs/load.php';

// Assuming user class is defined in the 'libs/load.php' file
$username = 'admi';

try {
    $person1 = new user($username);
    $person1->setbio("nothings new nothing new");
    $person1->getbio(); // Optionally, retrieve and display the updated bio
    $person1->setAvatar("https://img.freepik.com/free-vector/businessman-character-avatar-isolated_24877-60111.jpg?size=338&ext=jpg&ga=GA1.1.1700460183.1708300800&semt=ais");
    $person1->setbio("nothings new nothing new");
    $person1->setdob('2004-07-17');
    $person1->getdob();
} catch (Exception $e) {
    echo "Exception caught: " . $e->getMessage();
}
