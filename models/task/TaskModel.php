<?php

require_once('controllers/Database.php');

class TaskModel extends Database {
  private $db;

  public function __construct() {
    $this->db = $this->connect();
  }

  public function getTasks() {
    $stmt = $this->db->prepare('SELECT * FROM task');
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_OBJ);

    return $result;
  }

  public function getTask($id) {
    $stmt = $this->db->prepare('SELECT * FROM task WHERE id = :id');
    $stmt->bindValue(':id', $id);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_OBJ);

    return $result;
  }

  public function addTask($name, $date, $completed) {
    $stmt = $this->db->prepare('INSERT INTO task(name, date, completed) VALUES(:name, :date, :completed)');
    $stmt->bindValue(':name', $name);
    $stmt->bindValue(':date', $date);
    $stmt->bindValue(':completed', $completed);
    $stmt->execute();
  }

  public function toggleTask($completed, $id) {
    $stmt = $this->db->prepare('UPDATE task SET completed = :completed WHERE id = :id');
    $stmt->bindValue(':completed', $completed);
    $stmt->bindValue(':id', $id);
    $stmt->execute();
  }

  public function deleteTask($id) {
    $stmt = $this->db->prepare('DELETE FROM task WHERE id = :id');
    $stmt->bindValue(':id', $id);
    $stmt->execute();
  }
}
