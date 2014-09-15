<?php
require_once(dirname(__FILE__)."/db.php");

try {
    $dbh = new PDO(DSN, DB_USER, DB_PASSWORD);
} catch (PDOException $e) {
    var_dump($e->getMessage());
    exit;
}

header('Access-Control-Allow-Origin: *');

// $sql = "select * from sites";
// $stmt = $dbh->query($sql);

// $sql2 = "insert ignore into articles (site_id, title, url, date, img_path, description) values (?,?,?,?,?,?)";
// $stmt2 = $dbh->prepare($sql2);
// $stmt2->execute(array($site_id, $title, $url, $date, $img_path, $striped));

// $dbh = null;