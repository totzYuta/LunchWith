<?php
require_once(dirname(__FILE__)."/../connect.php");

$sql = "select * from users where not id=" . $_GET['id'];
$stmt = $dbh->query($sql);

echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));

$dbh = null;
