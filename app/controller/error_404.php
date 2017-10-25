<?php
    class error_404
    {
        public function index()
        {
            require APP.'view/view.error.php';
        }
        public function guest()
        {
            require APP.'view/view.guest_error.php';
        }
    }
?>