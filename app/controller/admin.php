<?php

    class admin extends Controller
    {
        public function index()
        {
            if(isset($_SESSION['role']))
            {
                if($_SESSION['role'] == 'admin')
                {
                    require APP.'view/templates/admin_header.php';
                    require APP.'view/templates/admin_body.php';
                    require APP.'view/templates/admin_footer.php';
                }
                else
                {
                    header("Location: ".Util::php_link("error"));
                }
            }
            else{
                header("Location: ".Util::php_link("error"));
            }
        }

        public function edit()
        {
            if(isset($_SESSION['role']))
            {
                if($_SESSION['role'] == 'admin')
                {
                    require APP.'view/templates/admin_header.php';
                    require APP.'view/templates/admin_body.php';

                    require APP.'view/view.admin.php';

                    require APP.'view/templates/admin_footer.php';
                }
                else
                {
                    header("Location: ".Util::php_link("error"));
                }
            }
            else{
                header("Location: ".Util::php_link("error"));
            }
        }

        public function add()
        {
            require  APP.'view/templates/header.php';
            require  APP.'view/view.admin.add.php';
            require  APP.'view/templates/footer.php';
        }
    }
?>