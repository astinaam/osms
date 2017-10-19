<?php
//    echo "home req";
    class Home extends Controller
    {
        public function index()
        {
            require APP.'view/templates/header.php';
            require APP.'view/templates/body.php';
            if(isset($_SESSION['user']) && !isset($_SESSION['lsn']))
            {
                Util::setNotification("Login Successful!");
                Util::setNotificationBackground("green");
                Util::js("notification();");
                $_SESSION['lsn'] = 1;  //login success notification for only one time
            }
            require APP.'view/templates/footer.php';
        }

    }

?>