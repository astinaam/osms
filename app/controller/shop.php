<?php

class shop extends Controller
{
    protected $category_id = null;
    protected $min_price = null;
    protected $max_price = null;
    protected $name = null;
    protected $searched = null;
    protected $con = null;
    protected $products = null;
    public function index()
    {
        require APP.'view/templates/header.php';
        require APP.'view/view.search.php';

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
        require APP.'view/view.search_shop.php';
    }

    public function getProducts()
    {
        $price_min = 0;
        $price_max = 999999999999;
        $name = "";
        if($this->name != null) {
            $name = $this->name;
        }
        if($this->min_price != null){
            $price_min = $this->min_price;
        }
        if($this->max_price != null){
            $price_max = $this->max_price;
        }
        $sql = "SELECT * FROM `tbl_products` WHERE `product_name` LIKE '%$name%' AND `price` <= $price_max AND `price` >= $price_min AND `stock_available` > 0 ";
        $res = $this->con->doQuery($sql);
        $this->products = $this->con->getAllRows();
    }
}

?>