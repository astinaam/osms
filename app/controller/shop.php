<?php

class shop extends Controller
{
    public function index()
    {
        require APP.'view/templates/header.php';
        require APP.'view/view.shop.php';
        require APP.'view/templates/footer.php';
    }
}

?>