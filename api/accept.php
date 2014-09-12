<?php
require_once(dirname(__FILE__)."/../connect.php");

$sql = "SELECT count(*) FROM offers WHERE offerer_id=".$_GET['offerer_id']." AND accepter_id=".$_GET['id'];
$stmt = $dbh->query($sql);
foreach ($stmt as $row) {
    var_dump($row);
    echo "------------<br>";
    if ((int)$row[0] == 1) {
      $sql = "DELETE FROM offers WHERE offerer_id=".$_GET['offerer_id']." AND accepter_id=".$_GET['id']; 
      var_dump($sql);
      $stmt = $dbh->query($sql);
      echo "Deleted the offer";
    } else {
      echo "An Error occured: There had not been the offer data";
    }
}

$dbh = null;
