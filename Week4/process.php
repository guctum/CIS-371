<?PHP
session_start();

$username = $_POST['username'];
$password = $_POST['password'];
$login = false;

require("captcha.php");

/*
    This statement verifies password
*/
#we use $login as the boolean for authentication
if ($username == "admin" && $password == "welcome")
    {
    $login = true;
    }
else
    {
    $login = false;
    }


if ($login == true) {
    $_SESSION['auth'] = $username;
    } else {
    $_SESSION['auth'] = "";
}

if ($login == true) {
    header("location: account.php");
    die();
}



?>
<html>
<head>
</head>
<body>
<?PHP

require("menu.php");

if ($login == true) {
    echo "You are logged in! Welcome $username";
        } else {
    echo "You are not logged in.";
}


?>

</body>
</html>


