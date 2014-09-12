<?php
require_once(dirname(__FILE__)."/../connect.php");

$sql = "SELECT * FROM offers WHERE active=1 AND id=".$_GET['id'];
echo $sql;
$stmt = $dbh->query($sql);

echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));

$dbh = null;
