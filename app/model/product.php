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
    public static function getCategoryById($val)
    {
        $con = dbutil::getInstance();
        $res = $con->doQuery("SELECT * FROM `tbl_category` WHERE `category_id` = $val ;");
        $rows = $con->getAllRows();
        return $rows[0]['category_name'];

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
        $res = $con->doQuery("SELECT * FROM `tbl_products`");
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
}
?>