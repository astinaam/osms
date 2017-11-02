<div class="container-fluid">
    <div class="row">
        <nav class="col-sm-3 col-md-2 hidden-xs bg-faded sidebar">
            <ul class="nav nav-pills flex-column">
                <li class="nav-item" id="1" onclick="makeActive(this);">
                    <a href="http://localhost/osms/admin/edit" class="navlink">Edit Products</a>
                </li>
            </ul><ul class="nav nav-pills flex-column">
                <li class="nav-item" id="2" onclick="makeActive(this);">
                    <a href="<?php Util::link('admin/editCategory'); ?>" class="navlink">Edit Category</a>
                </li>
            </ul>
            <ul class="nav nav-pills flex-column">
                <li class="nav-item" id="3" onclick="makeActive(this);">
                    <a href="<?php Util::link('admin/out_of_stock'); ?>" class="navlink">Out of Stock</a>
                </li>
            </ul>
<!--            <ul class="nav nav-pills flex-column">-->
<!--                <li class="nav-item" id="4" onclick="makeActive(this);">-->
<!--                    <a href="#" class="navlink">Manage Delivery</a>-->
<!--                </li>-->
<!--            </ul>-->

<!--            <ul class="nav nav-pills flex-column">-->
<!--                <li class="nav-item" id="3" onclick="makeActive(this);">-->
<!--                    <a href="--><?php //Util::link('admin/aop'); ?><!--" class="navlink">Add Offline Payments</a>-->
<!--                </li>-->
<!--            </ul>-->

            <ul class="nav nav-pills flex-column">
                <li class="nav-item" id="4" onclick="makeActive(this);">
                    <a href="<?php Util::link('admin/trans'); ?>" class="navlink">All Payments</a>
                </li>
            </ul>


            <ul class="nav nav-pills flex-column">
                <li class="nav-item" id="5" onclick="makeActive(this);">
                    <a href="<?php Util::link('admin/atn'); ?>" class="navlink">Add Transaction Numbers</a>
                </li>
            </ul>
            <ul class="nav nav-pills flex-column">
                <li class="nav-item" id="6" onclick="makeActive(this);">
                    <a href="http://localhost/osms/login/logout" class="navlink">Log Out</a>
                </li>
            </ul>
        </nav>
        <main class="col-sm-9 com-md-10 offset-sm-3 offset-md-2 pt-3">
<!--            <div id="update_container" class="updates btn-success" style="border-radius: 2px;">-->
<!--                <p style="margin-left: 15px;" id="update_text" onclick="dismiss(this);">I am updates (click to dismiss!)</p>-->
<!--            </div>-->

