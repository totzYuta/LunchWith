<?php
require_once(dirname(__FILE__)."/../connect.php");

$sql_offerers = "SELECT * FROM offers WHERE id=".$_GET['id'];

$offerer_id_array = array();
$row = $dbh->query($sql_offerers);
/*while($row) {
  array_push($offerer_id_array, $row[0]);
}*/
/*for ($i=0; count($row)<$i; $i++) {
  array_push($offerer_id_array, $row[0]);
}*/

$tmp_sql = implode(" OR id=", $offerer_id_array);

$sql = "SELECT * FROM users WHERE id=".$tmp_sql;

echo $sql."<br>";

$stmt = $dbh->query($sql);

echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));

$dbh = null;
