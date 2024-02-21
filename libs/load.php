<?php
require_once "includes/session.class.php";
require_once "includes/mic.class.php";
require_once "includes/database.class.php";
require_once "includes/user.class.php";

global $__site__config;
$__site_config = file_get_contents($_SERVER['DOCUMENT_ROOT'].'/../photogramconfig.json');


session::start();

function get_config($key, $default=null)
{
    global $__site_config;
    $array = json_decode($__site_config, true);
    if (isset($array[$key])) {
        return $array[$key];
    } else {
        return $default;
    }
}



function load_template($name)
{
//    include __DIR__."/../_templates/$name.php"; not consistent 
include $_SERVER['DOCUMENT_ROOT']."/photogram/_templates/$name.php";
}






