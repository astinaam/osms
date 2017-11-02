<?php
    ob_start();
    if (session_status() == PHP_SESSION_NONE)
    {
        session_start();
    }
?>

<html>
    <head>
        <title>Unitech Online Shop Management System</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="http://localhost/osms/bootstrap/css/bootstrap.css">
        <link rel="stylesheet" href="http://localhost/osms/css/style.css">
        <link rel="stylesheet" href="http://localhost/osms/font-awesome/css/font-awesome.css">
        <script src="http://localhost/osms/js/jquery-3.2.1.min.js" ></script>
        <script src="http://localhost/osms/js/script.js" ></script>
        <script src="http://localhost/osms/bootstrap/js/bootstrap.js"></script>
    </head>
    <header id="header">
        <nav class="navbar navbar-default">
            <div class="containers" style="padding-left: 0px !important; padding-right: 0px !important;">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand title" href="<?php Util::link("home"); ?>">
                        <img class="logo" src="<?php Util::link('img/logo.jpg'); ?>" alt="Unitech Products Limited">
                    </a>
                </div>
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
<!--                        <li class="active"><a href="#">Link <span class="sr-only">(current)</span></a></li>-->
<!--                        <li><a href="#">Link</a></li>-->
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Products<span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <?php
                                    $category_list = Products::getCategoryAndId();
//                                    var_dump($category_list);
                                    for($i=0;$i<count($category_list);$i++)
                                    {
                                        $category = $category_list[$i];

                                        ?>
                                        <li><a href="<?php Util::link('category/view/'.$category['category_id']); ?>"><?php echo $category['category_name']; ?></a></li>
                                <?php
                                    }
                                ?>
<!--                                <li role="separator" class="divider"></li>-->
<!--                                <li><a href="#">Separated link</a></li>-->
<!--                                <li role="separator" class="divider"></li>-->
<!--                                <li><a href="#">One more separated link</a></li>-->
                            </ul>
                        </li>
                        <li><a href="<?php Util::link('shop'); ?>">Shop</a></li>
                        <li><a href="<?php Util::link('about') ?>">About Us</a></li>

                        <li><a href="<?php Util::link('contact') ?>">Contact</a></li>
                    </ul>

                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="<?php  Util::link("cart"); ?>">Cart</a></li>
                        <?php
                            if(isset($_SESSION['user']))
                            {
                                ?>
                                <li class="dropdown">
                                    <a id="loggedin" class="dropdown-toggle" data-toggle="dropdown"
                                       role="button" aria-haspopup="true" aria-expanded="false">
                                        <?php
                                        if(isset($_SESSION['user']))
                                        {
                                            echo $_SESSION['user']."<span class='caret'></span>";
                                            //Util::log("User Logged in!");
                                        }
                                        ?>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <?php
                                            if(isset($_SESSION['user']))
                                            {
                                                if($_SESSION['role'] == 'admin')
                                                {
                                                    ?>
                                                    <li><a href="http://localhost/osms/admin">Admin Panel</a></li>
                                                    <li role="separator" class="divider"></li>
                                                    <li><a href="<?php  Util::link("login/logout"); ?>">Logout</a></li>
                                                    <?php
                                                }
                                                else
                                                {
                                                    ?>
                                        <li><a href="<?php Util::link('customer/view/'.$_SESSION['user_id']); ?>">Profile</a></li>
                                        <li><a href="<?php Util::link('customer/update/'.$_SESSION['user_id']); ?>">Update Profile</a></li>
                                        <li><a href="<?php Util::link('payment/view'); ?>">My Payments</a></li>
                                        <li><a href="<?php Util::link('order/log'); ?>">Order Log</a></li>
                                        <li role="separator" class="divider"></li>
                                        <li><a href="<?php  Util::link("login/logout"); ?>">Logout</a></li>
                                        <?php
                                                }
                                            }
                                        ?>
                                    </ul>
                                </li>
                                <?php
                            }
                            else
                            {
                                echo "<li><a href='".Util::php_link("login")."'>Login / Sign Up</a></li>";
                            }
                        ?>
                    </ul>
                </div>
            </div>
        </nav>
        <div id="notification">A simple Notification</div>
    </header>

    <body>
