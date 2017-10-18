<?php
include_once "header.php";
?>

<div class="container">
    <div class="row">
        <h2 style="padding-bottom: 30px; text-align: center;">Sign Up</h2>
        <form action="#" class="form-horizontal">
            <div class="col-md-6 col-md-offset-4">
                <div class="form-inline">
                    <label class="control-label col-md-3" for="user">Username</label>
                    <input class="form-control col-md-3" type="text" name="username" id="user" placeholder="username">
                </div>
            </div>
            <div class="col-md-6 col-md-offset-4">
                <div class="form-inline">
                    <label class="control-label col-md-3" for="fname">Full Name</label>
                    <input class="form-control col-md-3" type="text" name="fname" id="fname" placeholder="Full Name">
                </div>
            </div>
            <div class="col-md-6 col-md-offset-4">
                <div class="form-inline">
                    <label class="control-label col-md-3" for="email">Email</label>
                    <input class="form-control col-md-3" type="text" name="email" id="email" placeholder="Email">
                </div>
            </div>
            <div class="col-md-6 col-md-offset-4">
                <div class="form-inline">
                    <label class="control-label col-md-3" for="address">Address</label>
                    <input class="form-control col-md-3" type="text" name="address" id="address" placeholder="Full Address">
                </div>
            </div>
            <div class="col-md-6 col-md-offset-4">
                <div class="form-inline">
                    <label class="control-label col-md-3" for="contact">Contact Number</label>
                    <input class="form-control col-md-3" type="text" name="contact" id="contact" placeholder="Phone Number">
                </div>
            </div>
            <div class="col-md-6 col-md-offset-4">
                <div class="form-inline" style="padding-top: 5px !important;" >
                    <label class="control-label col-md-3" for="pass1">Password</label>
                    <input class="form-control col-md-3" type="password" name="password1" id="pass1">
                </div>
            </div>
            <div class="col-md-6 col-md-offset-4">
                <div class="form-inline" style="padding-top: 5px !important;" >
                    <label class="control-label col-md-3" for="pass2">Repeat Password</label>
                    <input class="form-control col-md-3" type="password" name="password1" id="pass2">
                </div>
            </div>
            <div class="from-group" >
                <div class="col-md-2 col-md-offset-5" style="padding-top: 25px !important;">
                    <button class="form-control" value="Submit" type="submit" name="submit">Submit</button>
                </div>
            </div>
        </form>
    </div>
</div>

<?php
include_once "footer.php";
?>

