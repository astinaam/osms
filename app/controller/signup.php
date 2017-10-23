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
            $username = $_POST['username'];
            $pass1 = $_POST['password1'];
            $pass2 = $_POST['password2'];
            $contact = $_POST['contact'];
            $address = $_POST['address'];
            $email = $_POST['email'];
            $full_name = $_POST['fname'];
            Util::log($username);
            Util::log($email);
            Util::log($contact);
            Util::log($address);
            Util::log($full_name);
            if($pass1 != $pass2)
            {
                header("Location: ".Util::php_link("signup/passmatch"));
            }

        }
    }
    public function user_exists()
    {

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