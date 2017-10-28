<div class="container-fluid">
    <div class="row center-block" style="width: 800px; border: 1px ridge ;">
                <table class="table table-striped table-bordered table-hover text-center table-centered"
                       style="margin-bottom: 0px !important; margin-left: 0px; margin-right: 0px !important;">
                    <thead>
                    <th>Product</th>
                    <th>Action</th>
                    <th>Action</th>
                    </thead>
                    <tbody>
                    <?php

                    $rows = Products::getProductsOutOfStock();
                    for ($i = 0; $i < count($rows); $i++) {
                        $curr_row = $rows[$i];
                        ?>
                        <tr>
                            <td>
                                <a href="<?php Util::link('product/view/'.$curr_row['product_id']); ?>">
                                    <?php echo $curr_row['product_name']; ?>
                                </a>
                            </td>
                            <td>
                                <a href="<?php Util::link('admin/updateView/'.$curr_row['product_id']); ?>"><button class="btn btn-info">Update</button></a>
                            </td>
                            <td>
                                <a href="<?php Util::link('admin/delete/'.$curr_row['product_id']); ?>"><button class="btn btn-danger">Delete</button></a>
                            </td>

                        </tr>
                        <?php

                    }
                    ?>
                    </tbody>
                </table>
    </div>
</div>