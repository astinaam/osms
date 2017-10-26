<?php

class Util
{
//    private static $s_instance;
//    public static function getInstance() {
//        if(!self::$s_instance) {
//            self::$s_instance = new self();
//        }
//        return self::$s_instance;
//    }

    public static function js($val)
    {
        echo "<script>".$val."</script>";
    }

    public static function log($val)
    {
        echo "<script>console.log('Notice:: ".$val."')</script>";
    }

    public  static function link($val)
    {
        echo URL.$val;
    }

    public  static  function  php_link($val)
    {
        return URL.$val;
    }

    public static function setNotificationBackground($val)
    {
        Util::js("document.getElementById('notification').style.backgroundColor='$val';");
    }
    public static function setNotification($val)
    {
        Util::js("document.getElementById('notification').innerHTML='$val';");

    }
    public static function route404()
    {
        if(!isset($_SESSION['user']))
        {
            header('Location: '.Util::php_link('error404'));
        }
    }

    public static function admin404()
    {
        if(!isset($_SESSION['user']))
        {
            header('Location: '.Util::php_link('error404'));
        }
        else
        {
            if($_SESSION['role'] != 'admin')
            {
                header('Location: '.Util::php_link('error404'));
            }
        }
    }
}

?>