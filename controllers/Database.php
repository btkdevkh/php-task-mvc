<?php

class Database {
  private $db_host = DB_HOST;
  private $db_name = DB_NAME;
  private $db_username = DB_USERNAME;
  private $db_password = DB_PASSWORD;

  protected $dbh;
  private $error;

  public function connect() {
    $dsn = 'mysql:host=' . $this->db_host . ';dbname=' . $this->db_name;
    $options = [
      PDO::ATTR_PERSISTENT => true,
      PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ];

    try {
      if($this->dbh === null) {
        $this->dbh = new PDO($dsn, $this->db_username, $this->db_password, $options);
      }
      return $this->dbh;
    } catch (PDOException $e) {
      $this->error = $e->getMessage();
      echo $this->error;
    }
  }
}
