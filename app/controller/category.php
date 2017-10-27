<?php

class category extends Controller
{
    protected $category_id = null;
    public function view($cid)
    {
        $this->category_id = $cid;
        require APP.'view/templates/header.php';
        require APP.'view/view.search.php';
        require APP.'view/view.category.php';
        require APP.'view/templates/footer.php';
    }
}

?>