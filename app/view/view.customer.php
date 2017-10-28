<div class="container-fluid">
    <div class="row center-block" style="width:800px;">
        <table class="table-bordered table-responsive">
            <tbody>
            <?php
                $customer = Products::getCustomerDetailsById($this->customer_id);
                ?>
            <tr>
                <th style="padding: 10px;">Name</th>
                <td style="padding: 10px;"><?php echo $customer['customer_name']; ?></td>
            </tr>
            <tr>
                <th style="padding: 10px;">Email</th>
                <td style="padding: 10px;"><?php echo $customer['customer_email']; ?></td>
            </tr><tr>
                <th style="padding: 10px;">Contact</th>
                <td style="padding: 10px;"><?php echo $customer['customer_phone']; ?></td>
            </tr><tr>
                <th style="padding: 10px;">Address</th>
                <td style="padding: 10px;"><?php echo $customer['customer_address']; ?></td>
            </tr>
            </tbody>
        </table>
    </div>
</div>