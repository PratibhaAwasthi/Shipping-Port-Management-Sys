<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>

<a href="index.php">Home</a>
<br>
<br>

<?php

$mysql_host = "us-cdbr-east-03.cleardb.com";
$mysql_database = "heroku_989d675bc42ca01";
$mysql_user = "b474b95ea4f970";
$mysql_password = "46b36be7";
# MySQL with PDO_MYSQL  
$db = new PDO("mysql:host=$mysql_host;dbname=$mysql_database", $mysql_user, $mysql_password);

$query = file_get_contents("Create_Tables.sql");

$stmt = $db->prepare($query);

if ($stmt->execute()){
     echo "Success";
}else{ 
     echo "Fail";
}

?>