<br><br>

<div class="container">
    <div class="row">
        <h2 style="padding-bottom: 30px; text-align: center;">Login</h2>
        <form action="http://localhost/osms/login/auth" class="form-horizontal" method="post">
        <div class="col-md-6 col-md-offset-4">
                <div class="form-inline">
                    <label class="control-label col-md-3" for="user">Username</label>
                    <input class="form-control col-md-3" type="text" name="username" id="user" placeholder="username">
                </div>

        </div>
        <div class="col-md-6 col-md-offset-4">
                <div class="form-inline" style="padding-top: 5px !important;" >
                    <label class="control-label col-md-3" for="pass">Password</label>
                    <input class="form-control col-md-3" type="password" name="password" id="pass" placeholder="password">
                </div>
        </div>
            <div class="from-group" >
                <div class="col-md-2 col-md-offset-5" style="padding-top: 25px !important;">
                        <input class="form-control" value="Submit" type="submit" name="submit">
                </div>
            </div>
        </form>

        <div class="signup col-md-6 col-md-offset-5" style="padding-top: 10px;">
            <p>Not Signed up yet? <a href="signup">sign up</a> here!</p>
        </div>
    </div>
</div>