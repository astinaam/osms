<?php

class cart
{
    public function index()
    {
        require APP.'view/templates/header.php';
        if(isset($_SESSION['user']))
        {
            require APP.'view/view.cart.php';
        }
        else
        {
            $_SESSION['cart_msg'] = "Please login to add products to cart.";
            $_SESSION['cart_dialog'] = 0;
            header("Location: ".Util::php_link('login'));
        }
        require APP.'view/templates/footer.php';
    }
    public function add($pid)
    {
        if(!isset($_SESSION['user']))
        {
            //header("Location: ".Util::php_link('error_404/guest'));
            $_SESSION['cart_msg'] = "Please login to add products to cart.";
            $_SESSION['cart_dialog'] = 0;
            header("Location: ".Util::php_link('login'));
        }
        require APP.'view/templates/header.php';
        $cnt = 1;
        $qty = 1;
        if(isset($_POST['addcart']))
        {
            $cnt = $_POST['qty'];
            $qty = $cnt;
            if($cnt ==0)
                $cnt = 1;
        }

        $con = dbutil::getInstance();
        $dte = date('Y-m-d');

        $id = $_SESSION['user_id'];
        $price = Products::getPriceById($pid);
        $tprice = $cnt * $price;
        $pcnt = Products::getQty($id,$pid);
        $cnt = $pcnt + $cnt;
//        echo $dte;
//        echo $id."ss";
        //var_dump($_SESSION);
//        $sql = "INSERT INTO `tbl_order` (`order_id`, `date_of_order`, `total_price`, `customer_id`) VALUES (NULL, '$dte', $tprice,$id ); ";
//        echo $sql;
        $sql = "INSERT INTO `tbl_shopping_cart` (`quantity`, `customer_id`, `product_id`) VALUES ($cnt, $id, $pid) ON DUPLICATE KEY UPDATE `quantity` = $cnt ;";
        $res = $con->doQuery($sql);
        $stock = Products::getStockById($pid);
        $stock = $stock - $qty;
        $sql = "UPDATE `tbl_products` SET `stock_available` = $stock WHERE `tbl_products`.`product_id` = $pid;";
        $res = $con->doQuery($sql);
        $_SESSION['cart_msg'] = "Add to cart Successful. Please visit cart to see.";
        $_SESSION['cart_dialog'] = 0;
//        var_dump($_SESSION);
        header("Location: ".Util::php_link($_SESSION['prev_page']));
        require APP.'view/templates/footer.php';
    }
}