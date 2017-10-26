<html>
    <head>
        <title>Admin Panel</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="http://localhost/osms/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="http://localhost/osms/css/style.css">
        <script src="http://localhost/osms/js/jquery-3.2.1.min.js" ></script>
        <script src="http://localhost/osms/js/script.js" ></script>
        <script src="http://localhost/osms/bootstrap/js/bootstrap.js"></script>
    </head>
    <header>
        <h1 style="padding-left: 15px;">Dashboard</h1>
        <span>
            <?php
                if(isset($_SESSION['user']))
                {
                    echo "<button class='rgtc btn btn-success'>".$_SESSION['user']."</button>";
                }
            ?>
        </span>
    </header>
    <div id="notification">A simple Notification</div>
<body>