<html>
<head>
    <title>Login</title>

    <!--<script src='https://www.google.com/recaptcha/api.js'></script> -->
</head>

<body>

<p>Hello World! Please log in.</p>

<form action="process.php" method="POST">

<br/>
<p>Username:</p>
<input type="text" name="username" required/>
<p>Password:</p>
<input type="password" name="password" required/>
<br/>
<input type="submit" value="Login"/>
<!-- <div class="g-recaptch" data-sitekey="my-sitekey-NW1172"></div> -->

</form>

<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
<input type="hidden" name="cmd" value="_s-xclick">
<input type="hidden" name="hosted_button_id" value="AWJMC7XXV8KDU">
<input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_donateCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
<img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
</form>

</body>
</html>