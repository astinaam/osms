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
                for($i=0;$i<count($order);$i++)
                {
                    echo "<tr>";
                    ?>
                    <td>
                        <?php echo Products::getProductNameById($order['product_id']); ?>
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
                            if($status==1)
                            {
                                echo "Completed";
                            }
                            else
                            {
                                echo "Pending";
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