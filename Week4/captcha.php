<?PHP

$allowLogin = false;
$response = $_POST["g-recaptcha-response"];

$url = 'https://www.google.com/recaptcha/api/siteverify';
$data = array(
    'secret' => 'AThO',
    'response' => $_POST["g-recaptcha-response"]
);
$options = array(
    'http' => array(
        'method' => 'POST',
        'content' => http_build_query($data)
    )
);
$context = stream_context_create($options);
$verify = @file_get_contents($url, false, $context);
$captcha_success = json_decode($verify);

if($captcha_success->success==false)
{
    $allowLogin = false;
}
else if ($captcha_success->success==true)
{
    $allowLogin = true;
}

?>