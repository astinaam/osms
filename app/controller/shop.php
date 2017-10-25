<?php

class shop extends Controller
{
    public function index()
    {
        require APP.'view/templates/header.php';
        require APP.'view/view.shop.php';

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