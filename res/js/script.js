
function notification()
{
    var x = document.getElementById("notification");
    x.className = "show";
    setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
}

var u_timer,evalue;

function checkEmail(el) {
    console.log("checks Username");
    var val = el.value;
    clearTimeout(u_timer);
    if(val.length !== 0)
    {
        u_timer = setTimeout(function () {
            checkEmailExists(val);
        });
    }
    else
    {
        document.getElementById('user_load').innerHTML = "<img src='http://localhost/osms/img/cross.png' />";
    }
}

function checkEmailExists(email) {
    var el = document.getElementById('user_load');
    var address = 'http://localhost/osms/signup/checkEmail/'+email;
    //console.log(address);
    el.innerHTML = "<img src='http://localhost/osms/img/Ajax-loader.gif' />";
    $.post(address,function (data) {
        el.innerHTML = data;
    });
}

function validateEmail(email) {
    var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
}

function dismiss(el)
{
    el.style.display = 'none';
}

function makeActive(el) {
    document.getElementById('1').classList.remove('active');
    document.getElementById('2').classList.remove('active');
    document.getElementById('3').classList.remove('active');
    document.getElementById('4').classList.remove('active');
    document.getElementById('5').classList.remove('active');
    document.getElementById('6').classList.remove('active');
    el.className += " active";
}