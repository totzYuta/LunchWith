<?php

require_once(dirname(__FILE__)."/../connect.php");

var_dump($_GET["id"]);
var_dump($_GET["offerer_id"]);

$id = $_GET["id"];
$offered_id = $_GET["offerer_id"];

for ($i = 0; $i < count($id); $i++) {
  $sql = "SELECT count(*) FROM offers WHERE accepter_id=" . $id[$i] . " AND offerer_id=" . $offered_id;
  $stmt = $dbh->query($sql);
  
  foreach ($stmt as $row) {
    var_dump($row);
    echo "------------<br>";
    if ((int)$row[0] == 0) {
      $sql = "INSERT INTO offers (offerer_id, accepter_id) VALUES (?,?)"; 
      $stmt = $dbh->prepare($sql);
      $stmt->execute(array($offered_id, $id[$i]));
    } else {
      echo "すでに存在します。";
    }
  }
}
$dbh = null;