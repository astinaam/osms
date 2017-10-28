<div class="row">
    <div class="col-md-3">
        <div class="area">
            <button data-toggle="modal" data-target="#add_product" class="btn btn-success">Add Product</button>
        </div>
    </div>
    <div class="col-md-3">
        <div class="area">
            <a href="<?php Util::link('admin/addCategory'); ?>"><button class="btn btn-success">Add Category</button></a>
        </div>
    </div>
</div>
<br>
<section class="row text-center">
    <div class="table-responsive table-bordered" style="padding: 10px;">
        <table class="table" style="margin-bottom: 0px !important;">
                <thead>
<!--                    <div class="col-md-3">-->
                        <th>Product ID</th>
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
                    $res = $db->doQuery("SELECT * FROM `tbl_products` ;");
                    $ans = $db->getAllRows();
                    for($i=0;$i<count($ans);$i++)
                    {

                        $row = $ans[$i];
                        $pid = $row['product_id'];
                        //var_dump($row);
                        ?>

                <tr>
                    <?php
//                        echo "<div class=\"col-md-3\">";
                        echo "<td>".$row['product_id']."</td>";
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
                                <a href="<?php Util::link('admin/updateView/'.$pid); ?>"><button class="btn btn-info">Update</button></a>
                            </td>
<!--    </div>-->
<!--                        <div class="col-md-3">-->
                            <td>
                                <a href="<?php Util::link("admin/delete/".$pid); ?>"><button class="btn btn-danger">Delete</button></a>
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
                <button data-toggle="modal" data-target="#add_product" class="btn btn-success">Add Product</button>
            </div>
        </div>
        <div class="col-md-3">
            <div class="area">
                <a href="<?php Util::link('admin/addCategory'); ?>"><button class="btn btn-success">Add Category</button></a>
            </div>
        </div>
    </div>
    <br><br><br><br>

</section>

<!--add product-->
<div class="modal fade product_view" id="add_product">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <a href="#" data-dismiss="modal" class="class pull-right"><span class="glyphicon glyphicon-remove"></span></a>
                <h3 class="modal-title">Add Product</h3>
            </div>
            <div class="modal-body">
                <div class="row">
                    <form action="http://localhost/osms/admin/add" class="form-horizontal" method="post" enctype="multipart/form-data">
                        <div class="col-md-6">
                                <div class="form-inline">
                                    <label class="control-label" for="pname">Product Name</label>
                                    <input class="form-control" type="text" name="pname" id="pname"
                                           placeholder="Product Name" required>
                                </div>
                            <br>
                            <?php $cats = Products::getCategory(); ?>
                            <div class="form-inline">
                                <label class="control-label" for="pcat">Category</label>
                                <select class="form-control" name="pcat" id="pcat">
                                        <?php
                                            for($i=0;$i<count($cats);$i++)
                                            {
                                                echo "<Option value='$cats[$i]'>".$cats[$i];
                                            }
                                        ?>
                                    </Option>
                                </select>
                            </div>
                            <br>
                            <div class="form-inline">
                                <label class="control-label" for="des">Description</label>
                                <textarea class="form-control" name="des" id="des"></textarea>
                            </div>
                            <br>
                            <div class="form-inline">
                                <label class="control-label" for="fet">Features</label>
                                <textarea class="form-control" name="fet" id="fet" required></textarea>
                            </div>
                            <br>
                            <div class="form-inline">
                                <label class="control-label" for="stock">Stock</label>
                                <input class="form-control" type="number" name="stock" id="stock" required>
                            </div>
                            <br>
                            <div class="form-inline">
                                <label class="control-label" for="war">Warranty</label>
                                <input class="form-control" type="text" name="war" id="war" required>
                            </div>
                            <br>

                        </div>
                        <div class="col-md-6">
                            <div class="form-inline">
                                <label class="control-label" for="price">Price</label>
                                <input class="form-control" type="number" name="price" id="price" required>
                            </div>
                            <br>
                            <div class="form-inline">
                                <label class="control-label" for="imagefile">Image</label>
                                <input class="form-control" type="file" name="imagefile" id="imagefile">
                            </div>
                            <br>
                            <div class="col-md-6 product_img" id="pimg">
                                <img src="" class="img-responsive">
                            </div>
                            <div class="status" id="status">
                                <p id="stext" style="color:green;"></p>
                            </div>
                        </div>
                        <div class="from-group" >
                            <button class="form-control col-md-4 btn btn-info" value="Add Product" type="submit" name="add_product">Add Product</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>