<?php

class session
{
    public static function start()
    {
        session_start();
    }

    public static function end()
    {
        session_unset();
    }

    public static function destroy()
    {
        session_destroy();
    }

    public static function set($key,$value)
    {
        $_SESSION[$key] = $value;
    }

    public static function delete($key)
    {
        unset($_SESSION[$key]);
    }
    
    public static function isset($key)
    {
        return isset($_SESSION[$key]);
    }

    public static function get($key,$defauld=false)
    {
        if(session::isset($key))
        {
        return $_SESSION[$key];
        }
        else
        {
            return $defauld;
        }
    }
}