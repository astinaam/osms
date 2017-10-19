<?php
//    echo "home req";
    class Home extends Controller
    {
        public function index()
        {
            require APP.'view/templates/header.php';
            require APP.'view/templates/body.php';
            require APP.'view/templates/footer.php';
        }

    }

?>