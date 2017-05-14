<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <link rel="icon" type="image/png" href="assets/img/favicon.ico">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title> LMS K.K.M.M.P.T.C</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="assets/css/animate.min.css" rel="stylesheet"/>
    <link href="assets/css/font-awesome.min.css" rel="stylesheet">
    <script src="assets/js/jquery-1.10.2.js" type="text/javascript"></script>
    <script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
    <script type="text/javascript">
        function varticalCenterStuff() {
            var windowHeight = $(window).height();
            var loginBoxHeight = $('.login-box').innerHeight();
            var welcomeTextHeight = $('.welcome-text').innerHeight();
            var loggedIn = $('.logged-in').innerHeight();

            var mathLogin = (windowHeight / 2) - (loginBoxHeight / 2);
            var mathWelcomeText = (windowHeight / 2) - (welcomeTextHeight / 2);
            var mathLoggedIn = (windowHeight / 2) - (loggedIn / 2);
            $('.login-box').css('margin-top', mathLogin);
            $('.welcome-text').css('margin-top', mathWelcomeText);
            $('.logged-in').css('margin-top', mathLoggedIn);
        }
        $(window).resize(function () {
            varticalCenterStuff();
        });
        $(function(){
            varticalCenterStuff();


// awesomeness
$('.btn-login').click(function(){
    $(this).parent().fadeOut(function(){
        $('.login-box').fadeIn();
    })
});

$('.btn-cancel-action').click(function(e){
    e.preventDefault();
    $(this).parent().parent().parent().fadeOut(function(){
        $('.welcome-text').fadeIn();
    })
});

$('.btn-login-submit').click(function(e){
  

  var element = $(this).parent().parent().parent();
  
  var usernameEmail = $('#username-email').val();
  var password = $('#password').val();
  
  if(usernameEmail == '' || password == ''){

    // wigle and show notification
    // Wigle
    var element = $(this).parent().parent().parent();
    $(element).addClass('animated rubberBand');  
    $(element).one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function(){
      $(element).removeClass('animated rubberBand');
  });
    
    // Notification
    // reset
    $('.notification.login-alert').removeClass('bounceOutRight notification-show animated bounceInRight');
    // show notification
    $('.notification.login-alert').addClass('notification-show animated bounceInRight');
    
    $('.notification.login-alert').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function(){
        setTimeout(function(){
            $('.notification.login-alert').addClass('animated bounceOutRight');
        }, 2000);
    });
}else{
    $(element).fadeOut(function(){
      $('.logged-in').fadeIn();
  });
  }//endif
});


$('.btn-logout').click(function(){
   $('.logged-in').fadeOut(function(){
     $('.welcome-text').fadeIn();
     // Notification
     $('.notification.logged-out').removeClass('bounceOutRight notification-show animated bounceInRight');
    // show notification
    $('.notification.logged-out').addClass('notification-show animated bounceInRight');
    
    $('.notification.logged-out').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function(){
        setTimeout(function(){
            $('.notification.logged-out').addClass('animated bounceOutRight');
        }, 2000);
    });

});
});


var c = document.getElementById("canv");
var elem = c.getContext("2d");
c.width = window.innerWidth;
c.height = window.innerHeight / 2;

var num = 300;
var rad = 105 * Math.PI / num;
var o = [];
var _o;

var draw = function() {

  for (var i = 0; i < num; i++) {
    if (o.length < num) o[i] = i / num;
    _o = o[0];
    if (o[i] + 1 / num > 1) o[i] = 0;
    o[i] = o[i] + 1 / num;
    elem.fillStyle = 'hsla(' + i + 2 + ', 70%, 50%,' + o[i] + ')';
    elem.beginPath();
    elem.setTransform(Math.cos(num * i),
      Math.sin(num * rad),
      Math.sin(num * i),
      Math.cos(num * rad),
      c.width / 2, c.height);
    if (i != 0)
      elem.fillRect(num * 6 * o[i - 1], 0, c.width, c.height);
  else
      elem.fillRect(num * 6 * _o, 0, c.width, c.height);
  elem.fill();
}

};
//animate && resize
window.addEventListener('resize', function() {
  c.width = window.innerWidth;
  c.height = window.innerHeight / 2;
}, false);

window.requestAnimFrame = (function() {
  return window.requestAnimationFrame ||
  window.webkitRequestAnimationFrame ||
  window.mozRequestAnimationFrame ||
  window.oRequestAnimationFrame ||
  window.msRequestAnimationFrame ||
  function(callback) {
      window.setTimeout(callback, 1000 / 60);
  };
})();

var run = function() {
  window.requestAnimFrame(run);
  window.requestAnimationFrame(draw);

}
run();
});

</script>
<style type="text/css">
    @import url(http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,400,300,600,700);
    body {
        background: -webkit-linear-gradient(90deg, #FF512F 10%, #DD2476 90%);
        background: -moz-linear-gradient(90deg, #FF512F 10%, #DD2476 90%);
        background: -ms-linear-gradient(90deg, #FF512F 10%, #DD2476 90%);
        background: -o-linear-gradient(90deg, #FF512F 10%, #DD2476 90%);
        background: linear-gradient(90deg, #FF512F 10%, #DD2476 90%);
        //background: black;
        font-family: 'Open Sans', sans-serif!important;
    }



    .well{
        background-color:#fff!important;
        border-radius:0!important;
        border:none!important;
    }



    .well.login-box {
        width:300px;
        margin:0 auto;
        display:none;
    }
    .well.login-box legend {
      font-size:26px;
      text-align:center;
      font-weight:300;
  }
  .well.login-box label {
      font-weight:300;
      font-size:16px;

  }
  .well.login-box input[type="text"] {
      box-shadow:none;
      border-color:#ddd;
      border-radius:0;
  }

  .well.welcome-text{
    font-size:21px;
}

/* Notifications */

.notification{
    position:fixed;
    top: 20px;
    right:0;
    background-color:#FF4136;
    padding: 20px;
    color: #fff;
    font-size:21px;
    display:none;
}
.notification-success{
  background-color:#3D9970;
}

.notification-show{
    display:block!important;
}

/*Loged in*/
.logged-in{
  display:none;
}
.logged-in h1{
  margin:0;
  font-weight:300;
}
canvas {
    width: 100%;
    height:100%;
    position: absolute;
    top:0;
    left: 0;
    right: 0;
    bottom: 0;
  box-shadow: -2px 2px 8px hsla(0, 0%, 0%, .6);
  z-index: -1;
  opacity: 0.2;
}
.brand{
    font-size: 42px;
    position: absolute;
    top: 50px;
    left: 50%;
    margin-left: -280px;
    color:#f5f5f5;
    font-family: 'Lato';
    font-weight: 700;
}
</style>
</head>
<body>


    <div class="container">
        <canvas id='canv'></canvas>
        <header></header>
        <div class="brand">Library Management System</div>
        <div class="row">
            <div class="com-md-12">
                <div class="notification login-alert">
                  Please Enter Your Username And Password!
              </div>
              <div class="notification notification-success logged-out">
                  You logged out successfully!
              </div>
              <div class="well welcome-text">
                Hello, to access our app please <button class="btn btn-default btn-login">Log in</button>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="well login-box">
                <form action="actions.php?action=login" method="post">
                    <legend>Login</legend>
                    <div class="form-group">
                        <label for="username-email">E-mail or Username</label>
                        <input value='' name="username" id="username-email" placeholder="E-mail or Username" type="text" class="form-control" />
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input id="password" name="password" value='' placeholder="Password" type="text" class="form-control" />
                    </div>
                    <div class="form-group text-center">
                        <input type="submit" class="btn btn-success btn-login-submit form-control" value="Login"  />

                        <button class="btn btn-danger btn-cancel-action form-control" style="margin-top:10px;">Cancel</button>
                    </div>
                </form>
            </div>
            <div class="logged-in well">
                <h1>You are loged in! <div class="pull-right"><button class="btn-logout btn btn-danger"><span class="glyphicon glyphicon-off"></span> Logout</button></div></h1>
            </div>
        </div>
    </div>
</div>
</body>
</html>
