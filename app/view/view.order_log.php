<div class="container-fluid">
    <div class="row center-block" style="width: 800px; border: 1px ridge ;">
        <ul class="nav nav-tabs nav-justified">
            <li class="active"><a data-toggle="tab" href="#active">Active Orders</a></li>
            <li><a data-toggle="tab" href="#completed">Completed Orders</a></li>
        </ul>

        <div class="tab-content">
            <div id="active" class="tab-pane fade in active">
                <table class="table table-striped table-bordered table-hover text-center table-centered"
                       style="margin-bottom: 0px !important; margin-left: 0px; margin-right: 0px !important;">
                    <?php
                    $con = dbutil::getInstance();
                    $cid = $_SESSION['user_id'];
                    $sql = "SELECT * FROM `tbl_order` WHERE `customer_id` = $cid AND `status` = 0 ORDER BY `tbl_order`.`date_of_order` DESC ";
                    $res = $con->doQuery($sql);
                    if($con->getNumRows() > 0)
                    {
                    ?>
                    <thead>
                    <th>Product</th>
                    <th>Time</th>
                    <th>Cost</th>
                    <th>Action</th>
                    </thead>
                    <tbody>
                    <?php

                    $rows = $con->getAllRows();
                    for ($i = 0; $i < count($rows); $i++) {
                        $curr_row = $rows[$i];
                        $t_cost = Products::getPriceById($curr_row['product_id']) * $curr_row['quantity'];
                        ?>
                        <tr>
                            <td>
                                <a href="<?php Util::link('product/view/' . $curr_row['product_id']); ?>">
                                    <?php echo Products::getProductNameById($curr_row['product_id']); ?>
                                </a>
                            </td>
                            <td>
                                <?php echo $curr_row['date_of_order']; ?>
                            </td>
                            <td>
                                <?php echo $t_cost; ?>
                            </td>
                            <td>
                                <a href="<?php Util::link('payment/online/' . $curr_row['order_id']); ?>">
                                    <button class="btn btn-success">Pay Online</button>
                                </a>
                            </td>
                        </tr>
                        <?php
                    }
                    }
                ?>
                    </tbody>
                </table>
            </div>
            <div id="completed" class="tab-pane fade">
                <table class="table table-striped table-bordered table-hover text-center table-centered"
                       style="margin-bottom: 0px !important; margin-left: 0px; margin-right: 0px !important;">
                    <?php
                    $con = dbutil::getInstance();
                    $cid = $_SESSION['user_id'];
                    $sql = "SELECT * FROM `tbl_order` WHERE `customer_id` = $cid AND `status` = 1 ORDER BY `tbl_order`.`date_of_order` DESC ";
                    $res = $con->doQuery($sql);
                    if($con->getNumRows() > 0)
                    {
                    ?>
                    <thead>
                    <th>Product</th>
                    <th>Time</th>
                    <th>Cost</th>
                    </thead>
                    <tbody>
                    <?php

                    $rows = $con->getAllRows();
                    for ($i = 0; $i < count($rows); $i++) {
                        $curr_row = $rows[$i];
                        $t_cost = Products::getPriceById($curr_row['product_id']) * $curr_row['quantity'];
                        ?>
                        <tr>
                            <td>
                                <a href="<?php Util::link('product/view/' . $curr_row['product_id']); ?>">
                                    <?php echo Products::getProductNameById($curr_row['product_id']); ?>
                                </a>
                            </td>
                            <td>
                                <?php echo $curr_row['date_of_order']; ?>
                            </td>
                            <td>
                                <?php echo $t_cost; ?>
                            </td>
                        </tr>
                        <?php
                    }
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>