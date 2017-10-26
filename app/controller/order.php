<?php

class order extends Controller
{
    public function commit($pid,$qty)
    {
        $con = dbutil::getInstance();
        date_default_timezone_set('Asia/Dhaka');
        $dte = date('Y-m-d H:i:s');
        $cid = $_SESSION['user_id'];
        $sql = "INSERT INTO `tbl_order` (`order_id`, `date_of_order`, `quantity`, `product_id`, `customer_id`,`status`) VALUES (NULL, '$dte', $qty, $pid,$cid,0 )";
        $res = $con->doQuery($sql);
        $sql = "DELETE FROM `tbl_shopping_cart` WHERE `tbl_shopping_cart`.`customer_id` = $cid AND `tbl_shopping_cart`.`product_id` = $pid ;";
        $res = $con->doQuery($sql);
        $_SESSION['cart_msg'] = "Placing Order Successfull.";
        $_SESSION['cart_dialog'] = 0;
        header("Location: ".Util::php_link('order/log'));
    }

    public function log()
    {
        require APP.'view/templates/header.php';
        require APP.'view/view.order_log.php';
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