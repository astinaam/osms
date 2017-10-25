<?php

class order extends Controller
{
    public function commit($pid,$qty)
    {
        $con = dbutil::getInstance();
        $dte = date('Y-m-d');
        $cid = $_SESSION['user_id'];
        $sql = "INSERT INTO `tbl_order` (`order_id`, `date_of_order`, `quantity`, `product_id`, `customer_id`) VALUES (NULL, '$dte', $qty, $pid,$cid )";
        $res = $con->doQuery($sql);

    }
}

?>