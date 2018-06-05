<?php
$l=mysqli_connect("34.224.83.184","student2","phppass2","student2");

$course_id="_3_1";
$clientURL="http://bb.dataii.com:8080";

require_once('classes/Rest.class.php');
require_once('classes/Token.class.php');

$rest = new Rest($clientURL);
$token = new Token();

$token = $rest->authorize();
$access_token = $token->access_token;

$columns = $rest->readGradebookColumns($access_token, $course_id);
$c=$columns->results;

$finalGrade = 0;

$grades = $rest->readGradebookGrades($access_token, $course_id, $finalGradeID);

$g=$grades->results;
foreach($g as $row)
{
    
    $user = $rest->readUser($access_token, $row->userId);

    echo '<tr><td>' . $row['id'] . '</td>
        <td>' . $row['username'] . '</td>
        <td>' . $row['externalID'] . '</td>
        <td>' . $row['created'] . '</td>
        <td>' . $row['dataSourceID'] . '</td>
        <td>' . $row['available'] . '</td>
        <td>' . $row['givenName'] . '</td>
        <td>' . $row['familyName'] . '</td></tr>';

    $finalGrade += $row
    
    echo "<pre>";
    print_r($user);
    echo "</pre>";
    $query = 'insert into users (id,userName,externalID,created,dataSourceID,available,givenName,familyName) values ("'.$user->id.'", $mysqli_query($l,$query)';
}

    
?>