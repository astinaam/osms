<?php
class Products
{
    public static function getCategory()
    {
        $con = dbutil::getInstance();
        $res = $con->doQuery("SELECT * FROM `tbl_category` ;");
        $rows = $con->getAllRows();
        $ret = array();
        for($i=0;$i<count($rows);$i++)
        {
            $ret[] = $rows[$i]['category_name'];
        }
        return $ret;
    }

    public static function getCategoryAndId()
    {
        $con = dbutil::getInstance();
        $res = $con->doQuery("SELECT * FROM `tbl_category` ;");
        $rows = $con->getAllRows();
        return $rows;
    }

    public static function getProductsByCategoryId($cid)
    {
        $con = dbutil::getInstance();
        $res = $con->doQuery("SELECT * FROM `tbl_products` WHERE `category_id` = $cid AND `stock_available` > 0 ;");
        return $con->getAllRows();
    }

    public static function getCategoryById($val)
    {
        $con = dbutil::getInstance();
        $res = $con->doQuery("SELECT * FROM `tbl_category` WHERE `category_id` = $val ;");
        $rows = $con->getTopRow();
        return $rows['category_name'];

    }
    public static function getCatId($val)
    {
        $con = dbutil::getInstance();
        $res = $con->doQuery("SELECT * FROM `tbl_category` WHERE `category_name` = '$val';");
        $rows = $con->getAllRows();
        return $rows[0]['category_id'];
    }
    public static function getProducts()
    {
        $con = dbutil::getInstance();
        $res = $con->doQuery("SELECT * FROM `tbl_products` WHERE `stock_available` > 0 ;");
        return $con->getAllRows();
    }
    public static function getProductsOutOfStock()
    {
        $con = dbutil::getInstance();
        $res = $con->doQuery("SELECT * FROM `tbl_products` WHERE `stock_available` = 0 ;");
        return $con->getAllRows();
    }
    public static function getProductNameById($id)
    {
        $con = dbutil::getInstance();
        $res = $con->doQuery("SELECT * FROM `tbl_products` WHERE `tbl_products`.`product_id` = $id ");
        return $con->getTopRow()['product_name'];
    }
    public static function getPriceById($id)
    {
        $con = dbutil::getInstance();
        $res = $con->doQuery("SELECT * FROM `tbl_products` WHERE `tbl_products`.`product_id` = $id ");
        return $con->getTopRow()['price'];
    }
    public static function getStockById($id)
    {
        $con = dbutil::getInstance();
        $res = $con->doQuery("SELECT * FROM `tbl_products` WHERE `tbl_products`.`product_id` = $id ");
        return $con->getTopRow()['stock_available'];
    }

    public static function getQty($cid,$pid)
    {
        $con = dbutil::getInstance();
        $res = $con->doQuery("SELECT * FROM `tbl_shopping_cart` WHERE `customer_id` = $cid AND `product_id` = $pid ;");
        if($con->getNumRows() > 0)
        {
            return $con->getTopRow()['quantity'];
        }
        else
        {
            return 0;
        }
    }
    public static function getCostByOrderId($oid)
    {
        $con = dbutil::getInstance();
        $res = $con->doQuery("SELECT * FROM `tbl_order` WHERE `order_id` = $oid ;");
        $row = $con->getTopRow();
        $t_cost = $row['quantity'] * Products::getPriceById($row['product_id']);
        return $t_cost;
    }

    public static function getCustomerDetailsById($id)
    {
        $con = dbutil::getInstance();
        $res = $con->doQuery("SELECT * FROM `tbl_customer` WHERE `customer_id` = $id ;");
        $row = $con->getTopRow();
        return $row;
    }

    public static function getCustomerNameById($id)
    {
        $con = dbutil::getInstance();
        $res = $con->doQuery("SELECT * FROM `tbl_customer` WHERE `customer_id` = $id ;");
        $row = $con->getTopRow();
        return $row['customer_name'];
    }
    public static function getProductIdByOrderId($id)
    {
        $con = dbutil::getInstance();
        $res = $con->doQuery("SELECT * FROM `tbl_order` WHERE `order_id` = $id ;");
        $row = $con->getTopRow();
        return $row['product_id'];
    }
    public static function getOrderDetailsById($id)
    {
        $con = dbutil::getInstance();
        $res = $con->doQuery("SELECT * FROM `tbl_order` WHERE `order_id` = $id ;");
        $row = $con->getTopRow();
        return $row;
    }
    public static function getPaymentIdByOrderId($id)
    {
        $con = dbutil::getInstance();
        $res = $con->doQuery("SELECT * FROM `tbl_payment` WHERE `order_id` = $id ;");
        $row = $con->getTopRow();
        return $row['payment_id'];
    }
    public static function getStatusOfPaymentById($id)
    {
        $con = dbutil::getInstance();
        $res = $con->doQuery("SELECT * FROM `tbl_payment` WHERE `payment_id` = $id ;");
        $row = $con->getTopRow();
        if($row['status'] == 1)
        {
            return 1;
        }
        else
        {
            return 0;
        }
    }
}
?>