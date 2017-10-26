<?php

    class App
    {
        protected $controller = null;
        protected $method = null;
        protected $params = array();

        public  function __construct()
        {

            $this->parseURL();
            $this->auto_verify();
//            var_dump($this->controller);
//            var_dump($_GET);
            if(!$this->controller)
            {
                require  APP.'controller/home.php';
                $page = new Home();
                $page->index();
            }
            elseif (file_exists(APP . 'controller/' . $this->controller . '.php')) {

                require APP . 'controller/' . $this->controller . '.php';
                $this->controller = new $this->controller();
//                var_dump($this->method);
                if (method_exists($this->controller, $this->method)) {
//                    echo "exists";
                    if (!empty($this->params)) {
                        call_user_func_array(array($this->controller, $this->method), $this->params);
                    } else {
                        $this->controller->{$this->method}();
                    }

                } else {
//                    echo "len".strlen($this->method);
                    if (strlen($this->method) == 0) {
//                        echo "here";
                        $this->controller->index();
                    }
                    else {
                        require APP . 'controller/error_404.php';
                        $this->controller = new error_404();
                        $this->controller->index();
                    }
                }
            } else {

                require APP . 'controller/error_404.php';
                $this->controller = new error_404();
                $this->controller->index();
            }
        }
        public function parseURL()
        {
            if(isset($_GET['url']))
            {
                $url = trim($_GET['url'], '/');
                $url = filter_var($url, FILTER_SANITIZE_URL);
                if(!isset($_SESSION['current_page']))
                {
                    $_SESSION['prev_page'] = Util::php_link('home');
                }
                else
                {
                    $_SESSION['prev_page'] = $_SESSION['current_page'];
                }
                $_SESSION['current_page'] = $url;
                $url = explode('/', $url);
                $this->controller = isset($url[0]) ? $url[0] : null;
                $this->method = isset($url[1]) ? $url[1] : null;
                unset($url[0], $url[1]);

                $this->params = array_values($url);
            }
        }

        public function auto_verify()
        {
            $con = dbutil::getInstance();
            $res = $con->doQuery("SELECT * FROM `tbl_transaction_numbers` WHERE `status` = 0 ;");
            if($con->getNumRows() > 0)
            {
                $rows = $con->getAllRows();
                for($i=0;$i<count($rows);$i++)
                {
                    $curr_row = $rows[$i];
                    $tran = $curr_row['transaction_number'];
                    $sql = "SELECT * FROM `tbl_payment` WHERE `bkash_transaction_No` = '$tran' AND `status` = 0 ;";
                    $res = $con->doQuery($sql);
                    if($con->getNumRows() > 0)
                    {
                        $row = $con->getTopRow();
                        $oid = $row['order_id'];
                        $pid = $row['payment_id'];
                        $sql = "UPDATE `tbl_order` SET `status` = 1 WHERE `tbl_order`.`order_id` = $oid ;";
                        $res = $con->doQuery($sql);

                        $sql = "UPDATE `tbl_payment` SET `status` = 1 WHERE `tbl_payment`.`payment_id` = $pid ;";
                        $res = $con->doQuery($sql);

                        $sql = "UPDATE `tbl_transaction_numbers` SET `status` = '1' WHERE `tbl_transaction_numbers`.`transaction_number` = '$tran';";
                        $res = $con->doQuery($sql);
                    }

                }
            }
        }
    }

?>