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
    // $this->connect = new \mysqli($this->dbHost, $this->dbAccount, $this->dbPassw, $this->dbName);
    /**
     * Условие, которое одновренменно делает и проверяет соединение с БД
     * и выдает сообщение о его наличии/отсутствии
     * @var object
     */
    if (mysqli_connect_errno()) {
    // if ($this->connect->connect_errno) {
      echo "Error: ". $this->connect->connect_errno;
    } else {
      echo "Status: ". $this->connect->host_info . " !!!YES!!! <br/>";
    }
  }

  // public function connect() {
  //   return $this->connect;
  // }
  // public function multi_query($sql) {
  //   return $this->connect->multi_query($sql);
  // }
  // public function next_result() {
  //   return $this->connect->next_result();
  // }
  // public function store_result() {
  //   return $this->connect->store_result();
  // }
  // public function errno() {
  //   return $this->connect->errno;
  // }
  // public function error() {
  //   return $this->connect->error;
  // }
  // public function close() {
  //   return $this->connect->close();
  // }
}
