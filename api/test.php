<?php
require_once(dirname(__FILE__)."/../connect.php");

$sql = "select * from users";
$stmt = $dbh->query($sql);

echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));

$dbh = null;