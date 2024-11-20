<?php
require "constants.php";
require "dbConnect.php";

$conn = new dbConnect(DBTYPE, HOSTNAME, DBPORT, HOSTUSER, HOSTPASS, DBNAME);

$users = $conn->select('users'); 
$userCount = count($users); 

header('Content-Type: application/json');
echo json_encode([
    'labels' => ['Users'],
    'data' => [$userCount]
]);
