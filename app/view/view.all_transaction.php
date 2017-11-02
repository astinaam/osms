<div class="container-fluid">
    <div class="row center-block" style="width: 800px; border: 1px ridge ;">
        <ul class="nav nav-tabs nav-justified">
            <li class="active"><a data-toggle="tab" href="#active">Pending Payments</a></li>
            <li><a data-toggle="tab" href="#completed">Verified Payments</a></li>
        </ul>

        <div class="tab-content">
            <div id="active" class="tab-pane fade in active">
                <table class="table table-striped table-bordered table-hover text-center table-centered"
                       style="margin-bottom: 0px !important; margin-left: 0px; margin-right: 0px !important;">
                    <?php
                    $con = dbutil::getInstance();
                    $cid = $_SESSION['user_id'];
                    $sql = "SELECT * FROM `tbl_payment` WHERE `status` = 0 ORDER BY `payment_date` DESC ;";
                    $res = $con->doQuery($sql);
                    if($con->getNumRows() > 0)
                    {
                    ?>
                    <thead>
                    <th>Customer</th>
                    <th>Order ID</th>
                    <th>Time of Payment</th>
                    <th>Amount</th>
                    <th>Transaction Number</th>
                    </thead>
                    <tbody>
                    <?php

                    $rows = $con->getAllRows();
                    for ($i = 0; $i < count($rows); $i++) {
                        $curr_row = $rows[$i];
                        ?>
                        <tr>
                            <td>
                                <a href="<?php Util::link('customer/adminview/'.$curr_row['customer_id']); ?>">
                                    <?php echo Products::getCustomerNameById($curr_row['customer_id']); ?>
                                </a>
                            </td>
                            <td>
                                <a href="<?php Util::link('admin/order_details/'.$curr_row['order_id']); ?>">
                                    <?php echo $curr_row['order_id']; ?>
                                </a>
                            </td>
                            <td>
                                <?php echo $curr_row['payment_date']; ?>
                            </td>
                            <td>
                                <?php echo $curr_row['amount']; ?>
                            </td>
                            <td>
                                <?php echo $curr_row['bkash_transaction_No']; ?>
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
                    $sql = "SELECT * FROM `tbl_payment` WHERE `status` = 1 ORDER BY `payment_date` DESC  ;";
                    $res = $con->doQuery($sql);
                    if($con->getNumRows() > 0)
                    {
                    ?>
                    <thead>
                    <th>Customer</th>
                    <th>Order ID</th>
                    <th>Time of Payment</th>
                    <th>Amount</th>
                    <th>Transaction Number</th>
                    </thead>
                    <tbody>
                    <?php

                    $rows = $con->getAllRows();
                    for ($i = 0; $i < count($rows); $i++) {
                        $curr_row = $rows[$i];
//                        $t_cost = Products::getPriceById($curr_row['product_id']) * $curr_row['quantity'];
                        ?>
                        <tr>
                            <td>
                                <a href="<?php Util::link('customer/adminview/'.$curr_row['customer_id']); ?>">
                                    <?php echo Products::getCustomerNameById($curr_row['customer_id']); ?>
                                </a>
                            </td>
                            <td>
                                <a href="<?php Util::link('admin/order_details/'.$curr_row['order_id']); ?>">
                                    <?php echo $curr_row['order_id']; ?>
                                </a>
                            </td>
                            <td>
                                <?php echo $curr_row['payment_date']; ?>
                            </td>
                            <td>
                                <?php echo $curr_row['amount']; ?>
                            </td>
                            <td>
                                <?php echo $curr_row['bkash_transaction_No']; ?>
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