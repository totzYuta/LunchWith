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
      echo ('1');
      // 以下acceptテーブルに保存する部分
      $sql = "SELECT count(*) FROM accept WHERE accepter_id=" . $_GET['id'] . " AND offerer_id=" . $_GET['offerer_id'];
      $stmt = $dbh->query($sql);
echo ('2');
      foreach ($stmt as $row) {
        echo ('3');
        if ((int)$row[0] == 0) {
          echo ('4');
          $sql = "INSERT INTO accept (offerer_id, accepter_id) VALUES (?, ?)";
          $stmt = $dbh->prepare($sql);
          $stmt->execute(array($_GET['offerer_id'], $_GET['id']));
        }
      }
      echo "Deleted the offer";
    } else {
      echo "An Error occured: There had not been the offer data";
    }
}

$dbh = null;
