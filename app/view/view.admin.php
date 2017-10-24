<?php
    if(isset($_POST['submit']))
    {
//        echo "gerteh";
        $dt = DBUtil::getInstance();
        $pname = $_POST['pname'];
        $cat = $_POST['cat'];
//        var_dump($_POST);
//        var_dump($pname);
//        var_dump($cat);
        //echo $sql;
        $sql = "INSERT INTO `tbl_products` (`product_id`, `product_name`, `product_warranty`, `stock_available`, `price`, `category_id`, `discount_id`, `description`, `features`, `admin_id`) VALUES (NULL, '".$pname."', 'bcd', '100', '100', '".$cat."', '1', 'None', 'none', '1');";
        var_dump($sql);
        $re = $dt->doQuery($sql);
//        echo $sql;
    }
?>

<section class="row text-center">
    <div class="table-responsive table-bordered" style="padding: 10px;">
        <table class="table" style="margin-bottom: 0px !important;">
                <thead>
<!--                    <div class="col-md-3">-->
                        <th>Product Name</th>
<!--                    </div>-->
<!--                    <div class="col-md-3">-->
                        <th>Category</th>
<!--                    </div>-->
<!--                    <div class="col-md-3">-->
                        <th>Action</th>
<!--                    </div>-->
<!--                    <div class="col-md-3">-->
                        <th>Action</th>
<!--                    </div>-->
                </thead>


                <?php
                    $db = DBUtil::getInstance();
                    $res = $db->doQuery("SELECT * FROM tbl_products ;");
                    $ans = $db->getAllRows();
                    for($i=0;$i<count($ans);$i++)
                    {
                        $row = $ans[$i];
                        ?>

                <tr>
                    <?php
//                        echo "<div class=\"col-md-3\">";
                        echo "<td>".$row['product_name']."</td>";
//                        echo "</div>";
                        $cat = $row['category_id'];
                        $val;
                        if($cat == 1)
                        {
                            $val = "TV";
                        }
                        else if($cat == 2)
                        {
                            $val = "Fridge";
                        }
                        else if($cat == 3)
                        {
                            $val = "Fan";
                        }
                        else
                        {
                            $val = "Cooker";
                        }
                        //echo "<div class=\"col-md-3\">";
                        echo "<td>".$val."</td>";
                       // echo "</div>";
                        ?>
<!--                        <div class="col-md-3">-->
                            <td>
                            <button class="btn btn-info">Update</button>
                            </td>
<!--    </div>-->
<!--                        <div class="col-md-3">-->
                            <td>
                            <button class="btn btn-danger">Delete</button>
                            </td>
<!--    </div>-->
                </tr><?php
                    }
                ?>

                <tr>

                </tr>
        </table>
    </div>
    <br>
    <div class="row">
        <div class="col-md-3">
            <div class="area">
                <a href="<?php echo URL.'/admin/add' ?>"><button class="btn btn-success">Add Product</button></a>
            </div>
        </div>
        <div class="col-md-3">
            <div class="area">
                <a href=""><button class="btn btn-success">Add Category</button></a>
            </div>
        </div>
    </div>

</section>