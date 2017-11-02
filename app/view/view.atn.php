<div class="container-fluid">
    <div class="row center-block" style="width: 800px; border: 1px ridge ; padding: 20px;">
        <h2>Add Transaction Number</h2>
        <p>Please Insert the Transaction Number Here</p>
        <form action="<?php Util::php_link('admin/atn'); ?>" method="post">
            <input class="form-control" type="text" name="tn" id="tn" placeholder="Enter the transaction Number" required>
            <br>
            <button class="btn btn-success" value="tran" type="submit" onclick="return confirm('Are you sure?');" name="tran">Submit</button>
        </form>
    </div>
</div>