<?php

$to = "cis371@mailinator.com;";    
$from = $_POST['email'];    
$name = $_POST['name'];
$subject ="Greg Uctum Assignment 7.1 Submission";
$message = $first_name . " " . $last_name . " wrote the following:" . "\n\n" . $_POST['message'];

mail($to,$subject,$message);
echo "Mail sent. Thank you " .$first_name . ", we will contact you shortly.";

$l=mysqli_connect("34.224.83.184","student2","phppass2","student2");

$query = "insert into message(MessageID, Message, Stamp) values (null, '$_POST[message]', now())";

mysqli_query($l, $query);

?>