<?php

    if (session_status() == PHP_SESSION_NONE)
    {
        session_start();
    }

    define("ENVIRONMENT",1);
    define('ROOT',__DIR__.'/../');
    define('APP',ROOT.'app/');

    if(ENVIRONMENT == 1)  //development environment
    {
        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL);
    }

    // including all the necessary files and classes
    include_once  ROOT.'db/dbutil.php';
    include_once ROOT.'config/config.php';
    include_once ROOT.'lib/util.php';
    include_once  APP.'core/App.php';
    include_once  APP.'core/Route.php';
    include_once APP.'core/Controller.php';
    include_once APP.'model/product.php';

    $app = new App();   //website starts

?>