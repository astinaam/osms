<div class="container">
    <div class="row">
        <div class="table">
            <div class="table-responsive table-bordered" style="padding: 10px;">
                <thead>
                <div class="col-md-4">
                    <th>Product Name</th>
                </div>
                <div class="col-md-4">
                    <th>Category</th>
                </div>
                <div class="col-md-4">
                    <th>Action</th>
                </div>
                </thead>
                <form action="<?php echo URL.'admin' ?>" method="post" >
                    <tr>
                        <div class="col-md-4">
                            <td><input type="text" name="pname" placeholder="Product Name" required></td>
                        </div>
                    </tr>
                    <tr>
                        <div class="col-md-4">
                            <td><input type="text" name="cat" placeholder="Category ID" required></td>
                        </div>
                    </tr>
                    <tr>
                        <div class="col-md-4">
                            <td><input type="submit" name="submit"></td>
                        </div>
                    </tr>
                </form>
            </div>
        </div>
    </div>

</div>