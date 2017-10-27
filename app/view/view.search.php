<div class="container-fluid">
    <div class="row center-block" style="width: 800px;">
        <form id="search_form" action="<?php Util::link('shop'); ?>" class="form-horizontal center-block" method="post">
            <div class="form-inline center-block">
                <input type="text" id="p_name" name="name" onkeyup="search_in_shop(this);" class="form-control" placeholder="Search By Product Name">
                <input type="number" id="pmin" onkeyup="search_in_shop(this);" class="form-control" name="min_price" placeholder="Minimum Price" >
                <input type="number" id="pmax" onkeyup="search_in_shop(this);" class="form-control" name="max_price" placeholder="Maximum Price" >
                <button type="submit" name="search" value="search" class="btn btn-success">Search</button>
            </div>
        </form>
    </div>
</div>