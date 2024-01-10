<?php

function load_template($name)
{
//    include __DIR__."/../_templates/$name.php"; not consistent 
include $_SERVER['DOCUMENT_ROOT']."/app/_templates/$name.php";
}
