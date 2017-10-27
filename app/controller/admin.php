<?php

    class admin extends Controller
    {
        public function index()
        {
            if(isset($_SESSION['role']))
            {
                if($_SESSION['role'] == 'admin')
                {
                    require APP.'view/templates/admin_header.php';
                    require APP.'view/templates/admin_body.php';
                    require APP.'view/templates/admin_footer.php';
                }
                else
                {
                    header("Location: ".Util::php_link("error"));
                }
            }
            else{
                header("Location: ".Util::php_link("error"));
            }
        }

        public function category()
        {

        }

        public function edit()
        {
            if(isset($_SESSION['role']))
            {
                if($_SESSION['role'] == 'admin')
                {
                    require APP.'view/templates/admin_header.php';
                    require APP.'view/templates/admin_body.php';

                    require APP . 'view/view.admin_list.php';

                    require APP.'view/templates/admin_footer.php';
                }
                else
                {
                    header("Location: ".Util::php_link("error"));
                }
            }
            else{
                header("Location: ".Util::php_link("error"));
            }
        }

        public function delete($id)
        {
            Util::admin404();
            $sql = "DELETE FROM `tbl_products` WHERE `tbl_products`.`product_id` = $id";
            $con = dbutil::getInstance();
            $res = $con->doQuery($sql);
            header("Location: ".Util::php_link("admin/edit"));
        }

        public function updateView($id)
        {
            Util::admin404();
            require APP.'view/templates/admin_header.php';
            require APP.'view/templates/admin_body.php';
            $con = dbutil::getInstance();
            $res = $con->doQuery("SELECT * FROM `tbl_products` WHERE `tbl_products`.`product_id` = $id");

            $rowu = $con->getAllRows()[0];
            $pname = $rowu['product_name']; $pcat = $rowu['category_id']; $war = $rowu['product_warranty'];
            $stock = $rowu['stock_available']; $price = $rowu['price']; $des = $rowu['description']; $fet = $rowu['features'];
            $link = $rowu['product_image'];
            $cats = Products::getCategory();
            $scat = Products::getCategoryById($pcat);
            echo '<div class="row">
                    <form action="http://localhost/osms/admin/update" class="form-horizontal" method="post" enctype="multipart/form-data">
                        <div class="col-md-6">
                                <div class="form-inline">
                                    <label class="control-label" for="pname">Product Name</label>
                                    <input class="form-control" type="text" name="pname" id="pname"
                                           value="'.$pname.'" required>
                                </div>
                            <br>
                            <div class="form-inline">
                                <label class="control-label" for="pcat">Category</label>
                                <select class="form-control" name="pcat" id="pcat">';
            echo '<Option value="'.$scat.'">'.$scat.'</Option>';

            for($i=0;$i<count($cats);$i++)
            {
                echo "<Option value='$cats[$i]'>".$cats[$i]."</Option>";
            }

            echo '</select>
</div>
<br>
<div class="form-inline">
    <label class="control-label" for="des">Description</label>
    <textarea class="form-control" name="des" id="des">'.$des.'</textarea>
</div>
<br>';
            echo '<div class="form-inline">
    <label class="control-label" for="fet">Features</label>
    <textarea class="form-control" name="fet" id="fet" required>'.$fet.'</textarea>
</div>
<br>';
            echo '
<div class="form-inline">
    <label class="control-label" for="stock">Stock</label>
    <input class="form-control" type="number" value="'.$stock.'" name="stock" id="stock" required>
</div>
<br>';
            echo '
<div class="form-inline">
    <label class="control-label" for="war">Warranty</label>
    <input class="form-control" type="text" value="'.$war.'" name="war" id="war" required>
</div>
<br>

</div>';
            echo '
<div class="col-md-6">
    <div class="form-inline">
        <label class="control-label" for="price">Price</label>
        <input class="form-control" type="number" value="'.$price.'" name="price" id="price" required>
    </div>
    <br>';
            echo '
    <div class="form-inline">
        <label class="control-label" for="imagefile">Image</label>
        <input class="form-control" type="file" name="imagefile" id="imagefile">
    </div>
    <br>';
            echo '
    <div class="col-md-6 product_img" id="pimg">
        <img src="'.Util::php_link('uploads/'.$pname.'+'.$scat.'.jpg').'" class="img-responsive">
    </div>';
            echo '
    <div class="status" id="status">
        <p id="stext" style="color:green;"></p>
    </div>';
            echo '<input type="hidden" name="pid" value="'.$id.'">';
            echo '
</div>
<div class="from-group" >
    <button class="form-control col-md-4 btn btn-info" value="Update" type="submit" name="update">Update Product</button>
</div>
</form>
</div>';

            
            require APP.'view/templates/admin_footer.php';
        }

        public function update()
        {
            Util::admin404();
            require APP.'view/templates/admin_header.php';
            require APP.'view/templates/admin_body.php';

            if(isset($_POST['update']))
            {
                $pname = $_POST['pname'];
                $cat = $_POST['pcat'];
                $des = $_POST['des'];
                $fet = $_POST['fet'];
                $stock = $_POST['stock'];
                $war = $_POST['war'];
                $price = $_POST['price'];
                $dir = "/var/www/netbeans/osms/res/uploads/";
                $catid = Products::getCatId($cat);
                $con = dbutil::getInstance();

                $pid = $_POST['pid'];
                $tfile = $dir.$pname."+".$cat;
                $imageFileType = pathinfo(basename($_FILES["imagefile"]["name"]),PATHINFO_EXTENSION);
//                var_dump($_POST);
                $tfile = $tfile.'.'.$imageFileType;
                $link = $pname."+".$cat.'.'.$imageFileType;
                if (move_uploaded_file($_FILES["imagefile"]["tmp_name"], $tfile)) {
                    Util::log("Uploaded");
                } else {
                    Util::log("Not uploaded");
                }

                $sql = "UPDATE `tbl_products` SET `product_name` = '$pname', `product_warranty` = '$war', `stock_available` = $stock, `price` = $price,
 `category_id` = $catid, `description` = '$des', `features` = '$fet', `product_image` = '$link' WHERE `tbl_products`.`product_id` = $pid;";
                $res = $con->doQuery($sql);

            }

            require APP.'view/templates/admin_footer.php';
        }

        public function add()
        {
            Util::admin404();
            require APP.'view/templates/admin_header.php';
            require APP.'view/templates/admin_body.php';
            if(isset($_POST['add_product']))
            {
                $pname = $_POST['pname'];
                $cat = $_POST['pcat'];
                $des = $_POST['des'];
                $fet = $_POST['fet'];
                $stock = $_POST['stock'];
                $war = $_POST['war'];
                $price = $_POST['price'];
                $dir = "/var/www/netbeans/osms/res/uploads/";
                $tfile = $dir.$pname."+".$cat;
                $imageFileType = pathinfo(basename($_FILES["imagefile"]["name"]),PATHINFO_EXTENSION);
//                var_dump($_POST);
                $tfile = $tfile.'.'.$imageFileType;
                $link = $pname."+".$cat.'.'.$imageFileType;
//                var_dump($link);
                if (move_uploaded_file($_FILES["imagefile"]["tmp_name"], $tfile)) {
                    Util::log("Uploaded");
                } else {
                    Util::log("Not uploaded");
                }
                $catid = Products::getCatId($cat);
                $sql = "INSERT INTO `tbl_products` (`product_id`, `product_name`, `product_warranty`,
 `stock_available`, `price`, `category_id`, `discount_id`, `description`, `features`, `admin_id`, `product_image`) 
VALUES (NULL, '$pname', '$war', $stock, $price, $catid, NULL, '$des', '$fet', 1, '$link')";
                $con = dbutil::getInstance();
                $res = $con->doQuery($sql);
            }
            require APP.'view/templates/admin_footer.php';
        }

        public function aop()   //add offline payments
        {
            Util::admin404();
            require APP.'view/templates/admin_header.php';
            require APP.'view/templates/admin_body.php';
            require APP.'view/templates/admin_footer.php';
        }
        public function atn() //add transaction numbers that customers cashed out
        {
            Util::admin404();
            require APP.'view/templates/admin_header.php';
            require APP.'view/templates/admin_body.php';
            $con = dbutil::getInstance();
            if(isset($_POST['tran']))
            {
                $tran = $con->secureInput($_POST['tn']);
                $res = $con->doQuery("SELECT * FROM `tbl_transaction_numbers` WHERE `transaction_number` = '$tran' AND `status` = 0 ;");
                if($con->getNumRows() > 0)
                {
                    $_SESSION['cart_msg'] = "This transaction Number is Already Added.";
                    $_SESSION['cart_dialog'] = 0;
                }
                else
                {
                    $res = $con->doQuery("SELECT * FROM `tbl_transaction_numbers` WHERE `transaction_number` = '$tran' AND `status` = 1 ;");
                    if($con->getNumRows() > 0)
                    {
                        $_SESSION['cart_msg'] = "This transaction Number is Already Verified.";
                        $_SESSION['cart_dialog'] = 0;
                    }
                    else
                    {
                        $date_added = date('Y-m-d H:i:s');
                        $res = $con->doQuery("INSERT INTO `tbl_transaction_numbers` (`id`, `transaction_number`, `date_added`, `status` , `admin_id`) 
VALUES (NULL, '$tran', '$date_added',0, 1);");
                        $_SESSION['cart_msg'] = "Adding Successful.";
                        $_SESSION['cart_dialog'] = 0;
                    }
                }
            }
            require APP.'view/view.atn.php';

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
            require APP.'view/templates/admin_footer.php';
        }
        public function trans()
        {
            Util::admin404();
            require APP.'view/templates/admin_header.php';
            require APP.'view/templates/admin_body.php';
            require APP.'view/view.all_transaction.php';
            require APP.'view/templates/admin_footer.php';
        }
        public function verified()
        {
            Util::admin404();
            require APP.'view/templates/admin_header.php';
            require APP.'view/templates/admin_body.php';
            require APP.'view/templates/admin_footer.php';
        }
    }
?>