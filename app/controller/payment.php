<?php

class payment extends Controller
{
    public function online($order_id)
    {
        Util::route404();
        require APP.'view/templates/header.php';
        $cost = Products::getCostByOrderId($order_id);
        echo '<div class="container-fluid">
    <div class="row center-block" style="width: 800px; border: 1px ridge ; padding: 20px;">
        <h2>Online Bkash Payment</h2>
        <p>Please Cash Out <span style="color: red;">'.$cost."TK ".'</span>  to this Number +8801790078815.</p>
        <p>Please Insert the Transaction Number Here</p>
        <form action="'.Util::php_link('payment/transaction').'" method="post">
            <input class="form-control" type="text" name="transcation_number" id="tn" placeholder="Enter the transaction Number" required>
            <br>
            <input type="hidden" name="cost" value="'.$cost.'">
            <input type="hidden" name="order_id" value="'.$order_id.'">
            <button class="btn btn-success" value="tran" type="submit" name="tran">Submit</button>
        </form>
    </div>
</div>';

    }
    public  function  transaction()
    {
        Util::route404();
        require APP.'view/templates/header.php';
        if(isset($_POST['tran']))
        {
            $transaction_number = $_POST['transcation_number'];
            $con = dbutil::getInstance();
            $oid = $_POST['order_id'];
            $cost = $_POST['cost'];
            $sql = "INSERT INTO `tbl_payment` (`payment_id`, `bkash_transaction_No`, `amount`, `order_id`, `admin_id`, `status`) 
VALUES (NULL, '$transaction_number', $cost , $oid, 1, 0)";
            $res = $con->doQuery($sql);

            $_SESSION['cart_msg'] = "Payment Added and is left to verify!";
            $_SESSION['cart_dialog'] = 0;
            header("Location: ".Util::php_link('payment/view'));
        }
        require APP.'view/templates/footer.php';
    }
    public function view()
    {

    }
}
?>