          
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Login</title>
<link rel="stylesheet" href="fontawesome-free-5.3.1-web/css/all.css" crossorigin="anonymous">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="bootstrap-4.0.0/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="style.css" type="text/css">
         <link href="https://fonts.googleapis.com/css?family=Noto+Serif+KR|Oxygen|Poppins" rel="stylesheet">
        

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
<body>
    <div class="forgot-password-wrapper">
    <h1 style="text-align:left; margin-bottom:20px; color:#444" class="page-heading">Forgot Your Password?</h1>
    <p class="tagline">Don't worry. Resetting your password is easy, just tell us the email address you registered with Ghar Ghar Rozgar.</p>
        <div class="form-group" style="margin: 0 auto; width:600px;">       
            <input type="text" id="login-username" name="email" required autofocus>
            <span class="highlight"></span>
            <span class="bar"></span>
            <label id="label" >Email</label>
        </div>
        <button class="btn btn-default send-button">Send</button>
    </div>
     <div class="thankyou-wrapper">
    <h1 style="text-align:left; margin-bottom:20px; color:#444" class="page-heading">Reset Your Password</h1>
    <p class="tagline">We have sent a reset password email to. Please click the reset password link to set your new password.</p>
         <br>
         <p class="tagline" style="margin-bottom:5px">Didn't receive the email yet?</p>
    <p class="tagline">Please check the spam folder, or <a id="resend" style="color:#0177a3; cursor:pointer;">resend</a> the email,</p>
        
    </div>
    <script src="jquery-3.3.1.js"></script>
    <script src="forgot-password.js"></script>
</body>
</html>