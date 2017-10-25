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
}
?>