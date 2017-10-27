<?php

class about extends Controller
{
    public function index()
    {
        require APP.'view/templates/header.php';
        require APP.'view/view.about.php';
        require APP.'view/templates/footer.php';
    }
}

?>