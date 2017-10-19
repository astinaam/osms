<?php

    define('HOST','localhost');
    define('USER','root');
    define('PASS','1234');
    define('DB_NAME','osms');
    define('URL_PUBLIC_FOLDER', 'res');
    define('URL_PROTOCOL', 'http://');
    define('URL_DOMAIN', $_SERVER['HTTP_HOST']);
    define('URL_SUB_FOLDER', str_replace(URL_PUBLIC_FOLDER, '', dirname($_SERVER['SCRIPT_NAME'])));
    define('URL', URL_PROTOCOL . URL_DOMAIN . URL_SUB_FOLDER);
    define('URL','http://localhost/osms/res');
?>