<?php

namespace Glavpunkt;

class DatabaseConnect {
  private $dbHost, $dbAccount, $dbPassw, $dbName;
  public $connect;

  public function __construct($dbHost = "mariadb", $dbAccount = "glavpunkt", $dbPassw = "glavpunkt", $dbName = "glavpunkt") {
    $this->dbHost = $dbHost;
    $this->dbAccount = $dbAccount;
    $this->dbPassw = $dbPassw;
    $this->dbName = $dbName;
    $this->connect = mysqli_connect($this->dbHost, $this->dbAccount, $this->dbPassw, $this->dbName);

    if (mysqli_connect_errno()) {
      $this->connect->connect_errno;
    } else {
      $this->connect->host_info;
    }
  }
}
