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
        <link rel="stylesheet" href="http://localhost/osms/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="http://localhost/osms/css/style.css">
        <script src="http://localhost/osms/js/jquery-3.2.1.min.js" ></script>
        <script src="http://localhost/osms/js/script.js" ></script>
        <script src="http://localhost/osms/bootstrap/js/bootstrap.js"></script>
    </head>
    <header id="header">
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand title" href="<?php Util::link("home"); ?>">Unitech</a>
                </div>
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
<!--                        <li class="active"><a href="#">Link <span class="sr-only">(current)</span></a></li>-->
<!--                        <li><a href="#">Link</a></li>-->
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Products<span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="#">Action</a></li>
                                <li><a href="#">Another action</a></li>
                                <li><a href="#">Something else here</a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="#">Separated link</a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="#">One more separated link</a></li>
                            </ul>
                        </li>
                        <li><a href="<?php Util::link('shop'); ?>">Shop</a></li>
                        <li><a href="#">About Us</a></li>

                        <li><a href="#">Contact</a></li>
                    </ul>
                    <form class="navbar-form navbar-left">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Search">
                        </div>
                        <button type="submit" class="btn btn-default">Search</button>
                    </form>
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
                                        <li><a href="#">Profile</a></li>
                                        <li><a href="#">Account Setting</a></li>
                                        <li><a href="#">Orders Log</a></li>
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
