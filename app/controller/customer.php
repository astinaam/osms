<?php
class customer extends Controller
{
    protected $customer_id = null;
    public function view($id)
    {
        $this->customer_id = $id;
        if(!isset($_SESSION['user']))
        {
            Util::route404();
        }
        require APP.'view/templates/header.php';
        require APP.'view/view.customer.php';
        require APP.'view/templates/footer.php';
    }

    public function adminview($id)
    {
        $this->customer_id = $id;
        if(!isset($_SESSION['user']))
        {
            Util::route404();
        }
        if($_SESSION['role'] != "admin")
        {
            Util::admin404();
        }
        require APP.'view/templates/admin_header.php';
        require APP.'view/templates/admin_body.php';
        require APP.'view/view.customer.php';
        require APP.'view/templates/admin_footer.php';
    }
}
?>