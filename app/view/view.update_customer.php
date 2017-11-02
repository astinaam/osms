<div class="container-fluid">
    <div class="row center-block" style="width:800px;">
        <?php
            $customer = Products::getCustomerDetailsById($this->customer_id);
        ?>
        <form id="f1" action="<?php Util::link('customer/view/'.$this->customer_id); ?>" method="post">
            <h3 class="center-block text-center">Update Info</h3>
            <table class="table table-bordered table-responsive">
                <tbody>
                <tr>
                    <th style="padding: 10px;">Name</th>
                    <td style="padding: 10px;">
                        <input class="form-control" type="text" name="uname" value="<?php echo $customer['customer_name']; ?>">
                    </td>
                </tr>
                <tr>
                    <th style="padding: 10px;">Contact</th>
                    <td style="padding: 10px;">
                        <input class="form-control" type="text" name="umobile" value="<?php echo $customer['customer_phone']; ?>">
                    </td>
                </tr><tr>
                    <th style="padding: 10px;">Address</th>
                    <td style="padding: 10px;">
                        <input class="form-control" type="text" name="uaddress" value="<?php echo $customer['customer_address']; ?>">
                    </td>
                </tr>
                </tbody>
            </table>
            <input type="submit" name="uinfo" value="Update" class="form-control btn-info">
        </form>
    </div>
    <div class="row center-block" style="width:800px;">
        <form id="f2" action="<?php Util::link('customer/update/'.$this->customer_id); ?>" method="post">
            <h3 class="center-block text-center">Update Password</h3>
            <table class="table table-bordered table-responsive">
                <tbody>
                <tr>
                    <th style="padding: 10px;">Current Password</th>
                    <td style="padding: 10px;">
                        <input id="oldp" class="form-control" type="password" name="oldp" autocomplete="current-password" required">
                    </td>
                </tr>
                <tr>
                    <th style="padding: 10px;">New Password</th>
                    <td style="padding: 10px;">
                        <input id="newp" class="form-control" type="password" name="newp" minlength="3" required">
                    </td>
                </tr><tr>
                    <th style="padding: 10px;">Repeat New Password</th>
                    <td style="padding: 10px;">
                        <input id="newpr" class="form-control" type="password" name="newpr" minlength="3" required">
                    </td>
                </tr>
                </tbody>
            </table>
            <input type="submit" name="upass" value="Update" class="form-control btn-danger">
        </form>
    </div>
</div>