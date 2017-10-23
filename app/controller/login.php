<?php

class login extends Controller
{
    public  function index()
    {
        if(isset($_SESSION['user']))
        {
            header("location: ".Util::php_link("home"));
        }
        require APP.'view/templates/header.php';
        require APP.'view/view.login.php';
        if(isset($_SESSION['signupsuccess']))
        {
            Util::setNotification("Sign Up Successful! Please login to enter the system!");
            Util::setNotificationBackground("green");
            Util::js("notification();");
            session_destroy();
        }
        require APP.'view/templates/footer.php';
    }

    public function auth()
    {
        require APP . 'view/templates/header.php';

        if(empty($_POST['username']) || empty($_POST['password']))
        {
            Util::log("Nothing");
            Util::setNotification("Please fill all the field.");
            Util::setNotificationBackground("darkred");
            Util::js("notification();");
            require APP.'view/view.login.php';
            require APP.'view/templates/footer.php';
            return;
        }

        $user = $_POST['username'];
        $pass = $_POST['password'];

        Util::log($user);
        Util::log($pass);

        $db = DBUtil::getInstance();
        $sql = "SELECT * FROM tbl_admin WHERE admin_email='$user' AND admin_pass='$pass' ;";

        $result = $db->doQuery($sql);
        if ($result->num_rows > 0)
        {
            Util::log("Admin login!");
            $_SESSION['user'] = $db->getAllRows()[0]['admin_name'];
            $_SESSION['role'] = 'admin';
            header("Location: ".Util::php_link("home/admin"));
        } else
        {
            $sql = "SELECT * FROM `tbl_customer` WHERE `customer_email` = '$user' AND `customer_pass` = '$pass';";
            $result = $db->doQuery($sql);
            if ($result->num_rows > 0)
            {
                Util::log("User login!");
                $_SESSION['role'] = 'user';
                $_SESSION['user'] = $db->getAllRows()[0]['customer_name'];
                header("Location: ".Util::php_link("home"));
            }
            else
            {
                Util::setNotification("Wrong Username or Password!");
                Util::setNotificationBackground("darkred");
                Util::js("notification();");
            }

            require APP.'view/view.login.php';
            require APP.'view/templates/footer.php';
        }
    }
    public function logout()
    {
        if(session_status() != PHP_SESSION_NONE)
        {
            session_destroy();
        }
        header("Location: ".Util::php_link("home"));
    }
}