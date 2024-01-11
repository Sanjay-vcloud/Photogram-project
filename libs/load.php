<?php

function load_template($name)
{
//    include __DIR__."/../_templates/$name.php"; not consistent 
include $_SERVER['DOCUMENT_ROOT']."/app/_templates/$name.php";
}

function login_validation ($email,$password)
{
    echo "login_validation()";
    print $email;
    if($email=='sanjay@gmail.com' and $password == 'sanjay@123')
    {
        echo "login_validation(true block)";
        return true;
    }
    else 
    {
        echo "login_validation(false block)";
        return false;
    }
}