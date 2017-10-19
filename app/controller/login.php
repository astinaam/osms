<?php

class login extends Controller
{
    public  function index()
    {
        require APP.'view/templates/header.php';
        require APP.'view/view.login.php';
        require APP.'view/templates/footer.php';
    }

    public function auth()
    {
        require APP . 'view/templates/header.php';
        //echo "login success!!";
        //echo $_POST['username']." welcome!";
        $user = $_POST['username'];
        $pass = $_POST['password'];

        $db = DBUtil::getInstance();

        $result = $db->doQuery("SELECT * FROM tbl_admin WHERE admin_email='$user' AND admin_pass='$pass' ;");
//        var_dump($result);
        if ($result->num_rows > 0) {
            echo "<script>document.getElementById('loggedin').innerHTML = 'admin';</script>";
            echo URL.'res/admin';
//            header("Location: ".URL.'res/admin'.'"');

        } else
        {
            echo "<script>alert('incorrect login!');</script>";
//            header("Location: http://localhost/osms/login");

        }


        require APP.'view/templates/footer.php';
    }
}