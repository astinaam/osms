<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
//
//    spl_autoload_register( function ($class_name)
//    {
//        if(file_exists('./app/core/'.$class_name.'.php'))
//        {
//            require_once ('./app/core/'.$class_name.'.php');
//        }
//        else if(file_exists('./app/controller/'.$class_name.'.php'))
//        {
//            require_once ('./app/controller/'.$class_name.'.php');
//        }
//        else if(file_exists('./app/model/'.$class_name.'.php'))
//        {
//            require_once ('./app/model/'.$class_name.'.php');
//        }
//        else if(file_exists('./app/view/'.$class_name.'.php'))
//        {
//            require_once ('./app/view/'.$class_name.'.php');
//        }
//        else if(file_exists('./db/'.$class_name.'.php'))
//        {
//            require_once ('./db/'.$class_name.'.php');
//        }
//    });

    define('ROOT',__DIR__.'/../');
    define('APP',ROOT.'app/');
//    echo APP;
    include_once  ROOT.'db/dbutil.php';

    include_once ROOT.'config/config.php';

    include_once  APP.'core/App.php';

    include_once  APP.'core/Route.php';

    include_once APP.'core/Controller.php';


    $app = new App();




//if(isset($_SERVER['QUERY_STRING']))
//{
//    $d = "osms/../app/view/view.login.php";
//    $q = $_SERVER['QUERY_STRING'];
//    var_dump($_POST);
//    var_dump($_GET);
//    $uri = $_SERVER['REQUEST_URI'];
//    $method = $_SERVER['REQUEST_METHOD'];
//    $u = explode("?",$uri);
//    $url = explode("=",$q);
//    var_dump($url);
//    var_dump($q);
//    var_dump($uri);
//    if($method == "GET")
//    {
//        $u = explode("?",$uri);
//    }
//    else if($method = "POST"){
//        foreach ($_POST as $key => $val)
//        {
//            $payloads[$key] = $val;
//        }
//    }
//    if($url[1] == 'login')
//    {
//        if(count($u) > 1)
//        {
//            $payload = explode("&",$u[1]);
//            var_dump($payload);
//            for($i =0; $i < count($payload) ; $i++)
//            {
//                $pod = explode("=",$payload[$i]);
//                echo $pod[0]." => ".$pod[1]."<br>";
//                $payloads[$pod[0]] = $pod[1];
//            }
//        }
//        else{
//            include_once __DIR__."/../app/view/view.login.php";
//        }
//        var_dump($payloads);
//        foreach ($payloads as $pays => $value)
//        {
//            echo $pays." = ".$value."<br>";
//        }
//    }
//    else if($url[1] == 'signup')
//    {
//        include_once __DIR__."/../app/view/view.signup.php";
//    }
//    else
//    {
//        include_once __DIR__."/../app/view/header.php";
//        include_once __DIR__."/../app/view/body.php";
//        include_once __DIR__."/../app/view/footer.php";
//    }
//}

?>