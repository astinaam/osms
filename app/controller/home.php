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

            if(isset($_SESSION['cart_msg']) && isset($_SESSION['cart_dialog']))
            {
                if($_SESSION['cart_dialog'] == 0)
                {
                    $_SESSION['cart_dialog'] = 1;
                    Util::setNotification($_SESSION['cart_msg']);
                    Util::setNotificationBackground("green");
                    Util::js("notification();");
                }
            }

            require APP.'view/templates/footer.php';
        }

    }

?>