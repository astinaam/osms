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

        if(isset($_POST['uinfo']))
        {
            $con = dbutil::getInstance();
            $name = $con->secureInput($_POST['uname']);
            $umobile = $con->secureInput($_POST['umobile']);
            $uaddress = $con->secureInput($_POST['uaddress']);
            $sql = "UPDATE `tbl_customer` SET `customer_name` = '$name', `customer_address` = '$uaddress' , `customer_phone` = '$umobile' WHERE `tbl_customer`.`customer_id` = $id;";
            $res= $con->doQuery($sql);
            $_SESSION['msg'] = "Update Successful!";
            $_SESSION['msg_dialog'] = 0;
        }

        require APP.'view/templates/header.php';
        require APP.'view/view.customer.php';
        if(isset($_SESSION['msg']) && isset($_SESSION['msg_dialog']))
        {
            if($_SESSION['msg_dialog'] == 0)
            {
                $_SESSION['msg_dialog'] = 1;
                Util::setNotification($_SESSION['msg']);
                Util::setNotificationBackground("green");
                Util::js("notification();");
            }
        }
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
    public function update($id)
    {
        $this->customer_id = $id;
        if(!isset($_SESSION['user']))
        {
            Util::route404();
        }
        if($_SESSION['role'] == "admin")
        {
            Util::admin404();
        }
        require APP.'view/templates/header.php';

        if(isset($_SESSION['msg']) && isset($_SESSION['msg_dialog']))
        {
            if($_SESSION['msg_dialog'] == 0)
            {
                $_SESSION['msg_dialog'] = 1;
                Util::setNotification($_SESSION['msg']);
                Util::setNotificationBackground("darkred");
                Util::js("notification();");
            }
        }


        if(isset($_POST['upass']))
        {
            $con = dbutil::getInstance();
            $bad = 0;
            if(!isset($_POST['oldp']))
            {
                $_SESSION['msg'] = "Please Fill All The Field!";
                $_SESSION['msg_dialog'] = 0;
                $bad++;
            }
            else
            {
                $current = $con->secureInput($_POST['oldp']);
            }
            if(!isset($_POST['newp']))
            {
                $_SESSION['msg'] = "Please Fill All The Field!";
                $_SESSION['msg_dialog'] = 0;
                $bad++;
            }
            else
            {
                $new = $con->secureInput($_POST['newp']);
            }
            if(!isset($_POST['newpr']))
            {
                $_SESSION['msg'] = "Please Fill All The Field!";
                $_SESSION['msg_dialog'] = 0;
                $bad++;
            }
            else
            {
                $rnew = $con->secureInput($_POST['newpr']);
            }
            var_dump($bad);
            if($bad > 0)
            {

                header("Location: ".Util::php_link('customer/update/'.$this->customer_id));
            }
            $sql = "SELECT * FROM `tbl_customer` WHERE `tbl_customer`.`customer_id` = $id AND `tbl_customer`.`customer_pass` = '$current'";
            $res = $con->doQuery($sql);
            if($con->getNumRows() < 1)
            {
                $_SESSION['msg'] = "Please enter correct current password!";
                $_SESSION['msg_dialog'] = 0;
                ;
                header("Location: ".Util::php_link('customer/update/'.$this->customer_id));
            }
            else if($new != $rnew)
            {
                $_SESSION['msg'] = "Two passwords not matching!";
                $_SESSION['msg_dialog'] = 0;
                Util::setNotificationBackground('darkred');
                header("Location: ".Util::php_link('customer/update/'.$this->customer_id));
            }
            else
            {
                $sql = "UPDATE `tbl_customer` SET `customer_pass` = '$new' WHERE `tbl_customer`.`customer_id` = $id;";
                $res = $con->doQuery($sql);
                $_SESSION['msg'] = "Password Updated!";
                $_SESSION['msg_dialog'] = 0;
                header("Location: ".Util::php_link('customer/update/'.$this->customer_id));
            }

        }
        require APP.'view/view.update_customer.php';
        require APP.'view/templates/footer.php';

    }
}
?>