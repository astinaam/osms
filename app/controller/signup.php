<?php


class signup extends  Controller
{
    public function index()
    {
        require APP.'view/templates/header.php';
        require APP.'view/view.signup.php';
        require APP.'view/templates/footer.php';
    }
    public function validate()
    {
        if(isset($_POST['submit']))
        {
            $con = dbutil::getInstance();
            $pass1 = $con->secureInput($_POST['password1']);
            $pass2 = $con->secureInput($_POST['password2']);
            $contact = $con->secureInput($_POST['contact']);
            $address = $con->secureInput($_POST['address']);
            $email = $con->secureInput($_POST['email']);
            $full_name = $con->secureInput($_POST['fname']);
            $sex = $con->secureInput($_POST['sex']);
            Util::log($email);
            Util::log($contact);
            Util::log($address);
            Util::log($full_name);
            Util::log($pass1);
            Util::log($pass2);
            if($pass1 != $pass2)
            {
                header("Location: ".Util::php_link("signup/passmatch"));
            }
            $sql = "INSERT INTO `tbl_customer` (`customer_id`, `customer_name`, `customer_email`, 
`customer_pass`, `customer_sex`, `customer_phone`, `customer_address`, `admin_id`) 
VALUES (NULL, '$full_name', '$email', '$pass2', '$sex', '$contact', '$address', 1);";

            $res = $con->doQuery($sql);
            if(strlen(mysqli_error($con)) == 0)
            {
                $_SESSION['signupsuccess'] = 1;
                header("Location: ".Util::php_link("login"));
            }
            else
            {
                echo mysqli_error($con);
            }
        }

    }
    public function checkEmail($email)
    {
        $con = dbutil::getInstance();
        $res = $con->doQuery("SELECT * FROM tbl_customer WHERE customer_email = '$email'");
        $ok = true;
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $ok = false;
        }
        if($con->getNumRows() <= 0 && $ok ==true)
        {
            die('<img src="http://localhost/osms/img/tick.png"/>');
        }
        else
        {
            die('<img src="http://localhost/osms/img/cross.png"/>');
        }
    }
    public function passmatch()
    {
        require APP.'view/templates/header.php';
        require APP.'view/view.signup.php';
        Util::log("Get");
        Util::setNotification("Password mismatch!!");
        Util::setNotificationBackground("darkred");
        Util::js("notification();");
        require APP.'view/templates/footer.php';
    }
}