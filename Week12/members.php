<?
session_start();

print_r($_SESSION);

if (empty($_SESSION['facebook_access_token']))
{
        die("You are not logged in");
}

echo "Welcome to the app";
?>