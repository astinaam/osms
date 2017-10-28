<?php

class category extends Controller
{
    protected $category_id = null;
    protected $min_price = null;
    protected $max_price = null;
    protected $name = null;
    protected $searched = null;
    protected $con = null;
    protected $products = null;
    public function view($cid)
    {
        $this->category_id = $cid;
        $_SESSION['category_id'] = $cid;
        require APP.'view/templates/header.php';
        require APP.'view/view.search.cat.php';
        $this->search();
        require APP.'view/templates/footer.php';
    }
    public function search()
    {
        $this->con = dbutil::getInstance();
        if(isset($_POST['search']))
        {
            if(isset($_POST['name']))
            {
                $this->name = $this->con->secureInput($_POST['name']);
                $this->searched = 1;
            }
            if(isset($_POST['min_price']))
            {
                $this->min_price = $this->con->secureInput($_POST['min_price']);
                $this->searched = 1;
            }
            if(isset($_POST['max_price']))
            {
                $this->max_price = $this->con->secureInput($_POST['max_price']);
                $this->searched = 1;
            }
        }
        else
        {
            if(isset($_POST['name']))
            {
                $this->name = $this->con->secureInput($_POST['name']);
                $this->searched = 1;
            }
            if(isset($_POST['min_price']))
            {
                $this->min_price = $this->con->secureInput($_POST['min_price']);
                $this->searched = 1;
            }
            if(isset($_POST['max_price']))
            {
                $this->max_price = $this->con->secureInput($_POST['max_price']);
                $this->searched = 1;
            }
        }
        $this->getProducts();
        require APP.'view/view.category.php';
    }
    public function getProducts()
    {
        $price_min = 0;
        $price_max = 999999999999;
        $name = "";
        $cat_id = $_SESSION['category_id'];
        $conn = dbutil::getInstance();
        if($this->name != null) {
            $name = $this->name;
        }
        if($this->min_price != null){
            $price_min = $this->min_price;
        }
        if($this->max_price != null){
            $price_max = $this->max_price;
        }
        $sql = "SELECT * FROM `tbl_products` WHERE `category_id` = $cat_id AND `stock_available` > 0";
        $sql = $sql." AND `price` <= $price_max AND `price` >= $price_min";
        $sql = $sql." AND `product_name` LIKE '%".$name."%'";

        $res = $conn->noQuery($sql);
//        var_dump($res);
        if($conn->getNumRows() > 0)
        {
            $this->products = $conn->getAllRows();
        }
    }
}

?>