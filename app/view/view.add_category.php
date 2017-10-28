<div class="container-fluid">
    <div class="row center-block">
        <h3>Add Category</h3>
        <p>Please enter new category. If you entered existing category it will be ignored.</p>
        <form action="<?php Util::link('admin/addCategory'); ?>" class="form-horizontal" method="POST">
            <div class="form-inline">
                <label for="cname">Category Name</label>
                <input type="text" minlength="2" name="cname" id="cname" class="form-control" required>
                <input type="submit"  name="submit" value="submit"  class="btn btn-success">
            </div>
        </form>
    </div>
</div>