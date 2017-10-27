<?php

class contact extends Controller
{
    public function index()
    {
        require APP.'view/templates/header.php';
        require APP.'view/view.contact.php';
        require APP.'view/templates/footer.php';
    }
}

?>