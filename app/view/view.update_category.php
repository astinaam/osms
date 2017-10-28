<div class="container-fluid">
    <div class="row center-block">
        <h3>Edit Category</h3>
        <p>Select a category from the dropdown and give a new name of that category or delete it.</p>
        <?php
        $categorys = Products::getCategoryAndId();

        ?>
        <form class="form-horizontal" action="<?php Util::link('admin/editCategory'); ?>" method="POST">
            <div class="form-inline">
                <select class="form-control" name="clist" id="clist">
                    <?php

                        for($i=0;$i<count($categorys);$i++)
                        {
                            $category = $categorys[$i];
                            ?>
                            <option value="<?php echo $category['category_id']; ?>"><?php echo $category['category_name']; ?></option>
                            <?php
                        }
                    ?>
                </select>
                <input type="text" minlength="2" name="new_cat" placeholder="Enter New Category Name" class="form-control">
                <input type="submit" value="Update" name="submit" class="form-control btn btn-success">
                <input type="submit" value="Delete" name="delete" class="form-control btn btn-danger">
            </div>
        </form>
    </div>
</div>