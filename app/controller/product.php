<?php

class product
{
    public function view($id)
    {

        $con = dbutil::getInstance();
        $res = $con->doQuery("SELECT * FROM `tbl_products` WHERE `tbl_products`.`product_id` = $id");
        $rows = $con->getAllRows();
        $pdct = $rows[0];
        $cat = Products::getCategoryById($id);
        $stock_staus = "STOCK AVAILABLE";
        $color = "green";
        if($pdct['stock_available'] == 0)
        {
            $stock_staus = "NO STOCK";
            $color = "red";
        }
        $min = 1;
        $max = $pdct['stock_available'];
        $field = "<input class=\"form-control\" type=\"number\" placeholder=\"Quantity\" step=\"1\" min=\"$min\" max=\"$max\" required>";
        require APP.'view/templates/header.php';
        echo '<div class="row">
                    <div class="col-md-5 product_img">
                        <img src="'.'http://localhost/osms/uploads/'.$pdct['product_image'].'" class="img-responsive center-block">
                    </div>';
        echo '<form action="http://localhost/osms/cart/add/'.$pdct['product_id'].'" method="post">
                    <div class="col-md-6 product_content">
                        <h3>Product Name: <span>'.$pdct['product_name'].'</span></h3>
                        <p style="font-weight:bold; color: '.$color.';">'.$stock_staus.'</p>
                        <h4>Category: <span>'.$cat.'</span></h4>
                        
                        <p><strong>Description: </strong>'.' '.$pdct['description'].'</p>
                        <p><strong>Features: </strong>'.' '.$pdct['features'].'</p>
                        <h3 class="cost"><span class="glyphicon">TK.</span>'.$pdct['price'].'</h3>
                        <div class="row">
                            <div class="col-md-3">
                                '.$field.'
                            </div>
                        </div>
                        <div class="space-ten"></div>
                        <div class="btn-ground">
                            <button type="submit" value="submit" name="addcart" class="btn btn-primary"><span class="glyphicon glyphicon-shopping-cart"></span> Add To Cart</button>
                          
                        </div>
                    </div>
                </div>';
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

    public function cat($cid)
    {
        require APP.'view/templates/header.php';
        require APP.'view/templates/footer.php';
    }
}

?>