<?php

class payment extends Controller
{
    public function online($order_id)
    {
        require APP.'view/templates/header.php';
        echo '<div class="container-fluid">
    <div class="row center-block" style="width: 800px; border: 1px ridge ; padding: 20px;">
        <h2>Online Bkash Payment</h2>
        <p>Please Cash Out <span style="color: red;">'.Products::getCostByOrderId($order_id)."TK ".'</span>  to this Number +8801790078815.</p>
        <p>Please Insert the Transaction Number Here</p>
        <form action="'.Util::php_link('payment/transaction').'" method="post">
            <input class="form-control" type="text" name="transcation_number" id="tn" placeholder="Enter the transaction Number" required>
            <br>
            <button class="btn btn-success" value="tran" type="submit" name="tran">Submit</button>
        </form>
    </div>
</div>';

    }
    public  function  transaction()
    {
        require APP.'view/templates/header.php';
        if(isset($_POST['tran']))
        {

        }
        require APP.'view/templates/footer.php';
    }
}
?>