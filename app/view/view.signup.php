<div class="container">
    <div class="row">
        <h2 style="padding-bottom: 30px; text-align: center;">Sign Up</h2>
        <form action="http://localhost/osms/signup/validate" class="form-horizontal" method="post">

            <div class="col-md-6 col-md-offset-4">
                <div class="form-inline">
                    <label class="control-label col-md-4" for="fname">Full Name</label>
                    <input class="form-control col-md-3" type="text" name="fname" id="fname" placeholder="Full Name" required>
                </div>
            </div>
            <br>
            <br><div class="col-md-6 col-md-offset-4">
                <div class="form-inline">
                    <label class="control-label col-md-4" for="sex">Sex</label>
                    <select class="form-control col-md-3" name="sex" id="sex"  required>
                        <option selected disabled value="none">Select Sex</option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                        <option value="other">Other</option>
                    </select>
                </div>
            </div>
            <br>
            <br>
            <div class="col-md-6 col-md-offset-4">
                <div class="form-inline">
                    <label class="control-label col-md-4" for="email">Email</label>
                    <input class="form-control col-md-3" type="text" name="email" id="email" onkeyup="checkEmail(this);"
                           placeholder="Email" required>
                    <span id="user_load"></span>
                </div>
            </div>
            <br>
            <br>
            <div class="col-md-6 col-md-offset-4">
                <div class="form-inline">
                    <label class="control-label col-md-4" for="address">Address</label>
                    <input class="form-control col-md-3" type="text" name="address" id="address" placeholder="Full Address" required>
                </div>
            </div>
            <br>
            <br>
            <div class="col-md-6 col-md-offset-4">
                <div class="form-inline">
                    <label class="control-label col-md-4" for="contact">Contact Number</label>
                    <input class="form-control col-md-3" type="text" name="contact" id="contact" placeholder="Phone Number" required>
                </div>
            </div>
            <br>
            <br>
            <div class="col-md-6 col-md-offset-4">
                <div class="form-inline" style="padding-top: 5px !important;" >
                    <label class="control-label col-md-4" for="pass1">Password</label>
                    <input class="form-control col-md-3" type="password" name="password1" id="pass1" required>
                </div>
            </div>
            <br>
            <br>
            <div class="col-md-6 col-md-offset-4">
                <div class="form-inline" style="padding-top: 5px !important;" >
                    <label class="control-label col-md-4" for="pass2">Repeat Password</label>
                    <input class="form-control col-md-3" type="password" name="password2" id="pass2" required>
                </div>
            </div>
            <br>
            <br>
            <div class="from-group" >
                <div class="col-md-2 col-md-offset-5" style="padding-top: 25px !important;">
                    <button class="form-control" value="Submit" type="submit" name="submit">Submit</button>
                </div>
            </div>
        </form>
    </div>
</div>

