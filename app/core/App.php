<?php

    class App
    {
        protected $controller = null;
        protected $method = null;
        protected $params = array();

        public  function __construct()
        {

            $this->parseURL();
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
                        require APP.'controller/error.php';
                        $this->controller = new $this->controller();
                        $this->controller->index();
                    }
                }
            } else {

                require APP.'controller/error.php';
                $this->controller = new Errors();
                $this->controller->index();
            }
        }
        public function parseURL()
        {
            if(isset($_GET['url']))
            {
                $url = trim($_GET['url'], '/');
                $url = filter_var($url, FILTER_SANITIZE_URL);
                $url = explode('/', $url);
                $this->controller = isset($url[0]) ? $url[0] : null;
                $this->method = isset($url[1]) ? $url[1] : null;
                unset($url[0], $url[1]);

                $this->params = array_values($url);
            }
        }
    }

?>