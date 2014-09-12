<?php
require_once(dirname(__FILE__)."/../connect.php");

$sql_offerers = "SELECT * FROM offers WHERE accepter_id=".$_GET['id'];

$offerer_id_array = array();
$stm = $dbh->query($sql_offerers);
foreach ($stm as $row) {
  array_push($offerer_id_array, $row['offerer_id']);
}

$tmp_sql = implode(" OR id=", $offerer_id_array);
$sql = "SELECT * FROM users WHERE id=".$tmp_sql;

echo $sql."<br>";

$stmt = $dbh->query($sql);

echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));

$dbh = null;
