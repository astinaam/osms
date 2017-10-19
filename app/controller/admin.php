<?php

    class admin extends Controller
    {
        public function index()
        {
            require  APP.'view/templates/header.php';
            require  APP.'view/view.admin.php';
            require  APP.'view/templates/footer.php';

        }

        public function add()
        {
            require  APP.'view/templates/header.php';
            require  APP.'view/view.admin.add.php';
            require  APP.'view/templates/footer.php';
        }
    }
?>