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

    }


}

?>