<div class="container-fluid">
    <div class="row center-block" style="width:800px;">
        <table class="table table-responsive table-bordered">
            <thead>
                <th>Product</th>
                <th>Date Of Order</th>
                <th>Quantity</th>
                <th>Status</th>
                <th>Action</th>
            </thead>
            <tbody>
            <?php
                $oid = $this->order_id;
                $order = Products::getOrderDetailsById($oid);
                //for($i=0;$i<count($order);$i++)
                {
                    echo "<tr>";
                    ?>
                    <td>
                        <a href="<?php Util::link('product/view/'.$order['product_id']); ?>">
                        <?php echo Products::getProductNameById($order['product_id']); ?>
                        </a>
                    </td>
                    <td>
                        <?php echo $order['date_of_order']; ?>
                    </td>
                    <td>
                        <?php echo $order['quantity']; ?>
                    </td>
                    <td>
                        <?php
                            $status = $order['status'];
                            $option = 0;
                            if($status==1)
                            {
                                $payment_id = Products::getPaymentIdByOrderId($oid);
                                $st = Products::getStatusOfPaymentById($payment_id);
                                if($st == 0)
                                {
                                    echo "<span style='color: darkred; font-weight: bold;'>Not Verified Payment</span>";
                                }
                                else
                                {
                                    echo "<span style='color: green; font-weight: bold;'>Completed</span>";
                                    $option = 1;
                                }
                            }
                            else
                            {
                                echo "<span style='color: blue; font-weight: bold;'>Pending</span>";
                            }
                        ?>
                    </td>
                    <td>
                        <?php
                            if($status == 0 || $option == 0)
                            {
                                ?>
                                <a href="<?php Util::link('admin/approve_offline/'.$oid); ?>"><button class="btn-success btn">Verify</button></a>
                        <?php
                            }
                        ?>
                    </td>
            <?php
                    echo "</tr>";
                }
            ?>
            </tbody>
        </table>
    </div>
</div>