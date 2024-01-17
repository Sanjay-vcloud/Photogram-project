<?php
require_once "includes/session.class.php";
require_once "includes/mic.class.php";
require_once "includes/database.class.php";
require_once "includes/user.class.php";

session::start();

function load_template($name)
{
//    include __DIR__."/../_templates/$name.php"; not consistent 
include $_SERVER['DOCUMENT_ROOT']."/app/_templates/$name.php";
}

function login_validation ($email,$password)
{
    if($email=='sanjay@gmail.com' and $password == 'sanjay@123')
    {
        echo "login_validation(true block)";
        return true;
    }
    else 
    {
        return false;
    }
}




