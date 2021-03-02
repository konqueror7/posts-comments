<?php
namespace Glavpunkt;

require 'autoload.php';

$db = New DataBaseConnect();

if (isset($_POST["search"])) {
  $searchdata = New SearchData();
  $responseArray = $searchdata->dbquery($_POST["search"], $db);
  if (count($responseArray) > 0) {
    $response = ["success" => true, "result" => $responseArray];
  } else {
    $response = ["success" => false];
  }
  echo json_encode($response);
}

$db->connect->close();
