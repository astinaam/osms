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
        require APP.'view/templates/header.php';
        echo '<div class="row">
                    <div class="col-md-5 product_img">
                        <img src="'.'http://localhost/osms/uploads/'.$pdct['product_image'].'" class="img-responsive">
                    </div>';
        echo '<form action="http://localhost/osms/cart/add" method="post">
                    <div class="col-md-6 product_content">
                        <h3>Product Name: <span>'.$pdct['product_name'].'</span></h3>
                        <h4>Category: <span>'.$cat.'</span></h4>
                        
                        <p><strong>Description: </strong>'.' '.$pdct['description'].'</p>
                        <p><strong>Features: </strong>'.' '.$pdct['features'].'</p>
                        <h3 class="cost"><span class="glyphicon">TK.</span>'.$pdct['price'].'</h3>
                        <div class="row">
                            <div class="col-md-4 col-sm-12">
                                <select class="form-control" name="qty" required>
                                    <option value="0" selected="">Quantity</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                    <option value="9">9</option>
                                    <option value="10">10</option>
                                    <option value="11">11</option>
                                    <option value="12">12</option>
                                    <option value="13">13</option>
                                    <option value="14">14</option>
                                    <option value="15">15</option>
                                    <option value="16">16</option>
                                    <option value="17">17</option>
                                    <option value="18">18</option>
                                    <option value="19">19</option>
                                    <option value="20">20</option>
                                </select>
                            </div>
                        </div>
                        <div class="space-ten"></div>
                        <div class="btn-ground">
                            <button type="submit" value="submit" name="addcart" class="btn btn-primary"><span class="glyphicon glyphicon-shopping-cart"></span> Add To Cart</button>
                          
                        </div>
                    </div>
                </div>';
        require APP.'view/templates/footer.php';
    }
}

?>