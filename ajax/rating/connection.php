<?php
//Database configuration

define('HOST', '34.224.83.184');
define('USERNAME', 'student2');
define('PASSWORD', 'phppass2');
define('DATABASE_NAME', 'student2');

//Connect with the database
$db = new mysqli("34.224.83.184","student2","phppass2","student2");
if($db->connect_errno):
    die('Connect error:'.$db->connect_error);
endif;
?>